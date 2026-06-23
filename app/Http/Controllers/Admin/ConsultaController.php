<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('usuario')
            ->where('activo', 1)
            ->orderBy('fecha_creacion', 'desc')
            ->get();

        return view(
            'admin.consultas.index',
            compact('consultas')
        );
    }

    public function show($id)
    {
        $consulta = Consulta::with('usuario')
            ->findOrFail($id);

        return view(
            'admin.consultas.show',
            compact('consulta')
        );
    }

    public function responder(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required'
        ]);

        $consulta = Consulta::findOrFail($id);

        $consulta->respuesta = $request->respuesta;

        $consulta->estado = 'respondida';

        $consulta->fecha_respuesta = now();

        $consulta->save();

        return redirect()
            ->route('admin.consultas.index')
            ->with(
                'success',
                'Consulta respondida correctamente'
            );
    }

    public function cerrar($id)
    {
        $consulta = Consulta::findOrFail($id);

        $consulta->estado = 'cerrada';

        $consulta->save();

        return back();
    }
}