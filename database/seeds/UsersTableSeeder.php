<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Malimi Masingija',
        'username' => 'admin',
        'password' => bcrypt('malimi'),
      ]);
      User::create([
        'name' => 'Gaspar Sunzu',
        'username' => 'gaspar',
        'password' => bcrypt('sunzu'),
      ]);
    }
}
