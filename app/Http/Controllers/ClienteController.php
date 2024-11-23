<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller 
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        
        $clientes = Cliente::with('user')->get();
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
    public function store(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Validar que el usuario esté autenticado
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para registrarte como cliente.');
        }

        // Verificar si el usuario ya está registrado como cliente
        if (Cliente::where('user_id', $userId)->exists()) {
            return redirect('/producto')->with('error', 'Ya estás registrado como cliente.');
        }

        // Crear un nuevo cliente asociado al usuario autenticado
        Cliente::create(['user_id' => $userId]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Ahora estás registrado como cliente.');
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
        $cliente -> user -> name = $request -> nombre;
        $cliente -> user-> email = $request -> email;
        $cliente -> user-> password = $request -> password;
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
