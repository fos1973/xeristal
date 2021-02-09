@extends('plantilla')

@section('titulo')
  Saldo de Articulos
@endsection

@section('seccion')
  <div class="container w-50">
    <div class="mt-3 d-flex">
      <div class="align-self-center margen">
        <p class="fs-2 mb-0 ">{{$codigo}}</p>
      </div>
      <div class="align-self-center ">
        <p class="fs-4 mb-0 ">{{$descripcion}}</p>
      </div>
    </div>
    <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col" class="fs-2">ESTADO</th>
      <th scope="col" class="text-end fs-2">SALDO</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($saldos as $saldo)
      @if ($saldo->sicest == 'APR')
        <tr class="bg-success text-white">
      @elseif ($saldo->sicest == 'CUA')
        <tr class="bg-warning ">
      @elseif ($saldo->sicest == 'RXV' || $saldo->sicest == 'RCH' )
          <tr class="bg-danger text-white">
      @else
        <tr>
      @endif


        @if ($saldo->sicest == 'APR')
          <td class="fs-2">APROBADO</td>
        @elseif ($saldo->sicest == 'CMP')
          <td class="fs-2">COMPROMETIDO</td>
        @elseif ($saldo->sicest == 'REP')
          <td class="fs-2">PUNTO DE REPOSICION</td>
        @elseif ($saldo->sicest == 'RCH')
          <td class="fs-2">RECHAZADO</td>
        @elseif ($saldo->sicest == 'RXV')
          <td class="fs-2">RECHAZADO x VENCIMIENTO</td>
        @elseif ($saldo->sicest == 'CUA')
          <td class="fs-2">CUARENTENA</td>
        @elseif ($saldo->sicest == 'E/P')
          <td class="fs-2">PRODUCCION</td>
        @else
          <td class="fs-2">{{$saldo->sicest}}</td>
        @endif

        @if ($saldo->total < 0)
          <td class="text-end fs-2 text-danger">{{number_format($saldo->total, 2, ',', '.')}}</td>
        @else
          <td class="text-end fs-2">{{number_format($saldo->total, 2, ',', '.')}}</td>
        @endif

      </tr>
    @endforeach
  </tbody>
</table>
<a class="btn btn-primary btn-lg" href="{{url('ordenes')}}" role="button">Nueva Busqueda</a>

  </div>
@endsection
