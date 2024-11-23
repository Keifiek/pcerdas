<x-layaout>
    <h1>Listado de Ventas</h1>

    @if($compras->isEmpty())
        <p>No hay compras registradas para este proveedor.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    @foreach($compra->productos as $compraProducto) <!-- Iteramos sobre los productos de cada compra -->
                        <tr>
                            <td>{{ $compra->created_at }}</td>
                            <td>{{ $compraProducto->producto->descripcion }}</td> <!-- Descripción del producto -->
                            <td>{{ $compraProducto->cantidad }}</td> <!-- Cantidad comprada -->
                            <td>${{ $compraProducto->producto->precio * $compraProducto->cantidad }}</td> <!-- Total (precio * cantidad) -->
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</x-layaout>
