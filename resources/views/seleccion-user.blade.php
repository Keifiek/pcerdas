<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seleccionar Usuario - PCerdas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #2c3e50; /* Fondo azul oscuro */
      color: white;
    }
    .selection-container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .selection-card {
      background-color: #34495e;
      border-radius: 10px;
      text-align: center;
      padding: 20px;
      margin: 15px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .selection-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
    }
    .selection-card img {
      max-width: 100%;
      height: 200px;
      border-radius: 5px;
    }
    .selection-card h3 {
      margin-top: 15px;
      font-size: 1.5rem;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>
  <!-- Navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">PCerdas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="/producto">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="mailto:ejemplo@dominio.com">Contacto</a>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Selección -->
  @if (Auth::user()->id == 1)
    <!-- Si el ID del usuario es 1, muestra las tres opciones: Clientes, Proveedores y Productos -->
    <section class="selection-container">
      <div class="container">
        <div class="row">
          <!-- Opción Listado de Clientes -->
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="selection-card">
              <img src="/material/img/cliente-icon.svg" alt="Listado Clientes">
              <h3>Listado Clientes</h3>
              <form action="{{ route('cliente.index') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Ver Listado</button>
              </form>
            </div>
          </div>

          <!-- Opción Listado de Proveedores -->
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="selection-card">
              <img src="/material/img/proveedorr-icon.svg" alt="Listado Proveedores">
              <h3>Listado Proveedores</h3>
              <form action="{{ route('proveedor.index') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Ver Listado</button>
              </form>
            </div>
          </div>

          <!-- Opción Listado de Productos -->
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="selection-card">
              <img src="/material/img/productos-icon.svg" alt="Listado Productos">
              <h3>Listado Productos</h3>
              <form action="{{ route('producto.index') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Ver Listado</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
    <!-- Si el ID del usuario no es 1, muestra las opciones Cliente y Proveedor -->
    <section class="selection-container">
      <div class="container">
        <div class="row">
          <!-- Opción Cliente -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="selection-card">
              <img src="/material/img/cliente-icon.svg" alt="Cliente">
              <h3>Cliente</h3>
              <form action="{{ route('cliente.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Seleccionar</button>
              </form>
            </div>
          </div>
          
          <!-- Opción Proveedor -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="selection-card">
              <img src="/material/img/proveedorr-icon.svg" alt="Proveedor">
              <h3>Proveedor</h3>
              <form action="{{ route('proveedor.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Seleccionar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
