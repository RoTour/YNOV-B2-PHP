<?php

use App\Restaurant;
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

Route::get('/', "RestaurantController@index");
Route::resource("restaurant", "RestaurantController");
Route::resource("employee", "EmployeeController");
Route::resource("deliverer", "DelivererController");
Route::post("restaurant/storedeliverers", "RestaurantController@storeDeliverers")
->name("restaurant.store_deliverers");

Route::get("test", function () {
    $address = \App\Address::find(2);

    return $address->restaurant;

});

Route::get("testmanytomany", function () {
    $resto = \App\Restaurant::first();
    $newDeli = \App\Deliverer::first();
//    $resto->deliverers()->detach($newDeli->id);
    $resto->deliverers()->attach($newDeli->id);


    echo "<pre>", \App\Restaurant::first()->deliverers, "<br>" ,"</pre>";


});
