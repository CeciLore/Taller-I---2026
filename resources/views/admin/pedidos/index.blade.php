@extends('admin.layout')

@section('content')

    <div class="hero mb-4">

        <div class="hero-content text-center">

            <h1>Pedidos 📦</h1>

            <p class="slogan">
                Gestión y seguimiento de pedidos
            </p>

        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card consulta-card p-3">

        <div class="table-responsive">

            <table class="table align-middle text-center">

                <thead>

                    <tr>
                        <th># Pedido</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($pedidos as $pedido)

                        <tr>

                            <td class="fw-bold">
                                #{{ $pedido->id }}
                            </td>

                            <td class="fw-semibold">
                                {{ $pedido->usuario->nombre ?? 'Sin usuario' }}
                            </td>

                            <td class="text-muted">
                                {{ $pedido->usuario->email ?? '-' }}
                            </td>

                            <td class="fw-bold">
                                ${{ number_format($pedido->total, 2) }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y H:i') }}
                            </td>

                            <td>

                                @if($pedido->estado == 'pendiente')
                                    <span class="stock-badge stock-low">
                                        Pendiente
                                    </span>

                                @elseif($pedido->estado == 'enviado')
                                    <span class="estado-badge estado-activo">
                                        Enviado
                                    </span>

                                @elseif($pedido->estado == 'entregado')
                                    <span class="estado-badge estado-activo">
                                        Entregado
                                    </span>
                                @endif

                            </td>

                            <td>

                                <form action="{{ route('admin.pedidos.estado', $pedido->id) }}" method="POST"
                                    class="d-flex gap-2 justify-content-center align-items-center">

                                    @csrf
                                    @method('PUT')

                                    <select name="estado" class="form-select form-select-sm">

                                        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>
                                            Pendiente
                                        </option>

                                        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>
                                            Enviado
                                        </option>

                                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>
                                            Entregado
                                        </option>

                                    </select>

                                    <button type="submit" class="btn btn-edit btn-sm">
                                        Guardar
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-muted py-4">
                                No hay pedidos registrados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $pedidos->links() }}
        </div>

    </div>

@endsection