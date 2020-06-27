@extends('layouts.admin2')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Clientes existentes</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        @if(auth()->user()->role_id == 1)
          <div class="card">
          <div class="card-header">
            <!-- <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar empresa</button> -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="paises-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Foto</th>
                <th>ACTIVO ?</th>
                <th>Último login</th>
                <th>IP</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td> {{$user->id}} </td>
                  <td> {{$user->name}} </td>
                  <td> {{$user->email}} </td>
                  <td>  </td>
                  <td> {{$user->validar}} </td>
                  <td> {{$user->last_login_at}} </td>
                  <td> {{$user->last_login_ip}} </td>
                  <td>
                    <a id="enlace" href="{{url('/')}}/admin/clientes/{{$user["id"]}}"
                      class="btn btn-warning btn-sm" title="Editar registro"
                      >
                      <i class="fas fa-pencil-alt text-white"></i>
                    </a>

                  </td>
                </tr>
                @endforeach
              </tfoot>
            </table>


          </div>
          </div>
        </div>

        @else
        <div class="card">
          <div class="card-header">
            <p>MI CÓDIGO DE CLIENTE: {{auth()->user()->id}}</p>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <p>NOMBRE: {{auth()->user()->name}}</p>
              <p>EMAIL: {{auth()->user()->email}}</p>
          </div>
        </div>
        @endif

      </div>
    </div>
  </section>

  @if (isset($status))
    @if ($status == 200)
      @foreach ($users as $value)
        <div class="modal fade" id="editarAdministrador">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header bg-info">
                  <h4 class="modal-title">Editar Usuario</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                         <i class="fas fa-user"></i>
                      </div>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$value["name"]}}" required autocomplete="name" autofocus placeholder="Nombre">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                         <i class="fas fa-envelope"></i>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$value["email"]}}" required autocomplete="email" placeholder="Email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                         <i class="fas fa-key"></i>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <input type="hidden" name="password_actual" value="">
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-list-ul"></i>
                      </div>

                    </div>
                    <hr class="pb-2">
                    <div class="form-group my-2 text-center">
                      <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Adjuntar Foto
                        <input type="file" name="foto">
                      </div>
                      <br>

                      <input type="hidden" value="" name="imagen_actual">
                      <p class="help-block small">Dimensiones: 200px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                  <div>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Cerrar</a>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach

      @else
      {{$status}}
    @endif
  @endif

  @endsection

  @push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/lay-admin/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/lay-admin/dist/css/adminlte.min.css">
  @endpush

  @push('scripts')

    <script src="/lay-admin/plugins/datatables/jquery.dataTables.js"></script>

    <script src="/lay-admin/plugins/datatables/dataTables.bootstrap4.js"></script>

    <script src="/lay-admin/plugins/fastclick/fastclick.js"></script>

    <script>
      $(function () {
          $('#paises-table').DataTable({

          "language":{
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtrada de _MAX_ registros)",
              "loadingRecords": "Cargando...",
              "processing":     "Procesando...",
              "search": "Buscar:",
              "zeroRecords":    "No se encontraron registros coincidentes",
              "paginate": {
                "next":       "Siguiente",
                "previous":   "Anterior"
              },
            },

          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      });
    </script>



  @endpush
