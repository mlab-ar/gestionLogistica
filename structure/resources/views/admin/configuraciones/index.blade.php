@extends('layouts.admin')

@section('content')
<section class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1>Configuraciones Generales de la plataforma</h1>

      </div>

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Inicio</a></li>

          <li class="breadcrumb-item active">Configuraciones</li>

        </ol>

      </div>

    </div>

  </div><!-- /.container-fluid -->

</section>

<section class="content">

  <div class="container-fluid">

    <div class="row">

      <div class="col-12">

        @foreach ($blog as $element)

        @endforeach

        <form action="{{url('/admin')}}/configuraciones/{{$element->id}}" method="post" enctype="multipart/form-data">

          @method('PUT')

          @csrf

          <!-- Default box -->
          <div class="card">

            <div class="card-header">

              <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>

            </div>

            <div class="card-body">

              <div class="row">

                <div class="col-lg-7">

                    <div class="card">

                      <div class="card-body">

                        {{-- Dominio  --}}

                        <div class="input-group mb-3">

                          <div class="input-group-append">

                            <span class="input-group-text">Dominio</span>

                          </div>

                          <input type="text" class="form-control" name="dominio" value="{{ $element->dominio}}" required>

                        </div>

                        {{-- Servidor  --}}

                        <div class="input-group mb-3">

                          <div class="input-group-append">

                            <span class="input-group-text">Servidor</span>

                          </div>

                          <input type="text" class="form-control" name="servidor" value="{{ $element->servidor}}" required>

                        </div>

                        {{-- Título  --}}

                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Título</span>
                          </div>
                          <input type="text" class="form-control" name="titulo" value="{{ $element->titulo}}" required>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Dirección</span>
                          </div>
                          <input type="text" class="form-control" name="direccion" value="{{ $element->direccion}}" required>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text">E-mail</span>
                          </div>
                          <input type="text" class="form-control" name="email" value="{{ $element->email}}" required>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Teléfono</span>
                          </div>
                          <input type="text" class="form-control" name="telefono" value="{{ $element->telefono}}" required>
                        </div>



                        {{-- Descripción  --}}

                        <div class="input-group mb-3">

                          <div class="input-group-append">

                            <span class="input-group-text">Descripción</span>

                          </div>

                          <textarea class="form-control" rows="5" name="descripcion" required>{{$element->descripcion}}</textarea>

                        </div>                     

                      </div>

                    </div>

                </div>

                <div class="col-lg-5">

                  <div class="card">

                    <div class="card-body">

                      <div class="row">

                        <div class="col-lg-12">

                          {{-- Cambiar Logo --}}

                          <div class="form-group my-2 text-center">

                            <div class="btn btn-default btn-file mb-3">

                              <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo

                              <input type="file" name="logo">

                              <input type="hidden" name="logo_actual" value="{{$element->logo}}" required>

                            </div>

                            <br>


                            <img src="{{url('/')}}/{{$element->logo}}" class="img-fluid py-2 bg-secondary previsualizarImg_logo">

                            <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>

                          </div>

                          <hr class="pb-2">

                          {{-- Cambiar Portada --}}

                          <div class="form-group my-2 text-center">

                            <div class="btn btn-default btn-file mb-3">

                              <i class="fas fa-paperclip"></i> Adjuntar Imagen de Portada

                              <input type="file" name="portada">

                              <input type="hidden" name="portada_actual" value="{{$element->portada}}" required>

                            </div>

                            <br>


                            <img src="{{url('/')}}/{{$element->portada}}" class="img-fluid py-2 previsualizarImg_portada">

                            <p class="help-block small mt-3">Dimensiones: 700px * 420px | Peso Max. 2MB | Formato: JPG o PNG</p>

                          </div>

                          <hr class="pb-2">

                          {{-- Cambiar Icono --}}

                          <div class="form-group my-2 text-center">

                            <div class="btn btn-default btn-file mb-3">

                              <i class="fas fa-paperclip"></i> Adjuntar Imagen de Icono

                              <input type="file" name="icono">

                               <input type="hidden" name="icono_actual" value="{{$element->icono}}" required>

                            </div>

                            <br>

                            <img src="{{url('/')}}/{{$element->icono}}" class="img-fluid py-2 rounded-circle previsualizarImg_icono">

                            <p class="help-block small mt-3">Dimensiones: 150px * 150px | Peso Max. 2MB | Formato: JPG o PNG</p>

                          </div>


                        </div>

                      </div>

                    </div>

                  </div>

                </div>


              </div>


            </div>

            <!-- /.card-body -->
            <div class="card-footer">

               <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>


            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </form>

      </div>

    </div>

  </div>

</section>


@endsection

@push('scripts')

@if (Session::has("no-validacion"))
  <script>
     notie.alert({
      type: 2,
      text: '¡Hay campos no válidos en el formulario!',
      time: 7
    })
  </script>
@endif

@if (Session::has("no-validacion-imagen"))

<script>

   notie.alert({

    type: 2,
    text: '¡Alguna de las imágenes no tiene el formato correcto!',
    time: 7

  })

</script>

@endif

@if (Session::has("error"))

<script>

   notie.alert({

    type: 3,
    text: '¡Error en el gestor de configuraciones!',
    time: 7

  })

</script>

@endif

@if (Session::has("ok-editar"))
  <script>
     notie.alert({
      type: 1,
      text: '¡Las configuraciones se guardaron correctamente!',
      time: 7
    })
  </script>
@endif

@endpush
