@extends('plantilla')

@section('titulo')
  Articulos
@endsection

@section('seccion')
  <div class="container mt-5">
    <form action="{{url('articulo')}}" method="GET">
      @csrf
      <div class="mb-3 mb-4  w-25">
        <label for="exampleInputEmail1" class="form-label"><h2>Codigo de Articulo</h1></label>
        <input type="text" class="form-control" placeholder="Codigo" name="codigo">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



  </div>
@endsection
