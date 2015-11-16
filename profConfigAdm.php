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
        <header>Painel administrativo dos professores</header>
        <ul>
          <a href="formProf.php"><li>Adicionar Professor</li></a>
          <a href="profConfig.php"><li>Editar Professor</li></a>
        </ul>
      </section>
    </div>
  </div>
</body>
</html>