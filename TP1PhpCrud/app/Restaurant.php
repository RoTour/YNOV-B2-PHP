<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static first()
 */
class Restaurant extends Model
{
    protected $fillable = ['name', 'address', 'city', 'postal', "website", "description", "type", "state"];

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function deliverers() {
        return $this->belongsToMany(Deliverer::class);
    }
}
