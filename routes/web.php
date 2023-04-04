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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::group(['middleware' => 'web'], function () {

    Route::group(['prefix' => 'setting'], function () {
        Route::get('migrate',   function(){
            \Artisan::call('migrate');
            return redirect()->route('index');
            // dd('done');
        })->name('migrate');
        Route::get('clearcach', function(){ \Artisan::call('cache:clear');  dd('done'); })->name('clearcach');
        Route::get('rollback',  function(){ \Artisan::call('migrate:rollback', ['--step' => 1]); dd('done'); })->name('rollback');
    });

    Route::group(['prefix' => 'home', 'namespace' => 'Ps4tek'], function () {
        Route::get('/', 'Ps4tekController@home')->name('home');
        Route::get('/index', 'Ps4tekController@index')->name('index');
        Route::post('/genrate_data', 'Ps4tekController@GenrateData')->name('genrate_data');
        Route::get('data', 'Ps4tekController@data')->name('data::index_data');
    });
});

