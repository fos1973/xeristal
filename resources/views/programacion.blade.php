@extends('plantilla')

@section('titulo')
  Programacion
@endsection

@section('seccion')


  @php
    $altura = 30
  @endphp



    <seccion class="invisible-scrollbar color">

      <div class="contenedor mt-5">

        <div class="container text-center mx-2">

              <div class="row">
                    @php
                      $otros = ''
                    @endphp
                    @foreach ($maquinas as $key)
                        @if ($otros <> $key->comapr || $otros == '')
                            <div class="col">
                                <div class=" mb-1 bg-secondary text-white">
                                  <div class="">
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

                                                @if (($maqui->tumapr == 0 && $maqui->arcomp <> 0))
                                                  <div class="  mb-1 bg-success text-white">
                                                @elseif (($maqui->tumapr == 0 && $maqui->arcomp == 0))
                                                  <div class="  mb-1 bg-white text-white">
                                                @else
                                                  <div class="  mb-1 bg-primary text-white">
                                                @endif


                                          <div class="">
                                              <div class="text-start ps-1 bg-danger"> {{$maqui->arartix}} </div>
                                              <div class="text-start ps-1"> OF {{$maqui->ofcomp}} </div>
                                              <div class="text-start ps-1"> D{{$maqui->mpdiam}} R{{$maqui->mprosm}} P{{$maqui->mpperm}} </div>
                                              {{-- <div class="text-start ps-1"> ROSCA {{$maqui->mprosm}} </div>
                                              <div class="text-start ps-1"> PERFORA {{$maqui->mpperm}} </div> --}}
                                              <div class="text-start ps-1"> COLOR {{$maqui->color}} </div>
                                              <div class="text-start ps-1"> ARDO {{$maqui->arcomp}} </div>
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
            <div class="container text-center ">
              SDFGSDFG
            </div>
          </div>
        </div>


      </div>





      {{-- <script src="{{url('assets/js/components/bootstrap.js')}}"></script> --}}

      <script type="text/javascript">
        function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
        setInterval("actualizar()",300000);
      </script>



    </seccion>













@endsection
