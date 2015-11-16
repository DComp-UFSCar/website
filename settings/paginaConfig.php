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
        <header>Paginas</header>
        <ul>
          <a href="noticiaConfig.php"><li>Configurações de Noticias</li></a>
          <a href="pagMatConfig.php"><li>Configurações das Paginas das Diciplinas</li></a>
        </ul>
      </section>
    </div>
  </div>
</body>
</html>