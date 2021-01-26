@extends('plantilla')

@section('titulo')
  Detalle
@endsection

@section('seccion')

  <div class="container">

    <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">ID REMITO</th>
            <th scope="col">CODIGO</th>
            <th scope="col">CANTIDAD</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($detalle as $remito)
              <tr>
                <td>{{$remito->rtocabe_id}}</td>
                <td>{{$remito->rdart}}</td>
                <td>{{number_format($remito->rdcan, 2, ',', '.')}}</td>
              </tr>
          @endforeach
        </tbody>

      </table>

  </div>

@endsection
