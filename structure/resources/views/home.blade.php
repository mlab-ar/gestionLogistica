<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="TRANSFONT">

  <link rel="shortcut icon" type="image/x-icon" href="/{{$configuraciones->icono}}">
  <title>{{$configuraciones->titulo}}</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700&display=swap">
  <link rel="stylesheet" href="/estilo-home-alt/assets/css/libraries.css" />
  <link rel="stylesheet" href="/estilo-home-alt/assets/css/style.css" />

  <link rel="stylesheet" href="/css/plugins/notie.css">

  <style>
      #barraaceptacion {
        display:none;
        position:fixed;
        left:0px;
        right:0px;
        bottom:0px;
        padding-bottom:80px;
        width:100%;
        text-align:center;
        min-height:40px;
        background-color: rgba(0, 0, 0, 0.5);
        color:#fff;
        z-index:99999;
      }

      .inner {
        width:100%;
        position:absolute;
        padding-left:5px;
        font-family:verdana;
        font-size:12px;
        top:30%;
      }

      .inner a.ok {padding:8px;color:white;text-decoration:none;background-color: rgba(0, 0, 0, 0.2);text-align:center}
      .inner a.info {padding-left:5px;text-decoration:none;color:#faff00;}
    </style>

</head>

<body>

  <div id="barraaceptacion">
  	<div class="inner">
  		Este sitio web utiliza cookies para mejorar su experiencia. Asumiremos que está de acuerdo con esto, pero puede optar por no participar si lo desea.
  		<a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>ACEPTAR</b></a>
  		<!-- <a href="http://politicadecookies.com" target="_blank" class="info">M&aacute;s informaci&oacute;n</a> -->
  	</div>
  </div>

  <div class="wrapper">

    <header id="header" class="header header-white header-full">
      <div class="header__topbar d-none d-xl-block">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-7">
              <ul class="contact__list list-unstyled">
                <li><i class="icon-call"></i><span>Teléfono {{$configuraciones->telefono}}</span></li>
                <li><i class="icon-envelope"></i>
                  <span>Email: <a href="mailto:{{$configuraciones->email}}">{{$configuraciones->email}}</a></span>
                </li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 d-flex align-items-center justify-content-end">
              <!-- <ul class="header__topbar-links list-unstyled">
                <li><a href="home-modern.html#">Contacts</a></li>
                <li><a href="home-modern.html#">Careers</a></li>
              </ul> -->
              <!-- <div class="social__icons justify-content-end">
                <a href="home-modern.html#"><i class="fa fa-facebook"></i></a>
                <a href="home-modern.html#"><i class="fa fa-instagram"></i></a>
                <a href="home-modern.html#"><i class="fa fa-twitter"></i></a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="/{{$configuraciones->logo}}" class="logo-light" alt="logo">
            <img src="/{{$configuraciones->logo}}" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav__item">
                <!-- <a href="contacs.html" class="btn btn__primary btn__lg">INGRESAR</a> -->
                @if (Auth::guest())
                  <a class="btn btn__primary btn__lg" href="/ingreso-en-plataforma" >INGRESAR</a>
                @else
                  <a class="btn btn__success btn__lg" href="/admin/dashboard">IR A MI PANEL</a>
                @endif
              </li>
            </ul>
          </div>
          <!-- <div class="navbar-modules">
            <ul class="modules__wrapper d-flex align-items-center list-unstyled">

              <li class="d-none d-lg-block">
                <a href="request-quote.html" class="module__btn btn__request btn">
                  <span>Request A Quote</span><i class="icon-arrow-right"></i>
                </a>
              </li>

            </ul>
          </div> -->
        </div>
      </nav>
    </header>

    <section id="slider2" class="slider slider-2">
      <div class="carousel owl-carousel carousel-arrows carousel-dots carousel-dots-white" data-slide="1"
        data-slide-md="1" data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0"
        data-loop="true" data-speed="3000" data-transition="fade" data-animate-out="fadeOut" data-animate-in="fadeIn">
        <div class="slide-item align-v-h bg-overlay">
          <div class="bg-img"><img src="/estilo-home-alt/assets/images/sliders/2.jpg" alt="slide img"></div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10">
                <div class="slide__content">
                  <h2 class="slide__title">Affordable Price, <br> Certified experts & <br> Innovative Solutions.</h2>
                  <p class="slide__desc">Competitive advantages to some of the largest companies allover the world.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="slide-item align-v-h bg-overlay">
          <div class="bg-img"><img src="/estilo-home-alt/assets/images/sliders/6.jpg" alt="slide img"></div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10">
                <div class="slide__content">
                  <h2 class="slide__title">Flexible, Accelerated <br> & Improved Delivery Services For You! </h2>
                  <p class="slide__desc">Competitive advantages to some of the largest companies allover the world.</p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="fancyboxLayout3" class="fancybox-layout3 p-0">
      <div class="container">
        <div class="row fancybox-boxes-wrap">

          <div class="col-sm-6 col-md-6 col-lg-3 fancybox-item">
            <div class="fancybox__icon">
              <i class="icon-wallet"></i>
            </div>
            <div class="fancybox__content">
              <h4 class="fancybox__title">Transparent Pricing</h4>
              <p class="fancybox__desc">International supply chains involves challenging regulations.</p>
            </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3 fancybox-item">
            <div class="fancybox__icon">
              <i class="icon-search"></i>
            </div>
            <div class="fancybox__content">
              <h4 class="fancybox__title">Real-Time Tracking</h4>
              <p class="fancybox__desc">Ensure customers’ supply chains are fully compliant by practices.</p>
            </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3 fancybox-item">
            <div class="fancybox__icon">
              <i class="icon-trolley"></i>
            </div>
            <div class="fancybox__content">
              <h4 class="fancybox__title">Warehouse Storage</h4>
              <p class="fancybox__desc">Depending on your product, we provide warehouse activities.</p>
            </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-3 fancybox-item">
            <div class="fancybox__icon">
              <i class="icon-package-6"></i>
            </div>
            <div class="fancybox__content">
              <h4 class="fancybox__title">Security For Cargo</h4>
              <p class="fancybox__desc">High security requirements and are certified to local standards.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

        <section id="about1" class="about about-1 pt-90">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="video-banner p-0">
              <img src="/estilo-home-alt/assets/images/banners/6.jpg" alt="background">
              <div class="video__btn video__btn-right-center">
                <!-- <a class="popup-video" href="https://www.youtube.com/watch?4=&amp;v=TKnufs85hXk">
                  <span class="video__player-animation"></span>
                  <span class="video__player-animation video__player-animation-2"></span>
                  <div class="video__player">
                    <i class="fa fa-play"></i>
                  </div>
                </a> -->
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="heading heading-3 pt-50">
              <!-- <span class="heading__subtitle">Affordable Price, Certified Forwarders</span> -->
              <h2 class="heading__title">
                {!!$configuraciones->sobre_mi_completo!!}
              </h2>
              <p class="heading__desc mb-20">
                {!!$configuraciones->sobre_mi!!}
              </p>

              @if (Auth::guest())
                <a class="btn btn__primary btn__lg" href="/ingreso-en-plataforma" >INGRESAR</a>
              @else
                <a class="btn btn__primary btn__lg" href="/admin/dashboard">IR A MI PANEL</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer" class="footer">

      <section id="contact3" class="contact contact-3 text-center">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center">

                <h2 class="heading__title">CONTACTO</h2>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
              <form action="{{route('messagesSoon')}}" method="post" id="contactusForm" class="col rounded-field">
                {{csrf_field()}}
                <input type="hidden" id="subject" name="subject" value="Consulta Contacto Web - Plataforma Logistica">
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group"><input type="text" name="name" id="name" class="form-control" placeholder="Nombre Completo" required></div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group"><input type="email" name="email" id="email" class="form-control" placeholder="Email" required></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <textarea class="form-control" name="cment" id="cment" placeholder="Mensaje" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                    <button name="contactForm" id="contactForm" type="submit" class="btn btn__secondary btn__hover3 btn__block">CONSULTAR</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <div class="footer-bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="footer__copyright">
                <span>© 2020 Todos los derechos reservados.</span>

              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <nav>
                <ul class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end">
                  <li><a href="mailto:{{$configuraciones->email}}">CONTACTO</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <button id="scrollTopBtn"><i class="fa fa-long-arrow-up"></i></button>
  </div>

  <script src="/estilo-home-alt/assets/js/jquery-3.3.1.min.js"></script>
  <script src="/estilo-home-alt/assets/js/plugins.js"></script>
  <script src="/estilo-home-alt/assets/js/main.js"></script>

  <script src="/js/plugins/notie.js"></script>

  @if (Session::has("ok-editar"))
    <script>
       notie.alert({
        type: 1,
        text: '¡Email recibido correctamente!',
        time: 7
      })
    </script>
  @endif

  <script>
        function getCookie(c_name){
        	var c_value = document.cookie;
        	var c_start = c_value.indexOf(" " + c_name + "=");
        	if (c_start == -1){
        		c_start = c_value.indexOf(c_name + "=");
        	}
        	if (c_start == -1){
        		c_value = null;
        	}else{
        		c_start = c_value.indexOf("=", c_start) + 1;
        		var c_end = c_value.indexOf(";", c_start);
        		if (c_end == -1){
        			c_end = c_value.length;
        		}
        		c_value = unescape(c_value.substring(c_start,c_end));
        	}
        	return c_value;
        }

        function setCookie(c_name,value,exdays){
        	var exdate=new Date();
        	exdate.setDate(exdate.getDate() + exdays);
        	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
        	document.cookie=c_name + "=" + c_value;
        }

        if(getCookie('tiendaaviso')!="1"){
        	document.getElementById("barraaceptacion").style.display="block";
        }
        function PonerCookie(){
        	setCookie('tiendaaviso','1',365);
        	document.getElementById("barraaceptacion").style.display="none";
        }
      </script>

</body>

</html>
