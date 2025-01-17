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

Route::resource('contacts', 'ContactController');

Route::resource('articles', 'ArticleController');



Route::get('articles/{id}/details', "ArticleController@details")
    ->name("articles.details")
    ->where("id", "[0-9]+");


//// IS USELESS:
//Route::get('contacts', 'ContactController@index');


