<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
  protected $fillable=[
    'first_name','last_name', 'phone_number','confermation_code','seats_taken','booked_bus_id',
  ];
  public function booked_buses(){
    return $this->belongsTo('App\BookedBus');
  }
}
