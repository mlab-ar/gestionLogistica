<?php

namespace App\Http\Controllers;

use App\Video;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class VideoController extends Controller
{
  public function index()
  {
    $blog = Blog::all();

    $videos = Video::all();
    return view('admin.video.index', compact('videos','blog'));
  }

  public function store (Request $request)
  {
      // dd($evento->id);
      $this->validate($request, ['link'=> 'required']);
      $videos = Video::create([
          'link'=> $request->get('link'),
          'titulo'=> 'Ediciones anteriores',
          'texto'=> 'Texto informativo en relación al video del evento',
          'evento_id'=> 0,
      ]);

      return redirect()->route('admin.video.edit', $videos);
  }

  public function update(Video $videos, Request $request)
  {
    $this->validate($request,[
      'link' => 'required',
      'titulo' => 'required',
      'evento_id'=> 'required',
      'texto'=>'required'
    ]);

    $videos->link = $request->get('link');
    $videos->titulo = $request->get('titulo');
    $videos->texto = $request->get('texto');

    $videos->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $videos->save();

    return redirect()->route('admin.video.index', $videos)->with('flash', 'Los datos del video fueron guardados.');
  }

  public function edit(Video $videos)
  {
    $blog = Blog::all();
    $todos = Evento::all();

    return view('admin.video.edit', compact('videos','blog','todos'));
  }

  public function destroy(Video $videos)
  {
      $videos->delete();
      return redirect()->route('admin.video.index')->with('flash', 'El video fue elimnado');
  }

}
