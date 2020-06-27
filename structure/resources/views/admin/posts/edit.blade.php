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
            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Blog</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      @if ($post->photos->count())
  			<div class="col-md-12">
            <div class="card card-info">
    				  <div class="card-body">
    						<div class="row">
    							@foreach ($post->photos as $photo)
    								<form method="POST" action="{{ route('admin.photop.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendepost/{{$photo->url}}" style="width:200px">
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
            <h3 class="card-title">EDITAR PUBLICACIÓN</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.posts.update', $post)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Título</label>

                    <div class="col-sm-10">
                      <input name="title" class="form-control" placeholder="Ingresa el título del post" value="{{old('title', $post->title)}} ">
                      {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('intro') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Texto introductorio</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="intro" placeholder="Introducción del post..">{{old('intro', $post->intro)}}</textarea>
                      {!! $errors->first('intro','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">EVENTO DE PREINSCRIPCIÓN</label>

                    <select name="evento_id" id="evento_id" class="form-control select2">
                       <option value="" disabled>Selecciona evento</option>
                       @foreach ($todos as $event)
                         <option value="{{ $event->id}}"
                         {{ old('evento_id', $post->evento_id) == $event->id ? 'selected' : '' }}
                         >{{$event->nombre}}</option>
                       @endforeach
                    </select>
                  </div>

                  <div class="form-group" style="margin-top:30px">
                    <label class="col-sm-4 control-label">Imagen</label>

                    <div class="col-sm-10">
                      <div class="dropzone"></div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text">Fecha del post</span>
                    </div>
                    <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                        <label>POST ACTIVO</label>
                          <select name="activo" class="form-control select2">
                          <option value="SI" {{ old('activo',$post->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('activo',$post->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>POST DESTACADO</label>
                          <select name="destacado" class="form-control select2">
                          <option value="SI" {{ old('destacado',$post->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('destacado',$post->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text">Texto principal del post</span>
                    </div>
                    <textarea class="form-control summernote-sm" name="body" rows="4">{{$post->body}}</textarea>
                  </div>

                </div>

              </div>
            </div>

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
    <script>

  	  var myDropzone = new Dropzone('.dropzone',{
  	      url:'/admin/posts/{{$post->url}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 5,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra la foto de del post.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.photo[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	</script>

  @endpush
