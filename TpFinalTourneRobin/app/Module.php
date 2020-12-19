<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property String name
 * @property String description
 */
class Module extends Model
{
    public function promos() :BelongsToMany {
    	return $this->belongsToMany(Promo::class);
	}
    public function students() :BelongsToMany {
    	return $this->belongsToMany(Student::class);
	}
}
