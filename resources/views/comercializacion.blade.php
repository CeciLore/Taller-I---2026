@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero">

    <div class="hero-content text-center">

        <h1>Información de compra.</h1>

        <span class="slogan d-block mb-4">
            Todo lo que tu mejor amigo necesita,
            a un click de distancia.
        </span>

    </div>

</div>

<!-- CONTENIDO -->
<main class="container my-5 pt-4">

    <div class="row">

        <!-- ENVÍOS -->
        <div class="col-md-6 mb-4">

            <div class="card info-card border-success">

                <div class="card-body info-card-body">

                    <h2 class="h4 mb-4">

                        <i class="bi bi-truck me-2"></i>

                        Formas de Envío

                    </h2>

                    <ul class="list-unstyled">

                        <li class="info-item">
                            ✅
                            <strong>Motomensajería:</strong>
                            Entregas en el día en Corrientes Capital.
                        </li>

                        <li class="info-item">
                            ✅
                            <strong>Correo Argentino:</strong>
                            Envíos a todo el país.
                        </li>

                        <li class="info-item">
                            ✅
                            <strong>Retiro Picky:</strong>
                            Retirá gratis en nuestra sucursal.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- PAGOS -->
        <div class="col-md-6 mb-4">

            <div class="card info-card border-warning">

                <div class="card-body info-card-body">

                    <h2 class="h4 mb-4">

                        <i class="bi bi-credit-card me-2"></i>

                        Métodos de Pago

                    </h2>

                    <p>
                        Queremos que sea fácil para vos:
                    </p>

                    <ul class="list-unstyled">

                        <li class="info-item">
                            ✅
                            <strong>Tarjetas:</strong>
                            Crédito y Débito.
                        </li>

                        <li class="info-item">
                            ✅
                            <strong>Efectivo:</strong>
                            Rapipago o PagoFácil.
                        </li>

                        <li class="info-item">
                            ✅
                            <strong>Transferencia:</strong>
                            15% de descuento.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- ALERTA -->
    <div class="alert alert-info purchase-alert mt-5 border-0 shadow-sm"
         role="alert">

        <strong>
            ¿Cambios o devoluciones?
        </strong>

        Tenés 30 días corridos desde que recibís tu compra
        para solicitar un cambio sin cargo.

    </div>

</main>

@endsection