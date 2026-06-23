@extends('layouts.carrito')

@section('content')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                🧾 Mis Compras
            </h2>

            <a href="{{ url('/') }}" class="btn btn-picky-yellow fw-bold">

                <i class="bi bi-house"></i>
                Volver al Inicio

            </a>

        </div>

        @if($compras->isEmpty())

            <div class="alert alert-info shadow-sm">
                Todavía no realizaste compras.
            </div>

        @else

            <div class="card product-card">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>

                                <tr>
                                    <th>Factura</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($compras as $compra)

                                                    <tr>

                                                        <td>
                                                            <strong>#{{ $compra->id }}</strong>
                                                        </td>

                                                        <td>
                                                            {{ $compra->fecha }}
                                                        </td>

                                                        <td class="fw-bold text-success">
                                                            ${{ number_format($compra->total, 2) }}
                                                        </td>

                                                        <td>

                                                            <span @class([
                                                                'estado-texto',
                                                                'estado-pendiente' => $compra->estado == 'pendiente',
                                                                'estado-completado' => $compra->estado == 'completado',
                                                                'estado-cancelado' => $compra->estado == 'cancelado',
                                                            ])>

                                                                {{ ucfirst($compra->estado) }}

                                                            </span>

                                                        </td>

                                                        <td class="text-center">

                                                            <a href="{{ route('factura.show', [
                                        'factura' => $compra->id,
                                        'origen' => 'miscompras'
                                    ]) }}" class="btn btn-picky-yellow btn-sm fw-bold">

                                                                Ver Factura

                                                            </a>

                                                        </td>

                                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        @endif

    </div>

@endsection