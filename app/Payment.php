<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = [
    'reference_number', 'passenger_id', 'amount',
  ];
}
