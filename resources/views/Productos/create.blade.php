@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Agregar nuevo artículo</h4>
                        <a href="{{ route('productos.index') }}" class="btn btn-light btn-sm">Volver</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('productos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre del Artículo</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock Inicial</label>
                                <input type="number" name="stock" class="form-control" required min="0">
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" name="state" checked>
                                <label class="form-check-label">Producto Activo</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Guardar Artículo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection