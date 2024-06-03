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

  @php
    $altura = 30
  @endphp

    <seccion class="invisible-scrollbar color">
      <div class="d-flex justify-content-between bg-dark">

        <div class="text-light ms-4"> {{$centro}}
        </div>
        <div class="d-flex frex-wrap">
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/EXT')}}">EXTRUSION</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/POM')}}">POMOS</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/OFF')}}">OFFSET</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/INY')}}">TAPAS</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/IMP')}}">SERIGRAFIA</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('programacion/EMB')}}">EMBALADO</a></div>
          <div class="text-light mx-1"><a class="text-light" href="{{url('/')}}">INICIO</a></div>
        </div>

      </div>
        <div class="container-fluid text-center  mt-2">
          <div class="row">
            <div class="col-7">
              <div class="container-fluid text-center " >
                <div class="row">
                      @php
                        $otros = ''

                      @endphp
                      @foreach ($maquinas as $key)
                          @if ($otros <> $key->comapr || $otros == '' )
                              <div class="col">
                                  <div class=" mb-1 bg-secondary text-white ">
                                    <div class="fonc">
                                        <div> {{$key->comapr}} </div>
                                    </div>
                                  </div>
                              </div>
                            @endif
                             @php
                               $otros = $key->comapr
                             @endphp
                      @endforeach
                </div>
                <div class="row">
                      @php
                        $otra = ''
                      @endphp
                        @foreach ($maquinas as $key)
                          @if ($otra <> $key->comapr || $otra == '')

                                <div class="col">
                                      @foreach ($maquinas as $maqui)
                                            @if (($maqui->comapr == $key->comapr))

                                                   @php
                                                    $bg = 'bg-primary';
                                                      if ($maqui->tumapr == 0 && $maqui->arcomp != 0){
                                                        $bg = 'bg-success';
                                                      }
                                                      elseif ($maqui->tumapr == 0 && $maqui->arcomp == 0) {
                                                        $bg = 'bg-white';
                                                      }
                                                   @endphp

                                                  <div class="mb-1 text-white {{$bg}}">
                                                    <div class="">
                                                        <div class="fonc text-start ps-1 bg-black text-white"> {{$maqui->arartix}} </div>
                                                        <div class="fonc text-start ps-1"> OF {{$maqui->ofcomp}} </div>
                                                        <div class="fonc text-start ps-1"> D{{$maqui->mpdiam}} R{{$maqui->mprosm}} P{{$maqui->mpperm}} </div>
                                                        <div class="fonc text-start ps-1"> COLOR {{$maqui->color}} </div>
                                                        <div class="fonc text-start ps-1"> ARMADO {{$maqui->arcomp}} </div>
                                                    </div>
                                                 </div>
                                            @endif
                                       @endforeach
                                     </div>
                                   @endif
                                   @php
                                     $otra = $key->comapr
                                   @endphp
                          @endforeach
                    </div>
              </div>
            </div>

            @if ($centro == 'OFFSET')
              <div class="col-5 d-flex flex-wrap">
                    <table class="table table-light">
                      <thead>
                        <tr class="table-active">
                          <th scope="fonc col">DIAS</th>
                          <th scope="fonc col">BARRAS</th>
                          <th scope="fonc col">POMOS</th>
                          <th scope="fonc col text-start py-1">CODIGO</th>
                          <th scope="fonc col">M</th>
                          {{-- <th scope="fonc col">ESTADO</th> --}}
                          <th scope="fonc col">Ø</th>
                          <th scope="fonc col">OF</th>
                          <th scope="fonc col">ARM</th>
                          <th scope="fonc col">Q</th>
                          <th scope="fonc col">PEND</th>
                          <th scope="fonc col">CHAPA</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($maq_sin_P as $sinP)
                         @php
                            if ($sinP->maestapom == 'C') {
                              $bgt = 'table-success';
                            }
                            elseif ($sinP->maestapom == 'F') {
                              $bgt = 'table-warning';
                            }
                            else {
                              $bgt = 'table-light';
                            }
                         @endphp

                            <tr class="{{$bgt}}">

                              @if ($sinP->cadien > 0)
                                <td class="fonc py-1">{{$sinP->cadien}} </td>
                              @else
                                <td class="fonc py-1 bg-danger text-white">{{$sinP->cadien}} </td>
                              @endif

                              <td class="fonc py-1 ">{{$sinP->numoin}}</td>
                              <td class="fonc py-1 ">{{$sinP->maestapom}}</td>
                              <td class="fonc py-1 text-start">{{$sinP->arartix}}</td>
                              <td class="fonc py-1">{{$sinP->arplan}} </td>
                              <td class="fonc py-1">{{$sinP->mpdiam}} </td>
                              <td class="fonc py-1">{{$sinP->ofcomp}}</td>
                              <td class="fonc py-1">{{$sinP->arcomp}} </td>
                              <td class="fonc py-1 text-end">{{number_format($sinP->ofcant, 0, ',', '.')}} </td>
                              <td class="fonc py-1 text-end">{{number_format($sinP->ofcape, 0, ',', '.')}} </td>
                              <td class="fonc py-1">{{$sinP->maclise}} </td>

                            </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
            @else
              <div class="col-4 d-flex flex-wrap">
                    <table class="table">
                      <thead>
                        <tr class="table-active">
                          <th scope="fonc col">DIAS</th>
                          <th scope="fonc col">BARRAS</th>
                          <th scope="fonc col text-start py-1">CODIGO</th>
                          <th scope="fonc col">M</th>
                          <th scope="fonc col">TAPAS</th>
                          <th scope="fonc col">Ø</th>
                          <th scope="fonc col">OF</th>
                          <th scope="fonc col">ARM</th>
                          <th scope="fonc col">C</th>
                          <th scope="fonc col">R</th>
                          <th scope="fonc col">Q</th>
                          <th scope="fonc col">PEN</th>
                          <th scope="fonc col">CHAPA</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($maq_sin_P as $sinP)
                         @php
                            if ($sinP->arplan == 'F') {
                              $bgt = 'table-warning';
                            }
                            elseif ($sinP->arplan == 'P') {
                              $bgt = 'table-success';
                            }
                            elseif ($sinP->arplan == 'N') {
                              $bgt = 'table-danger';
                            }
                            else {
                              $bgt = 'table-primary';
                            }
                         @endphp

                            <tr class="{{$bgt}}">

                              @if ($sinP->cadien > 0)
                                <td class="fonc py-1">{{$sinP->cadien}} </td>
                              @else
                                <td class="fonc py-1 bg-danger text-white">{{$sinP->cadien}} </td>
                              @endif



                              <td class="fonc py-1 ">{{$sinP->numoin}}</td>
                              <td class="fonc py-1 text-start">{{$sinP->arartix}}</td>
                              <td class="fonc py-1">{{$sinP->arplan}} </td>

                                @if ($sinP->arplan == 'F')
                                  <td class="fonc py-1">TAPA NO</td>
                                @elseif ($sinP->arplan == 'P')
                                  <td class="fonc py-1">TAPA OK</td>
                                @elseif ($sinP->arplan == 'N')
                                  <td class="fonc py-1">TAPA NO</td>
                                @elseif ($sinP->arplan == 'X')
                                  <td class="fonc py-1">ERROR</td>
                                @else
                                  <td class="fonc py-1"></td>
                                @endif





                              <td class="fonc py-1">{{$sinP->mpdiam}} </td>
                              <td class="fonc py-1">{{$sinP->ofcomp}}</td>
                              <td class="fonc py-1">{{$sinP->arcomp}} </td>
                              <td class="fonc py-1">{{$sinP->color}} </td>
                              <td class="fonc py-1">{{$sinP->mprosm}} </td>
                              <td class="fonc py-1 text-end">{{number_format($sinP->ofcant, 0, ',', '.')}} </td>
                              <td class="fonc py-1 text-end">{{number_format($sinP->ofcape, 0, ',', '.')}} </td>
                              <td class="fonc py-1">{{$sinP->maclise}} </td>

                            </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
            @endif
        </div>
     </div>






      {{-- <script src="{{url('assets/js/components/bootstrap.js')}}"></script> --}}

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
