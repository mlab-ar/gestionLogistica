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
            <li class="breadcrumb-item"><a href="{{route('admin.paises.index')}}">Paises</a></li>
            <li class="breadcrumb-item active">Editar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-6">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">EDITAR PAÍS</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.paises.update', $paises)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label class="col-sm-4 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input name="nombre" class="form-control" placeholder="Ingresa el nombre del país" value="{{old('nombre', $paises->nombre)}} ">
                  {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                </div>
              </div>
            </div>

            <!--IDIOMAS-->
            @if(auth()->user()->email=='sec.rojas@gmail.com')
              <div class="col-md-12">
                <div class="card-header">
                  <h3 class="card-title">TRADUCCIONES</h3>
                </div>
                <br/>
                <div class="form-group {{ $errors->has('nombre_pb') ? 'has-error' : '' }}">
                  <label class="col-sm-4 control-label">Nombre PORTU</label>
                  <div class="col-sm-10">
                    <input name="nombre_pb" class="form-control" placeholder="Ingresa el nombre de la categoría" value="{{old('nombre_pb', $paises->nombre_pb)}} ">
                    {!! $errors->first('nombre_pb','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="form-group {{ $errors->has('nombre_us') ? 'has-error' : '' }}">
                  <label class="col-sm-4 control-label">Nombre USA</label>
                  <div class="col-sm-10">
                    <input name="nombre_us" class="form-control" placeholder="Ingresa el nombre de la categoría" value="{{old('name_us', $paises->nombre_us)}} ">
                    {!! $errors->first('nombre_us','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
              </div>
            @else
              <input id="nombre_pb" name="nombre_pb" type="hidden" value="{{old('nombre_pb', $paises->nombre_pb)}}">
              <input id="nombre_us" name="nombre_us" type="hidden" value="{{old('nombre_us', $paises->nombre_us)}}">
            @endif
            <!--IDIOMAS-->

            <!-- <div class="card-footer">
              <button type="submit" class="btn btn-info">GUARDAR</button>
            </div> -->
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
