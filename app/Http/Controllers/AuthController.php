<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegistro()
    {
        return view('registro');
    }

    public function registro(Request $request)
    {
        $request->validate(
            [
                'nombre' => [
                    'required',
                    'min:4',
                    'max:100',
                    'regex:/^[\pL\s\'\-]+$/u'
                ],

                'email' => 'required|email|unique:usuarios,email',

                'password' => 'required|min:6|confirmed',

                'direccion' => 'nullable|max:255',

                'telefono' => [
                    'nullable',
                    'max:30',
                    'regex:/^[0-9+\-\s()]+$/'
                ]
            ],
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.min' => 'El nombre debe tener al menos 4 caracteres.',
                'nombre.regex' => 'El nombre solo puede contener letras, espacios, guiones y apóstrofes.',

                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Debes ingresar un correo válido.',
                'email.unique' => 'Ya existe una cuenta registrada con ese correo electrónico.',

                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',

                'telefono.regex' => 'El teléfono contiene caracteres no permitidos.'
            ]
        );

        $email = strtolower(trim($request->email));

        User::create([

            'nombre' => $request->nombre,

            'email' => $email,

            'password' => Hash::make($request->password),

            'direccion' => $request->direccion,

            'telefono' => $request->telefono,

            'rol' => 'usuario',

            'activo' => 1

        ]);

        return redirect('/login')
            ->with('success', 'Usuario registrado correctamente');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Debes ingresar un correo válido.',
                'password.required' => 'La contraseña es obligatoria.'
            ]
        );

        $credenciales = [
            'email' => strtolower(trim($request->email)),
            'password' => $request->password,
            'activo' => 1
        ];

        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect('/');
        }

        return back()
            ->withErrors([
                'email' => 'Correo electrónico o contraseña incorrectos.'
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}