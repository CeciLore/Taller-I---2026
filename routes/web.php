<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PedidoUsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuarioConsultaController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\ConsultaController;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');

    Route::get('/categoria/{categoria}', 'categoria')
        ->name('productos.categoria');
});

Route::view('/quienessomos', 'quienessomos')
    ->name('quienessomos');

Route::view('/comercializacion', 'comercializacion')
    ->name('comercializacion');

Route::view('/contacto', 'contacto')
    ->name('contacto');

Route::view('/terminos', 'terminos')
    ->name('terminos');

Route::controller(AuthController::class)->group(function () {

    Route::get('/registro', 'showRegistro')
        ->name('register');

    Route::post('/registro', 'registro')
        ->name('register.store');

    Route::get('/login', 'showLogin')
        ->name('login');

    Route::post('/login', 'login')
        ->name('login.store');

    Route::post('/logout', 'logout')
        ->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::controller(CartController::class)->group(function () {

        Route::get('/carrito', 'index')
            ->name('carrito.index');

        Route::post('/carrito/agregar/{id}', 'agregar')
            ->name('carrito.agregar');

        Route::post('/carrito/eliminar/{id}', 'eliminar')
            ->name('carrito.eliminar');

        Route::post('/carrito/sumar/{id}', 'sumar')
            ->name('carrito.sumar');

        Route::post('/carrito/restar/{id}', 'restar')
            ->name('carrito.restar');

        Route::post('/carrito/vaciar', 'vaciar')
            ->name('carrito.vaciar');

        Route::post('/carrito/finalizar', 'finalizarCompra')
            ->name('carrito.finalizar');
    });

    Route::controller(UsuarioConsultaController::class)->group(function () {

        Route::get('/consultas', 'create')
            ->name('consultas');

        Route::post('/consultas', 'store')
            ->name('consultas.store');

        Route::get('/mis-consultas', 'index')
            ->name('consultas.mis');

        Route::get('/mis-consultas/{consulta}', 'show')
            ->name('consultas.show');
    });

    Route::controller(PedidoUsuarioController::class)->group(function () {

        Route::get('/miscompras', 'index')
            ->name('miscompras');

        Route::get('/factura/{factura}', 'show')
            ->name('factura.show');
    });

    Route::controller(PerfilController::class)->group(function () {

        Route::get('/perfil', 'edit')
            ->name('perfil');

        Route::put('/perfil', 'update')
            ->name('perfil.update');
    });
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('productos', ProductoController::class);

        Route::patch(
            'productos/{producto}/estado',
            [ProductoController::class, 'toggleEstado']
        )->name('productos.estado');

        Route::resource('categorias', CategoriaController::class);

        Route::controller(UsuarioController::class)->group(function () {

            Route::get('/usuarios', 'index')
                ->name('usuarios.index');

            Route::put('/usuarios/{user}/rol', 'cambiarRol')
                ->name('usuarios.rol');
        });

        Route::controller(ConsultaController::class)->group(function () {

            Route::get('/consultas', 'index')
                ->name('consultas.index');

            Route::get('/consultas/{consulta}', 'show')
                ->name('consultas.show');

            Route::post('/consultas/{consulta}/responder', 'responder')
                ->name('consultas.responder');

            Route::post('/consultas/{consulta}/cerrar', 'cerrar')
                ->name('consultas.cerrar');
        });

        Route::controller(PedidoController::class)->group(function () {

            Route::get('/pedidos', 'index')
                ->name('pedidos.index');

            Route::put('/pedidos/{pedido}/estado', 'actualizarEstado')
                ->name('pedidos.estado');
        });
    });