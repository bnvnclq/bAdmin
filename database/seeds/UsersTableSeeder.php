<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')
                ->insert([
                    'username' => 'admin',
                    'password' => Hash::make('admin'),
                    'email' => 'bienlaqui@gmail.com',
                    'last_name' => 'Laqui',
                    'first_name' => 'Bien',
                    'role_id' => '1',
                    'created_at' => date('Y-m-d H:i:s')
                ]);
    }
}
