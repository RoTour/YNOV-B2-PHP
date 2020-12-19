<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model {
	public function students(): HasMany {
		return $this->hasMany(Student::class);
	}
}
