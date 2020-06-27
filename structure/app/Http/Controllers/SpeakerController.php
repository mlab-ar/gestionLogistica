<?php

namespace App\Http\Controllers;

use App\Speaker;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class SpeakerController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    $speakers = Speaker::all();

    return view('admin.speakers.index', compact('speakers','blog'));
  }
  public function store (Request $request)
  {
      $evento= Evento::where('estado','PRINCIPAL')->first();
      // dd($evento->id);
      $this->validate($request, ['nombre'=> 'required']);
      $speakers = Speaker::create([
          'nombre'=> $request->get('nombre'),
          'descripcion'=> $request->get('nombre'),
          'puesto'=> $request->get('nombre'),
          'orden'=> 0,
          'activo'=> 'SI',
          'destacado'=> 'NO',
          'evento_id'=> 0,
      ]);

      return redirect()->route('admin.speakers.edit', $speakers);
  }

  public function update(Speaker $speakers, Request $request)
  {
    $this->validate($request,[
      'nombre' => 'required',
      'evento_id'=> 'required',
      'descripcion'=>'required',
      'puesto'=>'required',
      'orden'=>'required',
      'activo'=>'required',
      'destacado'=>'required'
    ]);

    $speakers->nombre = $request->get('nombre');
    $speakers->descripcion = $request->get('descripcion');
    $speakers->orden = $request->get('orden');
    $speakers->puesto = $request->get('puesto');
    $speakers->activo = $request->get('activo');
    $speakers->destacado = $request->get('destacado');
    $speakers->facebook = $request->get('facebook');
    $speakers->twitter = $request->get('twitter');
    $speakers->linkedin = $request->get('linkedin');

    $speakers->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $speakers->save();

    return redirect()->route('admin.speakers.index', $speakers)->with('flash', 'Los datos del orador fueron guardados');
  }

  public function edit(Speaker $speakers)
  {
    $blog = Blog::all();
    $todos = Evento::all();
    return view('admin.speakers.edit', compact('speakers','blog','todos'));
  }

  public function destroy(Speaker $speakers)
  {
      $speakers->delete();
      return redirect()->route('admin.speakers.index')->with('flash', 'El orador fue elimnado');
  }
}
