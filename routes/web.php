<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('passenger.home');
});

Route::get('/searchCompanies', 'SchedulesController@searchCompanies');

Route::get('/searchSchedules/{company}', 'SchedulesController@searchSchedules');

Route::get('/book_bus/{schedule}', 'PassengersController@bookTicketForm');

Route::middleware('auth')->group(function() {

  Route::get('/companies', 'CompaniesController@index')
        ->name('companies.index');

  Route::get('/companies/create/', 'CompaniesController@create')
        ->name('companies.create');

  Route::post('/companies', 'CompaniesController@store')
        ->name('companies.store');

  Route::delete('/companies/{company}', 'CompaniesController@destroy')
        ->name('companies.destroy');

  Route::get('/routes', 'RoutesController@index')->name('routes.index')
         ->name('routes.index');

  Route::get('/routes/create/', 'RoutesController@create')
       ->name('routes.create');

  Route::post('/routes', 'RoutesController@store')
         ->name('routes.store');

  Route::delete('/routes/{route}', 'RoutesController@destroy')
           ->name('routes.destroy');

  Route::get('/company_routes/{company}', 'CompanyRoutesController@index')
      ->name('company_routes.index');

  Route::get('/company_routes/create/{company}', 'CompanyRoutesController@create')
      ->name('company_routes.create');

  Route::post('/company_routes/{company}', 'CompanyRoutesController@store')
      ->name('company_routes.store');

  Route::delete('/company_routes/{company}/{route}', 'CompanyRoutesController@destroy')
        ->name('company_routes.destroy');

  Route::get('/company_buses/{company}', 'BusesController@index')
         ->name('company_buses.index');

  Route::get('/company_buses/create/{company}', 'BusesController@create')
         ->name('company_buses.create');

  Route::post('/company_buses/{company}', 'BusesController@store')
          ->name('company_buses.store');

  Route::delete('/company_buses/{company}', 'BusesController@destroy')
        ->name('company_buses.destroy');

  Route::get('/company_schedules/{company}', 'SchedulesController@index')
       ->name('company_schedules.index');

  Route::get('/company_schedules/create/{company}', 'SchedulesController@create')
       ->name('company_schedules.create');

  Route::post('/company_schedules/{company}', 'SchedulesController@store')
       ->name('company_schedules.store');

  Route::delete('/company_schedules/{company}/{schedule}', 'SchedulesController@destroy')
         ->name('company_schedules.destroy');

  Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();
