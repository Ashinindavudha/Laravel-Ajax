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


//todo app route start ! 
 //display todo list
Route::get('list','DataTableTodoCrudController@index');

//display add todo form and create a new todo
Route::get('add-todo','DataTableTodoCrudController@create');
Route::post('post-todo','DataTableTodoCrudController@store');

//display add todo form and create a new todo
Route::get('edit-todo/{id?}','DataTableTodoCrudController@edit');
Route::post('update-todo','DataTableTodoCrudController@update');

//display add todo form and create a new todo
Route::get('delete-todo/{id?}','DataTableTodoCrudController@delete');
//todo app route end here!

//Jquery ContactForm Validation Route Start here !
//display contact us form
Route::get('contact-us','ContactForm\ContactFormController@index');

//insert contact us data into mysql database table laravel
Route::post('save-contact','ContactForm\ContactFormController@store');
//End here!

// One To One Relation Route
Route::get('/one','Relation\OneToOneRelationController@index');

// Jquery Load More Data On Scroll Route

Route::get('/jquerydata','JqueryLoadMore\LoadController@index')->name('index');
Route::get('/load/data','JqueryLoadMore\LoadController@loadData')->name('load.data');

// Multiple File Upload Route
//display file uploading form
 Route::get('multiple-file-upload', 'MultipleFileUpload\MultipleFileUploadController@index');
//store files in database
 Route::post('save-multiple-file-upload', 'MultipleFileUpload\MultipleFileUploadController@fileStore');

 //end here 

 //user auto_complete_search 
 Route::get('search', 'UserAutoCompleteSerarchController@index');
 Route::get('autocomplete', 'UserAutoCompleteSerarchController@search');
 //end

 //Post Category 
 Route::resource('postcategories', 'PostCategoryController');

//Media Library Multiple File Upload
 Route::post('projects/media', 'MediaLibraryMultipleUploadFileController@storeMedia')
  ->name('projects.storeMedia');
  Route::resource('projects', 'MediaLibraryMultipleUploadFileController');

  //Resource route for posts includes routes for create, read, update, delete
Route::resource('posts', 'PostController');
// wysieditor route (BookController)
// Route::get('books','BookController@index');
// Route::post('books','BookController@store')->name('books.store');
// Route::get('books/{id}','BookController@show')->name('books.show');
Route::resource('books', 'BookController');

//Media Test Route
Route::resource('mediatest', 'MediaTestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
