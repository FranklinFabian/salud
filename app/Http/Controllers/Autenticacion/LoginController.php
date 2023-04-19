<?php

namespace App\Http\Controllers\Autenticacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    // Login Form
    public function loginForm(){
        // Verificamos si el usuario esta logueado
        if (Auth::check()) {
            if (Auth::user()->hasRole('administrador')){
                return redirect()->intended('/administracion/dashboard');
            }elseif (Auth::user()->hasRole('rhd')){
                return redirect()->intended('/rhd/item');
            }elseif (Auth::user()->hasRole('banco_oxigeno')){
                return redirect()->intended('/bancooxigeno/item');
            }elseif (Auth::user()->hasRole('sala_situacional')){
                return redirect()->intended('/salasituacional/item');
            }
        }

        $page_title = 'Inicio de Sesión';
        $page_description = 'Autoridad de Supervisión de la Seguridad Social de Corto Plazo';

        return view('login', compact('page_title', 'page_description'));
    }


    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'estado' => 'Activo'])) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('administrador')){
                return redirect()->intended('/administracion/sala_situacional');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
