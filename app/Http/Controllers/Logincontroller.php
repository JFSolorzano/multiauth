<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Input;
use Validator;
use Response;
use Auth;
use Config;
use App\Login;
use DB;
use App\Quotation;

class Logincontroller extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        return view('welcome');
    }

    //To login user.
    public function postLogin() {

        try {
            $statusCode = 200;
            $response = array();


            $userToken = Input::get("device_token");
            $userDeviceType = Input::get("device_type");

            $validator = Validator::make(array(
                        'password' => Input::get('password'),
                        'email' => Input::get('username'),
                            ), array(
                        'password' => 'required',
                        'email' => 'required|email'
            ));
            if ($validator->fails()) {
                $messages = $validator->messages();
                $response['message'] = $messages;
                //return Redirect::to('/user')->with('login_message', $messages);
            } else {
                $credentials = [
                    "email" => Input::get("username"),
                    "password" => Input::get("password")
                ];
                //$remember = (Input::has('remember_me')) ? true : false;
                if (Auth::client()->attempt($credentials)) {

                    $userDetails = Login::getUserdetails(Input::get("username"));

                    if ($userDetails != '' && !empty($userDetails)) {

                        if ($userToken != '' && $userDeviceType != '') {

                            $updateToken = Login::getUpdatetoken($userToken, $userDeviceType, $userDetails[0]->user_id);

                            if ($updateToken) {
                                $response['success'] = '1';
                                $response['message'] = Config::get('constants.LOGIN_SUCCESS');
                                //   $response['id'] = $userDetails[0]['user_id'];
                                $response['data'] = $userDetails;
                            } else {

                                $response['message'] = Config::get('constants.GENERAL_ERROR');
                                $response['success'] = '0';
                            }
                        } else {
                            $response['message'] = Config::get('constants.GENERAL_ERROR');
                            $response['success'] = '0';
                        }
                    } else {
                        $response['message'] = Config::get('constants.GENERAL_ERROR');
                        $response['success'] = '0';
                    }
                } else {
                    $response['message'] = Config::get('constants.LOGIN_ERROR');
                    $response['success'] = '0';
                }
            }
        } catch (Exception $e) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

    //To forgott password.

    public function postForgotpassword() {
        try {
            $statusCode = 200;
            $response = array();

            //get data from request and process
            $PostData = Input::all();

            if (isset($PostData) && !empty($PostData)) {

                $params = array_map('trim', $PostData);

                //check for email address is available or not
                $checkEmail = Login::getCheckemailvalidation($params['email']);

                if (isset($checkEmail) && !empty($checkEmail)) {

                    print_r('here...');
                    exit;
                    //email variable declaration
                    $subject = 'Forgot Password';
                    $email = $params['email'];
                    $NewPassword = Login::generateRandomString(6);
                 
                    Mail::send(['text' => 'view'], $NewPassword, function($message) {
                        $message->to($email, 'Jon Doe')->subject('Welcome to the Laravel 5 Auth App!');
                    });


//                    if ($this->email->send()) {
//                        //if email sent then update password in database
//                        $UpdatePassword = $this->customer_model->UpdatePassword($CheckEmail['customer_id'], $NewPassword);
//                        //print error response
//                        $ResponseData['success'] = "1";
//                        $ResponseData['message'] = $this->lang->line('FORGOT_PASSWORD_SUCCESS');
//                    } else {
//                        $ResponseData['success'] = "0";
//                        $ResponseData['message'] = $this->lang->line('GENERAL_ERROR');
//                    }
                } else {
                    
                }
            } else {
                echo 'sdfsdfsd';
                exit;
                //data not posted to method.
            }
        } catch (Exception $ex) {
            $statusCode = 400;
        } finally {
            return Response::json($response, $statusCode);
        }
    }

}
