<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pedidoD = DB::table('PEDIDOD')
        ->SELECT('*')
        ->get();

        $pedidoR = $pedidoD->count();

        // dd($pedidoR);

        // $pedidoR = DB::table('PEDIDOR')
        // ->SELECT('*')
        // ->first();
        // // dd($pedidoR);


        $pedidos = DB::table('PEDIDOP')
        ->SELECT ('*')

        ->ORDERBY ('prioridad')
        ->ORDERBY ('cadias','desc')
        ->ORDERBY ('estado','asc')
        ->get();


        $porciento = DB::table('PEDIDOH')
        ->SELECT ('*')
        ->WHERE ('mamecu','S')
        ->GET();

        $antes = DB::table('PEDIDOH')
        ->SELECT ('*')
        ->WHERE ('mamecu','A')
        ->first();


          $vac = compact("pedidos","porciento","antes","pedidoR");
          // $vac1 = compact("porciento");

          // dd($vac);
        return view ('deposito', $vac);
    }



    public function devoluciones()
    {
      $pedidoD = DB::table('PEDIDOD')
      ->SELECT('*')
      ->get();

      $vac = compact("pedidoD");
      dd($vac);

      return view ('devoluciones', $vac);


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
    public function show($id)
    {
        //
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

    public function pickeo()
    {
        $pedidoR = DB::table('PEDIDOR')
        ->SELECT('*')
        ->first();


        $pedidos = DB::table('PEDIDOP')
        ->SELECT ('*')
        ->WHERE ('estado', '<>' , 'EXPEDICION')
        ->ORWHERE ('logoaviso', '=' , 'okrojo.png')
        ->ORDERBY ('prioridad')
        ->ORDERBY ('cadias','desc')
        ->ORDERBY ('estado','asc')
        ->get();



        $porciento = DB::table('PEDIDOH')
        ->SELECT ('*')
        ->WHERE ('mamecu','S')
        ->GET();

        $antes = DB::table('PEDIDOH')
        ->SELECT ('*')
        ->WHERE ('mamecu','A')
        ->first();

          $vac = compact("pedidos","porciento","antes","pedidoR");
          // $vac1 = compact("porciento");


        return view ('layout', $vac);
      }

      public function salidas()
      {
          $pedidoR = DB::table('PEDIDOR')
          ->SELECT('*')
          ->first();


          $pedidos = DB::table('PEDIDOP')
          ->SELECT ('*')
          ->WHERE ('estado', 'EXPEDICION')
          ->ORDERBY ('prioridad')
          ->ORDERBY ('cadias','desc')
          ->ORDERBY ('estado','asc')
          ->get();



          $porciento = DB::table('PEDIDOH')
          ->SELECT ('*')
          ->WHERE ('mamecu','S')
          ->GET();

          $antes = DB::table('PEDIDOH')
          ->SELECT ('*')
          ->WHERE ('mamecu','A')
          ->first();

          $vac = compact("pedidos","porciento","antes","pedidoR");
            // $vac1 = compact("porciento");


          return view ('layout', $vac);
        }
}
