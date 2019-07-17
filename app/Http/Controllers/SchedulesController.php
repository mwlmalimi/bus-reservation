<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Company;
use App\Route;
use App\CompanyRoute;
use App\Bus;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
      $company = Company::find($company_id);
      $schedules = Schedule::where('company_id', $company_id)
                            ->where('status', 'pending')->get();
      return view('admin.companies.company_schedules', [
        'company' => $company,
        'schedules' => $schedules,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
      $route_ids = CompanyRoute::where('company_id', $company_id)
                              ->pluck('route_id')->toArray();
      $routes = Route::find($route_ids);
      $buses = Bus::where('company_id', $company_id)->get();
      $company = Company::find($company_id);
      return view('admin.companies.company_schedules_form', compact('company', 'routes', 'buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {
      $request->merge([
        'company_id' => $company_id,
      ]);
      Schedule::create($request->all());
      $message = 'Schedule Created Successfully!';
      return back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */

    public function destroy($company_id, $route_id)
    {
          // CompanyRoute::where('id', $id)->delete();
        Schedule::where('company_id', $company_id)
                    ->where('route_id',$route_id)
                    ->delete();
        return back()->with('message', 'The schedule has been deleted successfully');

    }

    public function searchCompanies(Request $request) {
      $origin = $request->origin;
      $destination = $request->destination;
      $company_ids =  Schedule::where('origin', $origin)
                              ->where('destination', $destination)
                              ->distinct()->pluck('company_id')->toArray();
      $companies = Company::find($company_ids);
      return $companies;
    }

    public function searchSchedules(Request $request, $company_id) {
      $origin = $request->origin;
      $destination = $request->destination;
      $schedules =  Schedule::where('origin', $origin)
                            ->where('destination', $destination)
                            ->where('company_id', $company_id)
                            ->where('status', 'pending')
                            ->with('bus')
                            ->get();
      return $schedules;
    }

}
