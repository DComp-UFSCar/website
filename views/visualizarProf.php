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
                                 <image class="imgBtvolta" src="../images/voltar.png">
                    </div>
                    <span class="labeBotPeqForm"><b>Voltar</b></span>
                    <div class="botaoPequenoFrom">
                        <a href="../forms/addProfessor.php"><image class="imgBtvolta" src="../images/add.png"></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Adicionar Professor</b></span>
                    <div id="listaNuc" class="linhaForm">
                    </div> 
            </div>
            <?php
            echo $_SESSION['tabelaListagem'];
            ?>
        <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
var geral = <?php echo $_SESSION['geral'] ?>;


    function editProf(idProf){
     $.ajax({
            type: "POST",
            url: "../dao/editarProf.php",
            dataType: "html",
            data: {cod: idProf}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../forms/editarProfessor.php";
            }
    });
}
    function removProf(idProf){
     $.ajax({
            type: "POST",
            url: "../dao/remvProf.php",
            dataType: "html",
            data: {cod: idProf}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../dao/preListaProf.php";
            }
    });
}
    
    
$(document).ready(function() {
    
    $('#voltar2').click(function(){
          $.ajax({
            type: "POST",
            url: "../dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '3'}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../admin.php";
        }
    });
});
    

    
     
  });
 
</script>
