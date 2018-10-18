<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Wetter</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="planta-form.php">Cadastro</a></li>
        <li><a href="consulta-planta.php">Consulta</a></li>
        <li><a class=" modal-trigger" href="#modal1">Login</a>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="planta-form.php">Cadastro</a></li>
        <li><a href="consulta-planta.php">Consulta</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


 <!-- Modal Structure -->
  <div id="modal1" class="modal " style="max-width:30%;">
    <div class="modal-content  ">
    <form class=" container" method="POST" action="verifica-login.php">
      <div class="row">
        <div class="input-field  col s12">
          <input placeholder="Login" name="login" id="login" type="text" class="validate">
          <label for="login">Login</label>
        </div>
        </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="senha" name="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>
        <button class="btn" type="submit" name="action">Login
            <i class="material-icons right">send</i>
        </button>
    </form>
    </div>

  </div>
