{{-- @extends('plantilla')

@section('titulo')
  Programacion
@endsection

@section('seccion') --}}

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>





    <seccion class="">
      @foreach ($sinEnvasado->chunk(2000) as $chunk)
        <div class="d-flex ">





      <table class="table table-striped">
              <thead>
                  <tr>
                    <th scope="col">ARMADO</th>
                    <th scope="col">CODIGO</th>
                    {{-- <th scope="col">DESCRIPCION</th> --}}
                    {{-- <th scope="col">CLIENTE</th> --}}
                    {{-- <th scope="col">ATRASO</th> --}}
                    {{-- <th scope="col">SOPLADO</th> --}}
                    {{-- <th scope="col">TAPAS</th> --}}
                    <th scope="col">EXTRUSION</th>
                    <th scope="col">POMOS</th>
                    {{-- <th scope="col">OFFSET</th> --}}
                    {{-- <th scope="col">SERIGRAFIA</th> --}}
                    {{-- <th scope="col">EMBALADO</th> --}}
                  </tr>
              </thead>
              <tbody>
                @foreach ($chunk as $armado)
                    @php

                      $sopClase = 0;
                      $tapClase = 0;
                      $extClase = 0;
                      $pomClase = 0;
                      $offClase = 0;
                      $impClase = 0;
                      $embClase = 0;
                      $elaClase = 0;
                      $envClase = 0;

                      if (isset($armado['sopEstado']) && ($armado["sopEstado"] == 'I' || $armado["sopEstado"] == 'P')) {$sopClase = "bg-success text-white";}
                      if (isset($armado['tapEstado']) && ($armado["tapEstado"] == 'I' || $armado["tapEstado"] == 'P')) {$tapClase = "bg-success text-white";}
                      if (isset($armado['extEstado']) && ($armado["extEstado"] == 'I' || $armado["extEstado"] == 'P')) {$extClase = "bg-success text-white";}
                      if (isset($armado['pomEstado']) && ($armado["pomEstado"] == 'I' || $armado["pomEstado"] == 'P')) {$pomClase = "bg-success text-white";}
                      if (isset($armado['offEstado']) && ($armado["offEstado"] == 'I' || $armado["offEstado"] == 'P')) {$offClase = "bg-success text-white";}
                      if (isset($armado['impEstado']) && ($armado["impEstado"] == 'I' || $armado["impEstado"] == 'P')) {$impClase = "bg-success text-white";}
                      if (isset($armado['embEstado']) && ($armado["embEstado"] == 'I' || $armado["embEstado"] == 'P')) {$embClase = "bg-success text-white";}
                      if (isset($armado['elaEstado']) && ($armado["elaEstado"] == 'I' || $armado["elaEstado"] == 'P')) {$elaClase = "bg-success text-white";}
                      if (isset($armado['envEstado']) && ($armado["envEstado"] == 'I' || $armado["envEstado"] == 'P')) {$envClase = "bg-success text-white";}

                      if (isset($armado['sopEstado']) && $armado["sopEstado"] == 'C') {$sopClase = "bg-black text-white";}
                      if (isset($armado['tapEstado']) && $armado["tapEstado"] == 'C') {$tapClase = "bg-black text-white";}
                      if (isset($armado['extEstado']) && $armado["extEstado"] == 'C') {$extClase = "bg-black text-white";}
                      if (isset($armado['pomEstado']) && $armado["pomEstado"] == 'C') {$pomClase = "bg-black text-white";}
                      if (isset($armado['offEstado']) && $armado["offEstado"] == 'C') {$offClase = "bg-black text-white";}
                      if (isset($armado['impEstado']) && $armado["impEstado"] == 'C') {$impClase = "bg-black text-white";}
                      if (isset($armado['embEstado']) && $armado["embEstado"] == 'C') {$embClase = "bg-black text-white";}
                      if (isset($armado['elaEstado']) && $armado["elaEstado"] == 'C') {$elaClase = "bg-black text-white";}
                      if (isset($armado['envEstado']) && $armado["envEstado"] == 'C') {$envClase = "bg-black text-white";}

                    @endphp

                  <tr class="">

                            {{-- DATOS COMUNES --}}
                    <td >
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>

                    <td class="">
                      <div class="d-flex">
                        <div class="">
                          @isset($armado['codigoArmado']) {{$armado["codigoArmado"]}} @endisset
                        </div>
                        <div class="mx-2">
                        @isset($armado['descripcion']) {{$armado["descripcion"]}} @endisset
                        </div>
                      </div>
                    </td>

                    {{-- <td>
                      <div class="">
                        @isset($armado['atraso']) {{$armado["atraso"]}} @endisset
                      </div>
                    </td> --}}

                            {{-- SOPLADO --}}
                    {{-- <td class="{{$sopClase}}">
                      <div class="">
                        <div class="">
                         <div class="">
                            @isset($armado['sopOrden']) OF: {{$armado["sopOrden"]}}  CB: {{$armado["sopBarras"]}} @endisset
                          <div class="d-flex">
                            <div class="mt-2">
                            @isset($armado['sopCantidad']) Cant: {{$armado["sopCantidad"]}} @endisset
                            </div>
                            <div class="mt-2 mx-2">
                            @isset($armado['sopPendiente']) Pen: {{$armado["sopPendiente"]}} @endisset
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </td> --}}

                            {{-- TAPAS --}}

                    {{-- <td class="{{$tapClase}}">
                      <div class="">
                        <div class="">
                         <div class="">
                            @isset($armado['tapOrden']) OF: {{$armado["tapOrden"]}}  CB: {{$armado["tapBarras"]}} @endisset
                          <div class="d-flex">
                            <div class="mt-2">
                            @isset($armado['tapCantidad']) Cant: {{$armado["tapCantidad"]}} @endisset
                            </div>
                            <div class="mt-2 mx-2">
                            @isset($armado['tapPendiente']) Pen: {{$armado["tapPendiente"]}} @endisset
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </td> --}}

                            {{-- EXTRUSION --}}
                    <td class="{{$extClase}}">
                        <div class="">
                          <div class="d-flex">
                            <div class="">
                              @isset($armado['extOrden']) OF: {{$armado["extOrden"]}}  CBarras: {{$armado["extBarras"]}} @endisset
                            </div>
                            <div class="d-flex">
                                  <div class="mx-2">
                                  @isset($armado['extCantidad']) Cantidad: {{$armado["extCantidad"]}} @endisset
                                  </div>
                                  <div class="mx-2">
                                  @isset($armado['extPendiente']) Pendiente: {{$armado["extPendiente"]}} @endisset
                                  </div>
                                </div>
                          </div>
                        </div>
                    </td>


                            {{-- INYECCION DE CABEZAS --}}

                    <td class="{{$pomClase}}">
                        <div class="">
                          <div class="d-flex">
                            <div class="">
                              @isset($armado['pomOrden']) OF: {{$armado["pomOrden"]}}  CBarras: {{$armado["pomBarras"]}} @endisset
                            </div>
                            <div class="d-flex">
                                  <div class="mx-2">
                                  @isset($armado['pomCantidad']) Cantidad: {{$armado["pomCantidad"]}} @endisset
                                  </div>
                                  <div class="mx-2">
                                  @isset($armado['pomPendiente']) Pendiente: {{$armado["pomPendiente"]}} @endisset
                                  </div>
                                </div>
                          </div>
                        </div>
                    </td>

                            {{-- OFFSET --}}

                    {{-- <td class="{{$offClase}}">
                      <div class="">
                        <div class="">
                         <div class="">
                            @isset($armado['offOrden']) OF: {{$armado["offOrden"]}}  CB: {{$armado["offBarras"]}} @endisset
                          <div class="d-flex">
                            <div class="mt-2">
                            @isset($armado['offCantidad']) Cant: {{$armado["offCantidad"]}} @endisset
                            </div>
                            <div class="mt-2 mx-2">
                            @isset($armado['offPendiente']) Pen: {{$armado["offPendiente"]}} @endisset
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </td> --}}

                            {{-- SERIGRAFIA Y STAMPING --}}

                    {{-- <td class="{{$impClase}}">
                      <div class="">
                        <div class="">
                         <div class="">
                            @isset($armado['impOrden']) OF: {{$armado["impOrden"]}}  CB: {{$armado["impBarras"]}} @endisset
                          <div class="d-flex">
                            <div class="mt-2">
                            @isset($armado['impCantidad']) Cant: {{$armado["impCantidad"]}} @endisset
                            </div>
                            <div class="mt-2 mx-2">
                            @isset($armado['impPendiente']) Pen: {{$armado["impPendiente"]}} @endisset
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </td> --}}

                            {{-- EMBALADO --}}


                    {{-- <td class="{{$embClase}}">
                      <div class="">
                        <div class="">
                         <div class="">
                            @isset($armado['embOrden']) OF: {{$armado["embOrden"]}}  CB: {{$armado["embBarras"]}} @endisset
                          <div class="d-flex">
                            <div class="mt-2">
                            @isset($armado['embCantidad']) Cant: {{$armado["embCantidad"]}} @endisset
                            </div>
                            <div class="mt-2 mx-2">
                            @isset($armado['embPendiente']) Pen: {{$armado["embPendiente"]}} @endisset
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </td> --}}



                  </tr>
                @endforeach
              </tbody>
              @endforeach

      </table>

  </div>





      <script type="text/javascript">
        function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
        setInterval("actualizar()",300000);
      </script>

    </seccion>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>










{{-- @endsection --}}
