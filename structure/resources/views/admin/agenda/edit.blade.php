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
            <li class="breadcrumb-item"><a href="{{route('admin.agenda.index')}}">Agenda</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-header" style="background-color:black;color:white">
            <h3 class="card-title">EDITAR REGISTRO DE LA AGENDA</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.agenda.update', $agenda)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Título</label>

                    <div class="col-sm-10">
                      <input name="nombre" class="form-control" placeholder="Ingresa el nombre del orador" value="{{old('nombre', $agenda->nombre)}} ">
                      {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('moderadores') ? 'has-error' : '' }}">
                    <label class="col-sm-4 control-label">Moderador/es</label>

                    <div class="col-sm-10">
                      <input name="moderadores" class="form-control" placeholder="Moderadores" value="{{old('moderadores', $agenda->moderadores)}} ">
                      {!! $errors->first('moderadores','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('evento') ? 'has-error' : '' }}">
                    <label class="col-sm-6 control-label">EVENTO DE PREINSCRIPCIÓN</label>

                    <select name="evento_id" id="evento_id" class="form-control select2">
                      <option value="" disabled>Selecciona evento</option>
                      @foreach ($todos as $event)
                        <option value="{{ $event->id}}"
                        {{ old('evento_id', $agenda->evento_id) == $event->id ? 'selected' : '' }}
                        >{{$event->nombre}}</option>
                      @endforeach
                   </select>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-4">
                        <label>Orden</label>
                        <input name="orden"  class="form-control" placeholder="valor numérico" value="{{old('orden', $agenda->orden)}} ">
                        {!! $errors->first('orden','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label>REGISTRO ACTIVO</label>
                          <select name="activo" class="form-control select2">
                          <option value="SI" {{ old('activo',$agenda->activo) == 'SI' ? 'selected' : ''}}>SI</option>
                          <option value="NO" {{ old('activo',$agenda->activo) == 'NO' ? 'selected' : ''}}>NO</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                        <label>Hora Inico</label>
                        <input name="hora_inicio"  class="form-control" placeholder="Hora Inicio" value="{{old('hora_inicio', $agenda->hora_inicio)}} ">
                        {!! $errors->first('hora_inicio','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora Fin</label>
                        <input name="hora_fin"  class="form-control" placeholder="Hora Fin" value="{{old('hora_fin', $agenda->hora_fin)}} ">
                        {!! $errors->first('hora_fin','<span class="help-block">:message</span>') !!}
                    </div>
                  </div>
                  <div class="form-group col-md-6 {{ $errors->has('speaker') ? 'has-error' : '' }}">
                        <label>ORADOR</label>
                          <select name="speaker" id="speaker" class="form-control select2">
                            <option value="" disabled>Selecciona orador</option>
                            @foreach ($speakers as $speaker)
                              <option value="{{ $speaker->id}}"
                              {{ old('speaker', $agenda->speaker_id) == $speaker->id ? 'selected' : '' }}
                              >{{$speaker->nombre}}</option>
                            @endforeach
                         </select>
                    </div>
                </div>

              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;&nbsp; GUARDAR</button>
              <a href="{{url()->previous()}}" class="btn btn-primary btn-danger"><i class="far fa-window-close"></i></span>&nbsp;&nbsp; Cancelar</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </section>

  @endsection

  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>
  @endpush
