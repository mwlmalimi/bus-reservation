<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedSchedule extends Model
{
  protected $fillable = [
    'schedule_id', 'seats_taken',
  ];
}
