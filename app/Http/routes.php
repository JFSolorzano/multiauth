<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


//Route::controller('user','Logincontroller');




Route::controller('user', 'Usercontroller');
Route::controller('admin', 'Admincontroller');

Route::controller('users','Logincontroller');

Route::controller('api', 'Apicontroller');

Route::get('/admin', 'Admincontroller@index');
Route::any('/admin/create', 'Admincontroller@create');

Route:any('/users/login','Logincontroller@login');


Route::get('/user', 'Usercontroller@index');
Route::get('/user/updateuser/{id}', 'Usercontroller@updateuser');
Route::any('/user/create', 'Usercontroller@create');



Route::get('/', function () {
    return view('welcome');
});

