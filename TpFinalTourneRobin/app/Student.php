<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property String firstname
 * @property String lastname
 * @property String email
 * @property mixed promo_id
 */
class Student extends Model {
	public function promo(): BelongsTo {
		return $this->belongsTo(Promo::class);
	}
}
