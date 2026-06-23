<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    public function edit()
    {
        return view('perfil', [
            'usuario' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $usuario = auth()->user();

        $request->validate(
            [
                'nombre' => [
                    'required',
                    'string',
                    'min:3',
                    'max:100',
                    'regex:/^[\pL\s]+$/u'
                ],

                'email' => [
                    'required',
                    'email',
                    'max:150',
                    'ends_with:@gmail.com',
                    Rule::unique('users', 'email')
                        ->ignore($usuario->id)
                ],


                'direccion' => [
                    'nullable',
                    'string',
                    'max:255'
                ],

                'telefono' => [
                    'nullable',
                    'regex:/^[0-9]{8,15}$/'
                ],

                'password' => [
                    'nullable',
                    'min:8',
                    'max:50',
                    'confirmed'
                ]
            ],

            [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.string' => 'El nombre debe ser un texto válido.',
                'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
                'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
                'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Ingrese un correo electrónico válido.',
                'email.max' => 'El correo electrónico no puede superar los 150 caracteres.',
                'email.unique' => 'Ese correo electrónico ya está registrado.',
                'email.ends_with' => 'El correo electrónico debe finalizar con @gmail.com.',



                'direccion.max' => 'La dirección no puede superar los 255 caracteres.',

                'telefono.regex' => 'El teléfono debe contener entre 8 y 15 números.',

                'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
                'password.max' => 'La nueva contraseña no puede superar los 50 caracteres.',
                'password.confirmed' => 'La confirmación de la contraseña no coincide.'
            ],

            [
                'nombre' => 'nombre',
                'email' => 'correo electrónico',
                'direccion' => 'dirección',
                'telefono' => 'teléfono',
                'password' => 'contraseña'
            ]
        );

        $usuario->nombre = trim($request->nombre);

        $usuario->email = strtolower(
            trim($request->email)
        );

        $usuario->direccion = trim(
            $request->direccion ?? ''
        );

        $usuario->telefono = trim(
            $request->telefono ?? ''
        );

        if ($request->filled('password')) {

            $usuario->password = Hash::make(
                $request->password
            );

        }

        $usuario->save();

        return back()->with(
            'success',
            'Perfil actualizado correctamente.'
        );
    }
}
