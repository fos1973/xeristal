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

          $vac = compact("pedidos","porciento","antes");
          // $vac1 = compact("porciento");


        return view ('deposito', $vac);
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

          $vac = compact("pedidos","porciento","antes");
          // $vac1 = compact("porciento");


        return view ('layout', $vac);
      }

      public function salidas()
      {
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

            $vac = compact("pedidos","porciento","antes");
            // $vac1 = compact("porciento");


          return view ('layout', $vac);
        }
}
