<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="index.php?pg=Home">Livraria iCode</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pg=Home">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=Livros">Livros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=Contato">Contato</a>
          </li>
        </ul>
      </div>
       <button style="color: black;margin: 10px;right: 0px;" class="badge badge-light" data-bs-toggle="modal" data-bs-target="#myModal">Entrar</button>
    </div>
  </nav>
</header>
<main>
  <div class="container-fluid">
    <?php include_once ('viewControlador.php'); ?>
  </div>
</main>