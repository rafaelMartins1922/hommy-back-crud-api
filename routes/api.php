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
Route::put('list/{rep_id}/{us_id}',"RepublicController@addUser");
Route::put('removeUser/{rep_id}/{us_id}',"RepublicController@removeUser");
Route::get('buscarRepublicaAlugada/{us_id}',"UserController@buscaRepublicaAlugada");
Route::get('buscarRepublicaAnunciada/{us_id}',"UserController@buscaRepublicasAnunciadas");
Route::get('locador/{republic_id}',"RepublicController@locador");
Route::get('locatario/{republic_id}',"RepublicController@locatario");



Route::get('showUser/{id}','UserController@showUser');
Route::get('listUser','UserController@listUser');
Route::post('createUser','UserController@createUser');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');

Route::put('anunciar/{us_id}/{rep_id}',"UserController@anunciar");
Route::put('favoritar/{user_id}/{republic_id}',"UserController@favoritar");//c
Route::put('alugar/{us_id}/{rep_id}',"UserController@alugar");
Route::put('desocupar/{us_id}',"UserController@desocupar");
Route::get('favoritas/{user_id}',"UserController@favoritas");
Route::put('comentarios/{rep_id}',"RepublicController@comentarios");
//MODELS II
//Exercícios
//Q1
 //c
 //c
//Q2
//c 
//Q2 e Q5
//c
//Q3
//c
//Q4
//c
//Q6

//c
//Q7


//Passport Controller (Passports & Seeders)
Route::post('register','API\PassportController@register');
Route::post('login','API\PassportController@login');
Route::group(['middleware' => 'auth:api'],function(){
	Route::get('logout','API\PassportController@logout');
	Route::post('getDetails','API\PassportController@getDetails');
});

//ELOQUENT I
Route::get('getDeletedRepublics',"RepublicController@getDeleted");//c



