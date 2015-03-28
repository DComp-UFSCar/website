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
                        <a href="../forms/addPagina.php"><image class="imgBtvolta" src="../images/add.png"></a>
                    </div>
                    <span class="labeBotPeqForm"><b>Adicionar Página</b></span>
                    <div id="listaNuc" class="linhaForm">
                    </div> 
            </div>
            <div class="OBsTabela">
                <span ><b>OBS :</b> A primeira página de cada disciplina é a página oficial, sempre que for adicionada uma nova página para uma disciplina, ela se tornará a oficial.</span>
            </div> 
            <?php
            echo $_SESSION['tabelaListagem'];
            ?>
        <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
var geral = <?php echo $_SESSION['geral'];?>;
function editPag(idpag){
    if(geral == 1){
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
    }else{
        $.ajax({
            type: "POST",
            url: "../dao/editarPaginaProf.php",
            dataType: "html",
            data: {cod: idpag}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../forms/editarPagina.php";
            }
        });
    }
     
}
function verPag(idPag){
    $.ajax({
            type: "POST",
            url: "../dao/preVerPagina.php",
            dataType: "html",
            data: {cod: idPag}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../views/verPagina.php";
            }
    });
}
function removPag(idPag){
    $.ajax({
            type: "POST",
            url: "../dao/remvPagina.php",
            dataType: "html",
            data: {cod: idPag}
        }).done(function(data){
            if(data['1'] ==  '1'){
                if(geral == 1){
                  location.href="../dao/preListaPagina.php";
                }else{
                  location.href="../dao/preListaPaginaProf.php";
                }
            }
    });
}

    
   
$(document).ready(function() {
    
    $('#voltar2').click(function(){
          $.ajax({
            type: "POST",
            url: "../dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '2'}
        }).done(function(data){
           if(data['1'] ==  '1'){
                if(geral == 1){
                  location.href="../admin.php";
                }else{
                  location.href="../ProfAdm.php";
                }
            }
    });
});
    

    
     
  });
 
</script>
