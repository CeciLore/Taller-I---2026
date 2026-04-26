@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: var(--brand-purple); min-height: 100vh; padding: 100px 0;">
    <div class="row justify-content-center mx-0">
        <div class="col-md-4">
            <div class="card p-4 p-md-5 bg-white" style="border-radius: 30px; border: 4px solid #000; box-shadow: 15px 15px 0px #000;">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark">¡HOLA DE NUEVO! 👋</h2>
                    <p class="text-muted">Ingresa tus datos para continuar.</p>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-bold mb-1 text-dark">CORREO ELECTRÓNICO</label>
                        <input type="email" name="email" class="form-control border-2" style="border-color: #000; height: 45px;">
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold mb-1 text-dark">CONTRASEÑA</label>
                        <input type="password" name="password" class="form-control border-2" style="border-color: #000; height: 45px;">
                    </div>

                    <button type="submit" class="btn btn-purple-gradient text-white btn-lg w-100 fw-bold mb-3" style="border: 3px solid #000;">
                        INGRESAR
                    </button>

                    <div class="text-center">
                        <a href="#" class="small text-muted d-block mb-2">¿Olvidaste tu contraseña?</a>
                        <p class="mb-0">¿No tienes cuenta? <a href="/registro" class="fw-bold text-primary">Regístrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection