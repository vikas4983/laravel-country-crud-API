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
