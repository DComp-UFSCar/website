<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <link rel="stylesheet" type="text/css" href="css/prerequisitos.css">
  <script type="text/javascript" src="js/d3.min.js"></script>
  <script type="text/javascript" src="js/prerequisitos.js"></script>
</head>
<body>
  <?php $menuSelected = 2; include "menu.php" ?>
  <div id="content">
    <header>Pré-requisitos</header>
    <div id="main-content">
      <section class="graph-section">
        <header>Selecione uma disciplina para ver seus pré-requisitos</header>
        <div class="graph"></div>
      </section>
    </div>
  </div>
</body>
</html>
