@extends('layouts.carrito')

@section('content')

    <div class="container py-5">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <div class="card product-card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold mb-0">
                        🧾 Factura Nº {{ $factura->id }}
                    </h2>

                    @if(isset($origen) && $origen == 'miscompras')

                        <a href="{{ route('miscompras') }}" class="btn btn-picky-yellow fw-bold">

                            <i class="bi bi-bag"></i>
                            Mis Compras

                        </a>

                    @else

                        <a href="{{ route('home') }}" class="btn btn-picky-yellow fw-bold">

                            <i class="bi bi-house"></i>
                            Inicio

                        </a>

                    @endif

                </div>

                <div class="mb-4">

                    <p>
                        <strong>Cliente:</strong>
                        {{ $factura->usuario->nombre }}
                    </p>

                    <p>
                        <strong>Fecha:</strong>
                        {{ $factura->fecha }}
                    </p>

                    <p>
                        <strong>Método de pago:</strong>
                        {{ ucfirst($factura->metodo_pago) }}
                    </p>

                    <p>
                        <strong>Estado:</strong>
                        {{ ucfirst($factura->estado) }}
                    </p>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($factura->detalles as $detalle)

                                <tr>

                                    <td>
                                        {{ $detalle->producto->nombre }}
                                    </td>

                                    <td>
                                        {{ $detalle->cantidad }}
                                    </td>

                                    <td>
                                        ${{ number_format($detalle->precio_unitario, 2) }}
                                    </td>

                                    <td class="fw-bold">
                                        ${{ number_format($detalle->subtotal, 2) }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="text-end mt-4">

                    <h4 class="fw-bold text-success">

                        Total:
                        ${{ number_format($factura->total, 2) }}

                    </h4>

                </div>

                <div class="mt-4">

                    <button onclick="window.print()" class="btn btn-picky-yellow fw-bold">

                        <i class="bi bi-printer"></i>
                        Imprimir Factura

                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection