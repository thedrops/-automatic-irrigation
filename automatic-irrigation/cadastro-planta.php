<?php
  include('include/header.php');
  include('include/nav.php');
?>
    <div class="container">
    <h1 class="center">Cadastro de planta</h1>
    
    <div class="row">
        <form class="col s12" method="POST" action="cadastro-planta-sql.php">
          <div class="row">
            <div class="input-field col s6">
              <input name="nome_planta" placeholder="Nome Popular" id="nome_planta" type="text" class="validate">
              <label for="nome_planta">Nome Popular</label>
            </div>


              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Nome Científico" name="nome_cientifico" id="nome_cientifico" type="text" class="validate">
                  <label for="nome_cientifico">Nome Científico</label>
                </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input name="umidade" placeholder="Umidade" id="umidade" type="text" class="validate">
              <label for="umidade">Umidade</label>
            </div>

              <div class="row">
                <div class="input-field col s6">
                  <input name="temperatura"placeholder="Temperatura" id="temperatura" type="text" class="validate">
                  <label for="temperatura">Temperatura</label>
                </div>
          </div>
          </div>

            <button class="btn waves-effect waves-light right" type="submit" name="action">Cadastrar
                <i class="material-icons right">send</i>
            </button>


        </form>
  </div>
</div>

<?php
include('include/footer.php');
?>

