<?php

/*
  |--------------------------------------------------------------------------
  | Web service call in authentication.
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Request;
use Response;

class ApiMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        ## collect header information.
        $userNameApi = Request::server('HTTP_USERNAME');
        $passwordApi = Request::server('HTTP_PASSWORD');

        //create an array.
        $credentials = [
            "email" => $userNameApi,
            "password" => $passwordApi
        ];
        //if not then send username and password.
        if (Auth::client()->attempt($credentials)) {
            //pass to next request.
            return $next($request);
        }//otherwise not valid.
        else {
            //else 
            $statusCode = 200;
            $response['message'] = 'sorry,please login to access';
           $response['status'] = '0';
            return Response::json($response, $statusCode);
           
        }
    }

}
