@extends('plantilla')

@section('titulo')
  Etiquetas
@endsection

@section('seccion')
<div class="container mt-5 w-50">

  <form class="row g-3" action="{{url('eti')}}" method="post">
    @csrf
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Cliente</label>
      <input type="text" name="cliente" class="form-control" id="inputAddress2" placeholder="">
    </div>
       <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Domicilio</label>
        <input type="text" name="domicilio" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">Provincia</label>
        <input type="text" name="provincia" class="form-control" id="inputPassword4">
      </div>
      <div class="col-md-2">
        <label for="inputCity" class="form-label">Bultos</label>
        <input type="text" name="bultos" class="form-control" id="inputCity">
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Etiquetas</label>
        <input type="text" name="etiquetas" class="form-control" id="inputZip">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
  </form>
</div>
@endsection
