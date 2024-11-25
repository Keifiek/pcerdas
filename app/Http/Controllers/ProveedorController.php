<?php
namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedors = Proveedor::all();
        return view ('listado-proveedores', compact('proveedors'));
    }

    public function create()
    {
        return view('proveedor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',  // Validar que la dirección esté presente
        ]);
        
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Validar que el usuario esté autenticado
        if (!$userId) {
            return redirect()->route('/')->with('error', 'Debes iniciar sesión para registrarte como cliente.');
        }

        // Verificar si el usuario ya está registrado como cliente
        if (Proveedor::where('user_id', $userId)->exists()) {
            return redirect('/producto')->with('error', 'Ya estás registrado como Proveedor.');
        }

        // Crear un nuevo Proveedor asociado al usuario autenticado
        Proveedor::create([
            'user_id' => $userId,
            'direccion' => $request->direccion,
        
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Ahora estás registrado como proveedor.');
    }

    public function show(Proveedor $proveedor)
    {
        return view ('mostrar-proveedor', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedor', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor -> nombre = $request -> nombre;
        $proveedor -> telefono = $request -> telefono;
        $proveedor -> direccion = $request -> direccion;
        $proveedor ->save();
        return redirect ('/proveedor');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor -> delete();
        return redirect ('/proveedor');
    }
}