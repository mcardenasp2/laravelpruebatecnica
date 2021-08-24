<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Province::truncate();
        Province::create([
            'name' => 'Guayas',
            'country_id' => 1,
        ]);
        Province::create([
            'name' => 'Pichincha',
            'country_id' => 1,
        ]);
        Province::create([
            'name' => 'Manta',
            'country_id' => 2,
        ]);
    }
}
