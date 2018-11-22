<?php
  include('include/header.php');
  include('include/nav.php');
?>
    <div class="container">
    <h1 class="center">Solicitar licença de software</h1>

    <div class="row">
    <div id='resposta'></div>
          <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person</i>
                <input name="nome_usuario" placeholder="ex: Delano de Souza Morais" id="nome_usuario" type="text"   class="validate">
              <label for="nome_usuario" class='black-text input-label'><b>Nome Completo</b></label>
            </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">email</i>
                  <input placeholder="ex: Wetter@company.com" name="email" id="email" type="text" class="validate">
                  <label for="email" class='black-text'><b>E-mail</b></label>
                </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_box</i>
              <input name="nome_login" placeholder="ex: Bombomzinho" id="nome_login" type="text" class="validate">
              <label for="nome_login" class='black-text'><b>Nome de Usuário</b></label>
            </div>
            <div class="row">
                <div class="input-field col s6">
                   <i class="material-icons prefix">lock</i>
                   <input name="senha"placeholder="***" id="senha" type="password" class="validate">
                  <label for="senha" class='black-text'><b>Senha de Usuário</b></label>
                </div>
              </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">home</i>
                    <input name="endereco"placeholder="ex: Rua Oswaldo Cruz, nº 10, centro, Caraguatatuba" id="endereco" type="text" class="validate">
                  <label for="endereco" class='black-text'><b>Endereço</b></label>
                </div>
          </div>
          <p><b>Ao Solicitar você condiz com os termos de uso oferecidos pela empresa </b></p>


            <button class="btn waves-effect waves-light right cadastro-usuario" >Solicitar
                <i class="material-icons right">check</i>
            </button>
  </div>
</div>


<?php
include('include/footer.php');
?>
