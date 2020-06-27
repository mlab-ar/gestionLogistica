<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Blog;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Request\StorePostRequest;
use Mail;

class PersonaController extends Controller
{
  public function index()
  {
    $blog = Blog::all();
    // $evento= Evento::where('estado','PRINCIPAL')->first();
    // $personas=Persona::where('evento_id',$evento->id)->get();
    $personas = Persona::all();
    return view('admin.personas.index', compact('blog','personas'));
  }

  public function store (Request $request)
  {
      // $evento= Evento::where('estado','PRINCIPAL')->first();

      $this->validate($request, ['nombre'=> 'required']);
      $personas = Persona::create([
          'nombre'=> $request->get('nombre'),
          'apellido'=> $request->get('nombre'),
          'sexo'=> 'SEXO',
          'empresa'=> 'NOMBRE EMPRESA',
          'cargo'=> 'OTRO',
          'dni'=> '11111111',
          'edad'=> 'edad',
          'telefono'=> '011 45674567',
          'celular'=> '011 45674567',
          'provincia'=> 'Provincia',
          'localidad'=> 'localidad',
          'email'=> 'nombre@mail.com',
          'web'=> 'miweb.com.ar',
          'activo'=> 'SI',
          'estado'=> 'PENDIENTE',
          'evento_id'=> 0,
      ]);
      return redirect()->route('admin.personas.edit', $personas);
  }

  public function update(Persona $personas, Request $request)
  {
    $this->validate($request,[
      'nombre' => 'required',
      'apellido'=>'required',
      'evento_id'=> 'required',
      'empresa'=>'required',
      'sexo'=>'required',
      'cargo'=>'required',
      'dni'=> 'required',
      'edad'=> 'required',
      'celular'=> 'required',
      'provincia'=> 'required',
      'localidad'=> 'required',
      'email'=> 'required',
      'web'=> 'required',
      'activo'=>'required',
      'estado'=>'required'
    ]);

    $personas->nombre = $request->get('nombre');
    $personas->apellido = $request->get('apellido');
    $personas->sexo = $request->get('sexo');
    $personas->empresa = $request->get('empresa');
    $personas->cargo = $request->get('cargo');
    $personas->dni = $request->get('dni');
    $personas->edad = $request->get('edad');
    $personas->provincia = $request->get('provincia');
    $personas->localidad = $request->get('localidad');
    $personas->telefono = $request->get('telefono');
    $personas->celular = $request->get('celular');
    $personas->email = $request->get('email');
    $personas->web = $request->get('web');
    $personas->activo = $request->get('activo');
    $personas->estado = $request->get('estado');

    $personas->evento_id = Evento::find($cate = $request->get('evento_id'))
                                 ? $cate
                                 : Evento::create(['nombre' => $cate])->id;

    $personas->save();

    return redirect()->route('admin.personas.index', $personas)->with('flash', 'Los datos del preinscripto fueron actualizados.');
  }

  public function edit(Persona $personas)
  {
    $blog = Blog::all();
    $todos = Evento::all();
    return view('admin.personas.edit', compact('personas','blog','todos'));
  }

  public function destroy(Persona $personas)
  {
      $personas->delete();
      return redirect()->route('admin.personas.index')->with('flash', 'El preinscripto fue elimnado.');
  }

