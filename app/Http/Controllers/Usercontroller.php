<?php

/*
 * @controller    UserController
 * @package    Add/Update/Delete User
 * @author     Jignesh Virani <jignesh@creolestudios.com>
 * @author     Another Author <another@example.com>
 * @copyright  2015 Creole Studios
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: 1.0 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use App\User;
use App\Login;
use DB;
use App\Quotation;
use Hash;
use Redirect;
use Auth;
use Session;
use Datatables;
use view;

class Usercontroller extends Controller {

    public function __construct() {

        $this->middleware('login', ['only' => ['getDashboard', 'getUserlist']]);
        //$this->middleware('auth');
    }

    ##This method render home view.

    public function index() {
        //  dd('yahoo');
        return view('welcome');
    }

    ##To check login creditials.

    public function postCreate() {
        //
        $validator = Validator::make(array(
                    'password' => Input::get('password'),
                    'email' => Input::get('email'),
                        ), array(
                    'password' => 'required',
                    'email' => 'required|email'
        ));

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/user')->with('login_message', $messages);
        } else {
            $credentials = [
                "email" => Input::get("email"),
                "password" => Input::get("password")
            ];
            $remember = (Input::has('remember_me')) ? true : false;
            if (Auth::client()->attempt($credentials, $remember)) {
                  $message = "logged in ";
                  return Redirect::to('/user/dashboard')->with('login_message', $message);
            } else {
                $message = "Invalid username or password";
                return Redirect::to('/user')->with('login_message', $message);
            }
        }
    }

    ##To add new user.

    public function getAdduser() {
        return view('register');
    }

    #To render dashboard view.

    public function getDashboard() {
        return view('dashboard');
    }

    ##User list for admin view.

    public function getUserlist() {
        return view('dashboard_admin');
    }

    #Web service api function.

    public function getUserlistapi() {

        $users = array();
        $return_user = array();
        $users = Login::getUserlistall();
        if (isset($users) && $users['status'] == '1') {
            $return_user['success'] = "1";
            $return_user['data'] = $users['data'];
        } else {
            $return_user['success'] = "0";
            $return_user['message'] = "There is no more user.";
        }
        return $return_user;
    }

    #user listing for admin.

    public function getUserlistadmin() {
        
        // get userlist.
        $data = DB::table('users')
                ->select('first_name', 'email_address', 'last_name', 'id');
        return Datatables::of($data)->add_column('detail', '<a href="{{ URL::to( \'user/updateuser\', array( $id )) }}" class="btn btn-sm default">View</a>')
                        ->remove_column('id')->make(true);
    }

    ##update user.

    public function getUpdateuser($id) {

        $users = array();
        $users['data'] = Login::getUserlist();
        return View('edit_view')->with($users);
    }

    ##To logout.

    public function getLogout() {

        //logout process.
        Auth::logout();
        Session::flush();
        return Redirect::to('/user');
    }

    ##Create new user.

    public function postCreateuser() {

        $validator = Validator::make(Input::all(), User::$rules);
        ##check validator is passed or not.
        if ($validator->passes()) {

            //create new user.
            $user = new User;
            $user->fname = Input::get('fname');
            $user->lname = Input::get('lname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('/user')->with('create_message', 'Thanks for join with us!!!!');
        } else {
            return Redirect::to('/user/adduser')->with('login_message', 'There are empty fields!');
        }
    }

}
