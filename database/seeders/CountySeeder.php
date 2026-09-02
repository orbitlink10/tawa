<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    public function run(): void
    {
        $counties = [
            'Baringo', 'Bomet', 'Bungoma', 'Busia', 'Elgeyo Marakwet', 'Embu', 'Garissa',
            'Homa Bay', 'Isiolo', 'Kajiado', 'Kakamega', 'Kericho', 'Kiambu', 'Kilifi',
            'Kirinyaga', 'Kisii', 'Kisumu', 'Kitui', 'Kwale', 'Laikipia', 'Lamu', 'Machakos',
            'Makueni', 'Mandera', 'Marsabit', 'Meru', 'Migori', 'Mombasa', 'Muranga', 'Nairobi City',
            'Nakuru', 'Nandi', 'Narok', 'Nyamira', 'Nyandarua', 'Nyeri', 'Samburu', 'Siaya',
            'Taita-Taveta', 'Tana River', 'Tharaka-Nithi', 'Trans Nzoia', 'Turkana', 'Uasin Gishu',
            'Vihiga', 'Wajir', 'West Pokot',
        ];

        foreach ($counties as $county) {
            County::updateOrCreate(['name' => $county], ['county_code' => '1']);
        }
    }
}
