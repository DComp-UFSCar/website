<?php include "class/professors.php" ?>
<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php $menuSelected = 3; include "menu.php" ?>
  <div id="content">
    <header>Professores</header>
    <div id="main-content" class="professors-main">
      <?php foreach (Professors::getAll() as $professor) { ?>
        <a href="professor.php?id=<?= $professor['cod'] ?>" class="professor-link">
          <div class="professor">
            <div class="professor-img" style="background-image: url(fotos-professores/<?= $professor['foto'] ?>);"></div>
            <h2><?= $professor['nome'] ?></h2>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
</body>
</html>