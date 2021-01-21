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

// Route::get('home', function () { return view('layout.dashboard');});
// Route::get('welcome', function () { return view('welcome');});   
// Route::get('/', function () { return view('welcome');});
Route::get('rules','RegisterController@rules');

Route::group([
    'middleware' => 'logincheck'
], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Route Chef
    Route::group([
        'prefix' => 'chef'
    ], function () {
        Route::get('/create','ChefController@create')->name('create_chef');
        Route::post('/store','ChefController@store')->name('store_chef');
        Route::get('/list','ChefController@list')->name('list_chef');
        Route::get('/edit/{chef}','ChefController@edit')->name('edit_chef');
        Route::put('/update/{chef}','ChefController@update')->name('update_chef');
        Route::delete('/delete/{chef}','ChefController@delete')->name('delete_chef');
    });

    // Route dish
    Route::group([
        'prefix' => 'dish'
    ],
    function () {
        Route::get('/menu','MenuDishController@list_menu')->name('list_dish');
        Route::get('/create','MenuDishController@create')->name('create_dish');
        Route::get('/edit/{dish}','MenuDishController@edit')->name('edit_dish');
        Route::post('/store','MenuDishController@store')->name('store_dish');
        Route::put('/update/{dish}','MenuDishController@update')->name('update_dish');
        Route::delete('/delete/{dish}','MenuDishController@delete')->name('delete_dish');
    });

    Route::group([
        'prefix' => 'promotion'
    ], function () {
        Route::get('/list', 'PromotionController@index')->name('list_promotion');
        Route::get('/create', 'PromotionController@create')->name('create_promotion');
        Route::post('/store', 'PromotionController@store')->name('store_promotion');
        Route::get('/edit/{promotion}', 'PromotionController@edit')->name('edit_promotion');
        Route::put('/update/{promotion}', 'PromotionController@update')->name('update_promotion');
        Route::delete('/delete/{promotion}', 'PromotionController@delete')->name('delete_promotion');
    });
    
    Route::group([
        'prefix' => 'category'
    ], function () {
        Route::get('/list','CategoryController@index')->name('list_category');
        Route::get('/crete','CategoryController@create')->name('create_category');
        Route::post('/store','CategoryController@store')->name('store_category');
        Route::get('/edit/{category}','CategoryController@edit')->name('edit_category');
        Route::put('/update/{category}','CategoryController@update')->name('update_category');
        Route::delete('/delete/{category}','CategoryController@delete')->name('delete_category');
    });
});

//----Login-----//
Route::get('login','LoginController@login');
Route::post('login','LoginController@postlogin')->name('post_login');
Route::get('logout','LoginController@logout');


//----Register---//
Route::get('register','RegisterController@register');
Route::post('register','RegisterController@postRegister')->name('post_register');


Route::get('/', function () {
    return view('wecome');
});


