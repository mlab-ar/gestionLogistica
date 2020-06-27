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
            <li class="breadcrumb-item"><a href="">Mercaderías</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  @if ($mercaderias->photos->count())
  <section class="content">
    <div class="container-fluid">
      <h5 class="mb-2">Imágenes cargadas</h5>
      <div class="row">
        @foreach ($mercaderias->photos as $photo)
        <form method="POST" action="{{ route('admin.photo.destroy',$photo) }}" style="width:300px">
          {{ method_field('DELETE') }} {{ csrf_field() }}
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="width: 295px;">
              <!-- <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span> -->
              <a  href="/imagenderegistro/{{$photo->url}}" title="Descargar imagen" class="btn btn-primary btn-sm" style="position: relative"><i class="fas fa-download"></i></a>
              <div class="info-box-content">
                <img class="img-responsive" src="/imagenderegistro/{{$photo->url}}" style="width:200px">
              </div>
              <button title="Quitar imagen" class="btn btn-danger btn-sm" style="position: relative"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        </form>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="card card">
          <div class="card-header" style="background-color:black;color:white">
            <h3 class="card-title">EDITAR REGISTRO</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.logistica.update', $mercaderias)}} ">
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
                              <span class="input-group-text" style="background-color:#007BFF;color:white">Nº Certificado de recepción</span>
                            </div>
                            <input type="text" class="form-control" name="id" value="{{ $mercaderias->id}}" disabled>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text" style="background-color:#EC811A;color:black">CLIENTE</span>
                            </div>
                            <input type="text" class="form-control" name="cliente" value="{{ $mercaderias->user_id}} - {{App\User::find($mercaderias->user_id)->name}}" disabled>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Nº de partida</span>
                            </div>
                            <input type="text" class="form-control" name="num_partida" value="{{ $mercaderias->num_partida}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Expediente</span>
                            </div>
                            <input type="text" class="form-control" name="expediente" value="{{ $mercaderias->expediente}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Documento de entrada</span>
                            </div>
                            <input type="text" class="form-control" name="doc_entrada" value="{{ $mercaderias->doc_entrada}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Documento aduanero</span>
                            </div>
                            <input type="text" class="form-control" name="doc_aduana" value="{{ $mercaderias->doc_aduana}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Manifiesto</span>
                            </div>
                            <input type="text" class="form-control" name="manifiesto" value="{{ $mercaderias->manifiesto}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Almacén</span>
                            </div>
                            <input type="text" class="form-control" name="almacen" value="{{ $mercaderias->almacen}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Matricula Vehículo</span>
                            </div>
                            <input type="text" class="form-control" name="matricula" value="{{ $mercaderias->matricula}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Contenedor</span>
                            </div>
                            <input type="text" class="form-control" name="contenedor" value="{{ $mercaderias->contenedor}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Tipo Unidad Carga</span>
                            </div>
                            <input type="text" class="form-control" name="unidad_carga" value="{{ $mercaderias->unidad_carga}}">
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Nombre del exportador</span>
                            </div>
                            <input type="text" class="form-control" name="nom_exportador" value="{{ $mercaderias->nom_exportador}}">
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                          <div class="card-body">

                            <div class="form-group col-md-6">
                  							<label>REGISTRO ACTIVO</label>
                  								<select name="activo" class="form-control select2">
                  								<option value="SI" {{ old('activo',$mercaderias->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                  								<option value="NO" {{ old('activo',$mercaderias->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                  							</select>
                  					</div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Fecha de entrada</span>
                              </div>
                              <input name="fecha_entrada" type="text" class="form-control pull-right" id="datepicker" value="{{old('fecha_entrada',$mercaderias->fecha_entrada ? $mercaderias->fecha_entrada->format('m/d/Y') : null) }}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Nº de bultos</span>
                              </div>
                              <input type="text" class="form-control" name="num_bultos" value="{{ $mercaderias->num_bultos}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Clase</span>
                              </div>
                              <input type="text" class="form-control" name="clase" value="{{ $mercaderias->clase}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Ubicación</span>
                              </div>
                              <input type="text" class="form-control" name="ubicacion" value="{{ $mercaderias->ubicacion}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Peso Bruto (kg)</span>
                              </div>
                              <input type="text" class="form-control" name="peso" value="{{ $mercaderias->peso}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Volumen</span>
                              </div>
                              <input type="text" class="form-control" name="volumen" value="{{ $mercaderias->volumen}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Tipo mercancia</span>
                              </div>
                              <input type="text" class="form-control" name="tipo_mercancia" value="{{ $mercaderias->tipo_mercancia}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Marcas</span>
                              </div>
                              <input type="text" class="form-control" name="marcas" value="{{ $mercaderias->marcas}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Procedencia</span>
                              </div>
                              <input type="text" class="form-control" name="procedencia" value="{{ $mercaderias->procedencia}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Destino</span>
                              </div>
                              <input type="text" class="form-control" name="destino" value="{{ $mercaderias->destino}}">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Cubicaje acumulado</span>
                              </div>
                              <input type="text" class="form-control" name="cubicaje" value="{{ $mercaderias->cubicaje}}">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Observaciones</span>
                              </div>
                              <textarea class="form-control" rows="3" name="observaciones">{{$mercaderias->observaciones}}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="form-group">
                              <h5 class="mb-2">Imágenes</h5>

                              <div class="col-sm-12">
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

  	  var myDropzone = new Dropzone('.dropzone',{
  	      url:'/admin/logistica/editar/{{$mercaderias->id}}/photos',
  	      acceptedFiles: 'image/*',
  	      maxFilesize: 5,
  	      paramName: 'photo',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra las imágenes a esta ubicación.<br>'
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
