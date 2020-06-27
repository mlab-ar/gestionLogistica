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
            <li class="breadcrumb-item"><a href="{{route('admin.empresas.index')}}">Empresas</a></li>
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
            <h3 class="card-title">EDITAR EMPRESA</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.empresas.update', $empresas)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">Nombre</label>

                <div class="col-sm-10">
                  <input name="name" class="form-control" placeholder="Ingresa el nombre de la empresa" value="{{old('name', $empresas->name)}} ">
                  {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                  <br/>
                </div>

              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Usuarios Permitidos</label>

                <div class="col-sm-10">
                  <input name="cant_max" class="form-control" placeholder="Ingresa la cantidad de usuarios permitidos" value="{{old('cant_max', $empresas->cant_max)}} ">
                  {!! $errors->first('cant_max','<span class="help-block">:message</span>') !!}
                  <br/>
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
