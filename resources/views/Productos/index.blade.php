@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2>Gestión de Artículos de Oficina</h2>
                        <a href="{{ route('productos.create') }}" class="btn btn-light">
                            <i class="bi bi-plus-circle"></i> Agregar Artículo
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover shadow-sm bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th>SKU</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-productos">
                                @foreach($productos as $p)
                                    <tr>
                                        <td><strong>{{ $p->sku }}</strong></td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->stock }}</td>
                                        <td>
                                            <span class="badge {{ $p->state ? 'bg-success' : 'bg-danger' }}">
                                                {{ $p->activo ? 'Activo' : 'Inactivo' }}
                                            </span>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Logrado!',
                text: "{{ session('success') }}",
                timer: 3000
            });
        @endif
    </script>
@endsection