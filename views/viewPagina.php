<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title><?php echo $_SESSION['pagina']['titulo']  ?> - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
         <header>
            <img id="menuBotao" src="../images/botMenu.png" onclick="mostraMenu();">
           
                <a href="../index.php"><image id="logoImg" src="../images/logo2.png"/></a>
                <a  href="../login.php"><image id='loginBotao' src="../images/adminBT.png"/></a>
        </header>
        <section id='corpo'>
            <ul id="menuBarra2" style="display:none;">
                <a href="projetoPedagogico.php"><li><image class='liimg' src="../images/pedag2.png"/> <span class="litxt">Projeto Pedagógico</span></li></a>
                <a href="atividadesDesenvolvidas.php"><li><image class='liimg' src="../images/edit2.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="paginasDisciplinas.php"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="professores.php"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
                <div id="pagina" class="linhaView1">
                    <?php echo $_SESSION['pagina']['pagina']  ?>
                </div>
                
            </article>
         <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
  function mostraMenu(){
       if( $('#menuBarra2').is(':visible') ) {
           $('#menuBarra2').slideUp();
       }else{
            $('#menuBarra2').slideDown();
       }
   };
   

$(document).ready(function(){


});
</script>
