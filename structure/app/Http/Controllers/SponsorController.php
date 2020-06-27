<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class SponsorController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    $sponsors=Sponsor::all();
    return view('admin.sponsors.index', compact('blog','sponsors'));
  }

  public function store (Request $request)
  {
      $this->validate($request, ['nombre'=> 'required']);
      $sponsors = Sponsor::create([
          'nombre'=> $request->get('nombre'),
          'empresa'=> $request->get('nombre'),
          'activo'=> 'SI',
          'destacado'=> 'NO',
          'evento_id'=> 0,
      ]);

      return redirect()->route('admin.sponsors.edit', $sponsors);
  }

  public function update(Sponsor $sponsors, Request $request)
  {
    $this->validate($request,[
      'nombre' => 'required',
      'evento_id'=> 'required',
      'empresa'=>'required',
      'activo'=>'required',
      'destacado'=>'required'
    ]);

    $sponsors->nombre = $request->get('nombre');
    $sponsors->empresa = $request->get('empresa');
    $sponsors->activo = $request->get('activo');
    $sponsors->destacado = $request->get('destacado');

    $sponsors->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $sponsors->save();

    return redirect()->route('admin.sponsors.index', $sponsors)->with('flash', 'El sponsor fue actualizado.');
  }

  public function edit(Sponsor $sponsors)
  {
    $blog = Blog::all();
    $todos = Evento::all();
    return view('admin.sponsors.edit', compact('sponsors','blog','todos'));
  }

  public function destroy(Sponsor $sponsors)
  {
      $sponsors->delete();
      return redirect()->route('admin.sponsors.index')->with('flash', 'El sponsor fue elimnado');
  }

}
