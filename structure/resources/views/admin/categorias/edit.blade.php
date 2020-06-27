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
            <li class="breadcrumb-item"><a href="{{route('admin.categorias.index')}}">Categorías</a></li>
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
            <h3 class="card-title">EDITAR CATEGORÍA</h3>
          </div>

          <form class="form-horizontal"  method="POST" action="{{route('admin.categorias.update', $categorias)}} ">
            {{ csrf_field() }} {{ method_field('PUT')}}
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">Nombre</label>

                <div class="col-sm-10">
                  <input name="name" class="form-control" placeholder="Ingresa el nombre de la categoría" value="{{old('name', $categorias->name)}} ">
                  {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                  <br/>
                </div>

                <div class="form-group col-md-6">
                    <label>CATEGORÍA DESTACADA</label>
                      <select name="destacado" class="form-control select2">
                      <option value="SI" {{ old('destacado',$categorias->destacado) == 'SI' ? 'selected' : ''}}>SI</option>
                      <option value="NO" {{ old('destacado',$categorias->destacado) == 'NO' ? 'selected' : ''}}>NO</option>
                    </select>
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
                <div class="form-group {{ $errors->has('name_pb') ? 'has-error' : '' }}">
                  <label class="col-sm-4 control-label">Nombre PORTU</label>
                  <div class="col-sm-10">
                    <input name="name_pb" class="form-control" placeholder="Ingresa el nombre de la categoría" value="{{old('name_pb', $categorias->name_pb)}} ">
                    {!! $errors->first('name_pb','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="form-group {{ $errors->has('name_us') ? 'has-error' : '' }}">
                  <label class="col-sm-4 control-label">Nombre USA</label>
                  <div class="col-sm-10">
                    <input name="name_us" class="form-control" placeholder="Ingresa el nombre de la categoría" value="{{old('name_us', $categorias->name_us)}} ">
                    {!! $errors->first('name_us','<span class="help-block">:message</span>') !!}
                  </div>
                </div>
              </div>
              @else
                <input id="name_pb" name="name_pb" type="hidden" value="{{old('name_pb', $categorias->name_pb)}}">
                <input id="name_us" name="name_us" type="hidden" value="{{old('name_us', $categorias->name_us)}}">
            @endif
            <!--IDIOMAS-->

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
