<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;
use Illuminate\Support\Str;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::create([
            'name' => 'Ruang Meeting A',
            'slug' => Str::slug('Ruang Meeting A'),
            'location' => 'Lantai 2',
            'capacity' => 10,
            'price_per_hour' => 100000
        ]);
    }
}
