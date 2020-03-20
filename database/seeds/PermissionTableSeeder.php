<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'add team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'update team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'add player'
        ]);
        DB::table('permissions')->insert([
            'name' => 'update player'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete player'
        ]);
    }
}
