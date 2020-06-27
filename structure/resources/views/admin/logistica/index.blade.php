@extends('layouts.admin')

@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Logística</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Mercaderias</li>
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
              <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Agregar registro</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="paises-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Certificado</th>
                  <th>Cliente</th>
                  <th>Nº Partida</th>
                  <th>Expediente</th>
                  <th>Doc. Entrada</th>
                  <th>Doc. Aduanero</th>
                  <th>Fec.de Entrega</th>
                  <th>ACTIVO</th>

                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($mercaderias as $video)
                  <tr>
                    <td> {{$video->id}} </td>
                    <td> {{$video->user->name}} </td>
                    <td> {{$video->num_partida}} </td>
                    <td> {{$video->expediente}} </td>
                    <td> {{$video->doc_entrada}} </td>
                    <td> {{$video->doc_aduana}} </td>
                    <td> {{$video->fecha_entrada->format('d/m/Y')}} </td>
                    <td> {{$video->activo}} </td>

                    <td>
                      <a href="{{ route('admin.logistica.edit', $video )}}" title="Editar registro" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                      <a href="{{ route('admin.logistica.editfile', $video )}}" title="Subir Adjuntos" class="btn btn-sm btn-warning"><i class="far fa-file-powerpoint"></i></a>

                      <form method="POST"
                        action="{{ route('admin.logistica.destroy',$video) }}"
                        style="display: inline" title="Eliminar registro">

                        {{ csrf_field() }} {{ method_field('DELETE') }}

                        <button class="btn btn-sm btn-danger"
                          onclick="return confirm('Estás seguro de querer eliminar el registro?')"
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
            <p>
              Detalle de mis registros: {{$registros->count()}} registros.
            </p>
          </div>
          <!-- /.card-header -->

            @if($registros->count()>0)
              <div class="row">
                @foreach($registros as $registro)
                <div class="col-md-12">
                  <div class="card card-warning collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">Número de Certificado de recepción: {{$registro->id}} | Fecha de entrada: {{$registro->fecha_entrada->format('d/m/Y')}} </h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">

                        <div class="col-lg-6" style="padding-top:20px">
                          <div class="card card-primary card-outline">
                            <div class="card-body">
                              <p class="card-text">
                                Número de partida: {{$registro->num_partida}}
                              </p>
                              <p class="card-text">
                                Expediente: {{$registro->expediente}}
                              </p>
                              <p class="card-text">
                                Documento de Entrada: {{$registro->doc_entrada}}
                              </p>
                              <p class="card-text">
                                Documento de Aduanero: {{$registro->doc_aduana}}
                              </p>
                              <p class="card-text">
                                Manifiesto: {{$registro->manifiesto}}
                              </p>
                              <p class="card-text">
                                Almacén: {{$registro->almacen}}
                              </p>
                              <p class="card-text">
                                Matricula Vehículo: {{$registro->matricula}}
                              </p>
                              <p class="card-text">
                                Contenedor: {{$registro->contenedor}}
                              </p>
                              <p class="card-text">
                                Tipo Unidad Carga: {{$registro->unidad_carga}}
                              </p>
                              <p class="card-text">
                                Nombre del exportador: {{$registro->nom_exportador}}
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6" style="padding-top:20px">
                          <div class="card card-primary card-outline">
                            <div class="card-body">
                              <!-- <p class="card-text">
                                Fecha de entrada: {{$registro->fecha_entrada->format('m/d/Y')}}
                              </p> -->
                              <p class="card-text">
                                Nº de bultos: {{$registro->clase}}
                              </p>
                              <p class="card-text">
                                Clase: {{$registro->doc_entrada}}
                              </p>
                              <p class="card-text">
                                Ubicación: {{$registro->ubicacion}}
                              </p>
                              <p class="card-text">
                                Peso Bruto (kg): {{$registro->peso}}
                              </p>
                              <p class="card-text">
                                Volumen: {{$registro->volumen}}
                              </p>
                              <p class="card-text">
                                Tipo mercancia: {{$registro->tipo_mercancia}}
                              </p>
                              <p class="card-text">
                                Marcas: {{$registro->marcas}}
                              </p>
                              <p class="card-text">
                                Procedencia: {{$registro->procedencia}}
                              </p>
                              <p class="card-text">
                                Destino: {{$registro->destino}}
                              </p>
                              <p class="card-text">
                                Cubicaje acumulado: {{$registro->cubicaje}}
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12" style="padding-left:15px;padding-right:15px;padding-top:20px">
                        <div class="card card-primary card-outline">
                          <div class="card-body">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Observaciones</span>
                              </div>
                            </div>
                            {{$registro->observaciones}}
                          </div>
                        </div>
                      </div>

                      @if ($registro->photos->count())
                        <div class="col-lg-12" style="padding-left:15px;padding-right:15px;padding-top:20px">
                          <div class="card card-primary card-outline">
                            <div class="container-fluid">
                              <h5 class="mb-2">Imágenes cargadas</h5>
                              <div class="row">
                                @foreach ($registro->photos as $photo)
                                  <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box" style="width: 295px;">
                                      <!-- <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span> -->
                                      <a  href="/imagenderegistro/{{$photo->url}}" title="Descargar imagen" class="btn btn-primary btn-sm" style="position: relative"><i class="fas fa-download"></i></a>
                                      <div class="info-box-content">
                                        <img class="img-responsive" src="/imagenderegistro/{{$photo->url}}" style="width:200px">
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if($registro->files->count())
                        <div class="col-lg-12" style="padding-left:15px;padding-right:15px;padding-top:20px">
                          <div class="card card-primary card-outline">
                            <div class="container-fluid">
                               <h5 class="mb-2">Archivos cargados</h5>
                              <div class="row">
                                @foreach ($registro->files as $photo)
                                  <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box" style="width: 200px;">
                                      <a  href="/imagenderegistro/{{$photo->url}}" title="Descargar imagen" class="btn btn-primary btn-sm" style="position: relative"><i class="fas fa-download"></i></a>
                                      <div class="info-box-content" align="center">
                                        <img class="img-responsive" src="/lay-admin/dist/img/iconos/archivos.png">
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>

                @endforeach
              </div>

            @else
            <div class="card-body">
              <p>
                No posee registros asociados.
              </p>
            </div>
            @endif
        </div>
        @endif
      </div>

    </div>
  </section>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="POST" action="{{route('admin.logistica.store')}}" >
      {{ csrf_field() }}
      <div class="modal-dialog">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title" id="myModal">Selecciona el cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <select name="name" id="name" class="form-control select2">
                <option value="" disabled>Selecciona un cliente</option>
							  @foreach ($clientes as $cliente)
									<option value="{{ $cliente->id}}"
									>{{$cliente->name}}</option>
							  @endforeach
						 </select>
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
    <link rel="stylesheet" href="/lay-admin/plugins/select2/css/select2.min.css">
  @endpush

  @push('scripts')
    <script src="/lay-admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/lay-admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="/lay-admin/plugins/fastclick/fastclick.js"></script>
    <script src="/lay-admin/plugins/select2/js/select2.full.min.js"></script>

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
          'autoWidth'   : false,
          'pageLength'   : 100
        })
      });
    </script>
  @endpush
