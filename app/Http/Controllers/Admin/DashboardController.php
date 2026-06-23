<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Producto;
use App\Models\Consulta;
use App\Models\Factura;
use App\Models\DetalleFactura;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $ventasMes = Factura::whereMonth('fecha', now()->month)
            ->whereYear('fecha', now()->year)
            ->sum('total');

        $pedidosTotales = Factura::count();

        $pedidosPendientes = Factura::where('estado', 'Pendiente')
            ->count();

        $clientes = User::where('rol', '!=', 'admin')
            ->where('activo', 1)
            ->count();

        $consultasPendientes = Consulta::where('estado', 'Pendiente')
            ->count();

        $pedidosRecientes = Factura::with('usuario')
            ->orderByDesc('fecha')
            ->take(5)
            ->get();

        $stockBajo = Producto::where('stock', '<=', 5)
            ->take(5)
            ->get();

        $productosMasVendidos = DetalleFactura::select(
            'producto_id',
            DB::raw('SUM(cantidad) as total_vendidos')
        )
            ->with('producto')
            ->groupBy('producto_id')
            ->orderByDesc('total_vendidos')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'ventasMes',
            'pedidosTotales',
            'pedidosPendientes',
            'clientes',
            'consultasPendientes',
            'pedidosRecientes',
            'stockBajo',
            'productosMasVendidos'
        ));
    }
}