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

Route::get('showUser/{id}','UserController@showUser');
Route::get('listUser','UserController@listUser');
Route::post('createUser','UserController@createUser');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');

Route::put('anunciar/{us_id}/{rep_id}',"UserController@anunciar");
//Exercicio Models II
//Q1
Route::get('buscarRepublicaAlugada/{us_id}',"UserController@buscaRepublicaAlugada"); //c
Route::get('buscarRepublicaAnunciada/{us_id}',"UserController@buscaRepublicasAnunciadas"); //c
//Q2
Route::get('locador/{republic_id}',"RepublicController@locador");//c 
//Q2 e Q5
Route::get('locatario/{republic_id}',"RepublicController@locatario");//c
//Q3
Route::put('alugar/{us_id}/{rep_id}',"UserController@alugar");//c
//Q4
Route::put('desocupar/{us_id}',"UserController@desocupar");//c
//Q6
Route::put('favoritar/{user_id}/{republic_id}',"UserController@favoritar");//c
Route::get('favoritas/{user_id}',"UserController@favoritas");//c
//Q7
Route::put('comentarios/{rep_id}',"RepublicController@comentarios");





