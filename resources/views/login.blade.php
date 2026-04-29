@extends('layouts.app')

@section('content')
<div class="hero hero-login">
    <div class="hero-content text-center">
        <h1>Bienvenido de nuevo</h1>
        <span class="slogan d-block mb-4">Ingresa a tu cuenta de Picky Petshop.</span>
    </div>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <section class="card card-login shadow-lg border-0 p-4">
                <h2 class="text-center mb-4 fw-bold title-brand">Iniciar Sesión 🐾</h2>
                
                <form action="{{ url('/login') }}" method="POST" id="formLogin" class="needs-validation" novalidate>
                    @csrf 
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text icon-login-box">
                                <i class="bi bi-envelope-fill text-muted"></i>
                            </span>
                            <input type="email" 
                                   class="form-control input-login-right" 
                                   id="email" 
                                   name="email" 
                                   placeholder="tu@ejemplo.com" 
                                   required
                                   oninput="this.value = this.value.replace(/\.{2,}/g, '.');">
                            <div class="invalid-feedback">Ingresa un email válido.</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text icon-login-box">
                                <i class="bi bi-lock-fill text-muted"></i>
                            </span>
                            <input type="password" 
                                   class="form-control input-login-right" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••" 
                                   required 
                                   pattern="^[^.]+$"
                                   oninput="this.value = this.value.replace(/\./g, '');">
                            <div class="invalid-feedback">La contraseña es obligatoria y no puede contener puntos.</div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" id="btnLogin" class="btn btn-login-submit btn-lg text-dark py-3 fw-bold shadow-sm">
                            INGRESAR A MI CUENTA 🐶
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="#" class="text-muted small">¿Olvidaste tu contraseña?</a>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">¿No tienes cuenta? <a href="{{ url('/registro') }}" class="fw-bold link-brand">Regístrate</a></p>
                    </div>

                    <div id="alertaExito" class="alert alert-login-success mt-4 d-none text-center shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>¡Inicio de sesión exitoso!</strong> Redirigiendo...
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

<script>
    (function () {
        'use strict'
        const form = document.getElementById('formLogin');

        form.addEventListener('submit', function (event) {
            const passwordInput = document.getElementById('password');
            const emailInput = document.getElementById('email');
            
            
            const tienePuntos = passwordInput.value.includes('.');
            const soloEspacios = passwordInput.value.trim().length === 0;

            if (!form.checkValidity() || soloEspacios || tienePuntos) {
                event.preventDefault();
                event.stopPropagation();
                
                if (tienePuntos) {
                    passwordInput.setCustomValidity("No se permiten puntos");
                } else if (soloEspacios) {
                    passwordInput.setCustomValidity("Invalido");
                }
            } else {
                passwordInput.setCustomValidity("");
                event.preventDefault();
                const btn = document.getElementById('btnLogin');
                const alerta = document.getElementById('alertaExito');

                btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validando...';
                btn.disabled = true;

                setTimeout(() => {
                    alerta.classList.remove('d-none');
                    btn.innerHTML = '¡BIENVENIDO! ✨';
                    btn.style.backgroundColor = '#2ecc71';
                    btn.style.color = 'white';
                    btn.style.borderColor = '#155724';
                }, 1500);
            }
            form.classList.add('was-validated');
        }, false);

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.setCustomValidity("");
            });
        });
    })();
</script>
@endsection