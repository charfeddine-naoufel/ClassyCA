<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;

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
    $request->validate([
        'login' => 'required',
        'password' => 'required',
    ]);

    $login = trim($request->login);

    // Cas 1 : Email
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {

        $credentials = [
            'email' => $login,
            'password' => $request->password,
        ];

    } else {

        // Cas 2 : Téléphone

        $student = Student::where('tel', $login)->first();
        $teacher = Teacher::where('tel', $login)->first();

        if ($student) {

            $credentials = [
                'email' => $student->user->email,
                'password' => $request->password,
            ];

        } elseif ($teacher) {

            $credentials = [
                'email' => $teacher->user->email,
                'password' => $request->password,
            ];

        } else {

            return back()
                ->withInput()
                ->with('error', 'Téléphone ou email introuvable.');

        }
    }

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        switch (Auth::user()->role) {

            case 'admin':
                return redirect('/admin');

            case 'student':
                return redirect('/student');

            case 'teacher':
                return redirect('/teacher');

            default:
                Auth::logout();

                return redirect('/login')
                    ->with('error', "Erreur d'authentification");
        }
    }

    return back()
        ->withInput()
        ->with('error', 'Mot de passe incorrect.');
}
}
