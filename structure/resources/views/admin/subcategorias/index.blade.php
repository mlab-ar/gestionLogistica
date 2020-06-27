@extends('layouts.admin')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Sub Categorias</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Sub Categorias</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">

            <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar subcategoría</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="paises-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($categorias->where('id','!=',0) as $categoria)
                <tr>
                  <td> {{$categoria->name}} </td>
                  <td>
                    <a href="{{ route('admin.subcategorias.edit', $categoria )}}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>

                    <form method="POST"
                      action="{{ route('admin.subcategorias.destroy',$categoria) }}"
                      style="display: inline">

                      {{ csrf_field() }} {{ method_field('DELETE') }}

                      <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Estás seguro de querer eliminar la subcategoría?')"
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
      </div>
    </div>
  </section>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" action="{{route('admin.subcategorias.store')}}" >
      {{ csrf_field() }}
      <div class="modal-dialog">
        <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h4 class="modal-title" id="myModal">Agrega el nombre de la subcategoría</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}" >
              <input class="form-control" name="name" value="{{old('name')}}" placeholder="Ingresa aquí el nombre de la subcategoría" required>
              {!! $errors->first('name','<span class="help-block">:message</span>') !!}
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-light">Agregar</button>
          </div>
        </div>
      </div>
    </form>
  </div>

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
