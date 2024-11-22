<x-layaout>
    <h1>Listado de clientes</h1>

    <a href="/cliente">Regresar al listado </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->password}}</td>
                <td><a href="{{ route('cliente.edit', $cliente) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el cliente">
    </form>
</x-layaout>