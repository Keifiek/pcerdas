<x-layaout>
    <h1>Detalles del producto</h1>

    <a href="/producto">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                @auth
                    @if (Auth::user()->id == 1)
                    <th>Acciones</th>
                    @endif
                @endauth
                
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->stock}}</td>
                @auth
                    @if (Auth::user()->id == 1)
                    <td><a href="{{ route('producto.edit', $producto) }}">Editar</a></td>
                    @endif
                @endauth
            </tr>
        </tbody>
    </table>
    @auth
        @if (Auth::user()->id == 1)
        <form action="{{ route('producto.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar el producto">
        </form>
        @endif
    @endauth
</x-layaout>