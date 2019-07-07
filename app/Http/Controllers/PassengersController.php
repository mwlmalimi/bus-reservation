<?php

namespace App\Http\Controllers;

use App\Passenger;
use App\Schedule;
use App\Bus;
use App\Transaction;
use Illuminate\Http\Request;

class PassengersController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    public function bookTicketForm($schedule_id)
    {
      $bus_id = Schedule::where('id', $schedule_id)->value('bus_id');
      $bus = Bus::find($bus_id);
      $company = $bus->company()->first();
      $schedule = Schedule::find($schedule_id);
      return view('passenger.book_form',compact('schedule', 'company', 'bus'));
    }
    
    public function savePassengerToSession(Request $request, $schedule_id)
    {
      $request->merge([
        'schedule_id' => $schedule_id,
      ]);
      $passenger = new Passenger;
      $passenger->fill($request->all());
      $reference_numbers = [5530125, 3580006, 6996690, 3098755, 1778784, 1891113];
      session([
        'passenger' => $passenger,
        'reference_number' => $reference_numbers[array_rand($reference_numbers)]
      ]);
      return redirect('/payment_form');
    }
    
    public function paymentForm()
    {
      $passenger = session('passenger');
      return view('passenger.payment_form', [
        'passenger_name' => $passenger->first_name . " " . $passenger->last_name,
      ]);
    }
    
    public function book(Request $request)
    {
      $transaction = Transaction::where('transaction_code', $request->transaction_code)->first();
      if($transaction !== null) {
        if($transaction->status === 'pending') {
          $schedule = Schedule::find(session('passenger')->schedule_id);
          if($transaction->amount === $schedule->fare) {
            $passenger = session('passenger');
            $passenger->save();
            return view('passenger.receipt', []);
          } else {
            return back()->with('message', 'Insufficient Amount');
          }
        } else {
          return back()->with('message', 'The code has been used');
        }
      } else {
        return back()->with('message', 'Invalid code');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
