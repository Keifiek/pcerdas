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
        $datos = Cliente::all();
        return view ('listado-clientes', compact('datos'));
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
        return redirect('/clientes');             
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
