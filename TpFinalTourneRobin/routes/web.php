<?php

use App\Student;
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
    return view('student.index', ["students" => Student::all()]);
});

Route::resource("student", "StudentController");
Route::resource("module", "ModuleController");
Route::resource("promo", "PromoController");

Route::get("test", function (){
	$student = Student::first();
	return $student->promo;
});
