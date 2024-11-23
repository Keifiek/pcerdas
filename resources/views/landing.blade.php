<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - PCerdas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #2c3e50; /* Fondo azul oscuro */
      color: white;
    }
    .hero {
      padding: 100px 0;
    }
    .hero-title {
      font-size: 3rem;
      font-weight: bold;
    }
    .hero-subtitle {
      font-size: 1.25rem;
      margin-bottom: 20px;
    }
    .hero img {
      max-width: 100%;
    }
    .btn-primary {
      background-color: #3498db;
      border: none;
    }
    .btn-outline-light {
      border: 2px solid white;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>
    @if(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
  <!-- Navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">PCerdas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Servicios</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="hero-title">Mejores Soluciones Para Tu Negocio</h1>
          <p class="hero-subtitle">Somos un equipo dedicado a proveer tecnología y soporte personalizado para tus proyectos.</p>
          @guest 
          <div>
            <a href="/register" class="btn btn-primary btn-lg me-3">Comenzar</a>
            <a href="/login" class="btn btn-outline-light btn-lg">Iniciar Sesión</a>
          </div>
          @endguest 
          @auth
          <div class="d-flex align-items-center">
                <a href="g" class="btn btn-primary btn-lg me-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class=""></i>
                    <span>SALIR</span>
                </a>
                <form method="POST" action="{{route('logout')}}" id="logout-form">
                    @csrf
                </form> 

                <a href="/producto" class="btn btn-outline-light btn-lg ms-3">Ver productos</a>
            </div>

        @endauth
        </div>
        
        <div class="col-lg-6 text-center">
          <img src="https://via.placeholder.com/600x400" alt="Ilustración de tecnología" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
