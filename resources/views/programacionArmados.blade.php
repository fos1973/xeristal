{{-- @extends('plantilla')

@section('titulo')
  Programacion
@endsection

@section('seccion') --}}

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>

    <seccion class="">

      <table class="table">
              <thead>
                  <tr>
                    <th scope="col">ARMADO</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">SOPLADO</th>
                    <th scope="col">TAPAS</th>
                    <th scope="col">EXTRUSION</th>
                    <th scope="col">POMOS</th>
                    <th scope="col">OFFSET</th>
                    <th scope="col">SERIGRAFIA</th>
                    <th scope="col">EMBALADO</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($agrupados as $armado)

                  <tr>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['codigoArmado']) {{$armado["codigoArmado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['descripcion']) {{$armado["descripcion"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>
                    <td>
                      <div class="">
                        @isset($armado['armado']) {{$armado["armado"]}} @endisset
                      </div>
                    </td>

                  </tr>


                @endforeach
              </tbody>
      </table>




            @foreach ($agrupados as $ag)




            @endforeach


      <script type="text/javascript">
        function actualizar(){location.reload(true);}
        //Función para actualizar cada 4 segundos(4000 milisegundos)
        setInterval("actualizar()",300000);
      </script>

    </seccion>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>










{{-- @endsection --}}
