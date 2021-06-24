<?php

namespace Database\Seeders;

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
        \DB::table('master_modules')->delete();
        \DB::table('master_modules')
                ->insert([
                    'name' => 'Users',
                    'description' => 'User account management',
                    'code' => 'users',
                    'parent_id' => null,
                    'icon_class' => 'fa fa-users',
                    'route_name' => 'users'
                ]);
        \DB::table('master_modules')
                ->insert([
                    'name' => 'Users - Update',
                    'description' => 'User add/edit/delete permission',
                    'code' => 'users_update',
                    'parent_id' => '1',
                    'icon_class' => 'fa fa-users',
                    'route_name' => 'users'
                ]);
        \DB::table('master_modules')
                ->insert([
                    'name' => 'Settings',
                    'description' => 'Settings',
                    'code' => 'settings',
                    'parent_id' => null,
                    'icon_class' => 'fa fa-cogs',
                    'route_name' => 'settings'
                ]);
    }
}
