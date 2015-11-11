<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php 
  session_start();

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Projeto Pedagogico</header>
        <ul>
          <a href="ofertaConfig.php"><li>Configurações de Ofertas</li></a>
          <a href="matConfig.php"><li>Configurações de Materias</li></a>
          <a href="nucleoConfig.php"><li>Configurações de Nucleos</li></a>
        </ul>
      </section>
    </div>
  </div>
</body>
</html>