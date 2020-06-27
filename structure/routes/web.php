<?php

use Illuminate\Http\Request;
use App\Blog;

Route::get('/imagendespeaker/{img}', function ($img) {
        $headers = [
          'Content-Type' => 'image/png',
       ];
    return response()->download(storage_path('app/' . $img), $img, $headers);
})->name('images-speaker');

Route::get('/imagendesponsor/{img}', function ($img) {
        $headers = [
          'Content-Type' => 'image/png',
       ];
    return response()->download(storage_path('app/' . $img), $img, $headers);
})->name('images-sponsor');

Route::get('/imagendevideo/{img}', function ($img) {
        $headers = [
          'Content-Type' => 'image/png',
       ];
    return response()->download(storage_path('app/' . $img), $img, $headers);
})->name('images-video');

Route::get('/imagendepost/{img}', function ($img) {
        $headers = [
          'Content-Type' => 'image/png',
       ];
    return response()->download(storage_path('app/' . $img), $img, $headers);
})->name('images-post');

Route::get('/imagendeevento/{img}', function ($img) {
        $headers = [
          'Content-Type' => 'image/png',
       ];
    return response()->download(storage_path('app/' . $img), $img, $headers);
})->name('images-evento');

// Route::get('/', function () {
//     $configuraciones=Blog::first();
//     return view('welcome',compact('configuraciones'));
// })->name('landing');

// Route::get('oradores', function () {
//     $configuraciones=Blog::first();
//     return view('oradores',compact('configuraciones'));
// });
Route::get('/', 'HomeController@index')->name('inicio');
Route::get('eventos/{evento}', 'HomeController@cargaTodo')->name('landing');

Route::get('eventos/{evento}/oradores', 'HomeController@oradores')->name('oradores');

Route::get('eventos/{evento}/contenidos', 'HomeController@contenidos')->name('contenidos');
Route::get('eventos/contenidos/{post}','HomeController@show')->name('contenidos.show');

Route::post('contactos/{evento}', 'PersonaController@storePersona')->name('contactos.store');

Route::put('contactos-ok/{personas}', 'PersonaController@OkPersona')->name('contactos.ok');
Route::put('contactos-cancel/{personas}', 'PersonaController@CancelPersona')->name('contactos.cancel');



Route::get('/home', function () {
    $configuraciones=Blog::first();
    return view('home',compact('configuraciones'));
});

Route::post('messagesSoon', function(){

  $configuraciones=Blog::first();

	$data=request()->all();

	Mail::send("emails.msjSoon", $data, function($message) use ($data){

		$message->from($data['email'], $data['name'])

            ->to('soporte@onfirewebs.com','transfont.es')
            ->cc('sec.rojas@gmail.com')
			->subject($data['subject']);

	});
  return back()->with("ok-editar","");
})->name('messagesSoon');

