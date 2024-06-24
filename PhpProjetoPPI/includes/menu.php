<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento Lewi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
  body {
    background-color: #DCDCDC; 
  }
</style>
  </head>
  <body>

      

    <nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
      <img src="../imagens/logo.png." width="2%" height="2%">
      <a class="navbar-brand" href="#"><b>GERENCIAMENTO LEWI</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><b>MENU</b></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gerenciar
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="../cliente/listar.php">Cliente(s)</a></li>
              <li><a class="dropdown-item" href="../logradouro/listar.php">Logradouro(s)</a></li>
             <li><a class="dropdown-item" href="../pedido/listar.php">Pedido(s)</a></li>
             <li><a class="dropdown-item" href="../cliente-logradouro/listar.php">Logradouro(s) de Cliente(s)</a></li>
             
            </ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="../cliente/formulario.php">Cliente</a></li>
              <li><a class="dropdown-item" href="../logradouro/formulario.php">Logradouro</a></li>
             <li><a class="dropdown-item" href="../pedido/formulario.php">Pedido</a></li>
             <li><a class="dropdown-item" href="../cliente-logradouro/formulario.php">Logradouro à Cliente</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<br><br><br><br>
      
     