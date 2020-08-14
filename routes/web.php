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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => ['auth']], function(){

Route::get('/', 'HomeController@index');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->middleware('verified');



Route::get('/home', 'HomeController@index'); 

Route::resource('dataclerks', 'DataclerkController')->middleware('IfAdm');;

Route::resource('epidemiologistes', 'EpidemiologisteController')->middleware('IfAdm');;

Route::resource('contamines', 'ContamineController');


//export csv
Route::get('download-csv-contamines', 'ContamineController@exportCsv');

});