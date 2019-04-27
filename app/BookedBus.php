<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedBus extends Model
{
  protected $fillable = [
    'route_id', 'bus_id', 'seats_not_taken',
    'departure_time', 'status',
  ];

  public function bus()
  {
    return $this->belongsTo('App\Bus');
  }

  public function route()
  {
    return $this->belongsTo('App\Route');
  }
  public function passengers(){
    return $this->hasMany('App\Passenger');
  }
}
