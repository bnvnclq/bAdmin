<?php

use Illuminate\Database\Seeder;

class MasterRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('master_roles')->delete();
        \DB::table('master_roles')
                ->insert([
                    'name' => 'Administrator',
                    'description' => 'An overall user role dedicated for the sytsem',
                    'code' => 'admin',
                    'level' => '10',
                ]);
        \DB::table('master_roles')
                ->insert([
                    'name' => 'User',
                    'description' => 'A normal user with limited permissions',
                    'code' => 'user',
                    'level' => '20',
                ]);
    }
}
