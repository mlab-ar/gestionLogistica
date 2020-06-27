
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Eventos El Cronista - Landing Page</title>
<link rel="shortcut icon" href="https://workana.secrojas.com/estilo-eventos/images-cronistas/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/estilo-eventos/assets/css/flaticon.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/icomoon-font.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/animate.min.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/custom-animation.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/magnific-popup.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/nice-select.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/bootstrap-v4.1.3.min.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/global.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/mainmenu.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/style.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/estilo.css">
<link rel="stylesheet" href="/estilo-eventos/assets/css/responsive.css">
<link rel="stylesheet" href="/css/plugins/notie.css">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<!-- Botones REDES SOCIALES-->

<link rel="stylesheet" href="/estilo-eventos/assets/social/font.css">
<link rel="stylesheet" href="/estilo-eventos/assets/social/main.css">


</head>
<body>




<div class="page-wrapper">

<div class="preloader"></div>

<header class="main-header">

  <div class="header-upper" style="background-color:white;height:70px;
                              border-radius: 10px 10px 10px 10px;
                              -moz-border-radius: 10px 10px 10px 10px;
                              -webkit-border-radius: 10px 10px 10px 10px;
                              border: 0px solid white;">
    <div class="container clearfix">
      <div class="header-inner d-lg-flex align-items-center">
        <div class="logo-outer">
          <div  class="logo">
            <a href="/">
              <img style="margin-top:15px;width:80%" src="/estilo-eventos/images-cronistas/ecc_logo.png" alt="El Cronista" title="El Cronista"></a>
            </a>
          </div>
        </div>
        <div class="nav-outer clearfix ml-auto" id="logos">
          <a href="/"><img style="margin-top:15px;width:150px;margin-left:20px;" src="/estilo-eventos/images-cronistas/ap_logo.png" alt="Apertura" title="Apertura"></a>
          <a href="/"><img style="margin-top:15px;width:150px;margin-left:20px;" src="/estilo-eventos/images-cronistas/it_logo.png" alt="Info-Technology" title="Info-Technology"></a>

        </div>
        <div class="menu-btn">

        </div>
      </div>
    </div>
  </div>

  <div class="header-upper" style="margin-top:30px">
    <div class="container clearfix">
      <div class="header-inner d-lg-flex align-items-center">
        <div class="logo-outer">
          <div class="logo"><a href="/"><img src="/estilo-eventos/images-cronistas/logo.png" alt="" title=""></a></div>
        </div>
        <div class="nav-outer clearfix ml-auto">

          <nav class="main-menu navbar-expand-lg">
            <div class="navbar-header clearfix">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            </div>
            <div class="navbar-collapse collapse clearfix">
              <!-- <ul class="navigation clearfix">
                <li class="current"><a href="#oradores" style="font-family: 'Roboto';">Oradores</a></li>
                <li><a href="#agenda" style="font-family: 'Roboto';">Agenda</a></li>
                <li><a href="#blog" style="font-family: 'Roboto';">Blog</a></li>
                <li><a href="#contacto" style="font-family: 'Roboto';">Ubicación</a></li>
              </ul> -->
            </div>
          </nav>

        </div>
        <div class="menu-btn">
          <!-- <a href="#inscripcion" class="btn-bg" style="font-family: 'Roboto';">INSCRIBITE</a> -->
        </div>
      </div>
    </div>
  </div>

</header>

<section class="banner-section" style="background-image:url(/estilo-eventos/assets/img/bg/banner.png);">
  <div class="container">
    <div class="banner-inner text-center">
      <!-- <h2 class="page-title" style="font-family: 'Roboto';">Eventos Corporativos</h2> -->
    </div>
  </div>
</section>

<div class="blog-grid-section pt-145 pb-140 rpt-100 rpb-90">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="font-family: 'Roboto';">Calendario 2020</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="font-family: 'Roboto';">Eventos Corporativos</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          @foreach ($eventos as $evento)
          <div class="col-lg-6 col-sm-6">
            <div class="single-news-block bg-color-two radius mb-30">
              @if ($evento->destacado=='SI')
                <a href="{{ route('landing',$evento) }}">
                  <div class="blog-thumb">
                    @if ($evento->photos->count())
                      <img  class="img-responsive" src="/imagendeevento/{{$evento->photos->first()->url}}" alt="Calendario de Eventos | El Cronista">
                    @endif
                  </div>
                </a>
              @else
                <div class="blog-thumb">
                  @if ($evento->photos->count())
                    <img  class="img-responsive" src="/imagendeevento/{{$evento->photos->first()->url}}" alt="Calendario de Eventos | El Cronista">
                  @endif
                </div>
              @endif

              <div class="news-inner">
                <span class="post-date" style="font-family: 'Roboto';">
                  @if ($evento->destacado=='SI')
                    <a href="{{ route('landing',$evento) }}" style="text-decoration:none;color:#E93580">
                      {{$evento->nombre_destacado}}
                    </a>
                  @else
                    {{$evento->nombre_destacado}}
                  @endif
                </span>
                <br/>
                <span class="post-date" style="font-family: 'Roboto';">{{$evento->published_at->format('d/M/Y')}}</span>
                <h5>
                  @if ($evento->destacado=='SI')
                    <a href="{{ route('landing',$evento) }}" style="font-family: 'Roboto';">{{$evento->nombre}}</a>
                  @else
                    {{$evento->nombre}}
                  @endif
                </h5>
                <div class="news-text">
                  <p style="font-family: 'Roboto';">{!!$evento->descripcion!!}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4">
        <div class="sidebar">
          <div class="widget">
            <h5 class="title" style="font-family: 'Roboto';">2020</h5>
            <div class="category-widget">
              <ul>
                @foreach ($eventos as $evento)
                  @if ($evento->destacado=='SI')
                    <li><a href="{{ route('landing',$evento) }}" style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</a></li>
                  @else
                    <li><a href="#" style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</a></li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer pt-285">
<div class="container">
<div class="row justify-content-center">

 </div>
<div class="footer-bottom pt-25 pb-25">
<div class="row">
<div class="col-lg-5 text-center text-lg-left">
<div class="copyright" style="font-family: 'Roboto';">Eventos Corporativos El Cronista | Todos los derechos reservados.</div>
</div>
<div class="col-lg-7 text-center text-lg-right">
  <div class="footer-menu">
    <!-- <ul class="navigation clearfix">
      <li class="current"><a href="/" style="font-family: 'Roboto';">Home</a></li>
      <li><a href="#oradores" style="font-family: 'Roboto';">Oradores</a></li>
      <li><a href="#agenda" style="font-family: 'Roboto';">Agenda</a></li>
      <li><a href="#blog" style="font-family: 'Roboto';">Blog</a></li>
      <li><a href="#contacto" style="font-family: 'Roboto';">Ubicación</a></li>
      <li><a href="#" style="font-family: 'Roboto';"><u>Calendario</u></a></li>
    </ul> -->
  </div>
</div>
</div>
</div>
</div>
</footer>


<button class="scroll-top scroll-to-target" data-target="html">
<span class="fa fa-angle-up"></span>
</button>
</div>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/estilo-eventos/assets/js/jquery-3.3.1.min.js"></script>
<script src="/estilo-eventos/assets/js/popper-v1.14.3.min.js"></script>
<script src="/estilo-eventos/assets/js/bootstrap-v4.1.3.min.js"></script>
<script src="/estilo-eventos/assets/js/owl.carousel.min.js"></script>
<script src="/estilo-eventos/assets/js/jquery.nice-select.min.js"></script>
<script src="/estilo-eventos/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/estilo-eventos/assets/js/wow.min.js"></script>
<script src="/estilo-eventos/assets/js/main.js"></script>

<script src="/js/plugins/notie.js"></script>


</body>
</html>
