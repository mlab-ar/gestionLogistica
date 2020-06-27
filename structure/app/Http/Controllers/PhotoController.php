<?php

namespace App\Http\Controllers;

use App\Speaker;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class PhotoController extends Controller
{
  public function store(Speaker $speaker)
  {
      $this->validate(request(),[

          'photo'=>'required|image|max:2048'
      ]);

      $photo = request()->file('photo')->store('/');

      Photo::create([

          'url'=> $photo,
          'speaker_id' => $speaker->id
      ]);
  }

  public function destroy(Photo $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Foto eliminada');
  }
}
