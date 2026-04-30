@extends('layouts.app')

@section('content')
<div class="hero hero-register">
    <div class="hero-content text-center">
        <h1>¡Únete a la manada!</h1>
        <span class="slogan d-block mb-4">Crea tu cuenta para disfrutar de beneficios exclusivos en Picky Petshop.</span>
    </div>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <section class="card card-register shadow-lg border-0 p-4">
                <h2 class="text-center mb-4 fw-bold title-brand">Crear Cuenta 🐾</h2>
                
                <form action="{{ url('/registro') }}" method="POST" id="formRegistro" class="needs-validation" novalidate>
                    @csrf 

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-person-fill text-muted"></i>
                            </span>
                            <input type="text" 
                                   name="name" 
                                   class="form-control input-register-right" 
                                   id="name" 
                                   placeholder="Ej: Ana López" 
                                   required 
                                   pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{5,}$"
                                   oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');">
                            <div class="invalid-feedback">
                                El nombre debe tener al menos 5 letras y solo puede contener letras.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-envelope-fill text-muted"></i>
                            </span>
                            <input type="email" 
                                   name="email" 
                                   class="form-control input-register-right" 
                                   id="email" 
                                   placeholder="tu@ejemplo.com" 
                                   required 
                                   oninput="this.value = this.value.replace(/\.{2,}/g, '.');">
                            <div class="invalid-feedback">Ingresa un email válido.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-lock-fill text-muted"></i>
                            </span>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control input-register-right" 
                                   placeholder="••••••••" 
                                   required 
                                   pattern="^[^.,\s]+$"
                                   oninput="this.value = this.value.replace(/[.,\s]/g, '');">
                            <div class="invalid-feedback">
                                La contraseña no puede contener puntos, comas ni espacios.
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text icon-register-box">
                                <i class="bi bi-shield-lock-fill text-muted"></i>
                            </span>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="form-control input-register-right" 
                                   placeholder="••••••••" 
                                   required 
                                   pattern="^[^.,\s]+$"
                                   oninput="this.value = this.value.replace(/[.,\s]/g, '');">
                            <div class="invalid-feedback" id="confirmFeedback">
                                Las contraseñas deben coincidir y no tener espacios, puntos ni comas.
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" id="btnRegistro" class="btn btn-register-submit btn-lg text-dark py-3 fw-bold shadow-sm">
                            REGISTRARME 🐶
                        </button>
                    </div>

                    <div id="alertaExito" class="alert alert-register-success mt-4 d-none text-center shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>¡Registro exitoso!</strong> Bienvenida a Picky Petshop.
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>

@endsection