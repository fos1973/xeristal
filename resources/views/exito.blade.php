@extends('plantilla')

@section('titulo')
  Exito
@endsection


@section('seccion')

    <script>
    // window.location = "{{ url('/cia') }}";

    Swal.fire(
            'Impresion enviada',
            '',
            'success');

    </script>

@endsection
