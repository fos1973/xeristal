@extends('plantilla')

@section('titulo')
  Exito
@endsection


@section('seccion')

    <script>
    Swal.fire(
            'Impresion enviada',
            '',
            'success');

    window.location = "{{ url('/cia') }}";
    </script>

@endsection
