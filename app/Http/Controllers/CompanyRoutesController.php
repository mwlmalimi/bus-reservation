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
    public function index($company_id)
    {

        $route_ids = CompanyRoute::where('company_id', $company_id)
                                ->pluck('id')->toArray();
        $routes = Route::find($route_ids);
        $company = Company::find($company_id);
        return view('admin.companies.company_routes', [
          'company' => $company,
          'routes' => $routes,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
      $company = Company::find($company_id);
      $routes = Route::all();
      return view('admin.companies.company_routes_form', [
        'company' => $company,
        'routes' => $routes,
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
      return back()->with('message', 'Route Assigned Successfully');
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
    public function destroy($id)
    {

        CompanyRoute::where('id', $id)->delete();
        return back()->with('message', 'The Route has been deleted successfully');

    }
}
