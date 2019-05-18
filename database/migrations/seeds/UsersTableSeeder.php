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
      DB::table('users')->delete();
     User::create(array(
     'name'     => 'Crazy Coders',
     'username' => 'crazycoders',
     'email'    => 'gsunzu@gmail.com',
     'password' => Hash::make('awesome'),
 ));
    }
}
