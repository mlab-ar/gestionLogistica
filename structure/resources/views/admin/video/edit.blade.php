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
            <li class="breadcrumb-item"><a href="{{route('admin.video.index')}}">Video</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      @if ($videos->photos->count())
  			<div class="col-md-12">
            <div class="card card-info">
    				  <div class="card-body">
    						<div class="row">
    							@foreach ($videos->photos as $photo)
    								<form method="POST" action="{{ route('admin.video.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendevideo/{{$photo->url}}" style="width:200px;">
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
            <h3 class="card-title">EDITAR VIDEO</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.video.update', $videos)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Link de YouTube</label>
                    <div class="col-sm-10">
                      <input name="link" class="form-control" placeholder="Ingresa el link de YouTube" value="{{old('link', $videos->link)}} ">
                      {!! $errors->first('link','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('texto') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Texto relacionado</label>
                    <div class="col-sm-10">
                      <textarea class="form-control summernote-sm" name="texto" rows="3">{{$videos->texto}}</textarea>
                    </div>
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">EVENTO DE PREINSCRIPCIÓN</label>

                    <select name="evento_id" id="evento_id" class="form-control select2">
                      <option value="" disabled>Selecciona evento</option>
                      @foreach ($todos as $event)
                        <option value="{{ $event->id}}"
                        {{ old('evento_id', $videos->evento_id) == $event->id ? 'selected' : '' }}
                        >{{$event->nombre}}</option>
                      @endforeach
                     </select>
                  </div>

                  <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Título para la sección</label>
                    <div class="col-sm-10">
                      <input name="titulo" class="form-control" placeholder="Título para la sección" value="{{old('titulo', $videos->titulo)}} ">
                      {!! $errors->first('titulo','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Imagen Institucional</label>

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
  	      url:'/admin/videos/{{$videos->id}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 5,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra la foto de portada del video.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.photo[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	  </script>

  @endpush
