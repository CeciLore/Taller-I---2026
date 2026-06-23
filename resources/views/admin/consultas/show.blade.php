@extends('admin.layout')

@section('content')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-0">
                    📨 Consulta #{{ $consulta->id }}
                </h2>

                <small class="text-muted">
                    Detalle y gestión de consulta del cliente
                </small>

            </div>

            <a href="{{ route('admin.consultas.index') }}" class="btn btn-dark fw-bold">

                ← Volver

            </a>

        </div>

        <div class="card consulta-card p-3 mb-3">

            <div class="row g-3">

                <div class="col-md-4">

                    <h6 class="text-muted mb-1">Cliente</h6>
                    <p class="fw-bold mb-0">{{ $consulta->usuario->nombre }}</p>

                </div>

                <div class="col-md-4">

                    <h6 class="text-muted mb-1">Correo</h6>
                    <p class="mb-0">{{ $consulta->usuario->email }}</p>

                </div>

                <div class="col-md-4">

                    <h6 class="text-muted mb-1">Estado</h6>

                    @if($consulta->estado == 'pendiente')
                        <span class="stock-badge stock-low">Pendiente</span>

                    @elseif($consulta->estado == 'respondida')
                        <span class="estado-badge estado-activo">Respondida</span>

                    @else
                        <span class="estado-badge estado-inactivo">Cerrada</span>
                    @endif

                </div>

                <div class="col-12">

                    <h6 class="text-muted mb-1">Fecha</h6>

                    <p class="mb-0">
                        {{ $consulta->fecha_creacion->format('d/m/Y H:i') }}
                    </p>

                </div>

            </div>

        </div>

        <div class="card consulta-card p-3 mb-3">

            <h5 class="fw-bold mb-2">
                📌 Asunto
            </h5>

            <p class="mb-0">
                {{ $consulta->asunto }}
            </p>

        </div>

        <div class="card consulta-card p-3 mb-3">

            <h5 class="fw-bold mb-2">
                💬 Mensaje del cliente
            </h5>

            <div class="p-3 bg-light rounded">

                {!! nl2br(e($consulta->mensaje)) !!}

            </div>

        </div>

        <div class="card consulta-card p-3 mb-3">

            <h5 class="fw-bold mb-3">
                ✍️ Responder consulta
            </h5>

            <form action="{{ route('admin.consultas.responder', $consulta->id) }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Respuesta para el cliente
                    </label>

                    <textarea name="respuesta" rows="6" class="form-control" placeholder="Escriba aquí la respuesta..."
                        required>{{ old('respuesta', $consulta->respuesta) }}</textarea>

                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-success fw-bold">

                        💾 Guardar respuesta

                    </button>

                    <a href="{{ route('admin.consultas.index') }}" class="btn btn-dark fw-bold">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection