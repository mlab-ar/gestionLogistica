<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class PhotopController extends Controller
{
  public function store(Post $post)
  {
      $this->validate(request(),[

          'photo'=>'required|image|max:2048'
      ]);

      $photo = request()->file('photo')->store('/');

      Photop::create([

          'url'=> $photo,
          'post_id' => $post->id
      ]);
  }

  public function destroy(Photop $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Foto eliminada');
  }
}
