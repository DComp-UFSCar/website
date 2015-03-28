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
            <?php
             if($_SESSION['elemtentoEncontrado'] == 1){
            ?>
                <div  class="linhaForm" style="background-color: rgba(255, 0, 0, 0.67);position: relative;left: -40px;top: -10px;width: 100%;height: 25px;padding-top: 4px;color: white;">
                    <span style="margin-left: 40px;"><b>Já existe uma oferta dessa Disciplina para esse Professor!</b></span>
                </div> 
            <?php
             }$_SESSION['elemtentoEncontrado'] = 0;
            ?>
             <div class="botoesMenuView">
                    <div id="voltar2" class="voltar">
                                 <image class="imgBtvolta" src="../images/voltar.png">
                    </div>
                    <span class="labeBotPeqForm"><b>Voltar</b></span>
                    <div class="botaoPequenoFrom">
                        <a href="../forms/addOfertaProf.php"><image class="imgBtvolta" src="../images/add.png"></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Adicionar Oferta</b></span>
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
    function editOferta(idMat,idProf){
     $.ajax({
            type: "POST",
            url: "../dao/editarOferta.php",
            dataType: "html",
            data: {codProf: idProf, codMat: idMat}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../forms/editarOfertaProf.php";
            }
    });
}
    function removOferta(id){
     $.ajax({
            type: "POST",
            url: "../dao/remvOferta.php",
            dataType: "html",
            data: {cod: id}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../dao/preListaOfertaProf.php";
            }
    });
}
    
  
$(document).ready(function() {
    
    $('#voltar2').click(function(){
          $.ajax({
            type: "POST",
            url: "../dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '1'}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../ProfAdm.php";
        }
    });
    });
    

    
     
  });
 
</script>
