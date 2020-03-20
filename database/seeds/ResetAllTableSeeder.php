<?php

use Illuminate\Database\Seeder;

class ResetAllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('roles_permissions')->truncate();
    }
}
