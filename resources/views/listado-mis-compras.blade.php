<x-layaout>
    <h1>Listado de Compras</h1>

    @if($compras->isEmpty())
        <p>No hay compras registradas para este cliente.</p>
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
                    @foreach($compra->productos as $ventaProducto) <!-- Iteramos sobre los productos de cada compra -->
                        <tr>
                            <td>{{ $compra->created_at }}</td>
                            <td>{{ $ventaProducto->producto->descripcion }}</td> <!-- Descripción del producto -->
                            <td>{{ $ventaProducto->cantidad }}</td> <!-- Cantidad comprada -->
                            <td>${{ $ventaProducto->producto->precio * $ventaProducto->cantidad }}</td> <!-- Total (precio * cantidad) -->
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</x-layaout>
