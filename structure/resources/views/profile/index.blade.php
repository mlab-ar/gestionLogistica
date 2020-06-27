@extends('layouts.front')

@section('contenido')
    <br/><br/>
    <div class="row">

      @if(session('message'))
          <div class="row justify-content-center" style="background-color:green">
              <div class="col-md-10">
                  <div class="alert alert-info-{{ session('message')[0] }}">
                      <h4 class="alert-heading"><span style="color:white">{{ __("Mensaje informativo") }}</span></h4>
                      <p><span style="color:white">{{ session('message')[1] }}</span></p>
                  </div>
              </div>
          </div>
      @endif

        <div class="large-8 columns profile-inner">
            <section class="profile-settings">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="heading">
                            <i class="fa fa-gears"></i>
                            <h4 style="color:white">Configuración de Perfil</h4>

                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="setting-form">
                                    <form method="POST" action="{{ route('profile.update') }}" novalidate>
                                      @csrf
                                      @method('PUT')
                                        <div class="setting-form-inner">
                                            <div class="row">
                                                <div class="medium-12 columns">
                                                    <label style="color:white"><span style="color:white">{{ __("Correo electrónico") }}</span>
                                                        <input
                                                        id="email"
                                                        type="email"
                                                        readonly
                                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        name="email"
                                                        value="{{ old('email') ?: $user->email }}"
                                                        required
                                                        autofocus
                                                        >
                                                    </label>
                                                    @if($errors->has('email'))
                                                        <span class="invalid-feedback" style="color:red">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top:-50px" class="setting-form-inner">
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <h6 class="borderBottom" style="color:white">Actualizar Password:</h6>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label style="color:white"><span style="color:white">{{ __("Contraseña") }}</span>
                                                        <input
                                                        id="password"
                                                        type="password"
                                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        name="password"
                                                        required
                                                        >
                                                    </label>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" style="color:red">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label style="color:white"><span style="color:white">{{ __("Confirma la contraseña") }}</span>
                                                        <input
                                                        id="password-confirm"
                                                        type="password"
                                                        class="form-control"
                                                        name="password_confirmation"
                                                        required
                                                        >
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="setting-form-inner">
                                            <button class="button expanded" type="submit"> {{ __("Actualizar datos") }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End profile settings -->
        </div>

    </div>

@endsection
