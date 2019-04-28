<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Bus;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $companies = Company::all();
      foreach ($companies as $company) {
        for($i = 0; $i < 5; $i++) {
          Bus::create([
            'company_id' => $company->id,
            'plate_number' => 'T ' . mt_rand(100, 999),
            'seats_count' => mt_rand(40, 70),
          ]);
        }
      }
    }
}
