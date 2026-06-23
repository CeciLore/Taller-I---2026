@extends('admin.layout')

@section('content')

    <div class="container py-4">

        <h1 class="section-title mb-4">
            Editar Categoría ✏️
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

            <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-12">

                        <label class="form-label fw-bold">
                            Nombre de la categoría
                        </label>

                        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}"
                            class="form-control" required minlength="3" maxlength="100"
                            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+$" title="Solo letras, números y espacios">

                        <small class="text-muted">
                            3 a 100 caracteres. Sin símbolos raros.
                        </small>

                    </div>

                    <div class="col-12">

                        <label class="form-label fw-bold">
                            Descripción
                        </label>

                        <textarea name="descripcion" rows="4" class="form-control" maxlength="255"
                            oninput="this.value = this.value.slice(0,255)">{{ old('descripcion', $categoria->descripcion) }}</textarea>

                        <small class="text-muted">
                            Máximo 255 caracteres.
                        </small>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-bold">
                            Estado
                        </label>

                        <select name="activo" class="form-select" required>

                            <option value="1" {{ $categoria->activo ? 'selected' : '' }}>
                                Activa
                            </option>

                            <option value="0" {{ !$categoria->activo ? 'selected' : '' }}>
                                Inactiva
                            </option>

                        </select>

                    </div>

                </div>

                <div class="d-flex gap-2 mt-4">

                    <button type="submit" class="btn btn-picky-yellow fw-bold">

                        💾 Guardar Cambios

                    </button>

                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-dark fw-bold">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection