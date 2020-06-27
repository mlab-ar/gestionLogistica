@extends('layouts.admin')



@section('content')


<div class="container-fluid">
  <div class="col-sm-12">
    <br/>
    <h1 style="text-align:center"class="m-0 text-dark">Gestor de Eventos MateLab | PLATAFORMA WEB</h1>
    <br/><br/>
  </div>

    <div class="row" style="margin-top:10px">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-warning">
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="https://workana.secrojas.com/estilo-eventos/images-cronistas/favicon.ico" alt="Mateventos MateLab" style="width:50px">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Mateventos</h3>
            <h5 class="widget-user-desc">MateLab</h5>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ Route('admin.eventos.index') }}" class="nav-link">
                  Eventos Principales <span class="float-right badge bg-primary">{{$eventos->count()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('admin.personas.index') }}" class="nav-link">
                  Preinscriptos PENDIENTES <span class="float-right badge bg-info">{{$pendientes->count()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('admin.personas.index') }}" class="nav-link">
                  Preinscriptos CONFIRMADOS <span class="float-right badge bg-success">{{$inscriptos->count()}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('admin.personas.index') }}" class="nav-link">
                  Preinscriptos RECHAZADOS <span class="float-right badge bg-danger">{{$rechazados->count()}}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>

    </div>

  </div>


  @endsection

