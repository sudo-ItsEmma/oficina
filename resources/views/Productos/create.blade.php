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
                </div>
            </div>
        </div>
    </div>
@endsection