@extends('admin.layout')

@section('content')

    <div class="hero mb-4">
        <div class="hero-content text-center">
            <h1>Categorías 📦</h1>
            <p class="slogan">Gestiona las categorías del catálogo</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="section-title">

        </h1>

        <a href="{{ route('admin.categorias.create') }}" class="btn btn-picky-yellow fw-bold">
            + Nueva Categoría
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card product-card p-3">

        <div class="table-responsive">

            <table class="table align-middle text-center">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($categorias as $categoria)

                        <tr>

                            <td>
                                <span class="fw-bold">
                                    {{ $categoria->id }}
                                </span>
                            </td>

                            <td class="fw-bold">
                                {{ $categoria->nombre }}
                            </td>

                            <td class="text-muted">

                                {{ $categoria->descripcion ?: 'Sin descripción' }}

                            </td>

                            <td>

                                <span class="stock-badge stock-ok">

                                    {{ $categoria->productos->count() }}

                                </span>

                            </td>

                            <td>

                                @if($categoria->activo)

                                    <span class="estado-badge estado-activo">
                                        Activa
                                    </span>

                                @else

                                    <span class="estado-badge estado-inactivo">
                                        Inactiva
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-edit btn-sm">

                                        ✏️ Editar

                                    </a>

                                    <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST"
                                        onsubmit="return confirm('¿Eliminar esta categoría?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-delete btn-sm">

                                            🗑 Eliminar

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-muted py-4">

                                No hay categorías registradas.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection