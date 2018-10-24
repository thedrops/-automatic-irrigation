<?php
  include('include/header.php');
  include('include/nav.php');
?>
    <div class="container">
    <h1 class="center">Solicitar Licença de Software</h1>

    <div class="row">
        <form class="col s12" method="POST" action="">
          <div class="row">
            <div class="input-field col s6">
              <input name="nome_usuario" placeholder="ex: Delano de Souza Morais" id="nome_usuario" type="text" class="validate">
              <label for="nome_usuario">Nome Completo</label>
            </div>


              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="ex: Wetter@company.com" name="email" id="email" type="text" class="validate">
                  <label for="email">E-mail</label>
                </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input name="nome_login" placeholder="ex: Bombomzinho" id="nome_login" type="text" class="validate">
              <label for="nome_login">Nome de Usuário</label>
            </div>

              <div class="row">
                <div class="input-field col s6">
                  <input name="endereco"placeholder="ex: Rua Oswaldo Cruz, nº 10, centro, Caraguatatuba" id="endereco" type="text" class="validate">
                  <label for="endereco">Endereço</label>
                </div>
          </div>
          </div>

            <button class="btn waves-effect waves-light right" type="submit" name="action">Solicitar
                <i class="material-icons right">add_shopping_cart</i>
            </button>


        </form>
  </div>
</div>

<?php
include('include/footer.php');
?>

