<?php

namespace CountryList;

class CountryList
{
    public static function all(): array
    {
        return config('countrylist.countries', []);
    }
}
