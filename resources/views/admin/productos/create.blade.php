@extends('admin.layout')

@section('content')

    <h1 class="section-title mb-4">
        Nuevo Producto 🐾
    </h1>

    <div class="card product-card p-4 shadow border-0">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Nombre del producto
                    </label>

                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" maxlength="150"
                        required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Categoría
                    </label>

                    <select name="categoria_id" class="form-select" required>

                        <option value="">
                            Seleccione una categoría
                        </option>

                        @foreach($categorias as $categoria)

                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>

                                {{ $categoria->nombre }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Precio
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            $
                        </span>

                        <input type="number" name="precio" class="form-control" value="{{ old('precio') }}" min="0"
                            step="0.01" required>

                    </div>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Stock disponible
                    </label>

                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min="0" required>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Imagen del producto
                    </label>

                    <input type="file" name="url_imagen" class="form-control" accept="image/*">

                    <small class="text-muted">

                        JPG, PNG o WEBP. Máx. 2 MB.

                    </small>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Vista previa
                    </label>

                    <div class="product-image-container">

                        <img id="preview" src="" class="product-image d-none">

                        <span id="preview-text" class="text-muted position-absolute">

                            Sin imagen seleccionada

                        </span>

                    </div>

                </div>

                <div class="col-12">

                    <label class="form-label fw-bold">
                        Descripción
                    </label>

                    <textarea name="descripcion" rows="5" class="form-control" maxlength="1000"
                        placeholder="Describe el producto...">{{ old('descripcion') }}</textarea>

                </div>

            </div>

            <div class="mt-4 d-flex gap-2">

                <button type="submit" class="btn btn-picky-yellow fw-bold">

                    💾 Guardar Producto

                </button>

                <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/admin/productosCreate.js') }}"></script>

@endpush