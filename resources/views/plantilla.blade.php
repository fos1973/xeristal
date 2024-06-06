<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">


    <title>@yield('titulo')</title>
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  {{-- <script src="/js/pg.js"></script> --}}



    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Xeristal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{url('plantilla')}}">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{url('deposito')}}">Deposito</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{url('devoluciones')}}">Devoluciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{url('pickeo')}}">Pickeo</a>
                </li>


                @if (Auth::user()->rol->nombre == "Administrador")
                  <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('register') }}">{{ __('Registro') }}</a>
                  </li>
                @endif

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Expedicion
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('salidas')}}">Salidas</a></li>
                    <li><a class="dropdown-item" href="{{url('cia')}}">Remitos</a></li>
                    <li><a class="dropdown-item" href="{{url('eticrear')}}">Rotulos Manuales</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Planificacion
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="{{url('ordenes')}}">Saldo de articulos</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/EXT')}}">Programacion EXTRUSION</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/POM')}}">Programacion POMOS</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/OFF')}}">Programacion OFFSET</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/IMP')}}">Programacion SERIGRAFIA</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/EMB')}}">Programacion EMBALADO</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/INY')}}">Programacion TAPAS</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('programacion/SOP')}}">Programacion SOPLADO</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('/programacionArmados')}}">Programacion ARMADOS</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{url('listaproductos')}}">Productos</a>
                </li>

              </ul></p>
            </div class="container-fluid">
              <ul class="navbar-nav">
                    <li class="nav-item la in">{{ Auth::user()->rol->nombre}}</li>
                    <li class="nav-item la in">{{ Auth::user()->name }}</li>
                    <li class="nav-item in"><a class="in" href="{{url('logout')}}">Logout</a></li>
            </ul>
        </div>
      </nav>

    <section>
      @yield('seccion')
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> --}}
    @yield('js')
  </body>
</html>
