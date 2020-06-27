<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>El Cronista - Landing Page Eventos DEMO</title>
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

<link rel="stylesheet" href="/estilo-eventos/assets/social/font.css">
<link rel="stylesheet" href="/estilo-eventos/assets/social/main.css">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>
<body>

  <div class="redes-bar2">
		<a href="{{$evento->facebook}}"target="_blank"><i class="fa fa-facebook-f"></i></a>
		<a href="{{$evento->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
    <a href="{{$evento->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
		<a href="{{$evento->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
		<!-- <a href="{{$evento->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> -->
	</div>
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
          <img style="margin-top:15px;width:150px;margin-left:20px;" src="/estilo-eventos/images-cronistas/ap_logo.png" alt="Apertura" title="Apertura">
          <img style="margin-top:15px;width:150px;margin-left:20px;" src="/estilo-eventos/images-cronistas/it_logo.png" alt="Info-Technology" title="Info-Technology">
          @if($sponsorDestacado!=null)
            <img style="margin-top:15px;width:150px;margin-left:20px;" src="/imagendesponsor/{{$sponsorDestacado->photos->first()->url}}" alt="Sponsor Destacado">
          @endif
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
              <ul class="navigation clearfix">
                <li class="current"><a href="#oradores">Oradores</a></li>
                <li><a href="{{url()->previous()}}">Volver</a></li>
              </ul>
            </div>
          </nav>

        </div>

      </div>
    </div>
  </div>

</header>




<section id="oradores" class="speakers-section pb-50 rpt-100 rpb-100" style="margin-top:300px">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4>{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E">Oradores</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <!-- <div class="col-lg-4 col-md-6">
        <div class="single-speaker radius">
          <div class="speaker-thumb">
            <img src="/estilo-eventos/images-cronistas/speaker1.png" alt="Speaker Image">
          </div>
          <div class="speaker-data">
            <h4><a href="#">Juan J. Llach</a></h4>
            <h6>Porfesor IAE Universidad Austral</h6>
            <div class="social-style-one">
              <a href="#"><i class="fa fa-facebook-f"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div> -->
        @foreach ($oradores as $orador)
        <div class="col-lg-4 col-md-6">
          <div class="single-speaker radius">
            <div class="speaker-thumb">
              <!-- <img src="/estilo-eventos/images-cronistas/speaker3.png" alt="Speaker Image"> -->
              @if ($orador->photos->count())
                <img  class="img-responsive" src="/imagendespeaker/{{$orador->photos->first()->url}}" alt="Oradores de Eventos El Cronista">
              @endif
            </div>
            <div class="speaker-data">
              <h4>{{$orador->nombre}}</h4>
              <h6>{{$orador->puesto}}</h6>
              <div class="social-style-one">
                <a href="{{$orador->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                <a href="{{$orador->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{$orador->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</section>


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
    <ul class="navigation clearfix">
      <li class="current"><a href="/">Home</a></li>
      <li><a href="{{url()->previous()}}">Volver</a></li>
      <li><a href="/"><u>Calendario</u></a></li>
    </ul>
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

@if (Session::has("ok-editar"))
  <script>
     notie.alert({
      type: 1,
      text: '¡Email recibido correctamente! Usted ya esta en la lista de preinscriptos para aprobación. Recibira un correo luego.',
      time: 12
    })
  </script>
@endif

</body>
</html>
