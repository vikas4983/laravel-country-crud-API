<?php

namespace CountryList\Database\Seeders;

use Illuminate\Database\Seeder;
use CountryList\Models\Country;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    public function run(): void
    {

        $jsonPath =__DIR__ . '/../../../storage/countries.json';

        if (!File::exists($jsonPath)) {
            $this->command->error("countries.json not found in package storage folder.");
            return;
        }
        $json = File::get($jsonPath);
        $countries = json_decode($json, true);
        if (!is_array($countries)) {
            $this->command->error("Invalid JSON format in countries.json");
            return;
        }
       

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['code' => $country['iso2'] ?? null],
                [
                    'name'             => $country['name'] ?? null,
                    'code'             => $country['iso2'] ?? null,
                    'iso2'             => $country['iso2'] ?? null,
                    'phone_code'       => $country['phonecode'] ?? null, 
                    'currency'         => $country['currency'] ?? null,
                    'currency_symbol'  => $country['currency_symbol'] ?? null,
                    'region'           => $country['region'] ?? null,
                    'status'           => 1,
                ]
            );
        }
        echo "Countries seeded successfully.\n";
    }
}
