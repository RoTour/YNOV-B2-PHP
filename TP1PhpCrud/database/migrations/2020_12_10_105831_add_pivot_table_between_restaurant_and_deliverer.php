<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPivotTableBetweenRestaurantAndDeliverer extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('deliverer_restaurant', function (Blueprint $table) {
      $table->id();

      $table->integer("restaurant_id");
      $table->integer("deliverer_id");

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('pivot_restaurants_deliverers');
    Schema::dropIfExists('restaurant_deliverer');
    Schema::dropIfExists('deliverer_restaurant');
  }
}
