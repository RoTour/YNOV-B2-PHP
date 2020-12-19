<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Node\Scalar\String_;

/**
 * @property String firstname
 * @property String lastname
 * @property String email
 * @property mixed promo_id
 */
class Student extends Model {

	public function full_name(): string {
		return $this->firstname." ".$this->lastname;
	}

	public function promo(): BelongsTo {
		return $this->belongsTo(Promo::class);
	}

	public function modules(): BelongsToMany {
		return $this->belongsToMany(Module::class);
	}
}
