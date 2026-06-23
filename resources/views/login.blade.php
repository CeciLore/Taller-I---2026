@extends('layouts.carrito')

@section('content')

    <div class="hero position-relative">

        <div class="hero-content text-center">

            <h1 class="fw-bold">
                Bienvenido de nuevo
            </h1>

            <span class="slogan d-block mb-0">
                Ingresa a tu cuenta de Picky Petshop.
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

                <section class="card card-login shadow-lg border-0 p-4">

                    <h2 class="text-center mb-4 fw-bold title-brand">
                        Iniciar Sesión 🐾
                    </h2>

                    <form action="{{ url('/login') }}" method="POST" id="formLogin" class="needs-validation" novalidate>

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-login-box">
                                    <i class="bi bi-envelope-fill text-muted"></i>
                                </span>

                                <input type="email" class="form-control input-login-right" name="email"
                                    value="{{ old('email') }}" placeholder="tu@ejemplo.com" required>

                            </div>

                            @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Contraseña
                            </label>

                            <div class="input-group">

                                <span class="input-group-text icon-login-box">
                                    <i class="bi bi-lock-fill text-muted"></i>
                                </span>

                                <input type="password" class="form-control input-login-right" name="password"
                                    placeholder="••••••••" required>

                            </div>

                            @error('password')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        
                        <div class="d-grid">

                            <button type="submit" class="btn btn-login-submit btn-lg fw-bold shadow-sm">

                                INGRESAR 🐶

                            </button>

                        </div>

                        <hr class="my-4">

                        <div class="text-center">

                            <p class="mb-0">

                                ¿No tienes cuenta?

                                <a href="{{ url('/registro') }}" class="fw-bold link-brand">

                                    Regístrate

                                </a>

                            </p>

                        </div>

                    </form>

                </section>

            </div>

        </div>

    </main>

@endsection