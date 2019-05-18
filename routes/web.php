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

// Route::get('/', function () {
//     return view('companies');
// });

Route::get('/', 'CompaniesController@index');

Route::get('/companies/create/', 'CompaniesController@create');

Route::delete('/companies', 'CompaniesController@destroy');

Route::get('/routes/{company?}', 'RoutesController@index');

Route::get('/company_routes/create/{company}', 'CompanyRoutesController@create');

Route::post('/company_routes/{company}', 'CompanyRoutesController@store');

Route::get('/buses/{company?}', 'BusesController@index');

Route::get('/company_buses/create/{company}', 'BusesController@create');

Route::post('/company_buses/{company}', 'BusesController@store');

Route::get('/schedules', 'CompaniesController@index');
