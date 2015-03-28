<?php
session_start();
if(isset($_SESSION['user']) &&  isset($_SESSION['senha'])){
            if($_SESSION['geral'] == 1){
                header('location:admin.php');
            }else{
                header('location:profAdm.php');
            }
             //sucesso
        }else{
            unset ($_SESSION['user']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['prof']);
            unset ($_SESSION['geral']);
        }
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
                <div class="listaBloco">
                    <div id="voltar2" class="voltar">
                                 <image class="imgBtvolta" src="images/voltar.png"/>
                    </div>
                    <span class="labeBotPeqForm"><b>Voltar</b></span>
                </div>
                  <div class="formLogin">
                      <div id="topoForm">
                          <span class="labelBox"><b>ACESSO RESTRITO</b></span>
                          <image id="cadeado" src="images/cadeadoFX.png"/>
                      </div>  
                    <form method="POST" action="dao/login.php">
                        <div class="linhaFormLogin">
                            <label class="labelFromLogin">Usuário :</label>
                            <input class="inputForm login" type="text" name="user" id="user" >
                        </div>
                        <br>
                        <div class="linhaFormLogin">
                            <label class="labelFromLogin">Senha :</label>
                            <input id="senhaImput" class="inputForm login" type="password" name="senha" id="senha" >
                        </div>
                        <div class="linhaFormLogin">
                            <input id="btLogin" type="submit" value="ENTRAR">
                        </div>
                    </form>
                </div>   
            </article>
        <?php include 'templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
 $('#voltar2').click(function(){
      location.href="index.php";
}); 
   $(document).ready(function(){
       
   });
</script>
