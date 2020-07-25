<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('showRepublic/{id}','RepublicController@showRepublic');
Route::get('listRepublic','RepublicController@listRepublic');
Route::post('createRepublic','RepublicController@createRepublic');
Route::put('updateRepublic/{id}','RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}','RepublicController@deleteRepublic');
Route::put('addUser/{rep_id}/{us_id}',"RepublicController@addUser");
Route::put('removeUser/{rep_id}/{us_id}',"RepublicController@removeUser");

Route::get('showUser/{id}','UserController@showUser');
Route::get('listUser','UserController@listUser');
Route::post('createUser','UserController@createUser');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');
Route::put('addRepublic/{us_id}/{rep_id}',"UserController@addRepublic");
Route::put('removeRepublic/{us_id}/{rep_id}',"UserController@removeRepublic");

