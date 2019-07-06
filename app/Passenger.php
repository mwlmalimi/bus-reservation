<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
  protected $fillable=[
    'first_name', 'last_name', 'phone_number',
    'email', 'seats_taken','schedule_id',
  ];
}
