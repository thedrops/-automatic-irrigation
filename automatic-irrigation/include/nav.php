<?php
if(!$_SESSION){ ?>

<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo"><img src='images/WETTER.png'/></a>
      <ul class="right hide-on-med-and-down">
        <li><a class=" modal-trigger" href="#modal1">Login</a>
      </ul>
       <ul id="nav-mobile" class="sidenav">
        <li><a class=" modal-trigger" href="#modal1">Login</a>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<main>

<?php }else{ ?>
<div class="container sidenav-fixed">
    <ul class="sidenav sidenav-fixed" style="transform: translateX(0%);">
        <li  style="margin-top:10%;margin-left:25%;" href="painel.php" class="brand-logo"><img src='images/WETTER.png'/></li>
        <li class="bold"><a href="cadastro-planta.php" class="waves-effect waves-teal">Cadastro de Plantas</a></li>
        <li class="bold"><a href="consulta-planta.php" class="waves-effect waves-teal">Consulta de Plantas</a></li>
        <li class="bold"><a href="grafico.php" class="waves-effect waves-teal">Grafico de Regas</a></li>
        <li class="bold"><a href="logout.php" class="waves-effect waves-teal">Logout</a></li>
    </ul>
    <ul id="nav-mobile" class="sidenav">
        <li><a href="cadastro-planta.php">Cadastro</a></li>
        <li><a href="consulta-planta.php">Consulta</a></li>
        <li><a href="grafico.php">Gráfico</a></li>
        <li><a href="logout.php">Logout</a>
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <main style="margin-left:20%;" >


    <?php } ?>
