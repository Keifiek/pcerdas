<x-layaout>
@can ('viewAny', App\Models\Cliente::class)
    <h1>Fomulario de registro de clientes</h1>
    <a href="/cliente">Regresar al listado </a>
    @if (isset($cliente))

        <form action="{{route('cliente.update', $cliente) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{route('cliente.store') }}" method="POST">
    @endif
        @csrf
        <label>Nombre:<br><input type="text" name="nombre" value="{{ isset($cliente) ? $cliente->user->name : old('nombre') }}"></label><br>
        <label for="">Correo:<br><input id="email"type="email" name="email" value ="{{ isset($cliente) ? $cliente->user->email : old('email') }}" class="@error('email') is-invalid @enderror"></label><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="">Contraseña:<br><input type="password" name="password" value="{{ isset($cliente) ? $cliente->user->password : old('password') }}"></input></label><br>
        <input type="submit" value="Enviar">

    </form>
    @else
    <h2>No puedes acceder a esta seccion si no eres un administrador</h2>
    @endcan
</x-layaout>