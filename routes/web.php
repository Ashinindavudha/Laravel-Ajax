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
    return view('welcome');
});

//Ajax Product Controller 
Route::resource('ajaxproducts', 'Ajax\ProductController');

Route::get('ajaxImageUpload', 'Ajax\AjaxImageController@ajaxImageUpload');
Route::post('ajaxImageUpload', 'Ajax\AjaxImageController@ajaxImageUploadPost')->name('ajaxImageUpload');

// Auto Complete Search From database  Route
//display users list
 Route::get('query', 'Ajax\AutoCompleteSearchController@index');
 Route::get('autocomplete', 'Ajax\AutoCompleteSearchController@autocomplete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
