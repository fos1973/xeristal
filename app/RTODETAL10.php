<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RTODETAL10 extends Model
{
  protected $table = 'RTODETAL10';
  protected $primaryKey = 'RTOCABE_ID';
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];


  public function remito() {
  return $this->belongsTo("App\RTOCABEL10" , "RTOCABE_ID");
}








}
