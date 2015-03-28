<?php
session_start();

 if((!isset($_SESSION['user'])) && (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('location:../index.php');
 }

 $logado = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>Home - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <header>
                <a href="index.php"><image id="logoImg" src="images/logo2.png"/></a>
        </header>
        <section id='corpo'>
            <article id='bloco'>
                <div style="width: 80%; margin: auto auto auto auto">
                     <p style="text-align: justify;"><span style="font-size: 20pt;color: red;"><strong>P&aacute;gina de Ajuda</strong></span></p>
                    <ul style="text-align: justify;">
                    <li><strong>P&aacute;ginas de disciplias</strong></li>
                    </ul>
                    <p style="text-align: justify;">Para criar p&aacute;ginas das disciplinas, voc&ecirc; pode digitar o texto como se estivesso no Word ou pedir a ajuda para alquem que tenha conhecimentos especificos em <em>html</em> e <em>css</em> para criar o c&oacute;digo da sua p&aacute;gina colar na op&ccedil;&atilde;o ( &lt; &gt; ) c&oacute;digo fonte.</p>
                <div>
            </article>
         <?php include 'templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
   $(document).ready(function(){
       
   });
</script>
