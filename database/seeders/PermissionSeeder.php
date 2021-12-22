<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit profile']);

        //Penjadwalan
        Permission::create(['name' => 'index jadwal']);
        Permission::create(['name' => 'create jadwal']);
        Permission::create(['name' => 'edit jadwal']);
        Permission::create(['name' => 'delete jadwal']);
        Permission::create(['name' => 'show jadwal']);
        Permission::create(['name' => 'wait jadwal']);
        Permission::create(['name' => 'approve jadwal']);
        Permission::create(['name' => 'reject jadwal']);

        //Mahasiswa
        Permission::create(['name' => 'index mahasiswa']);
        Permission::create(['name' => 'create mahasiswa']);
        Permission::create(['name' => 'edit mahasiswa']);
        Permission::create(['name' => 'delete mahasiswa']);
        Permission::create(['name' => 'show mahasiswa']);

        //Dosen
        Permission::create(['name' => 'index dosen']);
        Permission::create(['name' => 'create dosen']);
        Permission::create(['name' => 'edit dosen']);
        Permission::create(['name' => 'delete dosen']);
        Permission::create(['name' => 'show dosen']);
    }
}
