<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function login(Request $request)
    {
    //   dd($request->input('password'));
      $credentials = $request -> validate([
        'email' =>'required|email',
        'password' =>'required'
      ]);

      if (Auth::attempt($credentials))
      {
          $user = Auth::user()->role;
        //   dd($user);
          switch($user)
          {
            case 'admin':
              return redirect('/admin');break;
            case 'student':
              return redirect('/student');break;
            case 'teacher':
              return redirect('/teacher');break;
            default:

              Auth::logout();
              return redirect('/login')->with('error',"Erreur d'authentification");


          }
      }
      else
        {
          return redirect('/login');
        }
      }
}
