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
        Route::delete('/delete/{id}','MenuDishController@delete')->name('delete_dish');
    });

    Route::group([
        'prefix' => 'promotion'
    ], function () {
        Route::get('/list', 'PromotionController@index')->name('list_promotion');
        Route::get('/create', 'PromotionController@create')->name('create_promotion');
        Route::post('/store', 'PromotionController@store')->name('store_promotion');
        Route::get('/edit/{promotion}', 'PromotionController@edit')->name('edit_promotion');
        Route::put('/update/{promotion}', 'PromotionController@update')->name('update_promotion');
        Route::delete('/delete/{id}', 'PromotionController@destroy')->name('delete_promotion');
        Route::get('/generate-code', 'PromotionController@generateCode')->name('generate_code');
    });
    
    Route::group([
        'prefix' => 'category'
    ], function () {
        Route::get('/list','CategoryController@index')->name('list_category');
        Route::get('/crete','CategoryController@create')->name('create_category');
        Route::post('/store','CategoryController@store')->name('store_category');
        Route::get('/edit/{category}','CategoryController@edit')->name('edit_category');
        Route::put('/update/{category}','CategoryController@update')->name('update_category');
        Route::delete('/delete/{id}','CategoryController@delete')->name('delete_category');
    });

    Route::group([
        'prefix' => 'attribute'
    ], function () {
        Route::get('/list', 'AttributeController@list')->name('list_attribute');
        Route::get('/create', 'AttributeController@create')->name('create_attribute');
        Route::post('/store', 'AttributeController@store')->name('store_attribute');
        Route::get('/edit/{attribute}', 'AttributeController@edit')->name('edit_attribute');
        Route::put('/update/{attribute}', 'AttributeController@update')->name('update_attribute');
        Route::delete('/delete/{id}', 'AttributeController@delete')->name('delete_attribute');
    });

    Route::group([
        'prefix' => 'value'
    ], function () {
        Route::get('/list', 'ValueController@list')->name('list_value');
        Route::get('/create', 'ValueController@create')->name('create_value');
        Route::post('/store', 'ValueController@store')->name('store_value');
        Route::get('/edit/{value}', 'ValueController@edit')->name('edit_value');
        Route::put('/update/{value}', 'ValueController@update')->name('update_value');
        Route::delete('/delete/{value}', 'ValueController@delete')->name('delete_value');
    });

    Route::group([
        'prefix' => 'variant'
    ], function () {
        Route::get('/list/{dish}', 'VariantController@list')->name('list_variant');
        Route::get('/create', 'VariantController@create')->name('create_variant');
        Route::post('/store', 'VariantController@store')->name('store_variant');
        Route::get('/edit/{variant}', 'VariantController@edit')->name('edit_variant');
        Route::put('/update/{variant}', 'VariantController@update')->name('update_variant');
    });

    Route::group([
        'prefix' => 'staff'
    ], function () {
        Route::get('/list','StaffController@list')->name('list_staff');
        Route::get('/create', 'StaffController@create')->name('create_staff');
        Route::post('/store', 'StaffController@store')->name('store_staff');
        Route::get('/edit/{staff}', 'StaffController@edit')->name('edit_staff');
        Route::put('/update/{staff}', 'StaffController@update')->name('update_staff');
        
    });

    Route::group([
        'prefix' => 'provided'
    ], function () {
        Route::get('/list','ProvidedController@list')->name('list_provided');
        Route::get('/create', 'ProvidedController@create')->name('create_provided');
        Route::post('/store', 'ProvidedController@store')->name('store_provided');
        Route::get('/edit/{provided}', 'ProvidedController@edit')->name('edit_provided');
        Route::put('/update/{provided}', 'ProvidedController@update')->name('update_provided');
        Route::delete('/delete/{provided}', 'ProvidedController@delete')->name('delete_provided');
    });

    Route::group([
        'prefix' => 'timekepping'
    ], function () {
        Route::get('/list', 'TimekeepController@timekeep')->name('list_timekeep');
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
    return view('index');
});


