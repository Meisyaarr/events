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

Route::group(['prefix' => 'activity'], function(){
    Route::get('index', 'ActivityController@index')->name('activity');

    Route::get('create','ActivityController@create')->name('activity.create');

    Route::post('save','ActivityController@store')->name('kegiatan.save');

    Route::get('tampil-formEdit/{activity}','ActivityController@edit')->name('activity.tampil-formEdit');

    Route::patch('update/{activity}','ActivityController@update')->name('activity.update');

    Route::get('hapus/{activity}','ActivityController@destroy')->name('activity.hapus');

});

Route::group(['prefix' => 'registers'], function(){
    Route::get('index', 'Register\RegistersController@index')->name('registers');

    Route::get('ambil-formulir', 'Register\RegistersController@create')->name('registers.ambil-formulir');

    Route::get('tampil-formShow','Register\RegistersController@show')->name('registers.tampil-formShow');

});

Route::group(['prefix' => 'users'], function(){
    Route::get('index', 'Users\UsersController@index')->name('users');

    Route::get('index', 'Kegiatan\KegiatanController@index')->name('users.Kegiatan.index');

});