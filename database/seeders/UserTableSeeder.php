<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Marco Cardenas',
            'email' => 'marco.cardenas1702@gmail.com',
            'password' => 'Admin123',
            'telefono' => '0981196007',
            'cedula' => '0944296730',
            'fecha_nacimiento' => '1998-02-17',
            'ciudad_id' => 1,
            'rol_id'=>1,
        ]);
    }
}
