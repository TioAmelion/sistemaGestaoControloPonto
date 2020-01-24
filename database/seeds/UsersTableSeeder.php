<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([

        	'name'      => 'amelio jorge',
        	'email'     => 'a@interdigitos.co.ao',
        	'password'  => bcrypt('123456789'),
        	'role'      => 'super_admin',
        ]);
    }
}
