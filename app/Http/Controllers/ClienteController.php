<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller 
{

    public function index()
    {
        
        $clientes = Cliente::with('user')->get();
        return view ('listado-clientes', compact('clientes'));
    }

  
    public function create()
    {
        return view('cliente');
    }

    
    public function store(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para registrarte como cliente.');
        }

        if (Cliente::where('user_id', $userId)->exists()) {
            return redirect('/producto')->with('error', 'Ya estás registrado como cliente.');
        }

        Cliente::create(['user_id' => $userId]);

        return redirect()->route('producto.index')->with('success', 'Ahora estás registrado como cliente.');
    }


    public function show(Cliente $cliente)
    {
        return view ('mostrar-cliente', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente -> user -> name = $request -> nombre;
        $cliente -> user-> email = $request -> email;
        $cliente -> user-> password = $request -> password;
        $cliente ->save();
        return redirect ('/cliente');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente -> delete();
        return redirect ('/cliente');
    }
}

