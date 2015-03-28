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
             <div class="botoesMenuView">
                    <div id="voltar2" class="voltar">
                                 <image class="imgBtvolta" src="../images/voltar.png"/>
                    </div>
                    <span class="labeBotPeqForm"><b>Voltar</b></span>
                    <div class="botaoPequenoFrom">
                        <a href="../forms/addPagina.php"><image class="imgBtvolta" src="../images/add.png"/></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Adicionar Página</b></span>
                    <div class="botaoPequenoFrom">
                        <a  onclick="editPag('<?php echo $_SESSION['pagina']['cod']; ?>')" href="#"><image class="imgBtvolta" src="../images/edit.png"/></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Editar esta Página</b></span>
                    <div  class="linhaForm">
                    </div> 
            </div>
            <div class="linhaForm">
                <span><b>Título Página : </b><?php echo $_SESSION['pagina']['titulo']; ?></span>
            </div> 
            <div class="bordaPag">
                <?php
                echo $_SESSION['pagina']['pagina'];
                ?>
            </div>    
        <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
function editPag(idpag){
     $.ajax({
            type: "POST",
            url: "../dao/editarPagina.php",
            dataType: "html",
            data: {cod: idpag}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../forms/editarPagina.php";
            }
    });
}
function verPag(idPag){
    $.ajax({
            type: "POST",
            url: "../dao/preVerPag.php",
            dataType: "html",
            data: {cod: idPag}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../views/verPagina.php";
            }
    });
}

    
   
$(document).ready(function() {
    
    $('#voltar2').click(function(){
      location.href="../dao/preListaPagina.php";
    });
    

    
     
  });
 
</script>
