<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyRoute extends Model
{
    //attributes to be inserted
    protected $fillable = [
      'company_id','route_id','fare','departure_time',
    ];
     public function companies()
     {
       return $this->belongsTo('App\Company');
     }
     public function routes()
     {
       return $this->belongsTo('App\Route);
     }
}
