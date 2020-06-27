<!DOCTYPE html>

<html lang="es">


@foreach($blog as $opcion)
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>{{$opcion->titulo}} | Panel de Control</title>

    <link rel="icon" type="image/png" href="/{{$opcion->icono}}" sizes="32x32">
    <link rel="stylesheet" href="/lay-admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/lay-admin/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/css/plugins/tagsinput.css">
  	<link rel="stylesheet" href="/css/plugins/summernote.css">
  	<link rel="stylesheet" href="/css/plugins/notie.css">

    @stack('styles')

  </head>
  <body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admin/dashboard" class="nav-link">Dashboard</a>
        </li>

      </ul>

      <!-- SEARCH FORM
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>-->


      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.logistica.index', auth()->user()->id )}}" title="Cargar Registro">
            <i class="fas fa-cloud-upload-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" title="Settings">
            <i class="fas fa-user-cog"></i>

          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Usuario : {{ auth()->user()->name }}</span>
            <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-user-circle mr-2"></i> Mi perfil
              </a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
              >
                <i class="fas fa-sign-in-alt mr-2"></i>{{ __("Cerrar sesión") }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            <div class="dropdown-divider"></div>

          </div>
        </li>

      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="/" title="Ir a la landing"target="_blank" class="brand-link">
        <img src="/lay-admin/dist/img/logo-credi.png" alt="CrediHub Logo" class="brand-image img-circle elevation-2"
             style="opacity: .8">
        <span class="brand-text font-weight-dark">LOGISTICA</span>
      </a>

      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/lay-admin/dist/img/secrojas.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>

         @include('admin.partials.nav')

      </div>

    </aside>

        <div class="content-wrapper">

          <section class="content container-fluid">
            @if(session()->has('flash'))
              <br/>
              <div class="alert alert-info" role="alert">{{ session('flash') }}</div>
            @endif

            @if(session()->has('flash2'))
              <br/>
              <div class="alert alert-warning" role="alert">{{ session('flash2') }}</div>
            @endif

          </section>

          @yield('content')

        </div>

        <footer class="main-footer">
          <div class="float-right d-none d-sm-inline">
            Versión 1.0.1.6
          </div>
          <strong>Copyright &copy; 2020 <a href="https://api.whatsapp.com/send?phone=5492233000747" target="_blank">secrojas</a>.</strong> Todos los derechos reservados.
        </footer>

      </div>

      <script src="/lay-admin/plugins/jquery/jquery.min.js"></script>

      <script src="/js/plugins/notie.js"></script>
      <script src="/lay-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/lay-admin/dist/js/adminlte.min.js"></script>

      <script src="/js/plugins/tagsinput.js"></script>
      <script src="/js/plugins/summernote.js"></script>


      <script src="/js/codigo.js"></script>

      @stack('scripts')

      <script>

          $("#editarAdministrador").modal("show");
        
      </script>


    </body>
  @endforeach
</html>
