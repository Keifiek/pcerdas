<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Cliente</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa; /* Fondo claro */
      margin: 0;
      padding: 0;
    }
    .container-fluid {
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    .form-section {
      background-color: #ffffff;
      padding: 40px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }
    .image-section {
      background-size: cover;
      background-position: center;
      border-radius: 10px;
    }
    .form-title {
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-primary {
      width: 100%;
      margin-top: 20px;
    }
    .social-buttons .btn {
      width: 100%;
      margin-top: 10px;
    }
    .form-footer {
      font-size: 0.9rem;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row w-100">
      <!-- Sección del formulario -->
      <div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center">
        <div class="form-section">
          <h2 class="form-title">Crear Proveedor</h2>
          <p class="text-muted">Por favor completa la información para registrarse como proveedor.</p>
          <form action="{{ route('proveedor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" id="nombre" 
                     value="{{ isset($proveedor) ? $proveedor->nombre : old('nombre') }}" 
                     class="form-control">
            </div>
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" name="telefono" id="telefono" 
                     value="{{ isset($proveedor) ? $proveedor->telefono : old('telefono') }}" 
                     class="form-control @error('telefono') is-invalid @enderror">
              @error('telefono')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" name="direccion" id="direccion" 
                     value="{{ isset($proveedor) ? $proveedor->direccion : old('direccion') }}" 
                     class="form-control">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" name="password" id="password" 
                     value="{{ isset($proveedor) ? $proveedor->password : old('password') }}" 
                     class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
          <p class="form-footer text-muted">¿Ya tienes una cuenta? <a href="#">Iniciar sesión</a></p>
        </div>
      </div>
      <!-- Sección de la imagen -->
      <div class="col-lg-6 col-md-6 image-section" style="background-image: url('https://via.placeholder.com/800x600');">
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
