<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\BookedBus;

class Bus extends Model
{
  protected $fillable = [
    'company_id', 'plate_number', 'seats_count',
  ];

  public function company()
  {
    return $this->belongsTo(Company::class);
  }

  public function bookedBuses()
  {
    return $this->belongsTo(BookedBus::class);
  }
}
