</main>

<!-- Modal Structure -->
  <div id="modal1" class="modal" style="width:30%">
    <div class="modal-content">
      <h4 class='center'>Login</h4>

    <form class="col s12" action="verifica-login.php" method="post" >
      <div class="row center">
        <div class="input-field col s12">
          <input placeholder="Ex:teste@teste" name="login" id="login" type="text" class="validate">
          <label for="login">E-mail</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <input placeholder="Ex:123" name="senha" id="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
        </div>
        <button class="btn waves-effect waves-light" >Logar
                <i class="material-icons right">send</i>
        </button>
    </form>
  </div>
</div>
<?php
if(!$_SESSION){ ?>
 <footer class="page-footer teal ">
            <div class="row conta container">
              <div class="col l6 s12">
                <p class="grey-text text-lighten-4">Você pode conferir o nosso repositório.</p>
              </div>
              <div class="col l4 offset-l2 s12 container">
                  <a href="https://github.com/thedrops/-automatic-irrigation"><p class="grey-text text-lighten-4 ">GitHub</p></a>
              </div>
            </div>
        </footer>
<?php }else{ ?>
 <footer class="page-footer teal " style="margin-left:20%;">
            <div class="row conta container">
              <div class="col l6 s12">
                <p class="grey-text text-lighten-4">Você pode conferir o nosso repositório.</p>
              </div>
              <div class="col l4 offset-l2 s12 container">
                  <a href="https://github.com/thedrops/-automatic-irrigation"><p class="grey-text text-lighten-4 ">GitHub</p></a>
              </div>
            </div>
        </footer>
<?php }?>
</body>
</html>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
   // Or with jQuery
   $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });
   // Or with jQuery
   $(document).ready(function(){
    $('.modal').modal();
  });
</script>



