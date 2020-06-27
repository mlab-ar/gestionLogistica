<?php

namespace App\Http\Controllers;

use App\Video;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class MovieController extends Controller
{
  public function store(Video $video)
  {
      $this->validate(request(),[

          'photo'=>'required|image|max:2048'
      ]);

      $photo = request()->file('photo')->store('/');

      Movie::create([

          'url'=> $photo,
          'video_id' => $video->id
      ]);
  }

  public function destroy(Movie $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Foto eliminada');
  }
}
