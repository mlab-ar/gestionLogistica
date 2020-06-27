@extends('layouts.admin')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Pre-Inscriptos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Pre-Inscriptos</li>
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

            <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar pre-inscripto</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="paises-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empresa</th>
                <th>Cargo</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Evento</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($personas as $persona)
                <tr>
                  <td> {{$persona->nombre}} </td>
                  <td> {{$persona->apellido}} </td>
                  <td> {{$persona->empresa}} </td>
                  <td> {{$persona->cargo}} </td>
                  <td> {{$persona->sexo}} </td>
                  <td> {{$persona->email}} </td>


                  <td> <span class="badge badge-primary" style="background-color:{{$persona->evento->color}};font-size:13px">{{$persona->evento->nombre_destacado}}</span></td>

                  @if($persona->estado == 'PRE-INSCRIPTO')
                    <td><span class="badge badge-success">PRE-INSCRIPTO</span></td>
                  @endif
                  @if($persona->estado == 'PENDIENTE')
                    <td><span class="badge badge-danger">PENDIENTE DE VALIDAR</span></td>
                  @endif
                  @if($persona->estado == 'RECHAZADO')
                    <td><span class="badge badge-danger" style="background-color:black">RECHAZADO</span></td>
                  @endif

                  <td>
                    @if($persona->estado == 'PENDIENTE')
                      <form method="POST"
                        action="{{ route('contactos.ok',$persona) }}"
                        title="Aceptar preinscripción"
                        style="display: inline">
                        {{ csrf_field() }} {{ method_field('PUT')}}
                        <input type="hidden" id="subject" name="subject" value="Confirmación de preinscrición - Eventos Corporativos El Cronista">
                        <input type="hidden" id="mail" name="mail" value="{{$persona->email}}">
                        <input type="hidden" id="estado" name="estado" value="PRE-INSCRIPTO">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-user-check"></i></button>
                      </form>

                      <form method="POST"
                        action="{{ route('contactos.cancel',$persona) }}"
                        title="Rechazar preinscripción"
                        style="display: inline">
                        {{ csrf_field() }} {{ method_field('PUT')}}
                        <input type="hidden" id="subject" name="subject" value="Rechazo de preinscrición - Eventos Corporativos El Cronista">
                        <input type="hidden" id="mail" name="mail" value="{{$persona->email}}">
                        <input type="hidden" id="estado" name="estado" value="RECHAZADO">
                        <button class="btn btn-sm btn-warning" type="submit"><i class="fas fa-ban"></i></button>
                      </form>
                    @endif

                    <a href="{{ route('admin.personas.edit', $persona )}}" class="btn btn-sm btn-primary" title="Editar registro"><i class="far fa-edit"></i></i></a>

                    <form method="POST"
                      action="{{ route('admin.personas.destroy',$persona) }}"
                      title="Borrar registro"
                      style="display: inline">

                      {{ csrf_field() }} {{ method_field('DELETE') }}

                      <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Estás seguro de querer eliminar al pre-inscripto?')"
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
    <form method="POST" action="{{route('admin.personas.store')}}" >
      {{ csrf_field() }}
      <div class="modal-dialog">
        <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h4 class="modal-title" id="myModal">Agrega el nombre del pre-inscripto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}" >
              <input class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Ingresa aquí el nombre del pre-inscripto" required>
              {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  @endpush

  @push('scripts')
    <script src="/lay-admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/lay-admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="/lay-admin/plugins/fastclick/fastclick.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script>
      $(function () {
          $('#paises-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel'
            ],

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
          'autoWidth'   : false,
          'pageLength'   : 25,
          'order'   : [[ 3, "asc" ]]

        })
        table.buttons().container()
                .appendTo( '#paises-table_wrapper .col-md-6:eq(0)' );
      });
    </script>
  @endpush
