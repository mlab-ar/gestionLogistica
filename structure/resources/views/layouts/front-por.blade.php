<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrediHub - El mejor contenido de la industria del crédito</title>
    <link rel="stylesheet" href="/lay-web/css/app.css">
    <link rel="stylesheet" href="/lay-web/css/theme.css">
    <link rel="stylesheet" href="/lay-web/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/lay-web/layerslider/css/layerslider.css">
    <link rel="stylesheet" href="/lay-web/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/lay-web/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/lay-web/css/responsive.css">
    <link rel="stylesheet" href="/lay-web/css/jquery.kyco.easyshare.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <link rel="icon" type="image/png" href="/lay-front/img/favicon.png" sizes="32x32">
  	<link rel="apple-touch-icon" href="/lay-front/img/favicon.png">
  	<link rel="apple-touch-icon" sizes="/lay-front/72x72" href="img/favicon.png">
  	<link rel="apple-touch-icon" sizes="/lay-front/114x114" href="img/favicon.png">
  	<link rel="apple-touch-icon" sizes="/lay-front/144x144" href="img/favicon.png">

</head>
<body>

  <style>

				.tt-query, /* UPDATE: newer versions use tt-input instead of tt-query*/
				/* .tt-hint {
						width: 450px;
						height: 30px;
						padding: 18px 12px;
						font-size: 18px;
						line-height: 15px;
						border: 2px solid #ccc;
						border-radius: 8px;
						outline: none;
				} */

				.tt-query {
					-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
						-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
									box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
				}

				.tt-hint {
					color: #999
				}

				.tt-menu {    /* used to be tt-dropdown-menu in older versions */
					width: 450px;
					margin-top: 4px;
					padding: 4px 0;
					background-color: #fff;
					border: 1px solid #ccc;
					border: 1px solid rgba(0, 0, 0, 0.2);
					-webkit-border-radius: 4px;
						-moz-border-radius: 4px;
									border-radius: 4px;
					-webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
						-moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
									box-shadow: 0 5px 10px rgba(0,0,0,.2);
				}

				.tt-suggestion {
					padding: 3px 20px;
					line-height: 24px;
				}

				.tt-suggestion.tt-cursor,.tt-suggestion:hover {
					color: #fff;
					background-color: #0097cf;

				}

				.tt-suggestion p {
					margin: 0;
				}

		</style>

