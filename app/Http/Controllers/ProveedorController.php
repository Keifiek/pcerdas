<?php
namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedors = Proveedor::all();
        return view ('listado-proveedores', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'telefono' => 'required|max:15',
            'direccion' => ['required'],
            'password' => ['required'],
        ]);
        $proveedor = new Proveedor();
        $proveedor -> nombre = $request -> nombre;
        $proveedor -> telefono = $request -> telefono;
        $proveedor -> direccion = $request -> direccion;
        $proveedor -> password = $request -> password;
        $proveedor ->save();
        return redirect('/proveedor');             
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view ('mostrar-proveedor', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor -> nombre = $request -> nombre;
        $proveedor -> telefono = $request -> telefono;
        $proveedor -> direccion = $request -> direccion;
        $proveedor ->save();
        return redirect ('/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor -> delete();
        return redirect ('/proveedor');
    }
}