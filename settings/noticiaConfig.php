<!DOCTYPE html>
<html>
<head>
  <?php include "header.php"; ?>
  <link rel="stylesheet" type="text/css" href="../css/tabela.css">
</head>

<body>
  <?php 
  session_start();
  require("../db.php");

  $db = new Db();
  
  $noticias = $db->select("SELECT * FROM noticia");

  $menuSelected = 5; include "menu.php" ?>
  <div id="content">
    <header>Controle <?php include "login.php" ?> </header>
    <div id="main-content">
      <section>
        <header>Noticia</header>
        <table>
          <th>Titulo</th>
          <th>Ação</th>
          <?php foreach ($noticias as $value) { ?>
          <tr>
            <td><?= $value['titulo'] ?></td>
            <td><a href="editNot.php?id=<?= $value['id'] ?>">Editar</a> <a href="../new-dao/excluirNot.php?id=<?= $value['id'] ?>">Excluir</a></td>
          </tr>
          <?php } ?>
        </table>
        <a href="formNoticia.php">Adicionar Noticia</a>
      </section>
    </div>
  </div>
</body>
</html>