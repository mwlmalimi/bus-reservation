<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
    'transaction_code', 'passenger_id', 'reference_number', 'amount',
  ];
}
