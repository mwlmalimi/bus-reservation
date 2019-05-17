<?php

use Illuminate\Database\Seeder;
use App\Route;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $routes = [
        'Dar - Iringa (or vice-versa)',
        'Iringa - Mbeya (or vice-versa)',
        'Kigoma - Mwanza (or vice-versa)',
        'Kigoma - Dar  (or vice-versa)',
        'Kigoma - Arusha  (or vice-versa)',
      ];

      foreach ($routes as $route) {
        Route::create([
          'name' => $route,
          'description' => $route,
        ]);
      }

    }
}
