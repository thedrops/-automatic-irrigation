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
