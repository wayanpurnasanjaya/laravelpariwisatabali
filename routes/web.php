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



//Route::get('/', function () {
//    return view('welcome');
// });

Auth::routes();

Route::get('/administrator','DashboardController@dashboard')->name('dashboard');

Route::group(['middleware'=> 'role:administrator','auth','prefix'=>'administrator'], function(){
    Route::resource('kabupaten','KabupatenController');

    Route::get('kabupaten/{kabupaten}/kecamatan','KecamatanController@index')->name('kecamatan.index');
    Route::get('kabupaten/{kabupaten}/kecamatan/create','KecamatanController@create')->name('kecamatan.create');

    Route::post('kabupaten/{kabupaten}/kecamatan/create','KecamatanController@store')->name('kecamatan.store');
    Route::get('kabupaten/{kabupaten}/kecamatan/{kecamatan}/edit','KecamatanController@edit')->name('kecamatan.edit');
    Route::put('kabupaten/{kabupaten}/kecamatan/{kecamatan}/edit','KecamatanController@update')->name('kecamatan.update');
    Route::delete('kabupaten/{kabupaten}/kecamatan/{kecamatan}/delete','KecamatanController@destroy')->name('kecamatan.delete');

   // Route::resource('content','ContentController');

    Route::get('/content/{content}/status','ContentController@editStatus')->name('content.editStatus');
    Route::put('/content/{content}/status','ContentController@updateStatus')->name('content.updatestatus');

    Route::resource('user','UserController');
});



Route::resource('administrator/content','ContentController');

    
Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/{kabupaten}/{kecamatan}/{content}','HomepageController@detailContent')->name('detailContent');
Route::get('/kabupaten/{kabupaten}','HomepageController@getContentKabupaten')->name('getContentKabupaten');

Route::get('/kabupaten','HomepageController@getKabupaten')->name('getKabupaten');
Route::get('/result','HomepageController@result')->name('result');
Route::get('/content','HomepageController@otherContent')->name('otherContent');


//Route::get('/home', 'HomeController@index')->name('home');
