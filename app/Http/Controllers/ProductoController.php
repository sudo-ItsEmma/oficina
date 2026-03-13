<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importar el modelo de producto
use App\Models\Producto;

class ProductoController extends Controller
{
    // muestra el index
    public function index()
    {
        return view('productos.index');
    }

    // muestra la vista de creación
    public function create()
    {
        return view('productos.create');
    }
}
