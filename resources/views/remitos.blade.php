@extends('plantilla')

@section('titulo')
  Remitos
@endsection

@section('seccion')
<div class="conte mt-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">REMITO</th>
        <th scope="col">FECHA</th>
        <th scope="col">EMPRESA</th>
        <th scope="col">CLIENTE</th>
        <th scope="col">DOMICILIO</th>
        <th scope="col">LOCALIDAD</th>
        <th scope="col">PROVINCIA</th>
        <th scope="col">POSTAL</th>
        <th scope="col">PEDIDO</th>


      </tr>
    </thead>

    <tbody>
      <ul class="list-group">
        @foreach ($errors->all() as $error)
          <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
      </ul>
        @foreach ($remitos as $remito)
        <tr>
          <td>
            <div class="d-flex">
              <div class="margen">
                <a class="btn btn-primary" href="{{ url('remitosdetalle/' . $remito->id )}}" role="button">ITEMS</a>
              </div>
              <form class="margen" action="{{ url('remitosrotulo')}}" method="post">
                @csrf
                  <input type="image" class="btn btn-warning" name="cantidad" value="" src={{asset('assets/img/rotulo_1.png')}} width="50">
                  <input type="hidden" name="id" value="{{$remito->id}}">
                  <input type="hidden" name="dgi" value="{{$remito->rtdgi}}">
                  <input type="hidden" name="domicilio" value="{{$remito->rtdom}}">
                  <input type="hidden" name="bultos" value="{{$remito->totalBultos()}}">
                  <input type="hidden" name="localidad" value="{{$remito->rtloc}}">
                  <input type="hidden" name="provincia" value="{{$remito->rtpro}}">
                  <input type="hidden" name="cliente" value="{{$remito->mcrazo}}">
                  <input type="hidden" name="compania" value="{{$remito->rtcia}}">
                  <input type="hidden" name="postal" value="{{$remito->rtpos}}">
              </form>

              <form class="" action="{{ url('remitosimprimir')}}" method="post">
                @csrf
                  <input type="image" class="btn btn-warning" name="cantidad" value="" src={{asset('assets/img/etiqueta.png')}} width="50">
                  <input type="string" name="etiquetas" value="" size="1" maxlength="3">
                  <input type="hidden" name="id" value="{{$remito->id}}">
                  <input type="hidden" name="dgi" value="{{$remito->rtdgi}}">
                  <input type="hidden" name="domicilio" value="{{$remito->rtdom}}">
                  <input type="hidden" name="bultos" value="{{$remito->totalBultos()}}">
                  <input type="hidden" name="localidad" value="{{$remito->rtloc}}">
                  <input type="hidden" name="provincia" value="{{$remito->rtpro}}">
                  <input type="hidden" name="cliente" value="{{$remito->mcrazo}}">
                  <input type="hidden" name="compania" value="{{$remito->rtcia}}">
                  <input type="hidden" name="postal" value="{{$remito->rtpos}}">
              </form>
            </div>

            </td>




            <td>{{$remito->rtdgi}}</td>
            <td>{{$remito->fecha()}}</td>
            <td>{{$remito->empresaremito()}}</td>
            <td>{{$remito->mcrazo}}</td>
            <td>{{$remito->rtdom}}</td>
            <td>{{$remito->rtloc}}</td>
            <td>{{$remito->rtpro}}</td>
            <td>{{$remito->rtpos}}</td>
            <td>{{$remito->rtped}}</td>




            {{-- <td>{{$remito->totalBultos()}}</td> --}}


          </tr>
        @endforeach

    </tbody>
  </table>

</div>

@endsection
