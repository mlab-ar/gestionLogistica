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
            <li class="breadcrumb-item"><a href="">Eventos</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>


  <section class="content">
    <div class="row">

      @if ($evento->photos->count())
  			<div class="col-md-12">
            <div class="card card-info">
    				  <div class="card-body">
    						<div class="row">
    							@foreach ($evento->photos as $photo)
    								<form method="POST" action="{{ route('admin.photoe.destroy',$photo) }}">
    									{{ method_field('DELETE') }} {{ csrf_field() }}
    										<div class="col-md-3">
                          <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: absolute"><i class="fas fa-trash"></i></button>
                          <img  class="img-responsive" src="/imagendeevento/{{$photo->url}}" style="width:200px">
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
        <div class="card card">
          <div class="card-header" style="background-color:black;color:white">
            <h3 class="card-title">EDITAR EVENTO</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.eventos.update', $evento)}} ">
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

                          <div class="input-group mb-3" style="margin-top:23px">
                            <div class="input-group-append">
                              <span class="input-group-text" style="background-color:#007BFF;color:white">ID del evento</span>
                            </div>
                            <input type="text" class="form-control" name="id" value="{{ $evento->id}}" disabled>
                          </div>

                          <div class="form-group">
                            <label>Color representativo:</label>

                            <div class="input-group my-colorpicker2">
                              <input type="text" class="form-control" name="color" value="{{ $evento->color}}">

                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                              </div>
                            </div>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">NOMBRE</span>
                            </div>
                            <input type="text" class="form-control" name="nombre" value="{{ $evento->nombre}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Hashtag</span>
                            </div>
                            <input type="text" class="form-control" name="nombre_destacado" value="{{ $evento->nombre_destacado}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Descripción breve</span>
                            </div>
                            <textarea class="form-control summernote-sm" name="descripcion" rows="3">{{$evento->descripcion}}</textarea>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Script MAPA (ubicacón) - Utilizar vista CODIGO para editar</span>
                            </div>
                            <textarea class="form-control summernote-smc" name="script_mapa" rows="2">{{$evento->script_mapa}}</textarea>
                          </div>


                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-body">

                          <div class="form-group col-md-6">
                							<label>ESTADO ACTUAL</label>
                								<select name="estado" class="form-control select2">
                								<option value="PRINCIPAL" {{ old('estado',$evento->estado) == 'PRINCIPAL' ? 'selected' : ''}}>PRINCIPAL</option>
                								<option value="SECUNDARIO" {{ old('estado',$evento->estado) == 'SECUNDARIO' ? 'selected' : ''}}>SECUNDARIO</option>
                							</select>
                					</div>

                          <div class="form-group col-md-6">
                							<label>EVENTO ACTIVO</label>
                								<select name="activo" class="form-control select2">
                								<option value="SI" {{ old('activo',$evento->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                								<option value="NO" {{ old('activo',$evento->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                							</select>
                					</div>

                          <div class="form-group col-md-6">
                							<label>EVENTO DESTACADO</label>
                								<select name="destacado" class="form-control select2">
                								<option value="SI" {{ old('destacado',$evento->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
                								<option value="NO" {{ old('destacado',$evento->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
                							</select>
                					</div>

                          <div class="form-group col-md-12">
                							<label>MOSTRAR IMAGENES DE ORADORES EN AGENDA</label>
                								<select name="imagen_agenda" class="form-control select2">
                								<option value="SI" {{ old('imagen_agenda',$evento->imagen_agenda) == 'SI' ? 'selected' : ''}}>SI</option>
                								<option value="NO" {{ old('imagen_agenda',$evento->imagen_agenda) == 'NO' ? 'selected' : ''}}>NO</option>
                							</select>
                					</div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Fecha del Evento</span>
                            </div>
                            <input name="published_at" type="text" class="form-control pull-right" id="datepicker" value="{{old('published_at',$evento->published_at ? $evento->published_at->format('m/d/Y') : null) }}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Lugar | Linea 1</span>
                            </div>
                            <input name="lugar_linea1" type="text" class="form-control pull-right" value="{{old('lugar_linea1',$evento->lugar_linea1)}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Lugar | Linea 2</span>
                            </div>
                            <input name="lugar_linea2" type="text" class="form-control pull-right" value="{{old('lugar_linea2',$evento->lugar_linea2)}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Teléfono 1</span>
                            </div>
                            <input name="tel1" type="text" class="form-control pull-right" value="{{old('tel1',$evento->tel1)}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Teléfono 2</span>
                            </div>
                            <input name="tel2" type="text" class="form-control pull-right" value="{{old('tel2',$evento->tel2)}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Email</span>
                            </div>
                            <input name="email" type="text" class="form-control pull-right" value="{{old('email',$evento->email)}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color:#1475E0"><i class="fab fa-facebook-f" style="color:white"></i></span>
                            </div>
                            <input name="facebook" type="text" class="form-control" placeholder="Facebook" value="{{old('facebook', $evento->facebook)}} ">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color:#00A6FF"><i class="fab fa-twitter" style="color:white"></i></span>
                            </div>
                            <input name="twitter" type="text" class="form-control" placeholder="Twitter" value="{{old('twitter', $evento->twitter)}} ">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color:#9F2D8A"><i class="fab fa-instagram" style="color:white"></i></span>
                            </div>
                            <input name="instagram" type="text" class="form-control" placeholder="Instagram" value="{{old('instagram', $evento->instagram)}} ">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color:#F95F62"><i class="fab fa-youtube" style="color:white"></i></span>
                            </div>
                            <input name="youtube" type="text" class="form-control" placeholder="Youtube" value="{{old('youtube', $evento->youtube)}} ">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" style="background-color:#0E76A8"><i class="fab fa-linkedin-in" style="color:white"></i></span>
                            </div>
                            <input name="linkedin" type="text" class="form-control" placeholder="LinkedIn" value="{{old('linkedin', $evento->linkedin)}} ">
                          </div>

                          <div class="form-group" style="margin-top:50px">
                            <label class="col-sm-4 control-label">Imagen evento</label>

                            <div class="col-sm-10">
                              <div class="dropzone"></div>
                            </div>
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

    <link rel="stylesheet" href="/lay-admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
    <script src="/lay-admin/plugins/select2/js/select2.full.min.js"></script>

    <script src="/lay-admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <script>

      $(function () {
        //Initialize Select2 Elements
	      $('.select2').select2()

        //Date picker
  	    $('#datepicker').datepicker({
  	      autoclose: true
  	    })
  	  });

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });

	   </script>
     <script>

   	  var myDropzone = new Dropzone('.dropzone',{
   	      url:'/admin/eventos/{{$evento->url}}/photos',
   	      acceptedFiles: 'image/*',
   	      maxFilesize: 5,
   	      paramName: 'photo',
   	      headers:{
   	        'X-CSRF-TOKEN':'{{csrf_token()}}'
   	      },
   	      dictDefaultMessage:'Arrastra las fotos del evento.<br>'
   	  });
   	  myDropzone.on('error', function(file, res){
   	  	var msg = res.photo[0];
   	  	$('.dz-error-message:last > span').text(msg);
   	  })
 	    Dropzone.autoDiscover= false;

 	</script>

  <script src="/lay-admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/lay-admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-timepicker.min.js"></script>

  @endpush
