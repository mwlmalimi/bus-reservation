<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyRoute extends Model
{
    //attributes to be inserted
    protected $fillable = [
      'company_id','route_id','fare',
    ];

     public function company()
     {
       return $this->belongsTo('App\Company');
     }

     public function route()
     {
       return $this->belongsTo('App\Route');
     }
}
