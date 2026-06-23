@extends('admin.layout')

@section('content')

    <div class="hero mb-4">

        <div class="hero-content text-center">

            <h1>Usuarios 👥</h1>

            <p class="slogan">
                Gestión de usuarios y administradores
            </p>

        </div>

    </div>

    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card consulta-card p-3">

            <form method="GET" action="{{ route('admin.usuarios.index') }}" class="row g-3 mb-3">

                <div class="col-md-8">

                    <input type="text" name="buscar" class="form-control"
                        placeholder="🔍 Buscar usuario por nombre o email..." value="{{ request('buscar') }}">

                </div>

                <div class="col-md-4">

                    <select name="rol" class="form-select">

                        <option value="todos">
                            👥 Todos los roles
                        </option>

                        <option value="usuario" {{ request('rol') == 'usuario' ? 'selected' : '' }}>
                            🐶 Usuarios
                        </option>

                        <option value="admin" {{ request('rol') == 'admin' ? 'selected' : '' }}>
                            👑 Administradores
                        </option>

                    </select>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table align-middle text-center">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($usuarios as $usuario)

                            <tr>

                                <td class="fw-bold">
                                    {{ $usuario->id }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $usuario->nombre }}
                                </td>

                                <td class="text-muted">
                                    {{ $usuario->email }}
                                </td>

                                <td>

                                    @if($usuario->id == 5)

                                        <span class="estado-badge estado-activo">
                                            👑 ADMIN PRINCIPAL
                                        </span>

                                    @elseif($usuario->rol == 'admin')

                                        <span class="estado-badge estado-activo">
                                            👑 ADMIN
                                        </span>

                                    @else

                                        <span class="stock-badge stock-ok">
                                            🐶 USUARIO
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        @if($usuario->id == 5)

                                            <span class="text-warning fw-bold">
                                                Protegido
                                            </span>

                                        @elseif(auth()->id() != $usuario->id)

                                            @if($usuario->rol == 'usuario')

                                                <form action="{{ route('admin.usuarios.rol', $usuario) }}" method="POST">

                                                    @csrf
                                                    @method('PUT')

                                                    <button class="btn btn-edit btn-sm">
                                                        Hacer Admin
                                                    </button>

                                                </form>

                                            @elseif($usuario->rol == 'admin')

                                                @if(auth()->id() == 5)

                                                    <form action="{{ route('admin.usuarios.rol', $usuario) }}" method="POST">

                                                        @csrf
                                                        @method('PUT')

                                                        <button class="btn btn-delete btn-sm">
                                                            Quitar Admin
                                                        </button>

                                                    </form>

                                                @else

                                                    <span class="text-muted">
                                                        Protegido
                                                    </span>

                                                @endif

                                            @endif

                                        @else

                                            <span class="text-muted">
                                                Tú
                                            </span>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-muted py-4">
                                    No hay usuarios registrados
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $usuarios->links() }}
            </div>

        </div>

    </div>

@endsection