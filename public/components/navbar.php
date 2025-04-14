<nav class="navbar navbar-expand-lg" style="background-color: #001f3f;">
  <div class="container-fluid">
    <a class="navbar-brand text-white">
      <img src="./../../public/img/logo.png" alt="Logo Cafeteria" style="height: 60px; width: auto;">
    </a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" id="idCerrarSesion">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
    $('#idCerrarSesion').on('click', function() {
      window.location.href = '/proyecto-ventas/index.php';
    });
</script>