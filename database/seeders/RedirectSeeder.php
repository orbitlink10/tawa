<?php

namespace Database\Seeders;

use App\Models\Redirect;
use Illuminate\Database\Seeder;

class RedirectSeeder extends Seeder
{
    public function run(): void
    {
        // Removed baby-product URLs. There is no topical networking equivalent,
        // so these return 410 Gone to signal removal to search engines.
        $gone = [
            'category/baby-car-seats',
            'category/baby-strollers',
            'category/dolls',
            'category/toys',
            'category/nursery',
            'category/maternity',
            'category/feeding',
            'category/baby-furniture',
            'category/baby-clothing',
            'category/baby-care',
            'category/baby-products',
            'category/baby-shower-gifts',
            'all-categories',
        ];

        foreach ($gone as $source) {
            Redirect::updateOrCreate(
                ['source' => $source],
                ['destination' => null, 'status' => 410]
            );
        }
    }
}
