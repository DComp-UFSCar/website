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
            
            <form class="formBloco" id="formulario" method="POST" action="../dao/addMateria.php">
                <span class="nameForm"><b>Adicionar nova disciplina.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png">
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Código da Disciplina :</span>
                    <input class="inputForm" name="cod2" id="cod2" type="text">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Sigla da Disciplina :</span>
                    <input class="inputForm" name="codDiscplina" id="codDiscplina" type="text">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Disciplina Optativa ?</span>
                    <input class="inputForm " name="optativa" value="1" type="checkbox">
                </div>   
                <div class="linhaForm">
                    <span class="labelFrom">Nome :</span>
                    <input class="inputForm textoImput" name="nome" id="nome" type="text">
                </div>  
                <div class="linhaForm">
                    <span class="labelFrom">Perfil :</span>
                    <select id="perfil" class="inputForm" name="perfil" id="perfil">
                        <option value="">Selecione  </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        
                    </select>
                </div> 
                <div id="nucleos" class="linhaForm">
                </div>  
              
                
                <div id="prerequisitosForte" class="linhaForm">
                    <!--prerequisitos fortes-->
                </div> 
                
                <div id="prerequisitosFraco" class="linhaForm">
                    <!--prerequisitos Fracos-->
                </div> 
                
                <div class="linhaForm">
                    <span class="labelFrom">Objetivo :</span>
                    <textarea class="inputForm textoImput" id="objetivo" name="objetivo" placeholder="Digite aqui!" rows="5"></textarea>
                </div>  
                
                <div class="linhaForm">
                    <span class="labelFrom">Ementa :</span>
                    <textarea class="inputForm textoImput" name="ementa" id="ementa" placeholder="Digite aqui!" rows="5"></textarea>
                </div> 
               
                <div class="linhaForm">
                    <div class="meioForm">
                        <span class="labelFrom">Número de Créditos Práticos :</span>
                        <input value="0" class="inputForm numero" name="nCreditoPratico" type="number">
                    </div>
                    <div class="meioForm">
                        <span class="labelFrom">Número de Créditos Teóricos :</span>
                        <input value="0" class="inputForm numero" name="nCreditoTeorico" type="number">
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
$(document).ready(function() {
    
$.ajax({//  ajax para mostrar os nucleos diciplinares  
            type: "POST",
            url: "../dao/listaNucleo.php",
            dataType: "json",//tipo de retorno � um objeto json
            data: {}
        }).done(function(data){
            var html="";
            html+='<span class="labelFrom">Nucleo Diciplinar:</span>';
            html+='<select id="nucleoDisc" class="inputForm" name="nucleoDisc">';
              html+='<option value="">Selecione</option>';
              for($i=0; $i < data.length; $i++){
                html+='<option value="'+data[$i].cod+'">'+data[$i].nome+'</option>';
              }
           html+='</select>';
        $('#nucleos').html(html);
});    
$.ajax({//  ajax para mostrar as diciplinares de pre-requisitos
            type: "POST",
            url: "../dao/listaMateriaPorPeriodo.php",
            dataType: "json",//tipo de retorno � um objeto json
            data: {}
        }).done(function(data){
            
            var html="";
            html+='<div class="disciplinasDisp">';
            html+='<span id="prerequisitos" class="labelFrom">Pré-requisito forte:</span>';
            html+='<br>';
            var $cont = 0;
//             pre requisitos fortes  
           $.each(data, function(i, item) {
                if(i < 8){
                        html+='<div id="perfil_'+ i +'" class="perfil">';
                        html+='<span class="disci"><b>Perfil '+ i +'</b></span>';            
                    $.each(item, function(j, item2) {
                            html+='<span class="disci"><input class="cildren"  name="preRequisito['+$cont+']" value="'+item2.cod+'" type="checkbox">'+item2.codDisciplina+'</span>';
                            $cont++;
                    });
                    html+='</div>';
                }                        
           });
//             pre requisitos fracos
           var html2="";
           html2+='<div class="disciplinasDisp">';
                html2+='<span id="prerequisitos2" class="labelFrom">Pré-requisito fraco:</span>';
                html2+='<br>';
                $cont = 0;
           $.each(data, function(i, item) {
                if(i < 8){
                    html2+='<div id="perfil2_'+ i +'" class="perfil2">';
                    html2+='<span class="disci"><b>Perfil '+ i +'</b></span>';            
                    $.each(item, function(j, item2) {
                        html2+='<span class="disci"><input class="cildren"  name="preRequisitoF['+$cont+']" value="'+item2.cod+'" type="checkbox">'+item2.codDisciplina+'</span>';
                        $cont++;
                    });
                    html2+='</div>';
                }
           });
           html2+='</div>';
           $('#prerequisitosForte').html(html);
           $('#prerequisitosFraco').html(html2);
           $("#prerequisitosForte").hide();
           $("#prerequisitosFraco").hide();
});    
    
    
  $("#formulario").validate({
		// Define as regras
		rules:{
			cod2:{
				required: true, minlength: 4, maxlength: 8
			},
			codDiscplina:{
				required: true, minlength: 4, maxlength: 8
			},
			nome:{
				required: true, minlength: 2
			},
			perfil:{
				required: true
			},
			objetivo:{
				required: true, minlength: 2
			},
			nucleoDisc:{
				required: true
			},
			ementa:{
				required: true, minlength: 2
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			cod2:{
				required: "Digite o código da Disciplina",
                                minlength: "O código deve conter, no mánimo, 4 caracteres",
                                maxlength: "O código deve conter, no máximo, 8 caracteres"
			},
			codDiscplina:{
				required: "Digite a sigla da Disciplina",
                                minlength: "A sigla deve conter, no mánimo, 4 caracteres",
                                maxlength: "A sigla deve conter, no máximo, 8 caracteres"
			},
			nome:{
				required: "Digite um  nome",
                                minlength: "O nome deve conter, no mínimo, 2 caracteres"
			},
			perfil:{
				required: "Escolha o perfil da Disciplina"
			},
			objetivo:{
				required: "Digite o Objetivo da Disciplina",
                                minlength: "O objetivo deve conter, no mánimo, 2 caracteres"
			},
			nucleoDisc:{
				required: "Escolha um núcleo"
			},
			ementa:{
				required: "Digite a ementa da Disciplina",
                                minlength: "A ementa deve conter, no mánimo, 2 caracteres"
			}
		}
});  
    
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
       
$( "#perfil" ).change(function() {
//    fun��o para remover todos os checks
    $('.cildren').each(function() {
            $(this).attr('checked', false);
    });
    // la�o para esconder todos os perfis maiores que o da materia selecionado
    if($( "#perfil" ).val() < 2){
        $("#prerequisitosForte").hide();
        $("#prerequisitosFraco").hide();
    }else{
         $("#prerequisitosForte").show();
         $("#prerequisitosFraco").show();
    }
//    move os quadrinhos de pre-requisitos a medida que se remove ou adiciona mais
            var novaPosi;
            novaPosi = -83+(55*-( $( "#perfil" ).val()-8));
            $(".perfil").css({left : novaPosi+'px'});
            $(".perfil2").css({left : novaPosi+'px'});
    
    for ( var i = 1; i < 8; i++ ){
                if ($( "#perfil" ).val() <= i){
                    $( "#perfil_"+i).hide();
                    $( "#perfil2_"+i).hide();
                }else{
                    $( "#perfil_"+i).show();
                    $( "#perfil2_"+i).show();
                }
            }
    });
});
    

 
</script>