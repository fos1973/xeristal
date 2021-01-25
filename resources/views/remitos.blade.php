@extends('plantilla')

@section('titulo')
  Remitos
@endsection

@section('seccion')
  <div class="container mt-4">


  <table class="table table-striped">

    <thead>
      <tr>
        <th scope="col">REMITO</th>
        <th scope="col">EMPRESA</th>
        <th scope="col">DOMICILIO</th>
        <th scope="col">LOCALIDAD</th>
        <th scope="col">CODIGO POSTAL</th>
        <th scope="col">PEDIDO</th>




      </tr>
    </thead>

    <tbody>

        @foreach ($remitos as $remito)
          <tr>
            <td><a class="btn btn-primary" href="etiquetas/{{$remito->id}}" role="button">{{$remito->rtdgi}}</a></td>
            <td>{{$remito->empresaremito()}}</td>
            <td>{{$remito->rtdom}}</td>
            <td>{{$remito->rtloc}}</td>
            <td>{{$remito->rtpos}}</td>
            <td>{{$remito->rtped}}</td>
            
          </tr>
        @endforeach

    </tbody>
  </table>

</div>

@endsection
