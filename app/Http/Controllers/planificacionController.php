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
        //
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
}
