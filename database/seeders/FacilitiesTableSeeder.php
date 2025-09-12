<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    public function run(): void
    {
     $data = [
            ['name' => 'Air Conditioner', 'type' => 'room', 'stock' => 20],
            ['name' => 'Water Heater', 'type' => 'room', 'stock' => 15,],
            ['name' => 'Free Wifi', 'type' => 'public', 'stock' => null,],
            ['name' => 'Android TV', 'type' => 'room', 'stock' => 18,],
            ['name' => 'Kolam Renang', 'type' => 'public', 'stock' => null],
        ];

        foreach ($data as $item) {
            Facility::create($item);
        }
    }
}
