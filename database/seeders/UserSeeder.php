<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@hialdev.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Dosen',
            'email' => 'dosen@hialdev.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('dosen');

        $user = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@hialdev.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('mahasiswa');
    }
}
