<footer class="page-footer teal">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contatos</h5>
                <p class="grey-text text-lighten-4">Você pode conferir o nosso repositório.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3 " href="https://github.com/thedrops/-automatic-irrigation">GitHub</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
                <h6>Obrigado por nos visitar</h6>
                <h6 class="red-text " >♥</h6>
            </div>
          </div>
        </footer>
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

<style>
body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
</style>