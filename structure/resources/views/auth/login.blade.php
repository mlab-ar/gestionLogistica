@extends('layouts.login')

@section('content')

      <div class="form-body without-side">
          <div class="container">
            <div class="row">
              <div class="col-12">
                  @if(session('message'))
                    <div class="row justify-content-center">
                      <div class="col-md-10">
                          <div style="color:white"class="alert alert-{{session('message')[0]}}">
                            <h4 class="alert-heading">{{ __("Mensaje informativo") }}</h4>
                            <p>{{ session('message')[1] }}</p>
                          </div>
                      </div>
                    </div>
                  @endif
              </div>
            </div>
          </div>

          <div class="website-logo">
              <a href="/">
                @foreach(App\Blog::first()->get() as $configuraciones)
                  <img class="logo-size" src="{{$configuraciones->logo}}" alt="TRANSFONT LOGO">
                @endforeach
              </a>
          </div>
          <div class="row">
              <div class="img-holder">
                  <div class="bg"></div>
                  <div class="info-holder">
                      <!-- <img src="/estilo-login/images/images/graphic3.svg" alt=""> -->
                  </div>
              </div>
              <div class="form-holder">
                  <div class="form-content">
                      <div class="form-items">
                          <h3>Ingreso</h3>
                          <p>Accede a la plataforma web para gestión de contenidos.</p>
                          <form method="POST" action="{{ route('login') }}">
                            @csrf

                              <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                                  <br/>
                                  <span class="sign__text" role="alert">
                                      <strong style="color:white">Usuario o contraseña incorrecto.</strong>
                                  </span>
                              @enderror

                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                              @error('password')
                                  <br/>
                                  <span class="sign__text" role="alert">
                                      <strong style="color:white">Usuario o contraseña incorrecto.</strong>
                                  </span>
                              @enderror

                              <div class="form-button">
                                  <button id="submit" type="submit" class="ibtn">Ingresar</button>
                                  <!-- <a href="forget17.html">Forget password?</a> -->
                              </div>
                          </form>
                          <!-- <div class="other-links">
                              <div class="text">Or login with</div>
                              <a href="login17.html#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="login17.html#"><i class="fab fa-google"></i>Google</a><a href="login17.html#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                          </div> -->
                          <div class="page-links">
                              <br>
                              <a href="/registro-en-plataforma">Registrar nuevo usuario.</a>
                              <br/><br/>
                              @if (Route::has('password.request'))
                                <center>
                                  <a style="font-size:13px" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                </center>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

@endsection
