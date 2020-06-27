<?php

namespace App\Http\Controllers;

use App\Logistica;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class FileController extends Controller
{
  public function store(Logistica $mercaderia)
  {
      $this->validate(request(),[
          'file'=>'required|max:2048'
      ]);
    //  $photo = request()->file('file')->store('/');
       $photo = request()->file('file')->storeAs('/',request()->file->getClientOriginalName());
     // return request()->file->storeAs('uploads', request()->file->getClientOriginalName());

      File::create([

          'url'=> $photo,
          'logistica_id' => $mercaderia->id
      ]);
  }

  public function destroy(File $photo)
  {
      $photo->delete();
      $photoPath = str_replace('storage', '/',$photo->url);
      Storage::delete($photoPath);
      return back()->with('flash', 'Adjunto eliminado');
  }
}
