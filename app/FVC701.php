<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FVC701 extends Model
{
  protected $table = 'FVC701';
  protected $primaryKey = 'MPPROD';
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];
  protected $connection = 'QS36F';


  public function FVC701E1 (){
    return $this->hasone("App\FVC701E1", "MPPROD" );
  }

  public function FVC701E4 (){
    return $this->hasone("App\FVC701E4", "MPPROD" );
  }

  public function FVC701E5 (){
    return $this->hasone("App\FVC701E5", "MPPROD" );
  }

  public function FVC701E7 (){
    return $this->hasone("App\FVC701E7", "MPPROD" );
  }

  public function FVC701E9 (){
    return $this->hasone("App\FVC701E9", "MPPROD" );
  }

  public function FVC701E10 (){
    return $this->hasone("App\FVC701E10", "MPPROD" );
  }

  public function FVC701E11 (){
    return $this->hasone("App\FVC701E11", "MPPROD" );
  }

  public function FVC701E12 (){
    return $this->hasone("App\FVC701E12", "MPPROD" );
  }

  public function FVC701E13 (){
    return $this->hasone("App\FVC701E13", "MPPROD" );
  }

  public function FVC701E15 (){
    return $this->hasone("App\FVC701E15", "MPPROD" );
  }



}
