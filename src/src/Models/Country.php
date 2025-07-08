<?php

namespace CountryList\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code', 'iso2', 'phone_code', 'currency', 'currency_symbol', 'region', 'status'];
    
    public function state()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }
}
