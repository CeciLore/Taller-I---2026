<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistro()
    {
        return view('registro');
    }

    public function registro(Request $request)
{
    $request->validate([
        'nombre' => 'required|min:4|max:100',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:6|confirmed',
        'direccion' => 'nullable|max:255',
        'telefono' => 'nullable|max:30'
    ]);

    User::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
        'rol' => 'usuario',
        'activo' => true
    ]);

    return redirect('/login')
        ->with('success', 'Usuario registrado correctamente');
}
}

