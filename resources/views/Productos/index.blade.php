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
                                            <a href="{{ route('productos.edit', $p->id) }}"
                                                class="btn btn-sm btn-warning">Editar</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmarEliminacion({{ $p->id }})">
                                                Eliminar
                                            </button>
                                            <form id="delete-form-{{ $p->id }}"
                                                action="{{ route('productos.destroy', $p->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

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

        // control de notificacion
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Logrado!',
                text: "{{ session('success') }}",
                timer: 3000
            });
        @endif

        // confirmacion de eliminacion 
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection