<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property String speciality
 * @property String name
 */
class Promo extends Model {

	public function infos(): string {
		return $this->name." ".$this->speciality;
	}

	public function students(): HasMany {
		return $this->hasMany(Student::class);
	}

	public function modules(): BelongsToMany {
		return $this->belongsToMany(Module::class);
	}
}
