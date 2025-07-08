<?php

use Illuminate\Support\Facades\Route;
use CountryList\Models\Country;

Route::get('/countries', function () {
    return Country::all(); 
});
