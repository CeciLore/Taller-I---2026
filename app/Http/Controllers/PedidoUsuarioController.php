<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Factura;

class PedidoUsuarioController extends Controller
{
    public function index()
    {
        $compras = Factura::where(
            'usuario_id',
            auth()->id()
        )
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'miscompras',
            compact('compras')
        );
    }

    public function show(Request $request, Factura $factura)
    {
        if ($factura->usuario_id != auth()->id()) {
            abort(403);
        }

        $factura->load(
            'usuario',
            'detalles.producto'
        );

        return view(
            'factura',
            [
                'factura' => $factura,
                'origen' => $request->origen
            ]
        );
    }
}