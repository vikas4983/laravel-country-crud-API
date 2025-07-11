<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use CountryList\Database\Seeders\CountrySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
    }
}
