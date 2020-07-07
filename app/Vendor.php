<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  protected $fillable = [
      'user_id','zip','city','country','phone','logo','business_type','status'
  ];

  public function user(){
      return $this->belongsTo('App\User','user_id','id');
  }
}
