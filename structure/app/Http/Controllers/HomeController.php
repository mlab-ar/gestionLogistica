<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Evento;
use App\Agenda;
use App\Speaker;
use App\Sponsor;
use App\Video;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       $configuraciones=Blog::first();
       $eventos= Evento::where('estado','PRINCIPAL')->orderby('published_at')->get();

       return view('inicio', compact('configuraciones','eventos'));
     }

    public function cargaTodo(Evento $evento)
    {
      $configuraciones=Blog::first();
      // $evento= Evento::find($actual->id);
      // dd($evento);
      $sponsors=Sponsor::where('evento_id',$evento->id)->where('activo','SI')->get();
      $sponsorDestacado=Sponsor::where('evento_id',$evento->id)->where('destacado','SI')->first();
      $oradores=Speaker::where('evento_id',$evento->id)->where('activo','SI')->where('destacado','SI')->Orderby('orden')->get();
      $video=Video::where('evento_id',$evento->id)->first();
      $agenda=Agenda::where('evento_id',$evento->id)->where('activo','SI')->Orderby('orden')->get();
      $posts=Post::where('evento_id',$evento->id)->where('activo','SI')->where('destacado','SI')->take(3)->get();
      // dd($sponsorDestacado);
      return view('welcome', compact('configuraciones','evento','sponsors','oradores','video','agenda','posts','sponsorDestacado'));
    }

    public function oradores(Evento $evento)
    {
      $configuraciones=Blog::first();
       /**Variable $evento estaba comentada y la vista oradores la estaba pasando comentada  */
      $evento= Evento::where('estado','PRINCIPAL')->first();
      $oradores=Speaker::where('evento_id',$evento->id)->where('activo','SI')->Orderby('orden')->get();
      $sponsorDestacado=Sponsor::where('evento_id',$evento->id)->where('destacado','SI')->first();
      return view('oradores', compact('configuraciones','evento','oradores','sponsorDestacado'));
    }

    public function contenidos(Evento $evento)
    {
      $configuraciones=Blog::first();
      /**Variable $evento estaba comentada y la vista contenido la estaba pasando comentada  */
      $evento= Evento::where('estado','PRINCIPAL')->first();
      $posts=Post::where('evento_id',$evento->id)->where('activo','SI')->get();
      $sponsorDestacado=Sponsor::where('evento_id',$evento->id)->where('destacado','SI')->first();

      return view('contenidos', compact('configuraciones','evento','posts','sponsorDestacado'));
    }

    public function show(Post $post)
    {
        $configuraciones=Blog::first();
        $evento=Evento::where('id',$post->evento_id)->first();
        $sponsorDestacado=Sponsor::where('evento_id',$evento->id)->where('destacado','SI')->first();
        // dd($post->evento_id);
        /**Linea con error esta pasando una variable blog que no existe */
        //return view('contenidos.show',compact('post','blog','evento','sponsorDestacado'));}
        /**La variable que deberia pasar es $configuraciones */
        return view('contenidos.show',compact('post','configuraciones','evento','sponsorDestacado'));
    }

}
