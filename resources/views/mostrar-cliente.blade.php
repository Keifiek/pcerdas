<x-layaout>
@can ('viewAny', App\Models\Cliente::class)
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
                <td>{{$cliente->user->name}}</td>
                <td>{{$cliente->user->email}}</td>
                <td>{{$cliente->user->password}}</td>
                <td><a href="{{ route('cliente.edit', $cliente) }}">Editar</a></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar el cliente">
    </form>
    @else
    <h2>No puedes acceder a esta seccion si no eres un administrador</h2>
    @endcan
</x-layaout>