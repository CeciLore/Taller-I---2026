@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: var(--brand-purple); min-height: 100vh; padding: 100px 0;">
    <div class="row justify-content-center mx-0">
        <div class="col-md-5">
            <div class="card p-4 p-md-5 bg-white" style="border-radius: 30px; border: 4px solid #000; box-shadow: 15px 15px 0px #000;">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark">¡ÚNETE A LA MANADA! 🐾</h2>
                    <p class="text-muted">Crea tu cuenta para disfrutar de beneficios exclusivos.</p>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-bold mb-1 text-dark">NOMBRE COMPLETO</label>
                        <input type="text" name="name" class="form-control border-2" style="border-color: #000; height: 45px;" placeholder="Ej: Ana López">
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-1 text-dark">EMAIL</label>
                        <input type="email" name="email" class="form-control border-2" style="border-color: #000; height: 45px;" placeholder="ana@ejemplo.com">
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-1 text-dark">CONTRASEÑA</label>
                        <input type="password" name="password" class="form-control border-2" style="border-color: #000; height: 45px;">
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold mb-1 text-dark">CONFIRMAR CONTRASEÑA</label>
                        <input type="password" name="password_confirmation" class="form-control border-2" style="border-color: #000; height: 45px;">
                    </div>

                    <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold" style="border: 3px solid #000;">
                        REGISTRARME
                    </button>

                    <div class="text-center mt-4">
                        <p class="mb-0">¿Ya tienes cuenta? <a href="/login" class="fw-bold text-primary">Inicia sesión aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection