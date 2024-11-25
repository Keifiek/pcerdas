<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevoProducto;

class ProductoController extends Controller
{ 
    public function __construct()
    {
        $this -> middleware('auth')->except('index', 'show');
    } 

    public function index()
    {
        $productos = Producto::all();
        return view ('listado-productos', compact('productos'));
    }

    public function create()
    {
        return view('producto');
    }

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

        $usuarios = User::pluck('email');
        foreach ($usuarios as $usuario) {
            Mail::to($usuario)->send(new NuevoProducto($producto));
        }
        
        return redirect('/producto');
    }

    public function show(Producto $producto)
    {
        return view ('mostrar-producto', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('producto', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'descripcion' => 'required|min:5|max:255',  
            'precio' => 'required|numeric|min:0',       
            'categoria' => 'required|min:3|max:255',    
            'stock' => 'required|integer|min:0',        
        ]);

        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> categoria = $request -> categoria;
        $producto -> stock = $request -> stock;
        $producto ->save();
        return redirect ('/producto');
    }

    public function destroy(Producto $producto)
    {
        $producto -> delete();
        return redirect ('/producto');
    }
}
