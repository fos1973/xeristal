@extends('plantilla')

@section('titulo')
  Productos
@endsection

@section('seccion')
<div class="container mt-5 d-flex">
  <div class="p-2 w-25">
      <form class="" action="{{url('productoseleccion')}}" method="GET">
        @csrf
        <div class="">
          <label for="exampleInputEmail1" class="form-label"><h4>BUSCAR ARTICULO</h4></label>
            <div class="w-75">
              <input type="text" class="form-control " placeholder="Codigo" name="codigo">
              <button type="submit" class="btn btn-primary mt-2">Enviar</button>
            </div>
        </div>
      </form>
  </div>

  <div class="w-75">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">CODIGO</th>
        <th scope="col">DESCRIPCION</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($productos as $producto)
      <tr>
        <td>
          <div class="btn btn-primary w-50">
            <a class="text-white text-decoration-none" href="{{ url('productos/' . $producto->mpprod )}}">{{$producto->mpprod}}</a></td>
          </div>
        <td>{{$producto->mpdesc}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $productos->links() }}
  </div>
</div>

@endsection
