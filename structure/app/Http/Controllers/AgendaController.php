<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Speaker;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class AgendaController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    // $speakers = Speaker::where('evento_id',$evento->id)->get();
    $agenda = Agenda::all();

    return view('admin.agenda.index', compact('agenda','blog'));
  }

  public function store (Request $request)
  {
      $this->validate($request, ['nombre'=> 'required']);
      $agenda = Agenda::create([
          'nombre'=> $request->get('nombre'),
          'evento_id'=> 0,
          'moderadores'=> '',
          'orden'=> 0,
          'activo'=> 'SI',
          'hora_inicio'=> '08:00',
          'hora_fin'=> '22:00',          
          'speaker_id'=> 0,
      ]);
      return redirect()->route('admin.agenda.edit', $agenda);
  }

  public function update(Agenda $agenda, Request $request)
  {
    $this->validate($request,[
      'nombre' => 'required',
      'evento_id'=> 'required',
      'orden' => 'required',
      'speaker'=> 'required',
      'activo' => 'required',
      'hora_inicio'=> 'required',
      'hora_fin' => 'required'

    ]);

    $agenda->nombre = $request->get('nombre');
    $agenda->orden = $request->get('orden');
    $agenda->moderadores = $request->get('moderadores');
    $agenda->activo = $request->get('activo');
    $agenda->hora_inicio = $request->get('hora_inicio');
    $agenda->hora_fin = $request->get('hora_fin');
    $agenda->speaker_id = Speaker::find($cate = $request->get('speaker'))
                                 ? $cate
                                 : Speaker::create(['nombre' => $cate])->id;
    $agenda->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $agenda->save();

    return redirect()->route('admin.agenda.index', $agenda)->with('flash', 'El registro se guardó correctamente.');
  }

  public function edit(Agenda $agenda)
  {
      $blog = Blog::all();
      $k=[$agenda->evento_id,0];
      $speakers = Speaker::whereIn('evento_id',$k)->get();
      $todos = Evento::all();

      return view('admin.agenda.edit', compact('blog','agenda','speakers','todos'));
  }

  public function destroy(Agenda $agenda)
  {
      $agenda->delete();
      return redirect()->route('admin.agenda.index')->with('flash', 'El registro ha sido eliminado.');
  }

}
