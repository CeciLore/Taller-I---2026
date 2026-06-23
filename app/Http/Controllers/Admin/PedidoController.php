<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Factura::with('usuario')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view(
            'admin.pedidos.index',
            compact('pedidos')
        );
    }

    public function actualizarEstado(
        Request $request,
        Factura $pedido
    ) {
        $request->validate([
            'estado' => 'required|in:pendiente,enviado,entregado'
        ]);

        $pedido->estado = $request->estado;
        $pedido->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Estado actualizado correctamente.'
            );
    }
}