<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administradores;
use App\Blog;
use Illuminate\Support\Facades\Hash;

class AdministradoresController extends Controller
{
  public function index()
  {
    if(request()->ajax())
    {
        return datatables()->of(Administradores::all())
        ->addColumn('acciones', function($data){

          $acciones = '<div class="btn-group">

                <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt text-white"></i>
                </a>

                <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="administradores" token="'.csrf_token().'">
                <i class="fas fa-trash-alt"></i>
                </button>

                </div>';

          return $acciones;

        })
        ->rawColumns(['acciones'])
        -> make(true);
    }

    $blog = Blog::all();
    $administradores = Administradores::all();

    return view('admin.administradores.index', array("blog"=>$blog, "administradores"=>$administradores));
  }
}
