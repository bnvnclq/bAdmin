<?php

use Illuminate\Database\Seeder;

class MasterModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('master_modules')
                ->insert([
                    'name' => 'Users',
                    'description' => 'User account management',
                    'code' => 'users',
                    'parent_id' => null,
                ]);
        \DB::table('master_modules')
                ->insert([
                    'name' => 'Update Users',
                    'description' => 'User add/edit/delete permission',
                    'code' => 'user_update',
                    'parent_id' => '1',
                ]);
    }
}
