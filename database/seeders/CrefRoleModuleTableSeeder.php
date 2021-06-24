<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CrefRoleModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('cref_role_module')->delete();
        \DB::table('cref_role_module')
                ->insert([
                    'role_id' => '1',
                    'module_id' => '1',
                ]);
                
        \DB::table('cref_role_module')
                ->insert([
                    'role_id' => '1',
                    'module_id' => '2',
                ]);
        \DB::table('cref_role_module')
                ->insert([
                    'role_id' => '1',
                    'module_id' => '3',
                ]);
    }
}
