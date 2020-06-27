<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Photoe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class PhotoeController extends Controller
{
  public function store(Evento $evento)
  {
      $this->validate(request(),[

          'photo'=>'required|image|max:2048'
      ]);

      $photo = request()->file('photo')->store('/');

      Photoe::create([

          'url'=> $photo,
          'evento_id' => $evento->id
      ]);
  }

  public function destroy(Photoe $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Foto eliminada');
  }
}
