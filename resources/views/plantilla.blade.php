<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>@yield('titulo')</title>
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
                      <a class="dropdown-item" href="{{url('ordenes')}}">Ordenes por articulo</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href=""><a>
                    </li>
                    <li>
                        <a class="dropdown-item" href=""></a>
                    </li>
                  </ul>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    @yield('js')
  </body>
</html>
