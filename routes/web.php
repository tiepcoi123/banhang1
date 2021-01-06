<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () { return view('layout.dashboard');});
Route::get('welcome', function () { return view('welcome');});   
Route::get('/', function () { return view('welcome');});
Route::get('rules','App\Http\Controllers\RegisterController@rules');
   

//<<< dish menu >>>
Route::get('menu','App\Http\Controllers\MenuDishController@list_menu')->middleware('logincheck');
Route::get('create','App\Http\Controllers\MenuDishController@create')->middleware('logincheck');

//----Login-----//
Route::get('login','App\Http\Controllers\LoginController@login');
Route::post('login','App\Http\Controllers\LoginController@postlogin');

//----Register---//
Route::get('register','App\Http\Controllers\RegisterController@register');
Route::post('register','App\Http\Controllers\RegisterController@postRegister');

