@extends('layouts.carrito')

@section('content')

    <div class="hero position-relative">

        <div class="hero-content text-center">

            <h1 class="fw-bold">
                ¡Únete a la manada!
            </h1>

            <span class="slogan d-block mb-0">
                Crea tu cuenta para disfrutar de beneficios exclusivos en Picky Petshop.
            </span>

        </div>

        <div class="position-absolute top-0 start-0 m-3">

            <a href="{{ url('/') }}" class="btn btn-login-submit fw-bold">

                ← Volver

            </a>

        </div>

    </div>

    <main class="container my-5">

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5">

                <section class="card card-register shadow-lg border-0 p-4">

                    <h2 class="text-center mb-4 fw-bold title-brand">
                        Crear Cuenta 🐾
                    </h2>

                    <form action="{{ url('/registro') }}" method="POST" id="formRegistro" class="needs-validation"
                        novalidate>

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nombre Completo
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-person-fill text-muted"></i>
                                </span>

                                <input type="text" name="nombre" class="form-control input-register-right"
                                    placeholder="Ej: Ana López" value="{{ old('nombre') }}" required>

                            </div>

                            @error('nombre')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-envelope-fill text-muted"></i>
                                </span>

                                <input type="email" name="email" class="form-control input-register-right"
                                    placeholder="tu@ejemplo.com" value="{{ old('email') }}" required>

                            </div>

                            @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-lock-fill text-muted"></i>
                                </span>

                                <input type="password" name="password" class="form-control input-register-right"
                                    placeholder="••••••••" required>

                            </div>

                            @error('password')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Confirmar Contraseña
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-shield-lock-fill text-muted"></i>
                                </span>

                                <input type="password" name="password_confirmation"
                                    class="form-control input-register-right" placeholder="••••••••" required>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Dirección
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-geo-alt-fill text-muted"></i>
                                </span>

                                <input type="text" name="direccion" class="form-control input-register-right"
                                    placeholder="Ej: Calle 123" value="{{ old('direccion') }}">

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Teléfono
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-register-box">
                                    <i class="bi bi-telephone-fill text-muted"></i>
                                </span>

                                <input type="text" name="telefono" class="form-control input-register-right"
                                    placeholder="8888-8888" value="{{ old('telefono') }}">

                            </div>

                            @error('telefono')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-grid">

                            <button type="submit" class="btn btn-register-submit btn-lg fw-bold shadow-sm">

                                REGISTRARME 🐶

                            </button>

                        </div>

                    </form>

                </section>

            </div>

        </div>

    </main>

@endsection