<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class EventoController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    // $evento=Evento::where('estado','PRINCIPAL')->get();
    $evento=Evento::all();

    return view('admin.eventos.index', compact('evento','blog'));
  }

  public function store (Request $request)
  {
      $this->validate($request, ['nombre'=> 'required']);
      $evento = Evento::create([
          'nombre'=> $request->get('nombre'),
          'nombre_destacado'=> $request->get('nombre'),
          'url'=> str_slug($request->get('nombre')),
          'descripcion'=> $request->get('nombre'),
          'lugar_linea1'=> 'Dirección A',
          'lugar_linea2'=> 'Dirección A',
          'tel1'=> '011 4444 5555',
          'tel2'=> '011 4444 5555',
          'email'=> 'mail@gmail.com',
          'facebook'=> 'https://facebook.com',
          'twitter'=> 'https://twitter.com',
          'instagram'=> 'https://instagram.com',
          'youtube'=> 'https://youtube.com',
          'linkedin'=> 'https://linkeid.com',
          'script_mapa'=> '',
          'published_at'=> Carbon::now(),
          'activo'=> 'NO',
          'destacado'=> 'NO',
          'estado'=> 'SECUNDARIO',
          'imagen_agenda'=> 'NO',
          'color'=>'#000000'
      ]);
      return redirect()->route('admin.eventos.edit', $evento);
  }

  public function update(Evento $evento, Request $request)
  {
    $this->validate($request,[
      'nombre' => 'required',
      'nombre_destacado' => 'required',
      'color' => 'required',
      'descripcion' => 'required',
      'activo' => 'required',
      'destacado' => 'required',
      'imagen_agenda' => 'required',
      'estado' => 'required'
    ]);

    // $cantidad= Evento::where('estado','PRINCIPAL')->count();
    // $estadoactual=$request->get('estado');
    // dd($evento->estado);
    // if($cantidad>0 and $evento->estado=='SECUNDARIO')
    // {
    //   return redirect()->route('admin.eventos.edit', $evento)->with('flash2', 'Ya existe un evento como PRINCIPAL. Solo puede modificar ese evento..');
    // }
    // else {
      $evento->nombre = $request->get('nombre');
      $evento->nombre_destacado = $request->get('nombre_destacado');
      $evento->color = $request->get('color');
      $evento->url = str_slug($request->get('nombre'));
      $evento->descripcion = $request->get('descripcion');
      $evento->lugar_linea1 = $request->get('lugar_linea1');
      $evento->lugar_linea2 = $request->get('lugar_linea2');
      $evento->tel1 = $request->get('tel1');
      $evento->tel2 = $request->get('tel2');
      $evento->email = $request->get('email');
      $evento->facebook = $request->get('facebook');
      $evento->twitter = $request->get('twitter');
      $evento->instagram = $request->get('instagram');
      $evento->youtube = $request->get('youtube');
      $evento->linkedin = $request->get('linkedin');
      $evento->script_mapa = $request->get('script_mapa');
      $evento->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
      $evento->activo = $request->get('activo');
      $evento->destacado = $request->get('destacado');
      $evento->imagen_agenda = $request->get('imagen_agenda');
      $evento->estado = $request->get('estado');

      $evento->save();

      return redirect()->route('admin.eventos.index', $evento)->with('flash', 'El evento se guardó correctamente.');
    // }

  }

  public function edit(Evento $evento)
  {
      $blog = Blog::all();

      return view('admin.eventos.edit', compact('blog','evento'));
  }

  public function destroy(Evento $evento)
  {
      $evento->delete();
      return redirect()->route('admin.eventos.index')->with('flash', 'El evento ha sido eliminado.');
  }

}
