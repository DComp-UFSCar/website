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
        <link rel="stylesheet" type="text/css" href="../css/chosen.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/chosen.js"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include '../templates/headerAdm.php' ?>
        <section id='corpo'>
            <div id='blocoFrom'>
            
            <form id="formulario" class="formBloco" method="POST" action="../dao/addOferta.php">
                <span class="nameForm"><b>Adicionar nova oferta de disciplina.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png"/>
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Disciplina :</span>
                    <select id="disciplinaDb" class="inputForm select" name="codMat">
                        <option value="">Selecione</option>
                        <?php 
                            foreach ($_SESSION['listaDeMaterias'] as $prefil => $materia) {
                                echo '<optgroup label="Perfil '.$prefil.'">';
                                    foreach($materia as $linha){
                                        echo '<option value="'.$linha['cod'].'">'.$linha['cod2'].' - '.$linha['nome'].'</option>';
                                    }
                                    echo '</optgroup>';
                            }
                        ?>
                    </select>
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Professor :</span>
                    <input class="inputForm textoImput" type="text" value="<?php echo  $_SESSION['user'] ?>" disabled="disabeld">
                    <input class="inputForm textoImput" name="codProf" type="text" value="<?php echo  $_SESSION['cod'] ?>" style="display: none">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Turma :</span>
                    <input class="inputForm" name="turma" id="turma" type="text">
                </div>  
                <div class="linhaForm">
                        <span class="labelFrom">Ano :</span>
                        <input style="width: 60px;" value="" class="inputForm" id="ano" name="ano" type="number">
                </div>
                <div class="linhaForm">
                    <span class="labelFrom">Semestre :</span>
                    <input class="inputForm" type="radio" name="semestre" id="semestre" value="1" checked="checked"> 1º
                    <input class="inputForm" type="radio" name="semestre" id="semestre" value="2"> 2º 
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Mais horários :</span>
                    <image class="imgBtminiAdd" src="../images/add.png" onclick="addHorario()"/>
                </div>
                <div id="horarios">
                        <div class="linhaForm">
                            <span class="labelFrom">Dia :</span>
                            <select class="inputForm" name="dia[0]">
                                <option value="Segunda-feira">Segunda-feira</option>
                                <option value="Terça-feira">Terça-feira</option>
                                <option value="Quarta-feira">Quarta-feira</option>
                                <option value="Quinta-feira">Quinta-feira</option>
                                <option value="Sexta-feira">Sexta-feira</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                        </div>
                        <div class="linhaForm">
                            <div class="meioForm">
                                <span class="labelFrom">Horário início :</span>
                                <input class="inputForm" name="horarioIni[0]"  type="time">
                            </div>  
                            <div class="meioForm">
                                <span class="labelFrom">Horário fim :</span>
                                <input class="inputForm horario" name="horarioFim[0]"  type="time">
                            </div>  
                        </div> 
                        <div class="linhaForm">
                            <span class="labelFrom">Local :</span>
                            <input class="inputForm textoImput local" name="local[0]" type="text">
                        </div>
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
var nHorarios = 1;   
function RemHorario(id){
     $('#linha'+id).html('');
}
function addHorario(){
        var html = '<div id="linha'+nHorarios+'">'+
                    '<image class="imgBtminiRem" src="../images/lixeiraIco.png" onclick="RemHorario('+nHorarios+')"/>'+
                    '<hr style="width: 50%;float:left;"><div class="linhaForm">'+
                        '<span class="labelFrom">Dia :</span>'+
                        '<select class="inputForm" name="dia['+nHorarios+']" id="dia['+nHorarios+']">'+
                                '<option value="Segunda-feira">Segunda-feira</option>'+
                                '<option value="Terça-feira">Terça-feira</option>'+
                                '<option value="Quarta-feira">Quarta-feira</option>'+
                                '<option value="Quinta-feira">Quinta-feira</option>'+
                                '<option value="Sexta-feira">Sexta-feira</option>'+
                                '<option value="Sábado">Sábado</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="linhaForm">'+
                        '<div class="meioForm">'+
                            '<span class="labelFrom">Horário início :</span>'+
                            '<input class="inputForm" name="horarioIni['+nHorarios+']"  type="time">'+
                        '</div>'+
                        '<div class="meioForm">'+
                            '<span class="labelFrom">Horário fim :</span>'+
                            '<input class="inputForm horario" name="horarioFim['+nHorarios+']"  type="time">'+
                        '</div>'+  
                    '</div>'+
                    '<div class="linhaForm">'+
                        '<span class="labelFrom">Local :</span>'+
                        '<input class="inputForm textoImput local" name="local['+nHorarios+']" id="local" type="text">'+
                    '</div></div>';
        $('#horarios').append(html);
        $("#dia["+nHorarios+"]").chosen();
        nHorarios++;
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
              location.href="../profAdm.php";
        }
    });
});
    
  $(".select").chosen();
  var now = new Date(); /*pega data do sitema... */
  $("#ano").val(now.getUTCFullYear());
  
  $("#formulario").validate({
		// Define as regras
		rules:{
			disciplinaDb:{
				required: true
			},
			profBd:{
				required: true
			},
			local:{
				required: true, minlength: 2
			},
			horario:{
				required: true
			},
			turma:{
				required: true, minlength: 1
			},
			ano:{
				required: true, minlength: 4
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			disciplinaDb:{
				required: "Escolha uma Disciplina"
			},
			profBd:{
				required: "Escolha um Professor"
			},
			local:{
				required: "Digite um Local"
			},
			horario:{
				required: "Digite o horário"
			},
			turma:{
				required: "Digite a Turma",
                                minlength: "A Turma deve conter, no mínimo, 1 caracter"
			},
			ano:{
				required: "Digite o Ano",
                                minlength: "O ano deve conter, no mínimo, 4 algarismos"
			}
		}
});
  
});

    

 
</script>
