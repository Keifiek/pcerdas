<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VentaRealizada;

class VentaController extends Controller
{

    public function index()
    {
        // Obtener el cliente relacionado con el usuario autenticado
        $cliente = Auth::user()->cliente;

        // Verificar si el usuario tiene un proveedor asociado
        if ($cliente) {
            // Obtener todas las compras relacionadas con el cliente y cargar los productos a través de la relación 'productos'
            $compras = Venta::with('productos.producto') // Cargamos los productos asociados a la venta a través de VentaProducto
                ->where('cliente_id', $cliente->id)
                ->get();
        } else {
            // Si no tiene proveedor asociado, puedes redirigir o manejar el caso
            return redirect()->route('producto.index')->with('error', 'No tienes un proveedor asociado.');
        }

        // Pasar las compras a la vista
        return view('listado-mis-compras', compact('compras'));
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

        // Verificar si hay suficiente stock para la venta
        if ($producto->stock < $request->cantidad) {
            return back()->withErrors(['stock' => 'No hay suficiente stock disponible para la venta.']);
        }

        // Crear la venta asociada al cliente
        $venta = Venta::create([
            'cliente_id' => Auth::user()->cliente?->id,
            'total' => $producto->precio * $request->cantidad,
        ]);

        // Registrar el detalle de la venta
        $venta->productos()->create([
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
        ]);

        // Reducir el stock del producto
        $producto->decrement('stock', $request->cantidad);

        $usuario = Auth::user()->email;
        Mail::to($usuario)->send(new VentaRealizada($venta));
        

        return back()->with('success', 'Venta realizada exitosamente. Inventario actualizado.');
    }

    public function storeBulk(Request $request)
    {
        $productosSeleccionados = collect($request->input('productos'))->filter(function ($cantidad) {
            return $cantidad > 0;
        });

        if ($productosSeleccionados->isEmpty()) {
            return back()->withErrors(['productos' => 'No seleccionaste productos para operar.']);
        }

        // Crear la venta asociada al cliente
        $venta = Venta::create([
            'cliente_id' => Auth::user()->cliente?->id,
            'total' => 0, // Se calculará después
        ]);

        $total = 0;

        foreach ($productosSeleccionados as $productoId => $cantidad) {
            $producto = Producto::findOrFail($productoId);

            // Verificar si hay suficiente stock para cada producto
            if ($producto->stock < $cantidad) {
                return back()->withErrors(['stock' => "Stock insuficiente para {$producto->descripcion}."]);
            }

            // Registrar el detalle de la venta
            $venta->productos()->create([
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
            ]);

            // Reducir el stock del producto
            $producto->decrement('stock', $cantidad);

            // Calcular el total
            $total += $producto->precio * $cantidad;
        }

        // Actualizar el total de la venta
        $venta->update(['total' => $total]);

        return back()->with('success', 'Operación en lote realizada exitosamente. Inventario actualizado.');
    }

    public function show(Venta $venta)
    {
        //
    }

    public function edit(Venta $venta)
    {
        //
    }

    public function update(Request $request, Venta $venta)
    {
        //
    }

    public function destroy(Venta $venta)
    {
        //
    }
}
