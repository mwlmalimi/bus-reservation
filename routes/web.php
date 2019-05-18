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

Route::post('/companies', 'CompaniesController@store');

Route::delete('/companies/{company}', 'CompaniesController@destroy');

Route::get('/routes', 'RoutesController@index');

Route::get('/routes/create/', 'RoutesController@create');

Route::post('/routes', 'RoutesController@store');

Route::get('/company_routes/{company}', 'CompanyRoutesController@index' );

Route::get('/company_routes/create/{company}', 'CompanyRoutesController@create');

Route::post('/company_routes/{company}', 'CompanyRoutesController@store');

Route::get('/company_buses/{company}', 'BusesController@index');

Route::get('/company_buses/create/{company}', 'BusesController@create');

Route::post('/company_buses/{company}', 'BusesController@store');

Route::get('/schedules', 'CompaniesController@index');
