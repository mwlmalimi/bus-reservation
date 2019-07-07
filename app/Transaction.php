<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
  protected $fillable = [
    'transaction_code', 'reference_number', 'amount',
  ];
}