<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!--header-->
        <div class="off-canvas position-left light-off-menu" id="offCanvas-responsive" data-off-canvas>
            <div class="off-menu-close">
                <h3>Menu</h3>
                <span data-toggle="offCanvas-responsive"><i class="fa fa-times"></i></span>
            </div>
            <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
              <li><a href="/por"><img src="/lay-web/images/idioma/nuevo/icono-home.png" alt="CredhiHub 2019" style="width:17px">home</a></li>
              <li class="has-submenu" data-dropdown-menu="example1">
                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-videos.png" alt="CredhiHub 2019" style="width:17px">Vídeos</a>
                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                    @foreach(App\Pais::orderBy('nombre')->get() as $pais)
                      @if($pais->id != 0)
                        <li><a href="/por/listado-videos-pais/{{$pais->id}}">{{$pais->nombre}}</a></li>
                      @endif
                    @endforeach
                    <li align="center"><a href="/por/todos-los-videos">TODOS</a></li>
                  </ul>
              </li>
              <li class="has-submenu" data-dropdown-menu="example1">
                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-user.png" alt="CredhiHub 2019" style="width:17px">CATEGORIAS</a>
                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                      @foreach(App\Category::where('destacado','=','SI')->orderBy('name')->get() as $cat)
                        <li><a href="/por/listado-videos/{{$cat->id}}">{{$cat->name}}</a></li>
                      @endforeach
                  </ul>
              </li>
                <li class="has-submenu" data-dropdown-menu="example1">
                    <a href="#"><i class="fa fa-user"></i>{{ auth()->user()->name}} - {{$ubicacion}}</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="/profile">Perfil</a></li>
                        @if(auth()->user()->role->name === 'admin')
                          <li><a href="/admin/dashboard" target="_blank" >PAINEL ADMIN</a></li>
                        @endif
                        <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                          >
                              {{ __("Fechar Sessão") }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu" data-dropdown-menu="example1">
                    <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-idioma.png" alt="CredhiHub 2019" style="width:17px" title="IDIOMA">IDIOMA</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="/inicio"><img src="/lay-web/images/idioma/nuevo/bandera-esp.png" alt="eventos" style="width:15px">ESP</a></li>
                        <li><a href="/por"><img src="/lay-web/images/idioma/nuevo/bandera-brz.png" alt="eventos" style="width:15px">POR</a></li>
                        <li><a href="/en"><img src="/lay-web/images/idioma/nuevo/bandera-usa.png" alt="eventos" style="width:15px">ENG</a></li>

                    </ul>
                </li>
            </ul>

        </div>

        <div class="off-canvas-content" data-off-canvas-content>
          <header>
              <section id="navBar">
                  <nav class="sticky-container" data-sticky-container>
                      <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #2e2e2e;" data-sticky-on="large">
                          <div class="row">
                              <div class="large-12 columns">
                                  <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                      <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                      <div class="title-bar-title"><img src="/lay-front/img/logo.png" alt="CredhiHub 2019 LOGO" style="width:130px"></div>
                                  </div>

                                  <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                      <div class="top-bar-left">
                                          <ul class="menu">
                                              <li class="menu-text">
                                                  <a href="/por"><img src="/lay-front/img/logo.png" alt="CredhiHub 2019 LOGO" style="width:180px"></a>
                                              </li>
                                          </ul>
                                      </div>
                                      <div class="top-bar-right">
                                          <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                              <li><a href="/por"><img src="/lay-web/images/idioma/nuevo/icono-home.png" alt="CredhiHub 2019" style="width:17px">home</a></li>
                                              <li class="has-submenu" data-dropdown-menu="example1">
                                                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-videos.png" alt="CredhiHub 2019" style="width:17px">Vídeos</a>
                                                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                    @foreach(App\Pais::orderBy('nombre')->get() as $pais)
                                                      @if($pais->id != 0)
                                                        <li><a href="/por/listado-videos-pais/{{$pais->id}}"></i>{{$pais->nombre_pb}}</a></li>
                                                      @endif
                                                    @endforeach
                                                    <li align="center"><a href="/por/todos-los-videos"></i>TODOS</a></li>
                                                  </ul>
                                              </li>
                                              <li class="has-submenu" data-dropdown-menu="example1">
                                                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-cat.png" alt="CredhiHub 2019" style="width:17px">CATEGORIAS</a>
                                                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                      @foreach(App\Category::where('destacado','=','SI')->orderBy('name')->get() as $cat)
                                                        <li><a href="/por/listado-videos/{{$cat->id}}"></i>{{$cat->name_pb}}</a></li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                              <!-- <li><a href="#"><i class="fa fa-edit"></i>Blog</a></li>
                                              <li><a href="#"><i class="fa fa-envelope"></i>contacto</a></li> -->
                                              <li class="has-submenu" data-dropdown-menu="example1">
                                                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-user.png" alt="CredhiHub 2019" style="width:17px">{{ auth()->user()->name}} - {{$ubicacion}}</a>
                                                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                      <li><a href="/profile">Perfil</a></li>

                                                      @if(auth()->user()->role->name === 'admin')
                                                        <li><a href="/admin/dashboard" target="_blank" >PANEL ADMIN</a></li>
                                                      @endif
                                                      <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();"
                                                        >
                                                            {{ __("Fechar Sessão") }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li class="has-submenu" data-dropdown-menu="example1">
                                                  <a href="#"><img src="/lay-web/images/idioma/nuevo/icono-idioma.png" alt="CredhiHub 2019" style="width:17px" title="IDIOMA"></a>
                                                  <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                      <li><a href="/inicio"><img src="/lay-web/images/idioma/nuevo/bandera-esp.png" alt="eventos" style="width:17px">ESP</a></li>
                                                      <li><a href="/por"><img src="/lay-web/images/idioma/nuevo/bandera-brz.png" alt="eventos" style="width:17px">POR</a></li>
                                                      <li><a href="/en"><img src="/lay-web/images/idioma/nuevo/bandera-usa.png" alt="eventos" style="width:17px">ENG</a></li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- <div id="search-bar" class="clearfix search-bar-light">
                              <form method="post">
                                  <div class="search-input float-left">
                                      <input type="search" name="search" placeholder="Busca acá tu video">
                                  </div>
                                  <div class="search-btn float-right text-right">
                                      <button class="button" name="search" type="submit">buscar</button>
                                  </div>
                              </form>
                          </div> -->
                      </div>
                  </nav>
              </section>
          </header>

				    @yield('contenido')

						<div id="footer-bottom">
								<div class="logo text-center">
										<img src="/lay-front/img/logo.png" alt="footer logo" style="width:130px">
								</div>
								<div class="btm-footer-text text-center">
										<p>2019 © CrediHub - CMS Group.</p>
								</div>
						</div>
					</div>
			</div>
		</div>

    <script src="/lay-web/bower_components/jquery/dist/jquery.js"></script>
		<script src="/lay-web/bower_components/what-input/what-input.js"></script>
		<script src="/lay-web/bower_components/foundation-sites/dist/foundation.js"></script>
		<script src="/lay-web/js/jquery.showmore.src.js" type="text/javascript"></script>
		<script src="/lay-web/js/app.js"></script>
		<script src="/lay-web/layerslider/js/greensock.js" type="text/javascript"></script>

		<script src="/lay-web/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
		<script src="/lay-web/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
		<script src="/lay-web/js/owl.carousel.min.js"></script>
		<script src="/lay-web/js/inewsticker.js" type="text/javascript"></script>
		<script src="/lay-web/js/jquery.kyco.easyshare.js" type="text/javascript"></script>
    <script src="/lay-web/js/typeahead.bundle.min.js" type="text/javascript"></script>

    <script>
      ;(function ($) {

        var videos = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch:'{{url("/videos/json")}}'
        });

        $('#search').typeahead({
          hint:true,
          highlight:true,
          minLength: 1
        }, {
          name:'videos',
          source: videos
        });

      });
	  </script>

	</body>
</html>
