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
        // 1. Buat Fasilitas dengan lokasi yang sesuai pilihan di HTML (Indoor/Outdoor/Rooftop)
        for ($i = 1; $i <= 10; $i++) {
            $facility = Facility::create([
                'name' => "Meja " . sprintf("%02d", $i), // Meja 01, Meja 02, dst
                'slug' => "meja-" . $i,
                'location' => 'Indoor',
                'capacity' => 2,
                'price_per_hour' => 50000
            ]);
        }

        // 2. BUAT SLOT (PENTING: Tanpa ini, pencarian akan selalu kosong)
        // Kita buatkan jam operasional dari jam 08:00 sampai 22:00
        $startTime = 8;
        for ($i = 0; $i < 14; $i++) {
            Slot::create([
                'facility_id' => $facility->id,
                'start_time' => sprintf('%02d:00', $startTime + $i),
                'end_time' => sprintf('%02d:00', $startTime + $i + 1),
                'max_capacity' => 1, // 1 meja hanya bisa dipesan 1 orang/grup per jam
            ]);
        }
    }
}
