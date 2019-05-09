<?php

namespace App\Http\Controllers;

use App\CompanyRoute;
use App\Route;
use App\Company;
use Illuminate\Http\Request;

class CompanyRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id, $message = null)
    {
      $company = Company::find($company_id);
      $routes = Route::all();
      return view('admin.companies.company_routes_form', [
        'company' => $company,
        'routes' => $routes,
        'successMessage' => $message,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {
      CompanyRoute::create([
        'company_id' => $company_id,
        'route_id' => $request->route_id,
        'fare' => $request->fare,
      ]);
      return $this->create($company_id, 'Route Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyRoute  $companyRoute
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyRoute  $companyRoute
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyRoute  $companyRoute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyRoute $companyRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyRoute  $companyRoute
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyRoute $companyRoute)
    {
        //
    }
}
