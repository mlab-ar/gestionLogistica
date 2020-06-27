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
            <li class="breadcrumb-item"><a href="">Usuarios</a></li>
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
            <h3 class="card-title">EDITAR USUARIO</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.users.update', $user)}} ">
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
                              <span class="input-group-text" style="background-color:#007BFF;color:white">Código de Cliente</span>
                            </div>
                            <input type="text" class="form-control" name="id" value="{{ $user->id}}" disabled>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text" style="background-color:#EC811A;color:black">CLIENTE</span>
                            </div>
                            <input type="text" class="form-control" name="cliente" value="{{ $user->name}}" disabled>
                          </div>

                          <div class="form-group col-md-6">
                              <label>ACTIVO?</label>
                                <select name="validar" class="form-control select2">
                                <option value="SI" {{ old('validar',$user->validar) == 'SI' ? 'selected' : ''}}>SI</option>
                                <option value="NO" {{ old('validar',$user->validar) == 'NO' ? 'selected' : ''}}>NO</option>
                              </select>
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
  	      url:'/admin/logistica/editar/{{$user->id}}/photos',
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
