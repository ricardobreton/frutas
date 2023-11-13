<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador del sistema',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin123',

        ])->assignRole('Administrador');
    }
}