  public function storePersona (Request $request, Evento $evento)
    {
        // $evento= Evento::where('estado','PRINCIPAL')->first();
        $contacto = Persona::create([

          'nombre'=> $request->get('nombre'),
          'apellido'=> $request->get('apellido'),
          'sexo'=> $request->get('sexo'),
          'empresa'=> $request->get('empresa'),
          'cargo'=> $request->get('cargo'),
          'dni'=> $request->get('dni'),
          'edad'=> $request->get('edad'),
          'provincia'=> $request->get('provincia'),
          'localidad'=> $request->get('localidad'),
          'telefono'=> $request->get('telefono'),
          'celular'=> $request->get('celular'),
          'email'=> $request->get('email'),
          'web'=> $request->get('web'),
          'activo'=> 'SI',
          'estado'=> 'PENDIENTE',
          'evento_id'=> $evento->id,
        ]);

        $contacto->save();

        $data=request()->all();

        Mail::send("emails.messageInscripcion", $data, function($message) use ($data){

            $message->from($data['email'], $data['nombre'])

                ->to('comercial@cronista.com','Pre-Inscripción | Eventos Plataforma Web El Cronista')
                ->cc('sec.rojas@gmail.com')
                ->subject($data['subject']);

        });

        Mail::send("emails.messageRespuesta", $data, function($message) use ($data){

            $message->from('eventos@cronista.com', 'Eventos El Cronista')

                ->to($data['email'],'Aviso Confirmación Pre-Inscripción')
                // ->cc('sebastian.rojas@cmspeople.com')
                ->subject($data['subject']);

        });

        // return response()->download(public_path('assets-2019/brochures/eventos/npl-lisboa/brochure.pdf'));

        // return redirect('http://cmseventos.com/2019/espana/npl-lisboa/quiero-brochure/respuesta/INFO-5-CMS-NPL-IBERIAN-FORUM-ENG-LISBOA.pdf')->with('flash', 'El contacto ha sido guardado.');
        return redirect()->route('landing',compact('evento'))->with("ok-editar","");
     }

     public function OkPersona (Persona $personas, Request $request)
     {
       $personas->estado = $request->get('estado');

       $personas->nombre = $personas->nombre;
       $personas->apellido = $personas->apellido;
       $personas->empresa = $personas->empresa;
       $personas->cargo = $personas->cargo;
       $personas->sexo = $personas->sexo;
       $personas->edad = $personas->edad;
       $personas->provincia = $personas->provincia;
       $personas->localidad = $personas->localidad;
       $personas->dni = $personas->dni;
       $personas->telefono = $personas->telefono;
       $personas->celular = $personas->celular;
       $personas->email = $personas->email;
       $personas->web = $personas->web;
       $personas->activo =   $personas->activo;
       $personas->evento_id =   $personas->evento_id;

       $personas->save();

       $data=request()->all();

        Mail::send("emails.messageConfirmacion", $data, function($message) use ($data){

            $message->from('eventos@cronista.com', 'Eventos El Cronista')

                ->to($data['mail'],'Aviso Confirmación Pre-Inscripción')
                // ->cc('sebastian.rojas@cmspeople.com')
                ->subject($data['subject']);
        });

        return redirect()->route('admin.personas.index')->with('flash', 'Preinscripto confirmado!');
      }

      public function CancelPersona (Persona $personas, Request $request)
      {
        $personas->estado = $request->get('estado');

        $personas->nombre = $personas->nombre;
        $personas->apellido = $personas->apellido;
        $personas->empresa = $personas->empresa;
        $personas->cargo = $personas->cargo;
        $personas->sexo = $personas->sexo;
        $personas->edad = $personas->edad;
        $personas->provincia = $personas->provincia;
        $personas->localidad = $personas->localidad;
        $personas->dni = $personas->dni;
        $personas->telefono = $personas->telefono;
        $personas->celular = $personas->celular;
        $personas->email = $personas->email;
        $personas->web = $personas->web;
        $personas->activo =   $personas->activo;
        $personas->evento_id =   $personas->evento_id;

        $personas->save();

        $data=request()->all();

         Mail::send("emails.messageRechazo", $data, function($message) use ($data){

             $message->from('eventos@cronista.com', 'Eventos El Cronista')

                 ->to($data['mail'],'Aviso Confirmación Pre-Inscripción')
                 // ->cc('sebastian.rojas@cmspeople.com')
                 ->subject($data['subject']);
         });

         return redirect()->route('admin.personas.index')->with('flash', 'Preinscripto rechazado!');
       }

}
