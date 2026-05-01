<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;
use App\Models\Slot; // Import model Slot
use Illuminate\Support\Str;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            'Indoor',
            'Indoor',
            'Indoor',
            'Indoor',
            'Outdoor',
            'Outdoor',
            'Outdoor',
            'Rooftop',
            'Rooftop',
            'Rooftop'
        ];

        for ($i = 1; $i <= 10; $i++) {
            $facility = Facility::create([
                'name'          => "Meja " . sprintf("%02d", $i),
                'slug'          => "meja-" . $i,
                'location'      => $locations[$i - 1],
                'capacity'      => ($i <= 4) ? 2 : (($i <= 7) ? 4 : 6),
                'price_per_hour' => 50000,
            ]);

            // ✅ Slot dibuat untuk SETIAP meja
            for ($j = 0; $j < 14; $j++) {
                Slot::create([
                    'facility_id'  => $facility->id,
                    'start_time'   => sprintf('%02d:00', 8 + $j),
                    'end_time'     => sprintf('%02d:00', 8 + $j + 1),
                    'max_capacity' => 1,
                ]);
            }
        }
    }
}
