<?php

namespace App\Http\Controllers;

use App\Post;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class PostController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    $posts=Post::all();

    return view('admin.posts.index', compact('blog','posts'));
  }

  public function store (Request $request)
  {
      $this->validate($request, ['title'=> 'required']);
      $post = Post::create([
          'title'=> $request->get('title'),
          'url'=> str_slug($request->get('title')),
          'intro'=> $request->get('title'),
          'body'=> $request->get('title'),
          'published_at'=> Carbon::now(),
          'activo'=>'SI',
          'destacado'=>'NO',
          'evento_id'=> 0,
      ]);

      return redirect()->route('admin.posts.edit', $post);
  }

  public function update(Post $post, Request $request)
  {
    $this->validate($request,[

      'title' => 'required',
      'evento_id'=> 'required',
      'body' => 'required',
      'intro' => 'required',
      'destacado' => 'required',
      'activo'=>'required'
    ]);

    $post->title = $request->get('title');
    $post->url = str_slug($request->get('title'));
    $post->body = $request->get('body');
    $post->intro = $request->get('intro');
    $post->activo = $request->get('activo');
    $post->destacado = $request->get('destacado');
    $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;

    $post->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $post->save();

    return redirect()->route('admin.posts.index', $post)->with('flash', 'Tu publicación ha sido guardada');
  }

  public function edit(Post $post)
  {
      $blog = Blog::all();
      $todos = Evento::all();
      return view('admin.posts.edit', compact('blog','post','todos'));
  }

  public function destroy(Post $post)
  {
      $post->delete();
      return redirect()->route('admin.posts.index')->with('flash', 'La publicación ha sido eliminada');
  }

}
