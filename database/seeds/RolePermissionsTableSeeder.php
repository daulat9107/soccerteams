<?php

use Illuminate\Database\Seeder;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <7 ; $i++) {
            DB::table('roles_permissions')->insert([
            'role_id' => 1,
            'permission_id'=>$i
            ]);
        }

    }
}
