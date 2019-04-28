<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $companies = ['Chaula', 'Saratoga', 'Upendo'];
      for($i = 0; $i < 3; $i++) {
        Company::create([
          'name' => $companies[$i],
        ]);
      }
    }
}
