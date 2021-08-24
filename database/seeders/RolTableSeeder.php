<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();
        Rol::create([
            'key' => 'Admin',
            'name' => 'administrador',
        ]);
        Rol::create([
            'key' => 'Regular',
            'name' => 'regular',
        ]);
    }
}
