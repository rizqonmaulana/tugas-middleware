<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/403', function(){
    return view('errors.403');
});

Route::middleware(['auth', 'role:superadmin'])->group(function(){
    Route::get('route-1', function (){
        return 'berhasil masuk route-1';
    });
});

Route::middleware(['auth', 'role:superadmin,admin'])->group(function(){
    Route::get('route-2', function (){
        return 'berhasil masuk route-2';
    });
});

Route::middleware(['auth', 'role:superadmin,admin,guest'])->group(function(){
    Route::get('route-3', function (){
        return 'berhasil masuk route-3';
    });
});
