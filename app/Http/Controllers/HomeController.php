<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::where('activo', true)
            ->orderBy('nombre')
            ->get();

        $productos = Producto::with('categoria')
            ->where('activo', true)
            ->where('stock', '>', 0);

        if ($request->filled('categoria')) {
            $productos->where('categoria_id', $request->categoria);
        }

        $productos = $productos
            ->latest()
            ->simplePaginate(6)
            ->withQueryString();

        return view('principal', compact(
            'productos',
            'categorias'
        ));
    }

    public function categoria(Categoria $categoria)
    {
        $categorias = Categoria::where('activo', 1)
            ->orderBy('nombre')
            ->get();

        $productos = Producto::with('categoria')
            ->where('categoria_id', $categoria->id)
            ->where('activo', 1)
            ->where('stock', '>', 0)
            ->latest()
            ->get();

        return view('principal', compact(
            'productos',
            'categorias'
        ));
    }
}