<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RTODETAL10 extends Model
{
  protected $table = 'RTODETAL10';
  protected $primaryKey = 'RTODETA_ID';
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];


  public function remito() {
  return $this->belongsTo( "App\RTOCABEL10" , "RTODETA_ID");

}



}
