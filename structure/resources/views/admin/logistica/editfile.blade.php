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
  @if ($mercaderias->files->count())
  <section class="content">
    <div class="container-fluid">
      <h5 class="mb-2">Archivos cargadas</h5>
      <div class="row">
        @foreach ($mercaderias->files as $photo)
        <form method="POST" action="{{ route('admin.files.destroy',$photo) }}" style="width:300px">
          {{ method_field('DELETE') }} {{ csrf_field() }}
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="width: 200px;">
              <!-- <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span> -->
              <a  href="/imagenderegistro/{{$photo->url}}" title="Descargar imagen" class="btn btn-primary btn-sm" style="position: relative"><i class="fas fa-download"></i></a>
              <div class="info-box-content" align="center">
                <img class="img-responsive" src="/lay-admin/dist/img/iconos/archivos.png">
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
            <h3 class="card-title">ARCHIVOS VINCULADOS AL REGISTRO</h3>
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
                  </div>

                </div>
              </div>

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <h5 class="mb-2">Adjuntos</h5>

                      <div class="col-sm-12">
                        <div class="dropzone"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <a href="{{ route('admin.logistica.index', auth()->user()->id )}}" class="btn btn-primary btn-danger"><i class="far fa-window-close"></i></span>&nbsp;&nbsp; Cerrar</a>

            </div>
          </div>

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
  	      url:'/admin/logistica/editar-files/{{$mercaderias->id}}/files',
  	      acceptedFiles: '.txt,application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
  	      maxFilesize: 10,
  	      paramName: 'file',
  	      headers:{
  	        'X-CSRF-TOKEN':'{{csrf_token()}}'
  	      },
  	      dictDefaultMessage:'Arrastra los archivos a esta ubicación.<br>'
  	  });
  	  myDropzone.on('error', function(file, res){
  	  	var msg = res.file[0];
  	  	$('.dz-error-message:last > span').text(msg);
  	  })
	    Dropzone.autoDiscover= false;

	</script>

  <script src="/lay-admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="/lay-admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="/lay-admin/plugins/bootstrap-timepicker.min.js"></script>

  @endpush
