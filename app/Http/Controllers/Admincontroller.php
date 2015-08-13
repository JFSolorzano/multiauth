<?php

/*
 * @controller    Admincontroller
 * @package    Add/Update/Delete admin
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

class Admincontroller extends Controller {

    public function __construct() {

        $this->middleware('admin', ['only' => ['getDashboard', 'getUserlist', 'getUserlistapi']]);
        //$this->middleware('auth');
    }

    ##This method render home view.

    public function index() {
        // dd('yahoo');
        return view('admin_login');
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
            return Redirect::to('/admin')->with('login_message', $messages);
        } else {
            $credentials = [
                "email" => Input::get("email"),
                "password" => Input::get("password")
            ];
            $remember = (Input::has('remember_me')) ? true : false;
            
            if (Auth::admin()->attempt($credentials, $remember)) {
                $message = "logged in ";
                return Redirect::to('/admin/userlist')->with('login_message', $message);
            } else {
                $message = "Invalid username or password";
                return Redirect::to('/admin')->with('login_message', $message);
            }
        }
    }

    #To render dashboard view.

    public function getDashboard() {
        return view('dashboard');
    }

    ##User list for admin view.

    public function getUserlist() {
        return view('dashboard_admin');
    }

    ##To logout.

    public function getLogout() {

        Auth::logout();
        Session::flush();
        return Redirect::to('/admin');
    }
}
