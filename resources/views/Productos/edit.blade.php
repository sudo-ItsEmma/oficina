@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-warning">
                    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Editar artículo: {{ $producto->sku }}</h4>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-dark btn-sm">Volver</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nombre del Artículo</label>
                                <input type="text" name="name" class="form-control" value="{{ $producto->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="description" class="form-control"
                                    rows="3">{{ $producto->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}"
                                    required min="0">
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" name="state" {{ $producto->state ? 'checked' : '' }}>
                                <label class="form-check-label">Producto Activo</label>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Actualizar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection