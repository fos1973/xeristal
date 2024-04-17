@extends('plantilla')

@section('titulo')
  Pedidos Iyosei
@endsection

@section('seccion')

    <seccion class="invisible-scrollbar color">

      <div class="nav border m-0 p-0">
            <div class="contenido linea p-0">
                <div class="d-flex">

                      @if ($pedidoR > 0)
                        <a class="btn btn-danger btn-lg" href="/devoluciones" role="button">
                            <div class="">
                              <h5 class="fon">DEVOLUCIONES PENDIENTES {{$pedidoR}}</h5>
                            </div>
                        </a>

                      @else
                        <h4 class="p-0 m-0">PEDIDOS</h4>
                      @endif
                </div>

                <div class="ancho p-0">
                  @foreach ($porciento as $por)
                    <p class="p-0 m-0">FALTANTE DEL MES  {{100-($por->pocupe)}} %</p>
                  @endforeach
                </div>
                <div class="ancho p-0">
                  <p class="p-0 m-0">FALTANTE MES ANTERIOR {{100-($antes->pocupe)}} %</p>
                </div>
            </div>
      </div>

      <div class="contenedor">
        @foreach ($pedidos->chunk(1000) as $chunk)
          {{-- <div class="caja"> --}}
                    <table class="table table-striped">
                          <thead class="text-warning">
                              <tr class="trc">
                              {{-- <th scope="col"></th> --}}
                              <th scope="col">ORDEN</th>
                              <th scope="col">CLIENTE</th>
                              {{-- <th scope="col">FECHA</th> --}}
                              <th class="cen" scope="col">DIAS</th>
                              <th class="cen" scope="col">ESTADO</th>
                              <th class="cen" scope="col">DISPONIBLE</th>
                              <th class="cen"scope="col">PICKEADO</th>
                              <th class="cen"scope="col">VARIANTES</th>
                              <th class="cen"scope="col">CAJAS</th>
                              <th class="cen"scope="col">UNIDADES</th>
                              <th class="der" scope="col">IMPORTE</th>
                              {{-- <th scope="col"></th> --}}
                            </tr>
                          </thead>

                        @foreach ($chunk as $pedido)
                              @if (!empty($pedido->logoaviso) && ($pedido->logoaviso == "peligro.png"))
                                <tr class="table-danger">
                              @else
                                <tr>
                              @endif


                                @if (($pedido->canalv)  == "S")
                                  <td class="cen">
                                    <div class="linea">
                                        <div>
                                          {{$pedido->pcnum}}
                                        </div>
                                        <img src={{asset('assets/img/tienda.png')}}  width="20" alt="">
                                    </div>
                                  </td>

                                @elseif (($pedido->canalv)  == "A")
                                  <td class="cen">
                                    <div class="linea">
                                        <div>
                                          {{$pedido->pcnum}}
                                        </div>
                                        <img src={{asset('assets/img/academia.png')}}  width="20" alt="">
                                    </div>
                                  </td>

                                @elseif (($pedido->canalv)  == "U")
                                  <td class="cen">
                                    <div class="linea">
                                        <div>
                                          {{$pedido->pcnum}}
                                        </div>
                                        <img src={{asset('assets/img/openbox.png')}}  width="20" alt="">
                                    </div>
                                  </td>

                                @else
                                  <td class="">{{$pedido->pcnum}}</td>
                                @endif



                                <td class="">{{$pedido->mcrazo}}</td>
                                <td class="cen">{{$pedido->cadias}}</td>

                                        @if (($pedido->estado)  == "EXPEDICION")
                                          <td class="cen"><img src={{asset('assets/img/camion.png')}}  width="27" alt=""></td>
                                        @endif

                                        @if (($pedido->estado)  == "TERMINADO")
                                          <td class="cen"><img src={{asset('assets/img/finish.png')}}  width="24" alt=""></td>
                                        @endif

                                        @if (($pedido->estado)  == "EN ESPERA")
                                          <td class="cen"><img src={{asset('assets/img/stop.png')}}  width="22" alt=""></td>
                                        @endif

                                        @if (($pedido->estado)  == "INICIADO")
                                          <td class="cen"><img src={{asset('assets/img/play.png')}}  width="22" alt=""></td>
                                        @endif

                                        <td class="cen">{{$pedido->poimpocu}}%</td>
                                        <td class="cen">{{$pedido->poimpocump}}%</td>
                                        <td class="cen">{{$pedido->cavaprpe}}</td>
                                        <td class="cen">{{$pedido->cabupe}}</td>
                                        <td class="cen">{{$pedido->caunpe}}</td>
                                        <td class="der">{{number_format($pedido->impoped, 2, ',', '.')}}</td>

                                    {{-- @if (!empty ($pedido->logoaviso))
                                      <td><img src={{asset('assets/img/'.$pedido->logoaviso)}}  width="25" alt=""></td>
                                    @else
                                      <td></td> --}}
                                    {{-- @endif --}}
                              </tr>
                          @endforeach
                      </table>
          @endforeach
        </div>








      {{-- <script src="{{url('assets/js/components/bootstrap.js')}}"></script> --}}

      <script type="text/javascript">
        function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
        setInterval("actualizar()",300000);
      </script>

    </seccion>













@endsection
