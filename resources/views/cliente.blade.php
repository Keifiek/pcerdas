<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Fomulario de registro de clientes</h1>
    <form action="/guardar-clientes" method="POST">
        @csrf
        <label>Nombre:<br><input type="text" name="nombre" value="{{ old('nombre') }}"></label><br>
        <label for="">Correo:<br><input id="correo"type="email" name="correo" value ="{{ old ('correo')}}" class="@error('correo') is-invalid @enderror"></label><br>
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="">Contraseña:<br><input type="password" name="contraseña" value="{{ old('contraseña')}}"></input></label><br>
        <input type="submit" value="Enviar">

    </form>
</body>
</html>