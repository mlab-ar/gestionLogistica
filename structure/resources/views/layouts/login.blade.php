<!DOCTYPE html>
<html lang="es">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>INGRESO/REGISTRO | Plataforma Logística</title>
      <link rel="stylesheet" type="text/css" href="/estilo-login/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/estilo-login/css/fontawesome-all.min.css">
      <link rel="stylesheet" type="text/css" href="/estilo-login/css/iofrm-style.css">
      <link rel="stylesheet" type="text/css" href="/estilo-login/css/iofrm-theme17.css">

      @foreach(App\Blog::first()->get() as $configuraciones)
        <link rel="icon" type="image/png" href="{{$configuraciones->icono}}" sizes="32x32">
      @endforeach

  </head>

  <body>

      @yield('content')

      <script src="/estilo-login/js/jquery.min.js"></script>
      <script src="/estilo-login/js/popper.min.js"></script>
      <script src="/estilo-login/js/bootstrap.min.js"></script>
      <script src="/estilo-login/js/main.js"></script>

  </body>

</html>