Auth::routes();

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Route::group(['middleware' => ['auth']], function () {
//
// 	Route::get('/inicio', 'HomeController@inicio')->name('inicio');
//   Route::get('/video-detalle/{video}', 'HomeController@detalle')->name('video-detalle');
//   Route::get('/listado-videos/{id}', 'VideoController@listado')->name('listado-videos');
//
//   Route::get('videos-buscar', 'SearchController@show')->name('videos-buscar');
//   Route::get('/videos/json', 'SearchController@data');
// });

Route::get('/images/{path}/{attachment}', function($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if(File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::group(["prefix" => "profile", "middleware" => ["auth"]], function() {
	Route::get('/', 'ProfileController@index')->name('profile.index');
	Route::put('/', 'ProfileController@update')->name('profile.update');
});

Route::group([
    'prefix'=>'admin',
    'middleware'=>'auth'],
function(){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    Route::resource('/administradores', 'AdministradoresController');

    Route::get('/configuraciones', 'BlogController@index')->name('admin.configuraciones.index');
    Route::put('/configuraciones/{id}', 'BlogController@update')->name('admin.configuraciones.update');

    Route::get('clientes', 'UsersController@index')->name('admin.users.index');
    Route::get('clientes/editar/{user}', 'UsersController@edit')->name('admin.users.edit');
    Route::put('clientes/editar/{user}', 'UsersController@update')->name('admin.users.update');
    Route::delete('users/{user}', 'UsersController@destroy')->name('admin.users.destroy');

    Route::get('clientes/{id}', 'UsersController@show')->name('admin.users.show');


    Route::get('logistica/{id}', 'LogisticaController@index')->name('admin.logistica.index');
    Route::get('logistica/create', 'LogisticaController@create')->name('admin.logistica.create');
    Route::post('logistica', 'LogisticaController@store')->name('admin.logistica.store');
    Route::get('logistica/editar/{mercaderias}', 'LogisticaController@edit')->name('admin.logistica.edit');
    Route::put('logistica/editar/{mercaderias}', 'LogisticaController@update')->name('admin.logistica.update');
    Route::delete('logistica/{mercaderias}', 'LogisticaController@destroy')->name('admin.logistica.destroy');

    Route::post('logistica/editar/{mercaderia}/photos', 'PhotoController@store')->name('admin.logistica.photos.store');
    Route::delete('photo/{photo}','PhotoController@destroy')->name('admin.photo.destroy');

    Route::get('logistica/editar-files/{mercaderias}', 'LogisticaController@editfile')->name('admin.logistica.editfile');
    Route::post('logistica/editar-files/{mercaderia}/files', 'FileController@store')->name('admin.logistica.files.store');
    Route::delete('files/{photo}','FileController@destroy')->name('admin.files.destroy');

    //Eventos
    Route::get('eventos', 'EventoController@index')->name('admin.eventos.index');
    Route::get('eventos/create', 'EventoController@create')->name('admin.eventos.create');
    Route::post('eventos', 'EventoController@store')->name('admin.eventos.store');
    Route::get('eventos/{evento}', 'EventoController@edit')->name('admin.eventos.edit');
    Route::put('eventos/{evento}', 'EventoController@update')->name('admin.eventos.update');
    Route::delete('eventos/{evento}', 'EventoController@destroy')->name('admin.eventos.destroy');

    Route::post('eventos/{evento}/photos', 'PhotoeController@store')->name('admin.eventos.photos.store');
    Route::delete('photoe/{photo}','PhotoeController@destroy')->name('admin.photoe.destroy');

    //Oradores
    Route::get('oradores', 'SpeakerController@index')->name('admin.speakers.index');
    Route::get('oradores/create', 'SpeakerController@create')->name('admin.speakers.create');
    Route::post('oradores', 'SpeakerController@store')->name('admin.speakers.store');
    Route::get('oradores/{speakers}', 'SpeakerController@edit')->name('admin.speakers.edit');
    Route::put('oradores/{speakers}', 'SpeakerController@update')->name('admin.speakers.update');
    Route::delete('oradores/{speakers}', 'SpeakerController@destroy')->name('admin.speakers.destroy');

    Route::post('oradores/{speaker}/photos', 'PhotoController@store')->name('admin.speakers.photos.store');
    Route::delete('photo/{photo}','PhotoController@destroy')->name('admin.photo.destroy');

    //Agenda
    Route::get('agenda', 'AgendaController@index')->name('admin.agenda.index');
    Route::get('agenda/create', 'AgendaController@create')->name('admin.agenda.create');
    Route::post('agenda', 'AgendaController@store')->name('admin.agenda.store');
    Route::get('agenda/{agenda}', 'AgendaController@edit')->name('admin.agenda.edit');
    Route::put('agenda/{agenda}', 'AgendaController@update')->name('admin.agenda.update');
    Route::delete('agenda/{agenda}', 'AgendaController@destroy')->name('admin.agenda.destroy');

    //PRE-INSCRIPTOS
    Route::get('personas', 'PersonaController@index')->name('admin.personas.index');
    Route::get('personas/create', 'PersonaController@create')->name('admin.personas.create');
    Route::post('personas', 'PersonaController@store')->name('admin.personas.store');
    Route::get('personas/{personas}', 'PersonaController@edit')->name('admin.personas.edit');
    Route::put('personas/{personas}', 'PersonaController@update')->name('admin.personas.update');
    Route::delete('personas/{personas}', 'PersonaController@destroy')->name('admin.personas.destroy');

    //Sponsors
    Route::get('sponsors', 'SponsorController@index')->name('admin.sponsors.index');
    Route::get('sponsors/create', 'SponsorController@create')->name('admin.sponsors.create');
    Route::post('sponsors', 'SponsorController@store')->name('admin.sponsors.store');
    Route::get('sponsors/{sponsors}', 'SponsorController@edit')->name('admin.sponsors.edit');
    Route::put('sponsors/{sponsors}', 'SponsorController@update')->name('admin.sponsors.update');
    Route::delete('sponsors/{sponsors}', 'SponsorController@destroy')->name('admin.sponsors.destroy');

    Route::post('sponsors/{sponsor}/photos', 'FotoController@store')->name('admin.sponsors.photos.store');
    Route::delete('foto/{photo}','FotoController@destroy')->name('admin.foto.destroy');

    //Video
    Route::get('videos', 'VideoController@index')->name('admin.video.index');
    Route::get('videos/create', 'VideoController@create')->name('admin.video.create');
    Route::post('videos', 'VideoController@store')->name('admin.video.store');
    Route::get('videos/{videos}', 'VideoController@edit')->name('admin.video.edit');
    Route::put('videos/{videos}', 'VideoController@update')->name('admin.video.update');
    Route::delete('videos/{videos}', 'VideoController@destroy')->name('admin.videos.destroy');

    Route::post('videos/{video}/photos', 'MovieController@store')->name('admin.video.photos.store');
    Route::delete('video/{photo}','MovieController@destroy')->name('admin.video.destroy');

    //POST
    Route::get('posts', 'PostController@index')->name('admin.posts.index');
    Route::get('posts/create', 'PostController@create')->name('admin.posts.create');
    Route::post('posts', 'PostController@store')->name('admin.posts.store');
    Route::get('posts/{post}', 'PostController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostController@update')->name('admin.posts.update');
    Route::delete('posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');

    Route::post('posts/{post}/photos', 'PhotopController@store')->name('admin.posts.photos.store');
    Route::delete('photop/{photo}','PhotopController@destroy')->name('admin.photop.destroy');

  });
