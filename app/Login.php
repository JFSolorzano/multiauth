<?php

namespace App;

use DB;
use App\Quotation;
use Illuminate\Database\Eloquent\Model;

class Login extends Model {

    protected $table = 'users';

    //For get userlist.
    public static function getUserlist() {
        $result = DB::table('users as t')->select('t.id', 't.fname', 't.lname', 'email', 'user_type', 'created_at')->first();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    //For api userlist.
    public static function getUserlistall() {


        $result = DB::table('users as t')->select('t.id', 't.fname', 't.lname', 'email', 'user_type', 'created_at')->get();

        if ($result) {
            $result1['status'] = '1';
            $result1['data'] = $result;
            return $result1;
        } else {
            $result1['status'] = '0';
            return $result1;
        }
    }

    //to get the details of login user.
    public static function getUserdetails($email) {

        $result = array();

        $result = DB::table('users')->select('id as user_id', 'first_name', 'last_name', 'email', 'status')
                ->where('email', '=', $email)
                //->orWhere('password', '=',$password)
                ->get();

        if ($result) {
            //   $result1['status'] = '1';
            $result1 = $result;
            return $result;
        } else {
            $result1['status'] = '0';
            return $result1;
        }
    }

    //To update token when user is login.
    //
    public static function getUpdatetoken($userToken, $userDeviceType, $userId) {

        if (!empty($userToken) && !empty($userDeviceType) && !empty($userId)) {

            $updateTokenQuery = DB::table('users')->where('id', $userId)->update(array('device_token' => $userToken, 'device_type' => $userDeviceType));
            return 1;
        }
    }

    public static function getCheckemailvalidation($email) {

        $user = DB::table('users')->where('email', $email)->first();
        //  print_r($user->id);exit;
        return $user->id;
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}
