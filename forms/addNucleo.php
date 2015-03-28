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
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body>
         <?php include '../templates/headerAdm.php' ?>
         <section id='corpo'>
            <div id='blocoFrom'>
            <form id="formulario" class="formBloco" method="POST" action="../dao/addNucleo.php">
                <span class="nameForm"><b>Adicionar novo Núcleo.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png">
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Nome do Núcleo :</span>
                    <input class="inputForm textoImput" name="nomeNucleo" id="nomeNucleo" type="text">
                </div> 
                <div class="linhaBtForm">
                        <input class="btForm submit" type="submit" value="Enviar">
                        <input class="btForm" type="reset" value="Limpar">
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
      $.ajax({
            type: "POST",
            url: "../dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '1'}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../admin.php";
        }
    });
});

$("#formulario").validate({
		// Define as regras
		rules:{
			nomeNucleo:{
				required: true, minlength: 2
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nomeNucleo:{
				required: "Digite o nome para o Núcleo",
				minlength: "O nome deve conter, no mínimo, 2 caracteres"
			}
		}
	});


});
    
 
</script>
