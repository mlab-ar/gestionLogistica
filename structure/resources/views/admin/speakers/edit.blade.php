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
            <li class="breadcrumb-item"><a href="{{route('admin.speakers.index')}}">Oradores</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      @if ($speakers->photos->count())
  			<div class="col-md-12">
            <div class="card card-info">
    				  <div class="card-body">
    						<div class="row">
    							@foreach ($speakers->photos as $photo)
    								<form method="POST" action="{{ route('admin.photo.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendespeaker/{{$photo->url}}">
                          <br/>
    										</div>
    								</form>
    							@endforeach
    						</div>
    				  </div>
            </div>
  			</div>
  		@endif

      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header" style="background-color:black;color:white">
            <h3 class="card-title">EDITAR ORADOR</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.speakers.update', $speakers)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input name="nombre" class="form-control" placeholder="Ingresa el nombre del orador" value="{{old('nombre', $speakers->nombre)}} ">
                      {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Descripción</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="descripcion" placeholder="Descripción del orador..">{{old('descripcion', $speakers->descripcion)}}</textarea>
                      {!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">Puesto/Empresa</label>

                    <div class="col-sm-10">
                      <input name="puesto" class="form-control" placeholder="Ingresa el evento" value="{{old('puesto', $speakers->puesto)}} ">
                      {!! $errors->first('puesto','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">EVENTO DE PREINSCRIPCIÓN</label>

                    <select name="evento_id" id="evento_id" class="form-control select2">
                      <option value="" disabled>Selecciona evento</option>
                      @foreach ($todos as $event)
                        <option value="{{ $event->id}}"
                        {{ old('evento_id', $speakers->evento_id) == $event->id ? 'selected' : '' }}
                        >{{$event->nombre}}</option>
                      @endforeach
                   </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-6">
                        <label>ORADOR DESTACADO</label>
                          <select name="destacado" class="form-control select2">
                          <option value="SI" {{ old('destacado',$speakers->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('destacado',$speakers->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>ORADOR ACTIVO</label>
                          <select name="activo" class="form-control select2">
                          <option value="SI" {{ old('activo',$speakers->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('activo',$speakers->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('puesto') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">Orden de visualización</label>

                    <div class="col-sm-10">
                      <input name="orden" class="form-control" placeholder="Orden de visualización" value="{{old('orden', $speakers->orden)}} ">
                      {!! $errors->first('orden','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background-color:#1475E0"><i class="fab fa-facebook-f" style="color:white"></i></span>
                    </div>
                    <input name="facebook" type="text" class="form-control" placeholder="Facebook" value="{{old('facebook', $speakers->facebook)}} ">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background-color:#00A6FF"><i class="fab fa-twitter" style="color:white"></i></span>
                    </div>
                    <input name="twitter" type="text" class="form-control" placeholder="Twitter" value="{{old('twitter', $speakers->twitter)}} ">
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background-color:#0E76A8"><i class="fab fa-linkedin-in" style="color:white"></i></span>
                    </div>
                    <input name="linkedin" type="text" class="form-control" placeholder="LinkedIn" value="{{old('linkedin', $speakers->linkedin)}} ">
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Foto</label>

                    <div class="col-sm-10">
                      <div class="dropzone"></div>
                    </div>
                  </div>

                </div>

              </div>
            </div>

            <!-- <div class="card-footer">
              <button type="submit" class="btn btn-info">GUARDAR</button>
            </div> -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>
              <a href="{{url()->previous()}}" class="btn btn-primary btn-danger"><i class="far fa-window-close"></i></span>&nbsp;&nbsp; Cancelar</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </section>

  @endsection

  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
    <script>

  	  var myDropzone = new Dropzone('.dropzone',{
  	      url:'/admin/oradores/{{$speakers->id}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 5,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra la foto de del orador.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.photo[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	</script>

  @endpush
