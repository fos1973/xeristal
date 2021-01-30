<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RTOCABEL10 extends Model
{
  protected $table = 'RTOCABEL10';
  protected $primaryKey = 'ID';
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];


  public function remitodetalle (){
    return $this->hasMany("App\RTODETAL10", "RTOCABE_ID" );
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


  public function totalBultos(){

    $items_del_remito = DB::table("RTODETAL10")
    ->select('rdcan','rdcaxb')
    ->where("RTOCABE_ID", '=', $this->id)
    ->get();

    $total = 0;

    foreach ($items_del_remito as $item)
     {
       if ($item->rdcaxb > 0) {
       $total =  $total +   ($item->rdcan / $item->rdcaxb);}

      }
    return $total;
  }

  public function fecha(){
    $dia = substr($this->rtfec,4,2);
    $mes = substr($this->rtfec,2,2);
    $ano = substr($this->rtfec,0,2);

    $ano2000 = $ano + 2000;


    $fec = ($dia . "/" . $mes . "/" . $ano2000);
    //
    // $fecha = date('d-m-Y', $fec);
    //
    return $fec;

  }

}
