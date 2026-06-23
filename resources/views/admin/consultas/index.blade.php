@extends('admin.layout')

@section('content')

    <div class="hero mb-4">
        <div class="hero-content text-center">
            <h1>Consultas 📨</h1>
            <p class="slogan">Gestiona los mensajes enviados por los clientes</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="section-title"></h1>

        <span class="stock-badge stock-ok">
            Total: {{ $consultas->count() }}
        </span>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card consulta-card p-3 mb-3">

        <div class="table-responsive">

            <table class="table align-middle text-center">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Asunto</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($consultas as $consulta)

                        <tr>

                            <td>
                                <span class="fw-bold">
                                    #{{ $consulta->id }}
                                </span>
                            </td>

                            <td class="fw-bold">
                                {{ $consulta->usuario->nombre }}
                            </td>

                            <td class="text-muted">
                                {{ $consulta->asunto }}
                            </td>

                            <td>

                                @if(empty($consulta->respuesta))

                                    <span class="stock-badge stock-low">
                                        Pendiente
                                    </span>

                                @else

                                    <span class="estado-badge estado-activo">
                                        Respondida
                                    </span>

                                @endif

                            </td>

                            <td class="text-muted">

                                {{ $consulta->fecha_creacion->format('d/m/Y') }}

                                <br>

                                <small>
                                    {{ $consulta->fecha_creacion->format('H:i') }}
                                </small>

                            </td>

                            <td>

                                <a href="{{ route('admin.consultas.show', $consulta->id) }}" class="btn btn-edit btn-sm">

                                    👁 Ver

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-muted py-4">

                                No hay consultas registradas.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection