<?php include "class/courses.php" ?>
<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
</head>
<body>
  <?php include "menu.php" ?>
  <div id="content">
    <header>Disciplinas</header>
    <div id="main-content">
      <?php foreach (Courses::getCoursesByPerfil() as $perfil=>$perfilData) { ?>
        <section>
          <header>Perfil <?= $perfil ?></header>
          <ul>
            <?php foreach ($perfilData as $course) { ?>
              <a href="disciplina.php?id=<?= $course['cod'] ?>"><li><?= $course['nome'] ?></li></a>
            <?php } ?>
          </ul>
        </section>
      <?php } ?>
      <section>
        <header>Optativas</header>
        <ul>
          <?php foreach (Courses::getOptinalCourses() as $course) { ?>
            <a href="disciplina.php?id=<?= $course['cod'] ?>"><li><?= $course['nome'] ?></li></a>
          <?php } ?>
        </ul>
      </section>
    </div>
  </div>
</body>
</html>
