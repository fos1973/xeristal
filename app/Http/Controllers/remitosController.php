<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RTOCABEL10;


class remitosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


        $remitos = RTOCABEL10::where('rtcia', $id)
        ->where('rtdgi', '>' , 0)
        ->orderby('id','desc')
        ->limit(10)->get();

        // dd($remitos);

        $vac = compact("remitos");


        return view ('remitos', $vac);


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


    public function imprimir(Request $req){

      $reglas = [
        "etiquetas" => "integer|min:1|max:50",
      ];

      $mensajes = [
        "integer" => "EL campo :attribute debe ser un entero",
        "max" => "El campo :attribute debe ser menor a :max",
        "min" => "El campo :attribute debe ser mayor o igual a :min"
      ];

      $this->validate($req, $reglas, $mensajes);


      $cliente = $req['cliente'];
      $remito = $req['dgi'];
      $domicilio = $req['domicilio'];
      $localidad = $req['localidad'];
      $provincia = $req['provincia'];
      $bultos = $req['bultos'];
      $etiquetas = $req['etiquetas'];
      $postal = $req['postal'];

dd($bultos);


      $resultado = $cliente . "," . $domicilio . "," . $localidad . "," . "$provincia" . "," . $bultos . "," . $etiquetas . "," . $remito;

      file_put_contents("Z:\Etiqueta.txt", $resultado);

      // dd($resultado);

      return redirect ('exito');

    }

    public function rotulo(Request $req){

      $cliente = $req['cliente'];
      $remito = $req['dgi'];
      $domicilio = $req['domicilio'];
      $localidad = $req['localidad'];
      $provincia = $req['provincia'];
      $bultos = $req['bultos'];
      $postal = $req['postal'];


      $resultado = $cliente . "," . $domicilio . "," . $localidad . "," . $provincia . "," . $bultos . "," . $remito;

      file_put_contents("Z:\Rotulo.txt", $resultado);


      return redirect ('exito');

    }



  }
