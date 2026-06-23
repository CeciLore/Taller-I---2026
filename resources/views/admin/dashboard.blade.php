@extends('admin.layout')

@section('content')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="section-title mb-1">
                    Dashboard 📊
                </h1>

                <p class="text-muted mb-0">
                    Resumen general de la tienda
                </p>
            </div>

        </div>

        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="card consulta-card p-3 text-center">
                    <div class="fs-2">💰</div>
                    <div class="fw-bold fs-4">
                        ${{ number_format($ventasMes, 0, ',', '.') }}
                    </div>
                    <div class="text-muted">
                        Ventas del mes
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card consulta-card p-3 text-center">
                    <div class="fs-2">📦</div>
                    <div class="fw-bold fs-4">
                        {{ $pedidosTotales }}
                    </div>
                    <div class="text-muted">
                        Pedidos realizados
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card consulta-card p-3 text-center">
                    <div class="fs-2">👥</div>
                    <div class="fw-bold fs-4">
                        {{ $clientes }}
                    </div>
                    <div class="text-muted">
                        Usuarios registrados
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card consulta-card p-3 text-center">
                    <div class="fs-2">💬</div>
                    <div class="fw-bold fs-4">
                        {{ $consultasPendientes }}
                    </div>
                    <div class="text-muted">
                        Consultas pendientes
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="card consulta-card p-3 h-100">

                    <h4 class="mb-3">
                        📦 Pedidos recientes
                    </h4>

                    <div class="table-responsive">

                        <table class="table align-middle text-center">

                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($pedidosRecientes as $pedido)

                                    <tr>

                                        <td class="fw-bold">
                                            #{{ $pedido->id }}
                                        </td>

                                        <td>
                                            {{ $pedido->usuario->nombre }}
                                        </td>

                                        <td class="text-muted">
                                            {{ $pedido->fecha }}
                                        </td>

                                        <td>

                                            <span class="stock-badge stock-low">
                                                {{ ucfirst($pedido->estado) }}
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-muted py-3">
                                            No hay pedidos recientes.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card consulta-card p-3 h-100">

                    <h4 class="mb-3">
                        🚨 Alertas
                    </h4>

                    @if($consultasPendientes > 0)
                        <div class="stock-badge stock-low mb-2 w-100 text-center">
                            💬 {{ $consultasPendientes }} consultas pendientes
                        </div>
                    @endif

                    @if($pedidosPendientes > 0)
                        <div class="stock-badge stock-ok mb-2 w-100 text-center">
                            📦 {{ $pedidosPendientes }} pedidos pendientes
                        </div>
                    @endif

                    @if($stockBajo->count())
                        <div class="stock-badge stock-empty mb-2 w-100 text-center">
                            ⚠ Productos con stock crítico
                        </div>
                    @endif

                    @if(
                            !$consultasPendientes &&
                            !$pedidosPendientes &&
                            !$stockBajo->count()
                        )
                        <div class="stock-badge stock-ok w-100 text-center">
                            ✅ Todo está funcionando correctamente
                        </div>
                    @endif

                </div>

            </div>

        </div>

        <div class="row g-4 mt-2">

            <div class="col-lg-6">

                <div class="card consulta-card p-3 h-100">

                    <h4 class="mb-3">
                        🏆 Productos más vendidos
                    </h4>

                    <table class="table align-middle text-center">

                        <tbody>

                            @forelse($productosMasVendidos as $item)

                                <tr>

                                    <td>
                                        {{ $item->producto->nombre }}
                                    </td>

                                    <td class="fw-bold">
                                        {{ $item->total_vendidos }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td class="text-muted">
                                        Sin información
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="card consulta-card p-3 h-100">

                    <h4 class="mb-3">
                        ⚠ Stock bajo
                    </h4>

                    <table class="table align-middle text-center">

                        <tbody>

                            @forelse($stockBajo as $producto)

                                <tr>

                                    <td>
                                        {{ $producto->nombre }}
                                    </td>

                                    <td>
                                        <span class="stock-badge stock-empty">
                                            {{ $producto->stock }}
                                        </span>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td class="text-muted">
                                        No hay productos con stock crítico.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection