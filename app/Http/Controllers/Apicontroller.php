<?php

/*
 * @controller    Apicontroller 
 * @package    Add/Update/Delete admin
 * @author     Jignesh Virani <jignesh@creolestudios.com>
 * @author     Another Author <another@example.com>
 * @copyright  2015 Creole Studios
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: 1.0 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Login;

class Apicontroller extends Controller {

    public function __construct() {

        $this->middleware('api', ['only' => ['getUserlistapi']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    //index function.
    public function index() {
   //
    }

    // This is method for in userlist.
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

    //This method for return message in authentication in api.
    public function getElse1() {
        //return $statusCode = ;
         $response['message'] = 'sorry,please login to access..';
        return Response::json($response, $statusCode);
    }

}
