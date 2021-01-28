<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="/css/stylepick.css">
      <script src={{asset('assets/js/JsBarcode.all.min.js')}}></script>
    <style>
          .table-striped>tbody>tr:nth-child(odd)>td,
          .table-striped>tbody>tr:nth-child(odd)>th {
           background-color:#1E40F3 ;
          }
          .table-striped>tbody>tr:nth-child(even)>td,
          .table-striped>tbody>tr:nth-child(even)>th {
           background-color: #0C0E8A;
          }
          .table-striped>thead>tr>th {
             background-color: #0C0E8A;
          }
          .linea{
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0px;
            margin: 0px;
          }
          .espacio{margin-right: 10px}
          .color {background-color:#0C0E8A }

          .ancho{
            font-size: 30px;
            margin-right:20px;
            padding: 0px;
            margin-bottom: 0px;
          }



          tr {line-height: 20px;}


    </style>
    <title></title>
  </head>
  <body class="invisible-scrollbar color">

    <div class="nav border m-0 p-0">
          <div class="contenido linea ">

              <div class="">
                    <h1 class="">Estado de pedidos</h1>
              </div>

              <div class="ancho">
                @foreach ($porciento as $por)
                  <p class="">FALTANTE DEL MES  {{100-($por->pocupe)}} %</p>
                @endforeach
              </div>
              <div class="ancho">
                <p class="">FALTANTE MES ANTERIOR {{100-($antes->pocupe)}} %</p>
              </div>
          </div>

    </div>

    <div class="contenedor">
      @foreach ($pedidos->chunk(20) as $chunk)
        <div class="caja">

                  <table class="table  table-borderless text-white border table-striped ">
                        <thead class="text-warning  ">
                          <tr>
                            {{-- <th scope="col"></th> --}}
                            <th scope="col">ORDEN</th>
                            <th scope="col">CLIENTE</th>
                            {{-- <th scope="col">FECHA</th> --}}
                            <th scope="col">DIA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">DISP</th>
                            <th scope="col">PICK</th>
                            <th scope="col">VAR</th>
                            <th scope="col">CAJAS</th>
                            <th scope="col">UNI</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>

                      @foreach ($chunk as $pedido)
                          <tbody class="">
                            <tr>
                              {{-- <td>
                                <div class="linea">

                                          @if (!empty($pedido->logoorigen))
                                            <img src={{asset('assets/img/'.$pedido->logoorigen)}}  width="30" alt="">
                                          @endif

                                          <svg id="barcode_{{$pedido->pcnum}}"></svg>
                                              <script type="text/javascript">
                                                    JsBarcode("#barcode_{{$pedido->pcnum}}", {{$pedido->pcnum}},{
                                                              format: "code128",
                                                              lineColor: "#000",
                                                              textMargin: 0,
                                                              fontSize: 15,
                                                              margin: 5,
                                                              width: 1,
                                                              height: 10,
                                                              displayValue: false
                                                            });
                                              </script>
                                </div>
                              </td> --}}

                                        <div>
                                            @if (($pedido->canalv)  == "S")
                                              <td>
                                                    <div class="linea">
                                                              <div>
                                                                {{$pedido->pcnum}}
                                                              </div>
                                                              <img src={{asset('assets/img/tienda.png')}}  width="25" alt="">
                                                    </div>
                                              </td>

                                            @else
                                              <td>{{$pedido->pcnum}}</td>
                                            @endif
                                        </div>

                              <td>{{$pedido->mcrazo}}</td>
                              <td>{{$pedido->cadias}}</td>

                                      @if (($pedido->estado)  == "EXPEDICION")
                                        <td><img src={{asset('assets/img/camion.png')}}  width="30" alt=""></td>
                                      @endif

                                      @if (($pedido->estado)  == "TERMINADO")
                                        <td><img src={{asset('assets/img/finish.png')}}  width="27" alt=""></td>
                                      @endif

                                      @if (($pedido->estado)  == "EN ESPERA")
                                        <td><img src={{asset('assets/img/stop.png')}}  width="25" alt=""></td>
                                      @endif

                                      @if (($pedido->estado)  == "INICIADO")
                                        <td><img src={{asset('assets/img/play.png')}}  width="25" alt=""></td>
                                      @endif

                              <td>{{$pedido->poimpocu}}</td>
                              <td>{{$pedido->poimpocump}}</td>
                              <td>{{$pedido->cavaprpe}}</td>
                              <td>{{$pedido->cabupe}}</td>
                              <td>{{$pedido->caunpe}}</td>

                              @if (!empty ($pedido->logoaviso))
                                <td><img src={{asset('assets/img/'.$pedido->logoaviso)}}  width="25" alt=""></td>
                              @else
                                <td></td>
                              @endif


                            </tr>
                            </tbody>
                        @endforeach
                    </table>
            </div>
        @endforeach
      </div>








    {{-- <script src="{{url('assets/js/components/bootstrap.js')}}"></script> --}}

    <script type="text/javascript">
      function actualizar(){location.reload(true);}
      //Función para actualizar cada 4 segundos(4000 milisegundos)
      setInterval("actualizar()",30000);
    </script>

  </body>
</html>
