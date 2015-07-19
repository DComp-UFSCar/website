<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php $menuSelected = 4; include "menu.php" ?>
  <div id="content">
    <header>Mapa UFSCar - Campus Sorocaba</header>
    <div id="main-content">
      <script type="text/javascript" src = "tooltip.js"></script>

      <map name ="mapa">
        <area shape = "poly" coords = "575,345,609,314,639,346,607,376" onMouseOver = "toolTip('Area de Vivencia', 120, 100)" onMouseOut = "toolTip()">
        <area shape = "poly" coords = "556,293,595,292,594,322,554,322" onMouseOver = "toolTip('Restaurante Universitario', 180, 100)" onMouseOut = "toolTip()">
        <area shape = "poly" coords = "505,288,524,303,525,326,505,325,493,299" onMouseOver = "toolTip('Biblioteca', 80, 100)" onMouseOut = "toolTip()">
        <area shape = "poly" coords = "589,234,629,234,630,257,591,257" onMouseOver = "toolTip('Quadra de Esportes', 120, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "620,165,660,185" onMouseOver = "toolTip('Oficina de ensino', 120, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "574,173,602,199" onMouseOver = "toolTip('Predio de Gestao Administrativa', 200, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "509,211,524,256" onMouseOver = "toolTip('Predio de Gestao Academica', 180, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "478,215,508,232" onMouseOver = "toolTip('Predio dos Laboratorios didaticos', 200, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "444,216,477,232" onMouseOver = "toolTip('Predio dos Laboratorios de Pesquisa', 210, 100)" onMouseOut = "toolTip()">
        <area shape = "rect" coords = "449,254,498,268" onMouseOver = "toolTip('Predio de Aulas Teoricas', 180, 100)" onMouseOut = "toolTip()">
        <area shape = "poly" coords = "352,248,422,233,429,266,360,282" onMouseOver = "toolTip('Edificio Aulas Teoricas e Laboratorios (ATLab)', 210, 100)" onMouseOut = "toolTip()">
      </map>

      <img src="mapaUfscar.jpg" usemap = "#mapa">
    </div>
  </div>
</body>
</html>