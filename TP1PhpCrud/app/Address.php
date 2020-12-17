<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
  protected $fillable = ["address", "city", "postal", "restaurant_id"];

  public function restaurant() {
    return $this->belongsTo(Address::class);
  }
}
