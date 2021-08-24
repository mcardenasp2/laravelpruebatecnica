<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        City::create([
            'name' => 'Guayaqui;',
            'province_id' => 1,
        ]);
        City::create([
            'name' => 'Quito',
            'province_id' => 2,
        ]);
        City::create([
            'name' => 'Manta',
            'province_id' => 2,
        ]);
    }
}
