@extends('layouts.carrito')
@section('content')
    <div class="hero">
        <div class="hero-content text-center">
            <h1>Consultas</h1>
            <span class="slogan d-block mb-4">
                Estamos aquí para ayudarte a ti y a tu mascota.
            </span>
        </div>
    </div>

    <main class="container my-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-end mb-4">

            <a href="{{ url('/') }}" class="btn btn-picky-yellow fw-bold">

                <i class="bi bi-house"></i>
                Inicio

            </a>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <section class="card shadow-lg border-0 p-4">
                    <h2 class="text-center mb-2">
                        Centro de Consultas 🐾
                    </h2>
                    <form action="{{ route('consultas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Motivo de la consulta
                            </label>
                            <select class="form-select" name="asunto" required>
                                <option value="">
                                    Seleccione una opción
                                </option>
                                <option value="Consulta sobre pedido">
                                    Consulta sobre pedido
                                </option>
                                <option value="Consulta sobre producto">
                                    Consulta sobre producto
                                </option>
                                <option value="Disponibilidad de productos">
                                    Disponibilidad de productos
                                </option>
                                <option value="Envíos y entregas">
                                    Envíos y entregas
                                </option>
                                <option value="Cambios y devoluciones">
                                    Cambios y devoluciones
                                </option>
                                <option value="Problema con una compra">
                                    Problema con una compra
                                </option>
                                <option value="Sugerencias o comentarios">
                                    Sugerencias o comentarios
                                </option>
                                <option value="Otro">
                                    Otro
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Mensaje
                            </label>
                            <textarea name="mensaje" rows="6" class="form-control"
                                placeholder="Describe tu consulta detalladamente para que podamos ayudarte de la mejor manera posible."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            Enviar consulta
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </main>
@endsection