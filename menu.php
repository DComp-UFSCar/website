<?php
  $menuHome = "";
  $menuDisciplinas = "";
  $menuRequisitos  = "";
  $menuProfessores = "";
  $menuMapa = "";

  if (isset($menuSelected)) {
    switch ($menuSelected) {
      case 1:
        $menuDisciplinas = "selected";
        break;
      case 2:
        $menuRequisitos = "selected";
        break;
      case 3:
        $menuProfessores = "selected";
        break;
      case 4:
        $menuMapa = "selected";
        break;
    }
  } else {
    $menuHome = "selected";
  }
?>
<div id="menu">
  <h1>BCCS</h1>
  <ul class="main-menu">
    <a href="index.php">
      <li class="<?= $menuHome ?>">Sobre</li>
    </a>
    <a href="disciplinas.php">
      <li class="<?= $menuDisciplinas ?>">Disciplinas</li>
    </a>
    <a href="prerequisitos.php">
      <li class="<?= $menuRequisitos ?>">Pré-requisitos</li>
    </a>
    <a href="professores.php" >
      <li class="<?= $menuProfessores ?>">Professores</li>
    </a>
    <a href="mapa.php">
      <li class="<?= $menuMapa ?>">Mapa</li>
    </a>
    <a href="http://dcomp.sorocaba.ufscar.br/wp-content/docs/projetoPedagogicoBCCS-2010.pdf" target="_blank">
      <li>Projeto Pedagógico (PDF)</li>
    </a>
  </ul>
  <ul class="sub-menu">
    <a href="api.php">
      <li>API</li>
    </a>
    <a href="http://github.com/UFSCar/website">
      <li>GitHub</li>
    </a>
    <a href="admin/">
      <li>Admin</li>
    </a>
  </ul>
</div>
<i class="toggleMenu fa fa-bars"></i>
<div class="backdrop"></div>
