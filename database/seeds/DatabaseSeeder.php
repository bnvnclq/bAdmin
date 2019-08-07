<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MasterRolesTableSeeder::class);
        $this->call(MasterModulesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(CrefRoleModuleTableSeeder::class);
    }
}
