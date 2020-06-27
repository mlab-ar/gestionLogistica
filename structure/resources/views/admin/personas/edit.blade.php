@extends('layouts.admin')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="">preinscriptos</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>


  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="card card">
          <div class="card-header" style="background-color:black;color:white">
            <h3 class="card-title">EDITAR PREINSCRIPTO</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.personas.update', $personas)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card">

              <div class="card-header">
                <button type="submit" class="btn btn-primary float-right"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>
              </div>

              <div class="card-body">
                <div class="row">

                  <div class="col-lg-6">
                      <div class="card">

                        <div class="card-body">

                          <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                            <label><span class="badge badge-success" style="background-color:#0C17AC;font-size:14px;">EVENTO DE PREINSCRIPCIÓN</span></label>

                            <!-- <div class="col-sm-10">
                              <input name="evento_id" class="form-control" disabled value="{{old('evento_id', App\Evento::find($personas->evento_id)->nombre_destacado)}}">
                              {!! $errors->first('evento_id','<span class="help-block">:message</span>') !!}
                            </div> -->
                            <select name="evento_id" id="evento_id" class="form-control select2">
                              <option value="" disabled>Selecciona evento</option>
                              @foreach ($todos as $event)
                                <option value="{{ $event->id}}"
                                {{ old('evento_id', $personas->evento_id) == $event->id ? 'selected' : '' }}
                                >{{$event->nombre}}</option>
                              @endforeach
                           </select>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" name="nombre" value="{{ $personas->nombre}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Apellido</span>
                            </div>
                            <input type="text" class="form-control" name="apellido" value="{{ $personas->apellido}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Sexo</span>
                            </div>
                            <input type="text" class="form-control" name="sexo" value="{{ $personas->sexo}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Empresa</span>
                            </div>
                            <input type="text" class="form-control" name="empresa" value="{{ $personas->empresa}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Cargo</span>
                            </div>
                            <input type="text" class="form-control" name="cargo" value="{{ $personas->cargo}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Edad</span>
                            </div>
                            <input type="text" class="form-control" name="edad" value="{{ $personas->edad}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Provincia</span>
                            </div>
                            <input type="text" class="form-control" name="provincia" value="{{ $personas->provincia}}">
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6">
                  							<label><span class="badge badge-success" style="background-color:#0C84AC;font-size:14px;">ESTADO PREINSCRIPCIÓN</span></label>
                  								<select name="estado" class="form-control select2">
                  								<option value="PENDIENTE" {{ old('estado',$personas->estado) == 'PENDIENTE' ? 'selected' : ''}}>PENDIENTE</option>
                  								<option value="PRE-INSCRIPTO" {{ old('estado',$personas->estado) == 'PRE-INSCRIPTO' ? 'selected' : ''}}>PRE-INSCRIPTO</option>
                                  <option value="RECHAZADO" {{ old('estado',$personas->estado) == 'RECHAZADO' ? 'selected' : ''}}>RECHAZADO</option>
                  							</select>
                  					</div>

                            <div class="form-group col-md-6">
                  							<label><span class="badge badge-success" style="background-color:#560CAC;font-size:14px;">REGISTRO ACTIVO</span></label>
                  								<select name="activo" class="form-control select2">
                  								<option value="SI" {{ old('activo',$personas->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                  								<option value="NO" {{ old('activo',$personas->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                  							</select>
                  					</div>
                          </div>

                          <div class="input-group mb-3" style="margin-top:10px">
                            <div class="input-group-append">
                              <span class="input-group-text">Localidad</span>
                            </div>
                            <input type="text" class="form-control" name="localidad" value="{{ $personas->localidad}}">
                          </div>

                          <div class="input-group mb-3" style="margin-top:10px">
                            <div class="input-group-append">
                              <span class="input-group-text">Número DNI</span>
                            </div>
                            <input type="text" class="form-control" name="dni" value="{{ $personas->dni}}">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Teléfono</span>
                            </div>
                            <input type="text" class="form-control" name="telefono" value="{{ $personas->telefono}}">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Celular</span>
                            </div>
                            <input type="text" class="form-control" name="celular" value="{{ $personas->celular}}">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Email</span>
                            </div>
                            <input type="mail" class="form-control" name="email" value="{{ $personas->email}}">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Web</span>
                            </div>
                            <input type="text" class="form-control" name="web" value="{{ $personas->web}}">
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
              </div>

              <hr class="pb-2">

              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>
                <a href="{{url()->previous()}}" class="btn btn-primary btn-danger"><i class="far fa-window-close"></i></span>&nbsp;&nbsp; Cancelar</a>
              </div>

            </div>

          </form>
        </div>
      </div>

    </div>
  </section>

  @endsection

  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
    <link rel="stylesheet" href="/lay-admin/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="/lay-admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  	<link rel="stylesheet" href="/lay-admin/plugins/bootstrap-daterangepicker/daterangepicker.css">
 	  <link rel="stylesheet" href="/lay-admin/plugins/bootstrap-timepicker.min.css">

  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
    <script src="/lay-admin/plugins/select2/js/select2.full.min.js"></script>
    <script>

      $(function () {
        //Initialize Select2 Elements
	      $('.select2').select2()

        //Date picker
  	    $('#datepicker').datepicker({
  	      autoclose: true
  	    })
  	  });

	</script>

  <script src="/lay-admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/lay-admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-timepicker.min.js"></script>

  @endpush
