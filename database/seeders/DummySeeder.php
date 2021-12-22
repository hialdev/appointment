<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1;$i<=5;$i++){
            DB::table('mahasiswas')->insert([
                'nama'=>$faker->name(),
                'nim'=>$faker->numberBetween(1010100000,3030300000),
                'tanggal_lahir'=>$faker->date(),
                'alamat'=>$faker->address(),
                'tahun_masuk'=>$faker->numberBetween(2016,2021),
            ]);
            DB::table('dosens')->insert([
                'nama'=>$faker->name(),
                'nidn'=>$faker->numberBetween(1010100,3030300),
                'alamat'=>$faker->address(),
                'kontak'=>$faker->phoneNumber(),
            ]);
        }
        DB::table('menus')->insert([
            'icon'=> "list-ul",
            'menu'=> "Menu",
            'url'=> "menu",
        ]);
        DB::table('menus')->insert([
            'icon'=> "list-ul",
            'menu'=> "Test",
            'url'=> "test",
        ]);

        DB::table('menu_roles')->insert([
            'menus_id'=> 1,
            'roles_id'=> 1,
        ]);
        DB::table('menu_roles')->insert([
            'menus_id'=> 1,
            'roles_id'=> 2,
        ]);
        DB::table('menu_roles')->insert([
            'menus_id'=> 2,
            'roles_id'=> 1,
        ]);
        DB::table('menu_roles')->insert([
            'menus_id'=> 2,
            'roles_id'=> 2,
        ]);
    }
}
