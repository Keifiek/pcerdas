<x-layaout>
    <h1>Fomulario de registro de clientes</h1>
    <a href="/cliente">Regresar al listado </a>
    @if (isset($cliente))

        <form action="{{route('cliente.update', $cliente) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{route('cliente.store') }}" method="POST">
    @endif
        @csrf
        <label>Nombre:<br><input type="text" name="nombre" value="{{ isset($cliente) ? $cliente->nombre : old('nombre') }}"></label><br>
        <label for="">Correo:<br><input id="email"type="email" name="email" value ="{{ isset($cliente) ? $cliente->email : old('email') }}" class="@error('email') is-invalid @enderror"></label><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="">Contraseña:<br><input type="password" name="password" value="{{ isset($cliente) ? $cliente->password : old('password') }}"></input></label><br>
        <input type="submit" value="Enviar">

    </form>
</x-layaout>