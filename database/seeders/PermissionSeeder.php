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
        //Posts
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'draft posts']);

        //Portofolio
        Permission::create(['name' => 'view portofolio']);
        Permission::create(['name' => 'create portofolio']);
        Permission::create(['name' => 'edit portofolio']);
        Permission::create(['name' => 'delete portofolio']);
        Permission::create(['name' => 'publish portofolio']);
        Permission::create(['name' => 'draft portofolio']);
    }
}
