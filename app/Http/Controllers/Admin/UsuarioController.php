<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $rol = $request->rol;

        $usuarios = User::query()

            ->when($buscar, function ($query, $buscar) {

                $query->where(function ($q) use ($buscar) {

                    $q->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('email', 'like', "%{$buscar}%");

                });

            })

            ->when($rol && $rol != 'todos', function ($query) use ($rol) {

                $query->where('rol', $rol);

            })

            ->orderBy('id', 'desc')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.usuarios.index',
            compact('usuarios')
        );
    }

    public function cambiarRol(User $user)
    {
        if (auth()->id() == $user->id) {
            return back()->with(
                'error',
                'No puedes cambiar tu propio rol.'
            );
        }

        if ($user->id == 5) {
            return back()->with(
                'error',
                'El administrador principal no puede modificarse.'
            );
        }

        if (
            $user->rol == 'admin'
            && auth()->id() != 5
        ) {
            return back()->with(
                'error',
                'Solo Picky puede quitar administradores.'
            );
        }

        $user->rol =
            $user->rol == 'admin'
            ? 'usuario'
            : 'admin';

        $user->save();

        return back()->with(
            'success',
            'Rol actualizado correctamente.'
        );
    }

    public function responder(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string'
        ]);

        $consulta = Consulta::findOrFail($id);

        $consulta->respuesta = $request->respuesta;
        $consulta->estado = 'respondida';

        $consulta->save();

        return redirect()
            ->route('admin.consultas.index')
            ->with('success', 'Consulta respondida correctamente.');
    }
}