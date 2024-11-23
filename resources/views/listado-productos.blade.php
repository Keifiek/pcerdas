<x-layaout>
<h1>Listado de productos</h1>

<a href="/producto/create">Ingresar un nuevo producto </a>

<table border="1">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>Acciones</th>
            <th>Operación</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>{{ $producto->stock }}</td>
            <td>
                <a href="{{ route('producto.show', $producto) }}">Mostrar detalles</a>
            </td>
            <td>
                <!-- Validación de autenticación del usuario -->
                @if (Auth::check())
                    <!-- Verificar si el usuario es cliente -->
                    @if (Auth::user()->cliente)
                        <form action="{{ route('ventas.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <label for="cantidad_{{ $producto->id }}">Cantidad (Compra):</label>
                            <input type="number" id="cantidad_{{ $producto->id }}" name="cantidad" max="{{ $producto->stock }}" min="1" required>
                            <button type="submit" class="btn btn-primary">Comprar</button>
                        </form>
                    @endif

                    <!-- Verificar si el usuario es proveedor -->
                    @if (Auth::user()->proveedor)
                        <form action="{{ route('compras.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <label for="cantidad_{{ $producto->id }}">Cantidad (Venta):</label>
                            <input type="number" id="cantidad_{{ $producto->id }}" name="cantidad" max="100" min="1" required>
                            <button type="submit" class="btn btn-danger">Vender</button>
                        </form>
                    @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Formulario para operaciones en lote de compra (solo si el usuario es cliente) -->
@if (Auth::check() && Auth::user()->cliente)
    <form action="{{ route('ventas.store.bulk') }}" method="POST">
        @csrf
        <h3>Comprar productos en lote:</h3>
        @foreach($productos as $producto)
            <div>
                <label for="bulk_cantidad_{{ $producto->id }}">{{ $producto->descripcion }}:</label>
                <input type="number" id="bulk_cantidad_{{ $producto->id }}" name="productos[{{ $producto->id }}]" max="100" min="0">
            </div>
        @endforeach
        <button type="submit" class="btn btn-success">Comprar productos</button>
    </form>
@endif

<!-- Formulario para operaciones en lote de venta (solo si el usuario es proveedor) -->
@if (Auth::check() && Auth::user()->proveedor)
    <form action="{{ route('compras.store.bulk') }}" method="POST">
        @csrf
        <h3>Vender productos en lote:</h3>
        @foreach($productos as $producto)
            <div>
                <label for="bulk_cantidad_{{ $producto->id }}">{{ $producto->descripcion }}:</label>
                <input type="number" id="bulk_cantidad_{{ $producto->id }}" name="productos[{{ $producto->id }}]" max="{{ $producto->stock }}" min="0">
            </div>
        @endforeach
        <button type="submit" class="btn btn-danger">Vender productos</button>
    </form>
@endif
</x-layaout>
