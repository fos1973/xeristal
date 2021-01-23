@extends('plantilla')

@section('titulo')
  Exito
@endsection

@section('js')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
          swal("Good job!", "You clicked the button!", "success");
    </script>
    @php
    return redirect ('eticrear')
    @endphp

@endsection
