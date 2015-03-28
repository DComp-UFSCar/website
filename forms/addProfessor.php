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
                <form id="formulario" class="formBloco" method="POST" action="../dao/addProf.php"  enctype="multipart/form-data">
                <span class="nameForm"><b>Adicionar novo Professor.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png">
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Nome :</span>
                    <input class="inputForm textoImput" id="nome" name="nome" type="text">
                </div> 
                 <div class="linhaForm">
                    <span class="labelFrom">Foto (3x4):</span>
                    <input class="inputForm textoImput" type="file" name="Arquivo" id="Arquivo">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Nome de usuário :</span>
                    <input class="inputForm textoImput" name="usuario" id="usuario" type="text">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Página pessoal :</span>
                    <input class="inputForm textoImput" name="pagPessoal" id="pagPessoal" type="text" placeholder="Não coloque 'http://''">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Área de atuação :</span>
                    <input class="inputForm textoImput" name="areaAtua" id="areaAtua" type="text">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Senha de acesso :</span>
                    <image id="verPass" class="imgImput" src="../images/olho.png">
                    <input class="inputForm" id="senha" name="senha" type="password">
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
            data: {menu: '3'}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../admin.php";
        }
    });
    });
    
    $('#verPass').click(function(){
        if($('#senha').prop('type') == 'text'){
            $('#senha').prop('type', 'password');
        }else{
            $('#senha').prop('type', 'text');
        }
    });

$("#formulario").validate({
		// Define as regras
		rules:{
			nome:{
				required: true, minlength: 6
			},
			usuario:{
				required: true, minlength: 4
			},
			pagPessoal:{
				required: true
			},
			areaAtua:{
				required: true
			},
			senha:{
				required: true, minlength: 4
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome:{
				required: "Digite o nome",
				minlength: "O nome deve conter, no mínimo, 6 caracteres"
			},
			usuario:{
				required: "Digite o usuário",
				minlength: "O usuário deve conter, no mínimo, 4 caracteres"
			},
			pagPessoal:{
				required: "Digite a Página pessoal"
			},
			areaAtua:{
				required: "Digite a Área de atuação"
			},
			senha:{
				required: "Digite a senha",
				minlength: "A senha deve conter, no mánimo, 4 caracteres"
			}
		}
	});

});
    
 
 
</script>