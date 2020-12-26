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
    return view('index');
});





Route::post("/create-lead", "LeadsController@createLead")->name('createLead');
Route::post('/upload-image', 'LeadsController@uploadImage')->name('uploadImage');
Route::post('/get-images', 'LeadsController@getImages')->name('getImages');


