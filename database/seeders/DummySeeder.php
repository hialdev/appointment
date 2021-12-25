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
        // $faker = Faker::create('id_ID');
        // for($i=1;$i<=5;$i++){
        //     DB::table('mahasiswas')->insert([
        //         'nama'=>$faker->name(),
        //         'nim'=>$faker->numberBetween(1010100000,3030300000),
        //         'tanggal_lahir'=>$faker->date(),
        //         'alamat'=>$faker->address(),
        //         'tahun_masuk'=>$faker->numberBetween(2016,2021),
        //     ]);
        //     DB::table('dosens')->insert([
        //         'nama'=>$faker->name(),
        //         'nidn'=>$faker->numberBetween(1010100,3030300),
        //         'alamat'=>$faker->address(),
        //         'kontak'=>$faker->phoneNumber(),
        //     ]);
        // }

        DB::table('menus')->insert([
            ['icon'=> "server", 'menu'=> "Database", 'url'=> "database"],
            ['icon'=> "list-ul", 'menu'=> "Menu", 'url'=> "menu"],
            ['icon'=> "tools", 'menu'=> "CRUD", 'url'=> "crud"]
        ]);

        DB::table('menu_roles')->insert([
            ['menus_id'=> 1, 'roles_id'=> 1],
            ['menus_id'=> 1, 'roles_id'=> 2],
            ['menus_id'=> 1, 'roles_id'=> 3],
            ['menus_id'=> 2, 'roles_id'=> 1],
            ['menus_id'=> 2, 'roles_id'=> 2],
            ['menus_id'=> 2, 'roles_id'=> 3],
            ['menus_id'=> 3, 'roles_id'=> 1],
            ['menus_id'=> 3, 'roles_id'=> 2],
            ['menus_id'=> 3, 'roles_id'=> 3],
        ]);

        //Data Type Menu Forms
        DB::table('type_forms')->insert([
            ['type_name'=> 'varchar'],
            ['type_name'=> 'string'],
            ['type_name'=> 'integer'],
            ['type_name'=> 'text'],
        ]);

        //Data Type Menu Forms
        DB::table('form_types')->insert([
            ['input_value'=>'text','input_type'=> 'text'],
            ['input_value'=>'number','input_type'=> 'number'],
            ['input_value'=>'tiny','input_type'=> 'code editor'],
            ['input_value'=>'date','input_type'=> 'date'],
        ]);
    }
}
