<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioConsultaController extends Controller
{
    public function create()
    {
        return view('consultas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required|max:150',
            'mensaje' => 'required|min:10'
        ]);

        Consulta::create([
            'usuario_id' => Auth::id(),
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'estado' => 'pendiente',
            'activo' => 1
        ]);

        return redirect()
            ->back()
            ->with('success', 'Consulta enviada correctamente');
    }
}