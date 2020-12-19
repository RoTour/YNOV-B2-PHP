<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    public function promos() :BelongsToMany {
    	return $this->belongsToMany(Promo::class);
	}
}
