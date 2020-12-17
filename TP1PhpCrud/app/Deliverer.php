<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static first()
 * @property mixed name
 * @property mixed vehicle
 */
class Deliverer extends Model {
	public function restaurants(): BelongsToMany {
		return $this->belongsToMany(Restaurant::class);
	}
}
