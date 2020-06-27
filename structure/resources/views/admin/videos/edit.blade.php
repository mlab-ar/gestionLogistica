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
            <li class="breadcrumb-item"><a href="{{route('admin.videos.index')}}">Videos</a></li>
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
    								<form method="POST" action="{{ route('admin.photo.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendevideo/{{$photo->url}}" style="width:360px">
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
          <div class="card-header">
            <h3 class="card-title">EDITAR VIDEOS</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.videos.update', $videos)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input name="name" class="form-control" placeholder="Ingresa el título del video" value="{{old('name', $videos->name)}} ">
                      {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label" style="color:red">URL embebida del video</label>

                    <div class="col-sm-10">
                      <input name="url" class="form-control" placeholder="URL del video" value="{{old('url', $videos->url)}} ">
                      {!! $errors->first('url','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Descripción</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="description" placeholder="Descripción del orador..">{{old('description', $videos->description)}}</textarea>
                      {!! $errors->first('description','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 {{ $errors->has('pais') ? 'has-error' : '' }}">
          							<label>Pais</label>
          								<select name="pais" id="pais" class="form-control select2">
				                    <option value="" disabled>Selecciona un pais</option>
          								  @foreach ($paises as $pais)
            									<option value="{{ $pais->id}}"
            									{{ old('pais', $videos->pais_id) == $pais->id ? 'selected' : '' }}
            									>{{$pais->nombre}}</option>
          								  @endforeach
          							 </select>
          					</div>

                    <div class="form-group col-md-6 {{ $errors->has('category') ? 'has-error' : '' }}">
          							<label>Categoría</label>
                        <select name="category" id="category" class="form-control select2">
                          <option value="" disabled>Selecciona una categoría</option>
                          @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id}}"
                            {{ old('category', $videos->category_id) == $categoria->id ? 'selected' : '' }}
                            >{{$categoria->name}}</option>
                          @endforeach
                       </select>
          					</div>
                    <div class="form-group col-md-12 {{ $errors->has('fecha_texto') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Fecha Texto</label>

                      <div class="col-sm-12">
                        <input name="fecha_texto" class="form-control" placeholder="Fecha formato texto" value="{{old('fecha_texto', $videos->fecha_texto)}} ">
                        {!! $errors->first('fecha_texto','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>

                    <div class="form-group col-md-12 {{ $errors->has('evento') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Evento de la charla</label>

                      <div class="col-sm-12">
                        <input name="evento" class="form-control" placeholder="Evento" value="{{old('evento', $videos->evento)}} ">
                        {!! $errors->first('evento','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-6">
          							<label>VIDEO ACTIVO</label>
          								<select name="activo" class="form-control select2">
          								<option value="SI" {{ old('activo',$videos->activo) == 'SI' ? 'selected' : ''}}>SI</option>
          								<option value="NO" {{ old('activo',$videos->activo) == 'NO' ? 'selected' : ''}}>NO</option>
          							</select>
          					</div>
                    <div class="form-group col-md-6">
          							<label>VIDEO DESTACADO</label>
          								<select name="destacado" class="form-control select2">
          								<option value="SI" {{ old('destacado',$videos->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
          								<option value="NO" {{ old('destacado',$videos->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
          							</select>
          					</div>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Imagen</label>

                    <div class="col-sm-10">
                      <div class="dropzone" style="margin-top:20px;"></div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6 {{ $errors->has('subcategory') ? 'has-error' : '' }}">
          							<label>Sub Categoría</label>
                        <select name="subcategory" id="subcategory" class="form-control select2">
                          <option value="" disabled>Selecciona la subcategoría</option>
                          @foreach ($subcategorias as $subcategoria)
                            <option value="{{ $subcategoria->id}}"
                            {{ old('subcategory', $videos->subcategory_id) == $subcategoria->id ? 'selected' : '' }}
                            >{{$subcategoria->name}}</option>
                          @endforeach
                       </select>
          					</div>

                    <!-- <div class="form-group col-md-6">
        							<label>Fecha de publicación</label>
                      <div class="input-group date">
                      	<div class="input-group-addon">
                          	<i class="fa fa-calendar"></i>
                        </div>
                        <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{old('published_at',$videos->published_at ? $videos->published_at->format('m/d/Y') : null) }}">
                      </div>
          					</div> -->
                  </div>

                </div>

                <!--ASIGNACION DE SPEAKERS-->
                <div style="margin-top:50px" class="col-md-12">
                  <div class="card-header" style="background-color:#51BFA0">
                    <h3 class="card-title" style="color:white;">SPEAKERS</h3>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="form-group col-md-6 {{ $errors->has('key') ? 'has-error' : '' }}">
                        <label>KEYNOTE SPEAKER</label>
                          <select name="key" id="key" class="form-control select2">
                            <option value="" disabled>Selecciona keynote speaker</option>
                            @foreach ($speakers as $speaker)
                              <option value="{{ $speaker->id}}"
                              {{ old('key', $videos->key_id) == $speaker->id ? 'selected' : '' }}
                              >{{$speaker->name}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('moderador') ? 'has-error' : '' }}">
                        <label>MODERADOR</label>
                          <select name="moderador" id="moderador" class="form-control select2">
                            <option value="" disabled>Selecciona moderador</option>
                            @foreach ($speakers as $speaker)
                              <option value="{{ $speaker->id}}"
                              {{ old('moderador', $videos->moderador_id) == $speaker->id ? 'selected' : '' }}
                              >{{$speaker->name}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group col-md-12 {{ $errors->has('speaker') ? 'has-error' : '' }}">
                        <label>LISTADO DE SPEAKERS GENERAL</label>
                          <select name="speaker[]" id="speaker" class="form-control select2" multiple="multiple" data-placeholder="Selecciona uno o más oradores">
                            @foreach($speakers as $speaker)
              								<option {{ collect(old('speaker',$videos->speaker->pluck('id')))->contains($speaker->id) ? 'selected' : ''}} value="{{ $speaker->id }}">{{ $speaker->name }}</option>
              							@endforeach
                         </select>
                         {!! $errors->first('speaker','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>

                </div>

                <!--IDIOMAS-->
                @if(auth()->user()->email=='sec.rojas@gmail.com')
                  <div style="margin-top:50px" class="col-md-12">
                    <div class="card-header" style="background-color:orange">
                      <h3 class="card-title" style="color:black;font-weight:bold">TRADUCCIONES</h3>
                    </div>
                    <br/>

                    <div class="form-group {{ $errors->has('name_pb') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Nombre PORTU</label>
                      <div class="col-sm-10">
                        <input name="name_pb" class="form-control" placeholder="Ingresa el nombre de video" value="{{old('name_pb', $videos->name_pb)}} ">
                        {!! $errors->first('name_pb','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('name_us') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Nombre USA</label>
                      <div class="col-sm-10">
                        <input name="name_us" class="form-control" placeholder="Ingresa el nombre del video" value="{{old('name_us', $videos->name_us)}} ">
                        {!! $errors->first('name_us','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>

                    <div class="form-group {{ $errors->has('description_pb') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Descripción PORTU</label>

                      <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="description_pb" placeholder="Descripción del video..">{{old('description_pb', $videos->description_pb)}}</textarea>
                        {!! $errors->first('description_pb','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('description_us') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Descripción USA</label>

                      <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="description_us" placeholder="Descripción del video..">{{old('description_us', $videos->description_us)}}</textarea>
                        {!! $errors->first('description_us','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('fecha_texto_pb') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Fecha Texto PORTU</label>
                      <div class="col-sm-10">
                        <input name="fecha_texto_pb" class="form-control" placeholder="Fecha en formato texto" value="{{old('fecha_texto_pb', $videos->fecha_texto_pb)}} ">
                        {!! $errors->first('fecha_texto_pb','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('fecha_texto_us') ? 'has-error' : '' }}">
                      <label class="col-sm-4 control-label">Fecha Texto USA</label>
                      <div class="col-sm-10">
                        <input name="fecha_texto_us" class="form-control" placeholder="Fecha en formato texto" value="{{old('fecha_texto_us', $videos->fecha_texto_us)}} ">
                        {!! $errors->first('fecha_texto_us','<span class="help-block">:message</span>') !!}
                      </div>
                    </div>
                  </div>
                  @else
                    <input id="name_pb" name="name_pb" type="hidden" value="{{old('name_pb', $videos->name_pb)}}">
                    <input id="name_us" name="name_us" type="hidden" value="{{old('name_us', $videos->name_us)}}">
                    <input id="fecha_texto_pb" name="fecha_texto_pb" type="hidden" value="{{old('fecha_texto_pb', $videos->name_pb)}}">
                    <input id="fecha_texto_us" name="fecha_texto_us" type="hidden" value="{{old('fecha_texto_us', $videos->name_us)}}">
                    <input id="description_pb" name="description_pb" type="hidden" value="{{old('description_pb', $videos->description_pb)}}">
                    <input id="description_us" name="description_us" type="hidden" value="{{old('description_us', $videos->description_us)}}">
                @endif
                <!--IDIOMAS-->

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
    <link rel="stylesheet" href="/lay-admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/lay-admin/plugins/select2/css/select2.min.css">

  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
    <script src="/lay-admin/plugins/select2/js/select2.full.min.js"></script>
    <script>

      $(function () {
        //Initialize Select2 Elements
	      $('.select2').select2()


  	  });

  	  var myDropzone = new Dropzone('.dropzone',{
  	      url:'/admin/videos/{{$videos->slug}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 2,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra la foto portada de la charla.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.photo[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	</script>
  <script src="/lay-admin/plugins/daterangepicker/daterangepicker.js"></script>

  @endpush
