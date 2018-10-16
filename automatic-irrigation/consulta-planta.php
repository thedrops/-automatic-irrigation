<?php
  include('include/header.php');
  include('include/nav.php');
  require_once 'consulta-planta-sql.php';

?>
    <!-- <p>Total de plantas: <?php echo $total ?></p>!-->
      <?php if($total > 0): ?>
      <div class="container">
      <table class="center-align">
        <thead>
          <tr>
              <th class="center-align" >Nome</th>
              <th class="center-align" >Nome cientifico</th>
              <th class="center-align" >Umidade</th>
              <th class="center-align" >Temperatura</th>
              <th class="center-align" >Alterar</th>
              <th class="center-align" >Deletar</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td class="center-align"><?php echo $user['nome_planta'] ?></td>
            <td class="center-align"><?php echo $user['nome_cientifico'] ?></td>
            <td class="center-align"><?php echo $user['umidade'] ?></td>
            <td class="center-align"><?php echo $user['temperatura'] ?></td>
            <td class="center-align"><a href="alterar-planta.php?id=<?php echo $user['id_planta'] ?>"><i class="material-icons black-text" >edit</i></a></td>
            <td class="center-align"><a href="excluir.php?id=<?php echo $user['id_planta'] ?>"><i class="material-icons black-text" >delete</i></a></td>
          </tr>

          <?php endwhile; ?>
        </tbody>
        <?php else:?>
        <h3 class="center-align">Nenhuma planta registrada</h3>

        <?php endif; ?>
      </table>
</div>
<?php
include('include/footer.php');?>
