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
        <title>Home - Projeto Pedag�gico</title>
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
                <div class="listaBloco">
                    <div id="voltar2" class="voltar">
                        <a href="admin.php"><image class="imgBtvolta" src="images/voltar.png"/></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Voltar</b></span>
                </div>
                  <div class="formLogin">
                      <div id="topoForm">
                          <span class="labelBoxErro"><b>Erro!!</b></span>
                      </div>  
                          <image id="alertaIcone" src="images/alert.png"/>
                          <span id="mensagemErro"> <b>Vocé deve ter feito algo que não é permitido!</b></span>
                </div>   
            </article>
         <?php include 'templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
   $(document).ready(function(){
       
   });
</script>
