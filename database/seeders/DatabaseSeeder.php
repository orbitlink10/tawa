<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NetworkingCategorySeeder::class,
            BrandSeeder::class,
            OptionSeeder::class,
            CountySeeder::class,
            NetworkingProductSeeder::class,
            PageSeeder::class,
            ServiceSeeder::class,
            SliderSeeder::class,
            RedirectSeeder::class,
            ProductImageSeeder::class,
            CategoryImageSeeder::class,
        ]);
    }
}
