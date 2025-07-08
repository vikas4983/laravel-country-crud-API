<?php

namespace CountryList\Database\Seeders;

use Illuminate\Database\Seeder;
use CountryList\Models\City;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    public function run(): void
    {

        $jsonPath =  __DIR__ . '/../../../storage/cities.json';

        if (!File::exists($jsonPath)) {
            $this->command->error("cities.json not found in package storage folder.");
            return;
        }
        $json = File::get($jsonPath);
        $cities = json_decode($json, true);
        if (!is_array($cities)) {
            $this->command->error("Invalid JSON format in cities.json");
            return;
        }


        foreach ($cities as $city) {
            if (
                empty($city['state_id']) ||
                empty($city['name']) ||
                !\CountryList\Models\State::find($city['state_id'])  // foreign key check
            ) {
                continue;
            }

            City::updateOrCreate(
                [
                    'state_id' => $city['state_id'],
                    'name'     => $city['name'],
                ],
                [
                    'status'   => 1,
                ]
            );
        }
         echo "Cities seeded successfully.\n";
    }
}
