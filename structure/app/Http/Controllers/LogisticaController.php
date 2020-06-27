<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Logistica;
use App\Blog;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class LogisticaController extends Controller
{
  public function index($id)
  {
    $mercaderias = Logistica::with(['user'])->get();
    $blog = Blog::all();
    $registros=Logistica::where('user_id','=',$id)->get();
    $clientes=User::where('role_id','=',3)->get();
    return view('admin.logistica.index', compact('mercaderias','blog','registros','clientes'));
  }

  public function store (Request $request)
  {

      $mercaderias = Logistica::create([
          'user_id'=> $request->get('name'),
          'slug'=> $request->get('name'),
          'activo'=> 'SI',
          'fecha_entrada' => '2019-12-06 00:00:00',
      ]);
      return redirect()->route('admin.logistica.edit', $mercaderias);
  }

  public function update(Logistica $mercaderias, Request $request)
  {
     $this->validate($request,[
      'activo'=> 'required'
     ]);

    $mercaderias->activo = $request->get('activo');
    $mercaderias->num_partida = $request->get('num_partida');
    $mercaderias->expediente = $request->get('expediente');
    $mercaderias->doc_entrada = $request->get('doc_entrada');
    $mercaderias->doc_aduana = $request->get('doc_aduana');

    $mercaderias->fecha_entrada = $request->has('fecha_entrada') ? Carbon::parse($request->get('fecha_entrada')) : null;

    $mercaderias->manifiesto = $request->get('manifiesto');
    $mercaderias->almacen = $request->get('almacen');
    $mercaderias->matricula = $request->get('matricula');
    $mercaderias->contenedor = $request->get('contenedor');
    $mercaderias->unidad_carga = $request->get('unidad_carga');
    $mercaderias->nom_exportador = $request->get('nom_exportador');
    $mercaderias->num_bultos = $request->get('num_bultos');
    $mercaderias->clase = $request->get('clase');
    $mercaderias->ubicacion = $request->get('ubicacion');
    $mercaderias->peso = $request->get('peso');
    $mercaderias->volumen = $request->get('volumen');
    $mercaderias->tipo_mercancia = $request->get('tipo_mercancia');
    $mercaderias->marcas = $request->get('marcas');
    $mercaderias->procedencia = $request->get('procedencia');
    $mercaderias->destino = $request->get('destino');
    $mercaderias->cubicaje = $request->get('cubicaje');
    $mercaderias->observaciones = $request->get('observaciones');

    $mercaderias->save();

    return redirect()->route('admin.logistica.index', auth()->user()->id)->with('flash', 'El detalle del registro fue guardado correctamente.');
  }

  public function edit(Logistica $mercaderias)
  {
    $blog = Blog::all();
    return view('admin.logistica.edit',compact('mercaderias','blog'));
  }

  public function destroy(Logistica $mercaderias)
  {
      $mercaderias->delete();
      return redirect()->route('admin.logistica.index', auth()->user()->id)->with('flash', 'El registro fue elimnado');
  }

  public function editfile(Logistica $mercaderias)
  {
    $blog = Blog::all();
    return view('admin.logistica.editfile', compact('mercaderias','blog'));
  }

}
