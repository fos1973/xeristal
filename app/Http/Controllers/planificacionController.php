<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class planificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $des = DB::connection('QS36F')->table('FVC701')
      ->select('MPDESC')
      ->where('MPPROD', '=', $codigo)
      ->first();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $codigo = strtoupper(str_pad($request['codigo'], 12));

        $des = DB::connection('QS36F')->table('FVC701')
        ->select('MPDESC')
        ->where('MPPROD', '=', $codigo)
        ->first();

            if (isset($des)) {
              $descripcion = $des->mpdesc;
            } else {
              $descripcion = 'ARTICULO INEXISTENTE';
            }

        $saldos = DB::connection('QS36F')->table('SAINF00')

        ->select('SICART','SICEST','SUM(SICANT) as TOTAL')
        ->where('SICART', '=', $codigo)
        ->groupBy('SICART','SICEST')
        ->get();

        $vac = compact('saldos','codigo','descripcion');

        return view('saldoarticulos', $vac);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function produccion($centro)
    {

      DB::connection('QGPL')->table('TPGMF00')
    ->insert(['CMD' => 'CALL PRODUCCION/AROFC22']);


      $maquinas = DB::connection('QS36F')->table('MAPRT01')

      ->SELECT('*')
      ->WHERE ('CELAB', '=', $centro)
      ->WHERE ('NUMAPR', '<>', 999999)
      ->ORDERBY ('NUMAPR','ASC')
      ->ORDERBY ('TUMAPR','ASC')
      // ->tosql();
      // dd($maquinas);
      ->get();


      $maq_sin_P = DB::connection('QS36F')->table('MAPRT01')

      ->SELECT('*')
      ->WHERE ('CELAB', '=', $centro)
      ->WHERE ('NUMAPR', '=', 999999)
      ->ORDERBY ('CADIEN','asc')
      ->ORDERBY ('TUMAPR','asc')
      ->get();



      if ($centro == 'POM') {
        $centro = 'INYECCION DE POMOS';
      }
      elseif ($centro == 'INY') {
        $centro = 'INYECCION DE TAPAS';
      }
      elseif ($centro == 'EXT') {
        $centro = 'EXTRUSION';
      }
      elseif ($centro == 'SOP') {
        $centro = 'SOPLADO';
      }
      elseif ($centro == 'IMP') {
        $centro = 'SERIGRAFIA Y STAMPING';
      }
      elseif ($centro == 'OFF') {
        $centro = 'OFFSET';
      }
      elseif ($centro == 'EMB') {
        $centro = 'EMBALADO';
      }







      return view('programacion', compact('maquinas', 'maq_sin_P', 'centro'));

    }

    public function armados()
    {


      $armados = DB::connection('QS36F')->table('MAPRT01')

      ->SELECT('*')
      ->WHERE ('ARCOMP', '<>', 0)
      ->ORDERBY ('ARCOMP','ASC')
      ->ORDERBY ('OFCALM','ASC')
      // ->tosql();
      ->get();



      // dd($armados);
    //
    //   $columna = 'ofcalm';
    //   $valor = 'ofcart';
    //   $agrupados = [];
    //       foreach ($armados as $armado) {
    //           $arcomp = $armado->arcomp;
    //           if (!isset($agrupados[$arcomp])) {
    //             $agrupados[$arcomp] = ['arcomp' => $arcomp];
    //     }
    //
    //       $agrupados[$arcomp][$armado->$columna] = $armado->$valor;
    //
    // }
    //
    // dd($agrupados);
        // $agrupados[];
        // $agrupados['armado1'] = 1234;


          foreach ($armados as $armado) {

                //datos comunes a los armados
                $agrupados[$armado->arcomp]['armado'] = $armado->arcomp;
                $agrupados[$armado->arcomp]['codigoArmado'] = $armado->ararti;
                $agrupados[$armado->arcomp]['descripcion'] = $armado->mpdesc;
                $agrupados[$armado->arcomp]['planificado'] = $armado->arplan;
                $agrupados[$armado->arcomp]['cliente'] = $armado->mcrazo;
                $agrupados[$armado->arcomp]['oc'] = $armado->pcnuoc;
                $agrupados[$armado->arcomp]['atraso'] = $armado->cadien;
                $agrupados[$armado->arcomp]['clise'] = $armado->maclise;



                if ($armado->celab == 'EXT') { $centro = 'ext';}
                if ($armado->celab == 'POM') { $centro = 'pom';}
                if ($armado->celab == 'OFF') { $centro = 'off';}
                if ($armado->celab == 'IMP') { $centro = 'imp';}
                if ($armado->celab == 'EMB') { $centro = 'emb';}
                if ($armado->celab == 'INY') { $centro = 'tap';}
                if ($armado->celab == 'SOP') { $centro = 'sop';}
                if ($armado->celab == 'ENV') { $centro = 'env';}
                if ($armado->celab == 'ELA') { $centro = 'ela';}


                $agrupados[$armado->arcomp][$centro."Orden"] = $armado->ofcomp;
                $agrupados[$armado->arcomp][$centro."Codigo"] = $armado->ofcart;
                $agrupados[$armado->arcomp][$centro."Barras"] = $armado->numoin;
                $agrupados[$armado->arcomp][$centro."Diametro"] = $armado->mpdiam;
                $agrupados[$armado->arcomp][$centro."Rosca"] = $armado->mprosm;
                $agrupados[$armado->arcomp][$centro."Perforacion"] = $armado->mpperm;
                $agrupados[$armado->arcomp][$centro."Cantidad"] = number_format($armado->ofcant, 0, ',', '.');
                $agrupados[$armado->arcomp][$centro."Pendiente"] = number_format($armado->ofcape, 0, ',', '.');
                $agrupados[$armado->arcomp][$centro."Diametro"] = $armado->mpdiam;
                $agrupados[$armado->arcomp][$centro."Estado"] = $armado->ofesta;
                $agrupados[$armado->arcomp][$centro."centro"] = $armado->celab;

                }
                // dd($agrupados);
                // le agrego un marca a los armados para saber cuales FilterIterator
$nuevo = 0;
                foreach ($agrupados as $agrupado) {
                  if (((isset($agrupado["elacentro"]) || isset($agrupado["envcentro"])) && (
                          (isset($agrupado["extEstado"]) && ($agrupado["extEstado"] <> 'C')) ||
                          (isset($agrupado["pomEstado"]) && ($agrupado["pomEstado"] <> 'C')) ||
                          (isset($agrupado["impEstado"]) && ($agrupado["impEstado"] <> 'C')) ||
                          (isset($agrupado["offEstado"]) && ($agrupado["offEstado"] <> 'C')) ||
                          (isset($agrupado["embEstado"]) && ($agrupado["embEstado"] <> 'C')) ||
                          (isset($agrupado["sopEstado"]) && ($agrupado["sopEstado"] <> 'C')))) ||
                          (!isset($agrupado["elacentro"]) && !isset($agrupado["envcentro"])))

                    {
                      $nuevo = $agrupado['armado'];
                    $agrupados[$nuevo]['Marca'] = 1;
                  }
                  else {
                    $nuevo = $agrupado['armado'];
                    $agrupados[$nuevo]['Marca'] = 0;
                  }
                }
                
          $sinEnvasado = [] ;
          $arm = 0;


            foreach ($agrupados as $agrupado) {

              $arm = $agrupado['armado'];

              if ($agrupado['Marca'] == 1) {

                $sinEnvasado[$arm] = $agrupado;
              }
              // dd($sinEnvasado);
            }
            // dd($sinEnvasado);



      return view('programacionArmados', compact('sinEnvasado'));

    }



}
