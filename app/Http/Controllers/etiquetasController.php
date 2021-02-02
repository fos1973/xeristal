<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class etiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view ("etiquetas");
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


    public function imprimir(Request $request){

          $reglas = [
            "cliente" => "string|max:30" ,
            "domicilio" => "string|max:50" ,
            "localidad" => "string|max:50" ,
            "provincia" => "string|max:20" ,
            "bultos" => "integer|min:1|max:1000",
            "etiquetas" => "integer|min:1|max:50",
            "remito" => "string|max:10"
          ];

          $mensajes = [
            "string" => "El campo :attribute debe ser de texto",
            "integer" => "EL campo :attribute debe ser un entero",
            "max" => "El campo :attribute debe ser menor a :max",
            "min" => "El campo :attribute debe ser mayor o igual a :min"
          ];

          $this->validate($request, $reglas, $mensajes);

          $cliente = strtoupper($request["cliente"]);
          $domicilio = strtoupper($request["domicilio"]);
          $localidad = strtoupper($request["localidad"]);
          $provincia = strtoupper($request["provincia"]);
          $bultos = $request["bultos"];
          $etiquetas = $request["etiquetas"];
          $remito = $request["remito"];
          settype($etiquetas,"integer");

          $resultado = $cliente . "," . $domicilio . "," . $localidad . "," . "$provincia" . "," . $bultos . "," . $etiquetas . "," . $remito . ",0";

          file_put_contents("Z:\Etiqueta.txt", $resultado);

          return redirect ('cia');


    }

    public function remitoimprimir($id){




    }
}
