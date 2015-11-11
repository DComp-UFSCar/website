<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <link rel="stylesheet" type="text/css" href="css/prerequisitos.css">
  <script type="text/javascript" src="js/d3.min.js"></script>
  <script type="text/javascript" src="js/prerequisitos.js"></script>
</head>
<body>
  <?php session_start(); $menuSelected = 2; include "menu.php" ?>
  <div id="content">
    <header>Pré-requisitos <?php include "login.php" ?></header>
    <div id="main-content">
      <p class="help-text">Selecione uma disciplina para ver seus pré-requisitos</p>
      <div class="graph"></div>
    </div>
  </div>
</body>
</html>