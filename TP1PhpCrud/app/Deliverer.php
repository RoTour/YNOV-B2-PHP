<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Deliverer extends Model
{
    public function restaurants() {
        return $this->belongsToMany(Restaurant::class);
    }
}
