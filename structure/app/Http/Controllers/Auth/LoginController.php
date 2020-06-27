<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User;
use App\UserSocialAccount;
use App\Student;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout (Request $request) {
    	auth()->logout();
    	session()->flush();
    	return redirect('/ingreso-en-plataforma');
    }

    public function redirectToProvider(string $driver)
    {
      return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback(string $driver)
    {
      if(!request()->has('code') || request()->has('denied'))
      {
        session()->flash('message',['danger', __("Inicio de sesión cancelado")]);
        return redirect('/ingreso-en-plataforma');
      }

      $socialUser = Socialite::driver($driver)->user();
      // dd($socialUser);

      $user=null;
      $success=true;
      $email=$socialUser->email;
      $check=User::whereEmail($email)->first();
      if($check)
      {
        $user=$check;
      }
      else {
        \DB::beginTransaction();
        try {
            $user = User::create([
            "name"=>$socialUser->name,
            "email"=>$email
          ]);
          UserSocialAccount::create([
            "user_id"=>$user->id,
            "provider"=>$driver,
            "provider_uid"=>$socialUser->id
          ]);
          Student::create([
            "user_id"=>$user->id
          ]);
        } catch (\Exception $e) {
          $success=$e->getMessage();
          \DB::rollBack();
        }
      }

      if($success===true)
      {
        \DB::commit();
        auth()->loginUsingId($user->id);
        return redirect(route('inicio'));
      }
      session()->flash('message',['danger',$success]);
      return redirect('/ingreso-en-plataforma');
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }

}
