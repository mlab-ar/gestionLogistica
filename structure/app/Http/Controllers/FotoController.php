<?php

namespace App\Http\Controllers;

use App\Sponsor;
use App\Foto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class FotoController extends Controller
{
  public function store(Sponsor $sponsor)
  {
      $this->validate(request(),[

          'photo'=>'required|image|max:2048'
      ]);

      $photo = request()->file('photo')->store('/');

      Foto::create([

          'url'=> $photo,
          'sponsor_id' => $sponsor->id
      ]);
  }

  public function destroy(Foto $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Foto eliminada');
  }
}
