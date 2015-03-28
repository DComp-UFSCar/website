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
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title>Painel Administrativo - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../templates/headerAdm.php' ?>
         <section id='corpo'>
            <div id='blocoFrom'>
            <form class="formBloco" method="POST" action="../dao/SeditarNucleo.php">
                <span class="nameForm"><b>Editar Núcleo.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png"/>
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Nome do Núcleo :</span>
                        <input class="inputForm textoImput" name="nomeNucleo" type="text" value="<?php echo $_SESSION['nucleo']['nome'] ;?>">
                </div> 
                <div class="linhaBtForm">
                        <input class="btForm" type="submit" value="Enviar">
                </div>
            </form>
            </div>
        <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
$(document).ready(function() {
    
$('#voltar2').click(function(){
      location.href="../forms/remvNucleo.php";
});

});
    

</script>
