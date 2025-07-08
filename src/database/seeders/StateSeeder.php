<?php

namespace CountryList\Database\Seeders;

use Illuminate\Database\Seeder;
use CountryList\Models\State;
use Illuminate\Support\Facades\File;

class StateSeeder extends Seeder
{
    public function run(): void
    {

        $jsonPath = __DIR__ . '/../../../storage/states.json';

        if (!File::exists($jsonPath)) {
            $this->command->error("states.json not found in package storage folder.");
            return;
        }
        $json = File::get($jsonPath);
        $states = json_decode($json, true);
        if (!is_array($states)) {
            $this->command->error("Invalid JSON format in states.json");
            return;
        }


        foreach ($states as $state) {
            State::updateOrCreate(
                [
                    'country_id' => $state['country_id'] ?? null,
                    'name'       => $state['name'] ?? null,
                ],
                [
                    'status'     => 1,
                ]
            );
        }
         echo "States seeded successfully.\n";
    }
}
