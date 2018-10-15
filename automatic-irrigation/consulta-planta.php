<?php
  require_once 'consulta-planta-sql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
      <p>Total de plantas: <?php echo $total ?></p>
      <?php if ($total > 0): ?>  
      
      <table>
        <thead>
          <tr>
              <th>Nome</th>
              <th>Nome cientifico</th>
              <th>Umidade</th>
              <th>Temperatura</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td><?php echo $user['nome_planta'] ?></td>
            <td><?php echo $user['nome_cientifico'] ?></td>
            <td><?php echo $user['umidade'] ?></td>
            <td><?php echo $user['temperatura'] ?></td>
          </tr>
   
          <?php endwhile; ?>
        </tbody>
        <?php else: ?>
 
        <p>Nenhuma planta registrada</p>

        <?php endif; ?>
      </table>
