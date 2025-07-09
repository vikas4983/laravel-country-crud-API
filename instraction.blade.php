{{-- 📘 Laravel Country Package Integration Instructions --}}

{{-- ✅ 1. Install Package via Composer (पैकेज इंस्टॉल करें) --}}
composer require vikas4983/laravel-country-crud-api:dev-main

{{-- ✅ 2. Register Service Provider (सर्विस प्रोवाइडर जोड़ें) --}}
{{-- Add this to your main project’s `config/app.php` file under `providers` array: --}}
return [
App\Providers\AppServiceProvider::class,
App\Providers\FortifyServiceProvider::class,
App\Providers\JetstreamServiceProvider::class,
App\Providers\TelescopeServiceProvider::class,

// 👇 Add this line to register your package
CountryList\CountryListServiceProvider::class,
];

{{-- ✅ 3. Run Migrations (टेबल बनाने के लिए) --}}
php artisan migrate

{{-- ✅ 4. Seed Data (डेटा insert करें) --}}
php artisan db:seed --class="CountryList\Database\Seeders\CountrySeeder"
php artisan db:seed --class="CountryList\Database\Seeders\StateSeeder"
php artisan db:seed --class="CountryList\Database\Seeders\CitySeeder"

{{-- ✅ 5. JSON File Path (यदि Seeder में JSON use किया गया है तो path यह होगा): --}}
$jsonPath = __DIR__ . '/../../../storage/countries.json';
$jsonPath = __DIR__ . '/../../../storage/states.json';
$jsonPath = __DIR__ . '/../../../storage/cities.json';

{{-- ✅ 6. Ensure JSON files exist (फ़ाइलें मौजूद हों): --}}
{{-- Make sure these files exist inside your package: --}}
{{-- storage/countries.json, storage/states.json, storage/cities.json --}}

{{-- ⚠️ If memory error occurs during city seeding (जब बहुत सारा डेटा हो): --}}
php -d memory_limit=-1 artisan db:seed --class="CountryList\Database\Seeders\CitySeeder"

{{-- ✅ 7. Test API Routes (API टेस्‍ट करें Postman/Thunder Client में): --}}

{{-- Method  | Endpoint             | Description (विवरण) --}}
GET /api/countries → List all countries (सभी देश लिस्ट करें)
POST /api/countries → Create a country (नया देश बनाएं)
GET /api/countries/{id} → Get country details (देश की जानकारी लें)
PUT /api/countries/{id} → Update a country (देश अपडेट करें)
DELETE /api/countries/{id} → Delete a country (देश हटाएं)







{{-- नीचे दिया गया कोड आपको अपने main project के composer.json में जोड़ना है, ताकि आप GitHub से अपना कस्टम Laravel पैकेज (vikas4983/laravel-country-crud-api) इंस्टॉल कर सकें।  --}}


{{--start--}}
{
  "name": "laravel/laravel",
  "type": "project",
  "description": "The skeleton application for the Laravel framework.",
  "keywords": ["laravel", "framework"],
  "license": "MIT",
  "minimum-stability": "dev",
  "prefer-stable": true,
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/vikas4983/laravel-country-crud-api"
    }
  ],
  "require": {
    "php": "^8.2",
    "artesaos/seotools": "^1.3",
    "barryvdh/laravel-dompdf": "^3.1",
    "beyondcode/laravel-mailbox": "^5.0",
    "inertiajs/inertia-laravel": "^2.0",
    "laravel-lang/lang": "^15.22",
    "laravel/cashier": "^15.7",
    "laravel/framework": "^12.0",
    "laravel/jetstream": "^5.3",
    "laravel/octane": "^2.10",
    "laravel/pulse": "^1.4",
    "laravel/sanctum": "^4.1",
    "laravel/scout": "^10.15",
    "laravel/socialite": "^5.21",
    "laravel/telescope": "^5.9",
    "laravel/tinker": "^2.10.1",
    "maatwebsite/excel": "^3.1",
    "spatie/laravel-fractal": "^6.3",
    "spatie/laravel-medialibrary": "^11.13",
    "spatie/laravel-permission": "^6.20",
    "spatie/laravel-sitemap": "^7.3",
    "tightenco/ziggy": "^2.0",
    "vikas4983/laravel-country-crud-api": "dev-main"
  },
  "require-dev": {
    "fakerphp/faker": "^1.23",
    "laravel/pail": "^1.2.2",
    "laravel/pint": "^1.13",
    "laravel/sail": "^1.41",
    "mockery/mockery": "^1.6",
    "nunomaduro/collision": "^8.6",
    "phpunit/phpunit": "^11.5.3"
  },
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Database\\Factories\\": "database/factories/",
      "Database\\Seeders\\": "database/seeders/"
    }
  },
  "autoload-dev": {
    "psr-4": {
      "Tests\\": "tests/"
    }
  },
  "scripts": {
    "post-autoload-dump": [
      "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
      "@php artisan package:discover --ansi"
    ],
    "post-update-cmd": [
      "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
    ],
    "post-root-package-install": [
      "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
    ],
    "post-create-project-cmd": [
      "@php artisan key:generate --ansi",
      "@php -r \"file_exists('database/database.sqlite') || touch('database/database.sqlite');\"",
      "@php artisan migrate --graceful --ansi"
    ],
    "dev": [
      "Composer\\Config::disableProcessTimeout",
      "npx concurrently -c \"#93c5fd,#c4b5fd,#fdba74\" \"php artisan serve\" \"php artisan queue:listen --tries=1\" \"npm run dev\" --names='server,queue,vite'"
    ],
    "test": [
      "@php artisan config:clear --ansi",
      "@php artisan test"
    ]
  },
  "extra": {
    "laravel": {
      "dont-discover": []
    }
  },
  "config": {
    "optimize-autoloader": true,
    "preferred-install": "dist",
    "sort-packages": true,
    "allow-plugins": {
      "pestphp/pest-plugin": true,
      "php-http/discovery": true
    }
  },
  "$schema": "https://getcomposer.org/schema.json"
}


{{--end--}}

