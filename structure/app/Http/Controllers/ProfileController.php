<?php

namespace App\Http\Controllers;

use App\Rules\StrengthPassword;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index (Request $request) {
    	$user = auth()->user()->load('socialAccount');

      $ip = $request->getClientIp();
      $data = \Location::get($ip);
      $ubicacion=$data->countryCode;

    	return view('profile.index', compact('user','ubicacion'));
    }

    public function update (Request $request) {
		$this->validate(request(), [
			'password' => ['confirmed', new StrengthPassword]
		]);

		$user = auth()->user();
		$user->password = bcrypt(request('password'));
		$user->save();

    $ip = $request->getClientIp();
    $data = \Location::get($ip);
    $ubicacion=$data->countryCode;

	    return back()->with('message', ['success', __("Usuario actualizado correctamente")]);
    }

}
