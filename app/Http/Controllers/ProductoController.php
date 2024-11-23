<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this -> middleware('auth')->except('index');
    } 

    public function index()
    {
        $productos = Producto::all();
        return view ('listado-productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|min:5|max:255',  // Máximo 255 caracteres
            'precio' => 'required|numeric|min:0',       // Valida que no sea negativo y acepta decimales
            'categoria' => 'required|min:3|max:255',    // Máximo 255 caracteres
            'stock' => 'required|integer|min:0',        // No permite números negativos
        ]);
        
        $producto = new Producto();
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> categoria = $request -> categoria;
        $producto -> stock = $request -> stock;
        $producto -> save();
        
        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view ('mostrar-producto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> categoria = $request -> categoria;
        $producto -> stock = $request -> stock;
        $producto ->save();
        return redirect ('/producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto -> delete();
        return redirect ('/producto');
    }
}
