<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('list_config')->delete();
        \DB::table('list_config')
                ->insert([
                    'key' => 'sample_config',
                    'value' => 999,
                ]);
    }
}
