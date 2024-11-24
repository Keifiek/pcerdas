<x-layaout>
    @can ('viewAny', App\Models\Cliente::class)
    
    <h1>Listado de clientes</h1>

    <a href="/cliente/create">Ingresar un nuevo cliente </a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->user->name}}</td>
                <td>{{$cliente->user->email}}</td>
                <td>{{$cliente->user->password}}</td>
                <td><a href="{{ route('cliente.show', $cliente) }}">Mostrar detalles</a></td>
                <td><a href="{{ route('cliente.edit', $cliente) }}">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>No puedes acceder a la lista de clientes si no eres un administrador</h2>
    @endcan
</x-layaout>