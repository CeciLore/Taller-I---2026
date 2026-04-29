@extends('layouts.app')
@section('content')

<div class="hero" style="min-height: 50vh; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%); display: flex; align-items: center; justify-content: center;">
             <div class="hero-content">
                <h1>Información de compra.</h1>
                <span class="slogan d-block mb-4">Todo lo que tu mejor amigo necesita, a un click de distancia.</span>
            </div>        
        </div>
<main class="container my-5 pt-4">

    
    

    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card border-success">
                <div class="card-body" style="background: linear-gradient(135deg, #96e6fa, #bd5ef8); border-radius: 10px;">
                    <h2 class="h4 mb-4"><i class="bi bi-credit-card me-2"></i> Formas de Envío</h2>
                    <ul class="list-unstyled">
                        <li class="list-group-item border-0">✅ <strong>Motomensajería:</strong> Entregas en el día en Corrientes Capital, comprando antes de las 12hs.</li>
                        <li class="list-group-item border-0">✅ <strong>Correo Argentino:</strong> Envíos a todo el país. Seguimiento online de tu paquete.</li>
                        <li class="list-group-item border-0">✅ <strong>Retiro Picky:</strong> Podés retirar gratis en nuestra sucursal de La Rioja 1560, CP 3400 Corrientes - Capital, de Lunes a Sábados.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-warning">
                <div class="card-body" style="background: linear-gradient(135deg, #96e6fa, #bd5ef8); border-radius: 10px;">
                    <h2 class="h4 mb-4"><i class="bi bi-credit-card me-2"></i> Métodos de Pago</h2>
                    <p>Queremos que sea fácil para vos:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">✅ <strong>Tarjetas:</strong> Crédito y Débito a través de Mercado Pago.</li>
                        <li class="mb-2">✅ <strong>Efectivo:</strong> Rapipago o PagoFácil.</li>
                        <li class="mb-2">✅ <strong>Transferencia:</strong> 15% de descuento directo sobre el total de tu compra.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-5 border-0 shadow-sm" role="alert">
        <strong>¿Cambios o devoluciones?</strong> Tenés 30 días corridos desde que recibís tu compra para solicitar un cambio sin cargo por fallas de fábrica.
    </div>
</main>
@endsection
