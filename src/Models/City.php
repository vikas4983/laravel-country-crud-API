<?php

namespace CountryList\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['state_id', 'name',  'status'];
}
