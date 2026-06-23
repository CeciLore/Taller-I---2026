@extends('admin.layout')

@section('content')

    <section class="hero">
        <div class="hero-content text-center">
            <h1>Gestión de Productos 🐶</h1>
            <p class="slogan">Administra el catálogo de productos de Picky</p>
        </div>
    </section>

    <section class="py-5">

        <div class="container">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card consulta-card p-3">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Productos registrados
                    </h3>

                    <a href="{{ route('admin.productos.create') }}" class="btn btn-picky-yellow fw-bold">
                        + Nuevo Producto
                    </a>

                </div>

                <form method="GET" action="{{ route('admin.productos.index') }}" class="row g-3 mb-4">

                    <div class="col-md-4">
                        <input type="text" name="buscar" class="form-control" placeholder="🔍 Buscar producto..."
                            value="{{ request('buscar') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="categoria" class="form-select">
                            <option value="">Todas las categorías</option>

                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="estado" class="form-select">
                            <option value="">Todos los estados</option>

                            <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>
                                Activos
                            </option>

                            <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>
                                Inactivos
                            </option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            Filtrar
                        </button>
                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($productos as $producto)

                                <tr>

                                    <td>
                                        @if($producto->url_imagen)
                                            <img src="{{ asset('storage/' . $producto->url_imagen) }}" class="admin-product-thumb">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>

                                    <td>
                                        <strong>{{ $producto->nombre }}</strong>
                                    </td>

                                    <td>
                                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                    </td>

                                    <td>
                                        ${{ number_format($producto->precio, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if($producto->stock <= 0)
                                            <span class="stock-badge stock-empty">Sin stock</span>
                                        @elseif($producto->stock <= 5)
                                            <span class="stock-badge stock-low">
                                                {{ $producto->stock }}
                                            </span>
                                        @else
                                            <span class="stock-badge stock-ok">
                                                {{ $producto->stock }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($producto->activo)
                                            <span class="estado-badge estado-activo">Activo</span>
                                        @else
                                            <span class="estado-badge estado-inactivo">Inactivo</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">

                                            <a href="{{ route('admin.productos.edit', $producto) }}"
                                                class="btn btn-edit btn-sm btn-action fw-bold">
                                                ✏️ Editar
                                            </a>

                                            <form action="{{ route('admin.productos.estado', $producto) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('PATCH')

                                                @if($producto->activo)

                                                    <button type="submit" class="btn btn-delete btn-sm btn-action fw-bold">
                                                        🚫 Desactivar
                                                    </button>

                                                @else

                                                    <button type="submit" class="btn btn-edit btn-sm btn-action fw-bold">
                                                        ✅ Activar
                                                    </button>

                                                @endif

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        No hay productos registrados
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">
                    {{ $productos->links() }}
                </div>

            </div>

        </div>

    </section>

@endsection