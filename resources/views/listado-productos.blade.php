<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->categoria}}</td>
                <td>{{$producto->stock}}</td>
                <td><a href="{{ route('producto.show', $producto) }}">Mostrar detalles</a></td>
                <td><a href="{{ route('producto.edit', $producto) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>