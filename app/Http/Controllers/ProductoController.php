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
        // consultar productos
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // buscar artículo
    public function search(Request $request)
    {
        $query = $request->get('query');
        $productos = Producto::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($productos);
    }

    // muestra la vista de creación
    public function create()
    {
        return view('productos.create');
    }

    // almacenar el producto
    public function store(Request $request)
    {
        // validacion los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0'
        ]);

        // generar el sku
        $numbers = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $sku = "ART-{$numbers}-" . substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);

        // crear el producto
        Producto::create([
            'sku' => $sku,
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'state' => $request->has('state') ? true : false
        ]);

        // retornar alerta
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    // eliminacion de un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    // vista para editar producto 
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // actualizacion de producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'state' => $request->has('state') ? true : false,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }
}
