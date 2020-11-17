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
})->name('laravel');

Route::get('home', 'WelcomeController@index')->name('home');

Route::get('test/{dinner}', function ($dinner) {
    return view('test', ['dinner' => $dinner, 'note' => ""]);
})->name('dinner');

Route::get('page/{pageName}', function ($page) {
    return view($page);
})->name('page');

Route::resource('photos', 'PhotoController');

/**
 * With many parameters
 */
//Route::get('test/parameter/{dinner}', function ($dinner) {
//    return view('test', ['dinner' => $dinner, 'note' => "SECOND PARAM"]);
//});

/**
 * With A Parameter inside the view
 */
//Route::get('test/parameter/{n}', function ($n) {
//    return view('test')->with('dinner', $n);
//});

/**
 * With a parameter in the function
 */
//Route::get('test/parameter/{n}', function ($n) {
//    return "YOU PASSED $n";
//});


/**
 * shitty random things
 */

//Route::get('test/{n}', function ($n=1) {
//    return "Je suis la page $n ";
//})->where("n", "[0-9]+")->name('test');
//
//Route::get('test/{n}', function ($n) {
//    return "Je suis la page $n ";
//})->where("n", "[0-9]+")->name('testParams');
//
//Route::get('home', function () {
//    return view('home');
//})->name('home');
//
//Route::get('testjson', function () {
//    return [1,2,3,"chocolat"];
//});
//
//Route::get('notfound', function (){
//    return response('un test', 404)->header('Content-Type', 'text/plain');
//});
