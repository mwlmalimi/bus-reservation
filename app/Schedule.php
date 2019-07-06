<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = [
    'origin', 'destination', 'company_id', 'bus_id', 'departure_date',
    'departure_time', 'fare', 'status',
  ];

  public function company()
  {
    return $this->belongsTo('App\Company');
  }

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
