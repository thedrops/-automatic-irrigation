<?php
  include('include/header.php');
  include('include/nav.php');

      require_once 'conexao.php';

      $PDO = db_connect();

      // pega o ID da URL
      $id = isset($_GET['id']) ? $_GET['id'] : null;

      //contar o total de plantas
      $sql_count = "SELECT COUNT(*) AS total FROM plantas ORDER BY nome_planta ASC";

      // SQL para selecionar os registros
      $sql = "SELECT * FROM plantas WHERE id_planta = '$id'";

      //contar o total de registros
      $stmt_count = $PDO->prepare($sql_count);
      $stmt_count->execute();
      $total = $stmt_count->fetchColumn();

      // seleciona os registros
      $stmt = $PDO->prepare($sql);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);


?>
    <div class="container">
    <h1 class="center">Alteração de planta</h1>

    <div class="row">
        <form class="col s12" method="POST" action="alterar-planta-sql.php?id=<?php echo $user['id_planta'] ?>">
          <div class="row">
            <div class="input-field col s6">
              <input name="nome_planta" value="<?php echo $user['nome_planta']?>" placeholder="Nome Popular" id="nome_planta" type="text" class="validate">
              <label for="nome_planta">Nome Popular</label>
            </div>


              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Nome Científico" value="<?php echo $user['nome_cientifico']?>" name="nome_cientifico" id="nome_cientifico" type="text" class="validate">
                  <label for="nome_cientifico">Nome Científico</label>
                </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input name="umidade" value="<?php echo $user['umidade']?>" placeholder="Umidade" id="umidade" type="text" class="validate">
              <label for="umidade">Umidade</label>
            </div>

              <div class="row">
                <div class="input-field col s6">
                  <input name="temperatura" value="<?php echo $user['temperatura']?>" placeholder="Temperatura" id="temperatura" type="text" class="validate">
                  <label for="temperatura">Temperatura</label>
                </div>
          </div>
          </div>

            <button class="btn waves-effect waves-light right" type="submit" name="action">Alterar
                <i class="material-icons right">send</i>
            </button>


        </form>
  </div>
</div>
<?php
  include('include/footer.php');
?>
