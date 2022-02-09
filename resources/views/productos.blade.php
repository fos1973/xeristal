@extends('plantilla')

@section('titulo')
  Productos
@endsection

@section('seccion')

  <div class="container-fluid mt-3 ms-0 me-0">

    <div class="bg-primary rounded d-flex mb-3 justify-content-between">
      <div class="d-flex">
        <h3 class="text-white">{{$productos->mpprod}}</h3>
        <h3 class="text-white ms-5">{{$productos->mpdesc}}</h3>
      </div>
      <div class="d-flex ">
        <h3 class="text-white">TIPO:</h3>
        <h3 class="text-white ms-1">{{$productos->mptipo}}</h3>
        <h3 class="text-white ms-5">CLASE:</h3>
        <h3 class="text-white ms-1">{{$productos->mpclas}}</h3>
        <h3 class="text-white ms-5">ITEM:</h3>
        <h3 class="text-white ms-1">{{$productos->mpitem}}</h3>

      </div>
    </div>

    <div class="row bg-primary rounded d-flex">
      <div class="col-3 d-flex ms-0 me-0">
        <h3 class="text-white">COMPAÑIA</h3>
        @if ($productos->mpccia <> 0 )
          <h3 class="text-white">{{$productos->mpccia}}</h3>
          @else
          <h3 class="text-white ms-4">No Informado</h3>
        @endif
      </div>
      <div class="col-3 d-flex ms-0 me-0">
        <h3 class="text-white">COMPAÑIA</h3>
        <h3 class="text-white">{{$productos->mpccia}}</h3>
      </div>
      <div class="col-3 d-flex ms-0 me-0">
        <h3 class="text-white">COMPAÑIA</h3>
        <h3 class="text-white">{{$productos->mpccia}}</h3>
      </div>
      <div class="col-3 d-flex ms-0 me-0">
        <h3 class="text-white">COMPAÑIA</h3>
        <h3 class="text-white">{{$productos->mpccia}}</h3>
      </div>



    </div>



  </div>


@endsection
