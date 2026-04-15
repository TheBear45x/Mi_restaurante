<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 'email' y 'password' son los nombres de la base de datos
        // $request->correo y $request->contrasena son los names de tu HTML
        $credentials = [
            'email' => $request->correo,
            'password' => $request->contrasena,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Si es admin, mándalo a la lista de platillos
            if (Auth::user()->tipo == 'admin') {
                return redirect()->route('platillo.mostrar');
            }

            return redirect()->route('menu');
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas']);
    }
}