<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
  protected $fillable = [
    'name', 'description',
  ];

  public function bookedBuses()
  {
    return $this->hasMany('App\BookedBus');
  }

    public function Company_routes()
    {
      return $this->hasMany('App\CompanyRoute');
    }

}
