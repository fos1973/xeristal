@extends('plantilla')

@section('titulo')
  Etiquetas
@endsection

@section('seccion')
<div class="container mt-5 w-50">


      <ul class="list-group">
        @foreach ($errors->all() as $error)
          <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
      </ul>

      <div class="mb-3">
      </div>


  <form class="row g-3 imprimir" action="{{url('eti')}}" method="post">
    @csrf
      <div class="col-12">
        {{-- <label for="inputAddress2" class="form-label">Cliente</label> --}}
        <input type="text" name="cliente" class="form-control" id="inputAddress2" placeholder="Cliente" value="{{old("cliente")}}">
      </div>
       <div class="col-md-8">
        {{-- <label for="inputEmail4" class="form-label">Domicilio</label> --}}
        <input type="text" name="domicilio" class="form-control" id="inputEmail4" value="{{old("domicilio")}}" placeholder="Domicilio">
      </div>
      <div class="col-md-4">
        <input type="text" name="localidad" class="form-control" id="inputPassword4" value="{{old("localidad")}}" placeholder="Localidad">
      </div>
      <div class="col-md-4">
        <input type="text" name="provincia" class="form-control" id="inputPassword4" value="{{old("provincia")}}" placeholder="Provincia">
      </div>
      <div class="col-md-2">
        {{-- <label for="inputCity" class="form-label">Bultos</label> --}}
        <input type="text" name="bultos" class="form-control" id="inputCity" placeholder="Bultos">
      </div>
      <div class="col-md-2">
        {{-- <label for="inputZip" class="form-label">Etiquetas</label> --}}
        <input type="text" name="etiquetas" class="form-control" id="inputZip" placeholder="Etiquetas">
      </div>
      <div class="col-md-3">
        {{-- <label for="inputZip" class="form-label">Etiquetas</label> --}}
        <input type="text" name="remito" class="form-control" id="inputZip" placeholder="Remito">
      </div>
      <div class="col-2">
        <button type="submit" onclick="mostrar()"  class="btn btn-primary">Enviar</button>
      </div>
  </form>

  @if (!$errors->any())

    <script>
      function mostrar(){
      swal("Impresion enviada", "You clicked the button!", "success")};
    </script>
  @endif
@endsection

@section('js')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
