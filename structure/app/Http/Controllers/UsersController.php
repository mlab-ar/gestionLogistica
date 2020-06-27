<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;

class UsersController extends Controller{

    public function index()
    {
        // $users=User::where('last_name','<>','CMS GROUP')->get();
        $users=User::where('role_id','=',3)->get();
        $blog = Blog::all();
        // $users2=User::all();

        return view('admin.users.index',compact('users','blog'));
    }

    public function show($id)
    {
      // $users=User::where('role_id','=',3)->get();
      $blog = Blog::all();
      $users = User::where("id", $id)->get();

      if(count($users) != 0)
      {
			   return view('admin.users.index', array("status"=>200, "blog"=>$blog, "users"=>$users));
		  }
     }

     public function update(User $user, Request $request)
     {

       $user->validar = $request->get('validar');

       $user->save();

       return redirect()->route('admin.users.index')->with('flash', 'El detalle del registro fue guardado correctamente.');
     }

     public function edit(User $user)     {
       $blog = Blog::all();
       return view('admin.users.edit',compact('user','blog'));
     }

      public function destroy(User $user)
      {
          try {
            $user->delete();
            return redirect()->route('admin.users.index')->withFlash('Usuario elimando');
          }
          catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('admin.users.index')->with('flash2', 'El usuario que esta intentando eliminar tiene registros asociados.');
          }
      }
}
