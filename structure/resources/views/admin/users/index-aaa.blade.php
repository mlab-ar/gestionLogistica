@extends('layouts.admin')

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
                <th>Nombre</th>
                <th>Email</th>
                <th>ACTIVO ?</th>
                <th>Último login</th>
                <th>IP</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td> {{$user->name}} </td>
                  <td> {{$user->email}} </td>
                  <td> {{$user->validar}} </td>
                  <td> {{$user->last_login_at}} </td>
                  <td> {{$user->last_login_ip}} </td>
                  <td>
                    <a href="{{ route('admin.users.edit', $user )}}" title="Editar registro" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                    <form method="POST"
                      action="{{ route('admin.users.destroy',$user) }}"
                      style="display: inline">

                      {{ csrf_field() }} {{ method_field('DELETE') }}

                      <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Estás seguro de querer eliminar el usuario?')"
                      ><i class="fas fa-trash"></i></button>
                    </form>
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
              <p>ACTIVO: {{auth()->user()->validar}}</p>
          </div>
        </div>
        @endif

      </div>
    </div>
  </section>

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
