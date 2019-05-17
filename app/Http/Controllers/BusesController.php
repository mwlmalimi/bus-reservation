<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Company;
use Illuminate\Http\Request;

class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($company_id = null)
    // {
    //
    //   $company = Company::find($company_id);
    //   return view('admin.companies.company_buses', [
    //     'company' => $company,
    //   ]);
    // }
    public function index($company_id = null)
    {
      if($company_id) {
        $bus_ids = Bus::where('company_id', $company_id)
                                ->pluck('id');
        $buses = Bus::find($bus_ids);
        $company = Company::find($company_id);
        return view('admin.companies.company_buses', [
          'company' => $company,
          'buses' => $buses,
        ]);
      } else {

        return view('admin.buses', [
          'buses' => $buses,
        ]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id, $message = null)
    {
        //

        $company = Company::find($company_id);
        return view('admin.companies.company_buses_form', [
          'company' => $company,

          'successMessage' => $message
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
          $company = Company::find($company_id);
           Bus::create([
          'company_id' => $company_id,
          'plate_number' => $request->plate_number,
          'seats_count' => $request->seats_count,
        ]);
        return $this->create($company_id, 'Route Assigned Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
