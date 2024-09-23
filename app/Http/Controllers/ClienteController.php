<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view ('listado-clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => 'required|email',
            'contraseña' => ['required'],
        ]);
        $cliente = new Cliente();
        $cliente -> nombre = $request -> nombre;
        $cliente -> correo = $request -> correo;
        $cliente -> contraseña = $request -> contraseña;
        $cliente ->save();
        return redirect('/cliente');             
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view ('mostrar-cliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente -> nombre = $request -> nombre;
        $cliente -> correo = $request -> correo;
        $cliente -> contraseña = $request -> contraseña;
        $cliente ->save();
        return redirect ('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente -> delete();
        return redirect ('/cliente');
    }
}
