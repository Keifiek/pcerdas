<x-layaout>
    <h1>Listado de productos</h1>

    <a href="/producto">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->stock}}</td>
                <td><a href="{{ route('producto.edit', $producto) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('producto.destroy', $producto) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el producto">
    </form>
</x-layaout>