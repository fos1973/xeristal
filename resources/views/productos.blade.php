@extends('plantilla')

@section('titulo')
  Productos
@endsection

@section('seccion')

  <div class="container mt-5 ms-0 me-0">

    @if ($productos == 'x')
      <div class=""><h1>PRODUCTO INEXISTENTE</h1>

      </div>

      <div class="">

          <form action="{{url('productoseleccion')}}" method="GET">
            @csrf
            <div class="mb-3 mb-4  w-25">
              <label for="exampleInputEmail1" class="form-label"><h2>Codigo de Articulo</h1></label>
              <input type="text" class="form-control" placeholder="Codigo" name="codigo">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>

      </div>

    @else

    <div class="">
      <ul class="list-group">

        <li class="list-group-item active d-flex" aria-current="true">
          <h3 class="me-3">{{$productos->mpprod}}</h3>
          <h3 class="me-3">{{$productos->mpdesc}}</h3>
        </li>

        @foreach ($productos as $key => $producto)
          @if ($producto != null && $producto <> "0" && trim($producto) <> "")


        <li class="list-group-item d-flex">
          <div class="" style="width:170px">
            <h4 class="me-3">{{$key}}:</h4>
          </div>
          <h4 class="me-3">{{$producto}}</h4>
          @endif
        @endforeach
        </li>
{{--
        <li class="list-group-item d-flex">
          <h4 class="me-3">UNIDAD DE MEDIDA:</h4>
          @if ($productos->mpccia == 0)
          <h4 class="me-3 text-danger">No informado</h4>
          @else
          <h4 class="me-3">{{$productos->mpunid}}</h4>
          @endif
        </li>

        <li class="list-group-item d-flex">
          <h4 class="me-3">ORIGEN:</h4>
          @if ($productos->mpccia == 0)
          <h4 class="me-3 text-danger">No informado</h4>
          @else
          <h4 class="me-3">{{$productos->mporig}}</h4>
          @endif
        </li>



        <li class="list-group-item d-flex">
          <h4 class="me-3">PESO:</h4>
          @if ($productos->mpccia == 0)
          <h4 class="me-3 text-danger">No informado</h4>
          @else

          @php
          $peso = floatval($productos->mppeso)
          @endphp

          <h4 class="me-3">{{$peso}}</h4>
          @endif
        </li>

        <li class="list-group-item d-flex">
          <h4 class="me-3">CONSUMO:</h4>
          @if ($productos->mpccia == 0)
          <h4 class="me-3 text-danger">No informado</h4>
          @else
          <h4 class="me-3">{{$productos->mpcons}}</h4>
          @endif
        </li>

        <li class="list-group-item d-flex">
          <h4 class="me-3">ORIGEN:</h4>
          @if ($productos->mpccia == 0)
          <h4 class="me-3 text-danger">No informado</h4>
          @else
          <h4 class="me-3">{{$productos->mporig}}</h4>
          @endif
        </li> --}}


      </ul>
    </div>




  </div>
@endif


@endsection
