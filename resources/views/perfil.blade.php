@extends('layouts.carrito')

@section('content')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold mb-0">
                👤 Mi Perfil
            </h2>

            <a href="{{ url('/') }}" class="btn btn-picky-yellow fw-bold">

                <i class="bi bi-house"></i>
                Inicio

            </a>

        </div>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card product-card">

                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('perfil.update') }}">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Nombre
                                </label>

                                <input type="text" name="nombre" class="form-control" minlength="3" maxlength="100" required
                                    value="{{ old('nombre', $usuario->nombre) }}">

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Correo Electrónico
                                </label>

                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $usuario->email) }}" placeholder="ejemplo@gmail.com">

                                <small class="text-muted">
                                    El correo debe finalizar con @gmail.com
                                </small>

                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror


                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Dirección
                                </label>

                                <input type="text" name="direccion" class="form-control" maxlength="255"
                                    value="{{ old('direccion', $usuario->direccion) }}">

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Teléfono
                                </label>

                                <input type="tel" name="telefono" class="form-control" maxlength="15"
                                    value="{{ old('telefono', $usuario->telefono) }}">

                                <small class="text-muted">
                                    Solo números (8 a 15 dígitos).
                                </small>

                            </div>

                            <hr>

                            <h5 class="fw-bold mb-3">
                                🔒 Cambiar contraseña (opcional)
                            </h5>

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Nueva contraseña
                                </label>

                                <input type="password" name="password" class="form-control" minlength="8" maxlength="50">

                                <small class="text-muted">
                                    Mínimo 8 caracteres.
                                </small>

                            </div>

                            <div class="mb-4">

                                <label class="form-label fw-bold">
                                    Confirmar contraseña
                                </label>

                                <input type="password" name="password_confirmation" class="form-control">

                            </div>

                            <button type="submit" class="btn btn-picky-yellow fw-bold">

                                <i class="bi bi-check-circle"></i>
                                Guardar cambios

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection