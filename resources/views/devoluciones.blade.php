@extends('plantilla')

@section('titulo')
  Devoluciones
@endsection

@section('seccion')

    <seccion class="invisible-scrollbar color">


      <div class="bg-danger h-50 m-40px d-flex justify-content-between">
        <div class="p-3">
          <h5 class="mb-0 text-white">DEVOLUCIONES IYOSEI SIN UBICACION</h5>
        </div>
        <div class="">
              <a class="btn btn-danger btn-lg pt-3 " href="/salidas" role="button">
                  <div class="">
                    <h5 class="fon m-0">VOLVER A SALIDAS</h5>
                  </div>
              </a>
        </div>
        <div class="">
              <a class="btn btn-danger btn-lg pt-3 " href="/pickeo" role="button">
                  <div class="">
                    <h5 class="fon m-0">VOLVER A PICKEO</h5>
                  </div>
              </a>
        </div>

      </div>

      <div class="contenedor">
                    <table class="table table-striped table-hover">
                          <thead class="">
                              <tr class="trc">
                                  <th scope="col">CODIGO</th>
                                  <th scope="col">DESCRIPCION</th>
                                  <th class="col" scope="col">DIAS ATRASO</th>
                                  <th class="cen" scope="col">CLIENTE</th>
                                  <th class="cen" scope="col">COMPROBANTE</th>
                                  <th class="cen"scope="col">NUMERO</th>
                                  <th class="der" scope="col">CANTIDAD</th>
                              </tr>
                          </thead>

                        @foreach ($pedidod as $devolucion)
                                <tr class="">
                                        <td class="">{{$devolucion->sicart}}</td>
                                        <td class="">{{$devolucion->mpdesc}}</td>
                                        <td class="">{{$devolucion->micadi}}</td>
                                        <td class="">{{$devolucion->mcrazo}}</td>
                                        <td class="cen">{{$devolucion->mitico}}</td>
                                        <td class="cen">{{$devolucion->minuco}}</td>

                                        <td class="der"><h5>{{number_format($devolucion->sicant, 0, ',', '.')}}</h5></td>
                                 </tr>
                          @endforeach
                      </table>
        </div>


      <script type="text/javascript">
        function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
        setInterval("actualizar()",300000);
      </script>

    </seccion>













@endsection
