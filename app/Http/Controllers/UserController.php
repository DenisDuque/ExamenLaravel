<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLogin() {
        if (session('userAuth')) {
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    }
    public function auth() {

        request()->validate([
            'nick' => 'required',
            'password' => 'required',
        ]);

        $nick = request()->input('nick');
        $password = request()->input('password');

        $user = User::where('nick', $nick)->first();

        if ($user && Auth::guard('user')->attempt(['nick' => $nick, 'password' => $password])) {
            session(['userName' => $user->name]);
            return redirect()->route('home');
        } else {
            // Las credenciales son incorrectas o el usuario no existe
            return redirect()->route('auth.login')->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout()
    {
        // Cerrar la sesión del guard 'admin'
        Auth::guard('user')->logout();

        // Limpiar cualquier dato almacenado en la sesión
        session()->flush();

        // Redirigir a la página de inicio de sesión
        return redirect()->route('auth.login');
    }
}
