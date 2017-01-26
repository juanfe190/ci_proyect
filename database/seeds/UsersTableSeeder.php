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
        DB::table('users')->insert([
        	'first_name' => 'Kenneth',
        	'last_name' => 'Chévez',
        	'email' => 'hp-kenneth@hotmail.com',
        	'password' => bcrypt('secret'),
        	'username' => 'kennethchvez',
        	'country' => 'CR',
            'country_birth' => 'CR',
        	'rol_id' => '1',
            'profile_photo' => '',
            'activo' => true,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Felix',
            'last_name' => 'Vasquez',
            'email' => 'juanfe190@hotmail.com',
            'password' => bcrypt('secret'),
            'username' => 'juanfe190',
            'country' => 'CR',
            'country_birth' => 'CR',
            'rol_id' => '1',
            'profile_photo' => '',
            'activo' => true,
        ]);
    }
}
