@extends('layouts.app')

@section('content')
<div class="hero" style="min-height: 40vh; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%); display: flex; align-items: center; justify-content: center;">
    <div class="hero-content text-center">
        <h1>Consultas</h1>
        <span class="slogan d-block mb-4">Estamos aquí para ayudarte a ti y a tu mascota.</span>
    </div>
</div>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <section class="card shadow-sm border-0 p-4">
                <h2 class="text-center mb-4 fw-bold">Envíanos un mensaje 🐾</h2>
                
                <form action="#" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre del humano</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juan Pérez">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-bold">Asunto</label>
                        <select class="form-select" id="asunto" name="asunto">
                            <option selected>Selecciona una opción</option>
                            <option value="pedidos">Sobre mi pedido</option>
                            <option value="productos">Duda sobre un producto</option>
                            <option value="otros">Otros motivos</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label fw-bold">¿En qué podemos ayudarte?</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu consulta aquí..."></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-purple-gradient text-white py-2">Enviar Consulta</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection