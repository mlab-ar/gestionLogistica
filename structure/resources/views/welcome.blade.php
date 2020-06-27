
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
                <li><a href="#agenda" style="font-family: 'Roboto';">Agenda</a></li>
                <li><a href="#oradores" style="font-family: 'Roboto';">Oradores</a></li>
                <li><a href="#blog" style="font-family: 'Roboto';">Cobertura</a></li>
                <li><a href="#contacto" style="font-family: 'Roboto';">Ubicación</a></li>
              </ul>
            </div>
          </nav>

        </div>
        <div class="menu-btn">
          <a href="#inscripcion" class="btn-bg" style="font-family: 'Roboto';">INSCRIBITE</a>
        </div>
      </div>
    </div>
  </div>

</header>

<!--  -->

<!--SECCION FORMULARIO-->

@if ($evento->photos->count()>1)
  <section class="hero-section pt-100 pb-100 rpt-145 rpb-100" style="background-image:url(/imagendeevento/{{$evento->photos->last()->url}});">
@else
  <section class="hero-section pt-100 pb-100 rpt-145 rpb-100" style="background-image:url(/estilo-eventos/images-cronistas/hero-bg.png);">
@endif
<div class="container">
<div class="row">
<div class="col-lg-7" style="margin-top:300px">
  <div class="hero-text">
    <p style="font-family: 'Roboto';font-weight:bold;color:white;font-size:40px;color:#ED388E">{{$evento->nombre_destacado}}</p>

    <p style="font-family: 'Roboto';font-weight:bold;line-height:40px;color:white;font-size:44px;">{{$evento->nombre}}</p>

    <p style="font-family: 'Roboto';font-weight:bold;line-height:35px;color:white;font-size:35px;">
      {!!$evento->descripcion!!}
    </p>
  </div>
<!-- <div class="coming-soon">
  <div class="time-countdown">
    <ul>
      <li class="count-bg-one radius"><span id="days"></span>Days</li>
      <li class="count-bg-two radius"><span id="hours"></span>Hours</li>
      <li class="count-bg-three radius"><span id="minutes"></span>Minutes</li>
      <li class="count-bg-four radius"><span id="seconds"></span>Seconds</li>
    </ul>
  </div>
</div> -->
</div>
<div class="col-lg-5" style="margin-top:150px">
<div class="register-wrap radius">

<form id="inscripcion" name="inscripcion" action="{{route('contactos.store',$evento)}}" method="post">
  {{csrf_field()}}
  <input type="hidden" id="subject" name="subject" value="Solicitud de preinscripción">
  <div class="row clearfix">
    <div class="col-md-12 text-center">
      <h3 style="font-family: 'Roboto';">Inscribite Ahora</h3>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="nombre" class="form-control radius" placeholder="Nombre" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="apellido" class="form-control radius" placeholder="Apellidos" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="ticket-number-box clearfix">
          <select name="sexo" id="sexo" class="radius">
            <option value="sexo">Sexo</option>
            <option value="FEMENINO">FEMENINO</option>
            <option value="MASCULINO">MASCULINO</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="empresa" class="form-control radius" placeholder="Empresa" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="ticket-number-box clearfix">
          <select name="cargo" id="cargo" class="radius">
            <option value="Cargo">Cargo</option>
            <option value="CEO">CEO</option>
            <option value="Presidente">Presidente</option>
            <option value="Vicepresidente">Vicepresidente</option>
            <option value="Director General">Director General</option>
            <option value="Director">Director</option>
            <option value="Gerente">Gerente</option>
            <option value="Jefe/Responsable">Jefe/Responsable</option>
            <option value="Analista">Analista</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
      </div>
    </div>

    <!-- <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="area" class="form-control radius" placeholder="Área" required>
      </div>
    </div> -->

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="dni" class="form-control radius" placeholder="DNI" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="ticket-number-box clearfix">
          <select name="edad" id="edad" class="radius">
            <option value="Edad">Edad</option>
            <option value="Menor de 18">Menor de 18</option>
            <option value="18-24">18-24</option>
            <option value="25-34">25-34</option>
            <option value="35-44">35-44</option>
            <option value="45-54">45-54</option>
            <option value="55-64">55-64</option>
            <option value="65 o mayor">65 ó mayor</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <div class="ticket-number-box clearfix">
          <select name="provincia" id="provincia" class="radius">
            <option value="Provincia">Provincia</option>
            <option value="Buenos Aires">Buenos Aires</option>
            <option value="CABA">CABA</option>
            <option value="Catamarca">Catamarca</option>
            <option value="Chaco">Chaco</option>
            <option value="Chubut">Chubut</option>
            <option value="Córdoba">Córdoba</option>
            <option value="Corrientes">Corrientes</option>
            <option value="Entre Ríos">Entre Ríos</option>
            <option value="Formosa">Formosa</option>
            <option value="Jujuy">Jujuy</option>
            <option value="La Pampa">La Pampa</option>
            <option value="La Rioja">La Rioja</option>
            <option value="Mendoza">Mendoza</option>
            <option value="Misiones">Misiones</option>
            <option value="Neuquén">Neuquén</option>
            <option value="Río Negro">Río Negro</option>
            <option value="Salta">Salta</option>
            <option value="San Juan">San Juan</option>
            <option value="San Luis">San Luis</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Santa Fe">Santa Fe</option>
            <option value="Santiago del Estero">Santiago del Estero</option>
            <option value="Tierra del Fuego">Tierra del Fuego</option>
            <option value="Tucumán">Tucumán</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="localidad" class="form-control radius" placeholder="Localidad" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="telefono" class="form-control radius" placeholder="Teléfono" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="celular" class="form-control radius" placeholder="Celular" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="email" name="email" class="form-control radius" placeholder="Mail Corporativo" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <input type="text" name="web" class="form-control radius" placeholder="Sitio Web de la Empresa" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group mb-0 text-center">
        <button class="btn-bg" type="submit" style="font-family: 'Roboto';">INSCRIBITE</button>
      </div>
    </div>
  </div>
</form>

</div>
</div>
</div>
</div>
</section>

<!--  -->

<!--SECCION SPONSORS-->

<div style="background-color:white" class="sponsors-section pt-145 pb-150 rpt-100 rpb-100">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="color:#2A1F75;font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">Sponsors</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="logo-wrap text-center">
          @foreach ($sponsors as $sponsor)
            <a href="#">
              <img  style="width:200px;"  src="/imagendesponsor/{{$sponsor->photos->first()->url}}" alt="Eventos El Cronista - Sponsors" />
              <img  style="width:200px;"  src="/imagendesponsor/{{$sponsor->photos->first()->url}}" alt="Eventos El Cronista - Sponsors" />
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!--  -->

<!--SECCION VIDEO - SOLO TEXTO-->

<section class="special-monent-section bg-color-two  pb-50 rpt-100 rpb-100">
  <div class="container">
    <!-- <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">
              Momentos Especiales<br>
              Edición 2019
            </h2>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row">
      @if($video != NULL)
      <div class="col-lg-12">
        <!-- <div class="vedio-inner">
          @if($video->photos->count())
            <img  class="img-responsive" src="/imagendevideo/{{$video->photos->first()->url}}" alt="Eventos El Cronista - Video Institucional Portadas" />
          @endif

          <div class="vedio-button">
            <a href="{{$video->link}}" class="mfp-iframe vedio-play"><i class="icon icon-play-button"></i><span class="ripple"></span></a>
          </div>
        </div> -->
        <p style="margin-top:60px;color:white;text-align:center;font-family: 'Roboto';">
          {!!$video->texto!!}
        </p>
      @endif
      </div>
    </div>
  </div>
</section>

<!--  -->

<!--SECCION ORADORES -->

<section id="oradores" class="speakers-section pt-50 pb-50 rpt-100 rpb-100">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">Oradores</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

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
            <h4 style="font-family: 'Roboto';">{{$orador->nombre}}</h4>
            <h6 style="font-family: 'Roboto';">{{$orador->puesto}}</h6>
            <div class="social-style-one">
              <a href="{{$orador->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
              <a href="{{$orador->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="{{$orador->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <div class="col-lg-12">
        <div class="more-btn-wrap text-center">
          <a href="{{ route('oradores',$evento) }}" class="btn-bg" style="font-family: 'Roboto';">MÁS ORADORES</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--  -->

<!--SECCION AGENDA -->

<section id="agenda" class="schedule-section pt-50 pb-50 rpt-100 rpb-100">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">Agenda</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="schdule-tab-wrapper">

          <div class="tab-content">

            <div id="day-one" class="tab-pane active">
              <div id="day-one-accordion">

                @foreach ($agenda as $registro)
                  @if ($registro->speaker_id == 0)
                    <div class="single-schedule-item radius item-one bg-color-two">
                      <div class="row align-items-center">
                        <div class="col-lg-5">
                          <div class="schedule-speaker-member d-flex align-items-center">
                            <div class="schedule-speaker-thumb">

                            </div>
                            <div class="schedule-speaker-deg">

                                <h5 style="font-family: 'Roboto';">{{$registro->nombre}} </h5>
                                @if($registro->moderadores != '')
                                  <p style="font-family: 'Roboto';">Modera: {{$registro->moderadores}}</p>
                                @endif

                            </div>
                          </div>
                        </div>
                        <div class="col-lg-5">
                          <div id="day-one-headingTwo" class="schedule-short-content schedule-short-two">
                          </div>
                        </div>
                        <div class="col-lg-2 schedule-date-wrap bg-color-three d-flex align-items-center align-self-stretch">
                          <div class="schedule-speaker-date">
                            <span class="time" style="font-family: 'Roboto';">{{$registro->hora_inicio}} - {{$registro->hora_fin}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="single-schedule-item radius item-two bg-color-two">
                      <div class="row align-items-center">
                        <div class="col-lg-5">
                          <div class="schedule-speaker-member d-flex align-items-center">
                            <div class="schedule-speaker-thumb">
                              @if($evento->imagen_agenda=='SI')
                                @if (App\Speaker::find($registro->speaker_id)->photos->count())
                                  <img  class="img-responsive" src="/imagendespeaker/{{App\Speaker::find($registro->speaker_id)->photos->first()->url}}" alt="Speaker Image" style="min-width:130px;max-width:130px">
                                @endif
                              @endif
                              <!-- @if (App\Speaker::find($registro->speaker_id)->photos->count())
                            		<img  class="img-responsive" src="/imagendespeaker/{{App\Speaker::find($registro->speaker_id)->photos->first()->url}}" alt="Speaker Image" style="min-width:130px;max-width:130px">
                          		@endif -->
                            </div>
                            <div class="schedule-speaker-deg">
                              <h4 style="font-family: 'Roboto';">{{App\Speaker::find($registro->speaker_id)->nombre}}</h4>
                              <h6 style="font-family: 'Roboto';">{{App\Speaker::find($registro->speaker_id)->puesto}}</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-5">
                          <div id="day-one-headingTwo" class="schedule-short-content schedule-short-two">
                          </div>
                        </div>
                        <div class="col-lg-2 schedule-date-wrap bg-color-three d-flex align-items-center align-self-stretch">
                          <div class="schedule-speaker-date">
                            <span class="time" style="font-family: 'Roboto';">{{$registro->hora_inicio}} - {{$registro->hora_fin}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--  -->

<!--SECCION CONTACTO -->

<div  id="contacto" class="venue-section bg-color-two pt-50 pb-50 rpt-100 rpb-100">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
           <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">Ubicación</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="contact-site">
          <div class="contact-item">
            <div class="contact-info address">
              <h5 style="font-family: 'Roboto';">Lugar</h5>
              <div class="info">
                <i class="fa fa-map-marker"></i>
                <span style="font-family: 'Roboto';">{{$evento->lugar_linea1}}, <br>{{$evento->lugar_linea2}}</span>
              </div>
            </div>
            <div class="contact-info number">
              <h5 style="font-family: 'Roboto';">Contacto</h5>
              <div class="info">
                <i class="fa fa-phone"></i>
                <span style="font-family: 'Roboto';">{{$evento->tel1}} <br>{{$evento->tel2}}</span>
              </div>
            </div>
            <div class="contact-info email">
              <div class="info">
                <i class="fa fa-envelope"></i>
                <span><a href="mailto:{{$evento->email}}" class="__cf_email__" style="text-decoration:none;color:inherit;font-family: 'Roboto';">{{$evento->email}}</a></span>
              </div>
            </div>
            <!-- <div class="contact-social-info">
              <div class="social-style-one">
              <a href="{{$evento->facebook}}"><i class="fa fa-facebook-f"></i></a>
              <a href="{{$evento->twittier}}"><i class="fa fa-twitter"></i></a>
              <a href="{{$evento->instagram}}"><i class="fa fa-instagram"></i></a>
              <a href="{{$evento->youtube}}"><i class="fa fa-youtube"></i></a>
              <a href="{{$evento->linkedin}}"><i class="fa fa-linkedin"></i></a>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="map-site">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14709.912151828446!2d89.5403187!3d22.82179695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1570748232408!5m2!1sen!2sbd" style="border:0;" allowfullscreen=""></iframe> -->
          {!!$evento->script_mapa!!}
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3906.5425850043252!2d-58.421936667024276!3d-34.57892586947293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb59cd6452553%3A0x6b521307d135059a!2sLa%20Rural!5e0!3m2!1ses!2sar!4v1580413980464!5m2!1ses!2sar" style="border:0;" allowfullscreen=""></iframe> -->
        </div>
      </div>
    </div>
  </div>
</div>

<!--  -->

<!--SECCION VIDEO -->

<section class="special-monent-section bg-color-two pt-145 pb-50 rpt-100 rpb-100">
  <div class="container">
    <div class="section-title">
      <div class="row">
        <div class="col-lg-6">
          <div class="sec-left">
            <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sec-right">
            <h2 style="color:#ED388E;font-family: 'Roboto';">
              @if($video != NULL)
                {{$video->titulo}}
              @else
                Ediciones anteriores
              @endif
            </h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      @if($video != NULL)
      <div class="col-lg-12">
        <div class="vedio-inner">
          <!-- <img src="/estilo-eventos/images-cronistas/video-thumb.png" alt=""> -->
          @if($video->photos->count())
            <img  class="img-responsive" src="/imagendevideo/{{$video->photos->first()->url}}" alt="Eventos El Cronista - Video Institucional Portadas" />
          @endif

          <div class="vedio-button">
            <a href="{{$video->link}}" class="mfp-iframe vedio-play"><i class="icon icon-play-button"></i><span class="ripple"></span></a>
          </div>
        </div>
        <!-- <p style="margin-top:60px;color:white;text-align:center;font-family: 'Roboto';">
          {!!$video->texto!!}
        </p> -->
      @endif
      </div>
    </div>
  </div>
</section>

<!--  -->

<!--SECCION BLOG -->

<div id="blog" class="blog-section pt-50 pb-50 rpt-100 rpb-70">
  <div class="container">
    <div class="section-title">
        <div class="row">
          <div class="col-lg-6">
            <div class="sec-left">
              <h4 style="font-family: 'Roboto';">{{$evento->nombre_destacado}}</h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="sec-right">
              <h2 style="color:#ED388E;font-family: 'Roboto';">Cobertura</h2>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      @foreach ($posts as $post)
        <div class="col-lg-4 col-sm-6">
          <div class="single-news-block bg-color-two radius mb-30">
            <div class="blog-thumb">
              <!-- <img src="/estilo-eventos/images-cronistas/news1.png" alt="news"> -->
              @if ($post->photos->count())
                <img  class="img-responsive" src="/imagendepost/{{$post->photos->first()->url}}" alt="Post Image">
              @endif
            </div>
            <div class="news-inner">
              <span class="post-date" style="font-family: 'Roboto';">{{ $post->published_at->format('d M Y')}}</span>
              <h5><a href="/eventos/contenidos/{{$post->url}}" style="font-family: 'Roboto';">{{$post->title}}</a></h5>
              <div class="news-text">
                <p style="font-family: 'Roboto';">{{$post->intro}}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <div class="col-lg-12">
        <div class="more-btn-wrap text-center">
          <a href="{{ route('contenidos',$evento) }}" class="btn-bg" style="font-family: 'Roboto';">MÁS CONTENIDOS</a>
        </div>
      </div>

    </div>
  </div>
</div>

<!--  -->

<!--SECCION FOOTER -->


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
      <li class="current"><a href="/" style="font-family: 'Roboto';">Home</a></li>
      <li><a href="#oradores" style="font-family: 'Roboto';">Oradores</a></li>
      <li><a href="#agenda" style="font-family: 'Roboto';">Agenda</a></li>
      <li><a href="#blog" style="font-family: 'Roboto';">Cobertura</a></li>
      <li><a href="#contacto" style="font-family: 'Roboto';">Ubicación</a></li>
      <li><a href="/" style="font-family: 'Roboto';"><u>Calendario</u></a></li>
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
      text: 'Ya integra la lista de pre-inscriptos. Recibirá la confirmación a la brevedad.',
      time: 12
    })
  </script>
@endif

</body>
</html>
