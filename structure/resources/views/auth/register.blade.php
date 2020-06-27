@extends('layouts.login')

@section('content')
  <div class="form-body without-side">

    <section class="content container-fluid">
      @if(session()->has('flash'))
        <br/>
        <div class="alert alert-info" role="alert">{{ session('flash') }}</div>
      @endif
    </section>

      <div class="website-logo">
          <a href="/">
              <div class="logo">
                  <img class="logo-size" src="/estilo-login/images/logo-light.svg" alt="">
              </div>
          </a>
      </div>
      <div class="row">
          <div class="img-holder">
              <div class="bg"></div>
              <div class="info-holder">
                  <img src="/estilo-login/images/graphic3.svg" alt="">
              </div>
          </div>
          <div class="form-holder">
              <div class="form-content">
                  <div class="form-items">
                      <h3>Registrar nuevo usuario</h3>
                      <p>Accede a la plataforma web para gestión de contenidos.</p>
                      <form method="POST" action="{{ route('register') }}">
                          @csrf

                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir Password" required autocomplete="new-password">

                          <div class="form-button">
                              <button id="submit" type="submit" class="ibtn">Registrarse</button>
                          </div>
                      </form>
                      <!-- <div class="other-links">
                          <div class="text">Or register with</div>
                          <a href="register17.html#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="register17.html#"><i class="fab fa-google"></i>Google</a><a href="register17.html#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                      </div> -->
                      <div class="page-links">
                          <br/>
                          <a href="/login">Ingresar a tu cuenta</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
