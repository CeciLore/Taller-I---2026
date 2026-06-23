<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Carrito;
use App\Models\CarritoItem;

use App\Models\Factura;
use App\Models\DetalleFactura;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carrito = Carrito::where('user_id', auth()->id())
            ->first();

        return view('carrito', compact('carrito'));
    }

    public function agregar($id)
    {
        $producto = Producto::findOrFail($id);

        $carrito = Carrito::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $item = CarritoItem::where(
            'carrito_id',
            $carrito->id
        )
            ->where(
                'producto_id',
                $id
            )
            ->first();

        if ($item) {

            if ($item->cantidad < $producto->stock) {

                $item->cantidad += 1;
                $item->save();
            }

        } else {

            CarritoItem::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => 1
            ]);
        }

        return response()->json([
            'success' => true,
            'cantidadItems' => $carrito->items()->count()
        ]);
    }

    public function eliminar($id)
    {
        $item = CarritoItem::findOrFail($id);

        $item->delete();

        return redirect()->back();
    }

    public function sumar($id)
    {
        $item = CarritoItem::with('producto', 'carrito')
            ->findOrFail($id);

        $producto = $item->producto;

        if ($item->cantidad < $producto->stock) {

            $item->cantidad++;
            $item->save();
        }

        $subtotal = $item->cantidad * $producto->precio;

        $total = $this->calcularTotalCarrito(
            $item->carrito_id
        );

        return response()->json([
            'success' => true,
            'cantidad' => $item->cantidad,
            'subtotal' => $subtotal,
            'total' => $total,
            'stock' => $producto->stock
        ]);
    }

    public function restar($id)
    {
        $item = CarritoItem::with('producto', 'carrito')
            ->findOrFail($id);

        if ($item->cantidad > 1) {

            $item->cantidad--;
            $item->save();
        }

        $subtotal = $item->cantidad * $item->producto->precio;

        $total = $this->calcularTotalCarrito(
            $item->carrito_id
        );

        return response()->json([
            'success' => true,
            'cantidad' => $item->cantidad,
            'subtotal' => $subtotal,
            'total' => $total,
            'stock' => $item->producto->stock
        ]);
    }

    public function finalizarCompra()
    {
        DB::beginTransaction();

        try {

            $carrito = Carrito::with('items.producto')
                ->where('user_id', auth()->id())
                ->first();

            if (!$carrito || $carrito->items->count() == 0) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'El carrito está vacío.'
                    );
            }
            $total = 0;

            foreach ($carrito->items as $item) {

                $producto = $item->producto;

                if (!$producto) {

                    throw new \Exception(
                        'Uno de los productos ya no existe.'
                    );
                }

                if ($producto->stock < $item->cantidad) {

                    throw new \Exception(
                        "No hay stock suficiente para {$producto->nombre}"
                    );
                }

                $total +=
                    $producto->precio *
                    $item->cantidad;
            }

            $factura = Factura::create([

                'usuario_id' => auth()->id(),

                'fecha' => now(),

                'total' => $total,

                'metodo_pago' => 'efectivo',

                'estado' => 'pendiente'
            ]);

            foreach ($carrito->items as $item) {

                $producto = $item->producto;

                DetalleFactura::create([

                    'factura_id' => $factura->id,

                    'producto_id' => $producto->id,

                    'cantidad' => $item->cantidad,

                    'precio_unitario' => $producto->precio,

                    'subtotal' =>
                        $producto->precio *
                        $item->cantidad
                ]);

                $producto->stock -= $item->cantidad;

                if ($producto->stock <= 0) {

                    $producto->stock = 0;
                    $producto->activo = false;

                }

                $producto->save();
            }

            $carrito->items()->delete();

            $carrito->delete();

            DB::commit();

            return redirect()
                ->route(
                    'factura.show',
                    $factura->id
                )
                ->with(
                    'success',
                    'Compra realizada correctamente.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    private function calcularTotalCarrito($carritoId)
    {
        return CarritoItem::with('producto')
            ->where('carrito_id', $carritoId)
            ->get()
            ->sum(function ($item) {
                return $item->cantidad * $item->producto->precio;
            });
    }

    public function vaciar()
    {
        $carrito = Carrito::where(
            'user_id',
            auth()->id()
        )->first();

        if ($carrito) {

            $carrito->items()->delete();

            $carrito->delete();
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Carrito vaciado correctamente.'
            );
    }
}