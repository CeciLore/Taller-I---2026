<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('buscar')) {

            $query->where(
                'nombre',
                'like',
                '%' . $request->buscar . '%'
            );
        }

        if ($request->filled('categoria')) {

            $query->where(
                'categoria_id',
                $request->categoria
            );
        }

        if ($request->filled('estado')) {

            $query->where(
                'activo',
                $request->estado
            );
        }

        $productos = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categorias = Categoria::where('activo', 1)
            ->orderBy('nombre')
            ->get();

        return view(
            'admin.productos.index',
            compact(
                'productos',
                'categorias'
            )
        );

    }

    public function create()
    {
        $categorias = Categoria::where('activo', 1)
            ->orderBy('nombre')
            ->get();

        return view(
            'admin.productos.create',
            compact('categorias')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'nombre' => 'required|string|max:150',

            'descripcion' => 'nullable|string|max:1000',

            'precio' => 'required|numeric|min:0',

            'stock' => 'required|integer|min:0',

            'categoria_id' => 'required|exists:categorias,id',

            'url_imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        if ($request->hasFile('url_imagen')) {

            $data['url_imagen'] = $request
                ->file('url_imagen')
                ->store('productos', 'public');
        }

        $data['activo'] = true;

        Producto::create($data);

        return redirect()
            ->route('admin.productos.index')
            ->with(
                'success',
                'Producto creado correctamente'
            );
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('activo', 1)
            ->orderBy('nombre')
            ->get();

        return view(
            'admin.productos.edit',
            compact(
                'producto',
                'categorias'
            )
        );
    }

    public function update(
        Request $request,
        Producto $producto
    ) {
        $data = $request->validate([

            'nombre' => 'required|string|max:150',

            'descripcion' => 'nullable|string|max:1000',

            'precio' => 'required|numeric|min:0',

            'stock' => 'required|integer|min:0',

            'categoria_id' => 'required|exists:categorias,id',

            'activo' => 'required|boolean',

            'url_imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        if ($request->hasFile('url_imagen')) {

            if ($producto->url_imagen) {

                Storage::disk('public')
                    ->delete($producto->url_imagen);
            }

            $data['url_imagen'] = $request
                ->file('url_imagen')
                ->store('productos', 'public');
        }

        $producto->update($data);

        return redirect()
            ->route('admin.productos.index')
            ->with(
                'success',
                'Producto actualizado correctamente'
            );
    }

    public function destroy(Producto $producto)
    {
        $producto->activo = 0;

        $producto->save();

        return back()
            ->with(
                'success',
                'Producto desactivado correctamente.'
            );

    }

    public function toggleEstado(Producto $producto)
    {
        $producto->activo = !$producto->activo;

        $producto->save();

        return back()->with(
            'success',
            $producto->activo
            ? 'Producto activado correctamente.'
            : 'Producto desactivado correctamente.'
        );
    }

}