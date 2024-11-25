<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraRealizada;


class CompraController extends Controller
{
    public function index()
    {
        // Obtener el proveedor relacionado con el usuario autenticado
        $proveedor = Auth::user()->proveedor;

        // Verificar si el usuario tiene un proveedor asociado
        if ($proveedor) {
            // Obtener todas las compras relacionadas con el proveedor y cargar los productos a través de la relación 'productos'
            $compras = Compra::with('productos.producto') // Cargamos los productos asociados a la compra a través de CompraProducto
                ->where('proveedor_id', $proveedor->id)
                ->get();
        } else {
            // Si no tiene proveedor asociado, puedes redirigir o manejar el caso
            return redirect()->route('producto.index')->with('error', 'No tienes un proveedor asociado.');
        }


        
        // Pasar las compras a la vista
        return view('listado-mis-ventas', compact('compras'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Crear la compra asociada al proveedor
        $compra = Compra::create([
            'proveedor_id' => Auth::user()->proveedor?->id,
            'total' => $producto->precio * $request->cantidad,
        ]);

        // Registrar el detalle de la compra
        $compra->productos()->create([
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
        ]);

        $usuario = Auth::user()->email;
        Mail::to($usuario)->send(new CompraRealizada($compra));

        // Incrementar el stock del producto
        $producto->increment('stock', $request->cantidad);

        return back()->with('success', 'Compra realizada exitosamente. Inventario actualizado.');
    }

    public function storeBulk(Request $request)
    {
        $productosSeleccionados = collect($request->input('productos'))->filter(function ($cantidad) {
            return $cantidad > 0;
        });

        if ($productosSeleccionados->isEmpty()) {
            return back()->withErrors(['productos' => 'No seleccionaste productos para operar.']);
        }

        // Crear la compra asociada al proveedor
        $compra = Compra::create([
            'proveedor_id' => Auth::user()->proveedor?->id,
            'total' => 0, // Se calculará después
        ]);

        $total = 0;

        foreach ($productosSeleccionados as $productoId => $cantidad) {
            $producto = Producto::findOrFail($productoId);

            // Registrar el detalle de la compra
            $compra->productos()->create([
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
            ]);

            // Incrementar el stock del producto
            $producto->increment('stock', $cantidad);

            // Calcular el total
            $total += $producto->precio * $cantidad;
        }

        // Actualizar el total de la compra
        $compra->update(['total' => $total]);

        return back()->with('success', 'Operación en lote realizada exitosamente. Inventario actualizado.');
    }

    public function show(Compra $compra)
    {
        //
    }

    public function edit(Compra $compra)
    {
        //
    }

    public function update(Request $request, Compra $compra)
    {
        //
    }

    public function destroy(Compra $compra)
    {
        //
    }
}
