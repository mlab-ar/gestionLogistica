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
            <li class="breadcrumb-item"><a href="{{route('admin.sponsors.index')}}">Sponsors</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      @if ($sponsors->photos->count())
  			<div class="col-md-12">
            <div class="card card-info">
    				  <div class="card-body">
    						<div class="row">
    							@foreach ($sponsors->photos as $photo)
    								<form method="POST" action="{{ route('admin.foto.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendesponsor/{{$photo->url}}">
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
            <h3 class="card-title">EDITAR SPONSOR</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.sponsors.update', $sponsors)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input name="nombre" class="form-control" placeholder="Ingresa el nombre del sponsor" value="{{old('nombre', $sponsors->nombre)}} ">
                      {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Empresa</label>

                    <div class="col-sm-10">
                      <input name="empresa" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{{old('empresa', $sponsors->empresa)}} ">
                      {!! $errors->first('empresa','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">EVENTO DE PREINSCRIPCIÓN</label>

                    <select name="evento_id" id="evento_id" class="form-control select2">
                       <option value="" disabled>Selecciona evento</option>
                       @foreach ($todos as $event)
                         <option value="{{ $event->id}}"
                         {{ old('evento_id', $sponsors->evento_id) == $event->id ? 'selected' : '' }}
                         >{{$event->nombre}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-6">
                        <label>DESTACADO <span class="badge badge-warning"><i class="fas fa-star"></i></span></label>
                        <p style="font-size:12px">*El sponsor destacado SOLO te utiliza para el header de la landing</p>
                          <select name="destacado" class="form-control select2">
                          <option value="SI" {{ old('destacado',$sponsors->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('destacado',$sponsors->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>ACTIVO</label>
                        <p style="font-size:12px">El sponsor activo solo repercute en el listado de sponsors general de la landing</p>
                          <select name="activo" class="form-control select2">
                          <option value="SI" {{ old('activo',$sponsors->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('activo',$sponsors->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>
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
  	      url:'/admin/sponsors/{{$sponsors->id}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 5,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra la foto de del sponsor.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.photo[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	</script>

  @endpush
