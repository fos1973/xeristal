<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RTOCABEL10 extends Model
{
  protected $table = 'RTOCABEL10';
  protected $primaryKey = 'ID';
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];


  public function remitodetalle (){
    return $this->hasMany("App\RTODETAL10", "RTODETA_ID" );
  }

  public function empresaremito (){
    if ($this->rtcia == 3) {
      return "XERISTAL";
    }
    if ($this->rtcia == 4) {
      return "COSMETEC";
    }
    if ($this->rtcia == 7) {
      return "PROMETICA";
    }

  }
}
