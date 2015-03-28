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
            
            <form class="formBloco" method="POST" action="../dao/SeditarMateria.php">
                <span class="nameForm"><b>Editar disciplina.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png"/>
                </div>
                <br>
                <input name="cod" type="text" value="<?php echo $_SESSION['resultadoBd']['cod'] ?>" hidden="hidden">
                <div class="linhaForm">
                    <span class="labelFrom">Código da Disciplina :</span>
                    <input class="inputForm" name="cod2" type="text" value="<?php echo $_SESSION['resultadoBd']['cod2']  ?>">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Sigla da Disciplina :</span>
                    <input class="inputForm" name="codDiscplina" type="text" value="<?php echo $_SESSION['resultadoBd']['codDisciplina']  ?>">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Disciplina Optativa ?</span>
                    <input class="inputForm " name="optativa" value="1" type="checkbox"<?php if( $_SESSION['resultadoBd']['optativa'] == 1 ) { echo'checked="checked"' ;} ?>>
                </div>   
                <div class="linhaForm">
                    <span class="labelFrom">Nome :</span>
                    <input class="inputForm textoImput" name="nome" type="text" value="<?php echo $_SESSION['resultadoBd']['nome']  ?>">
                </div>  
                <div class="linhaForm">
                    <span class="labelFrom">Perfil :</span>
                    <select id="perfil" class="inputForm" name="perfil">
                        <option value="1" <?php if($_SESSION['resultadoBd']['perfil'] == 1){ echo'selected';} ?> >1</option>
                        <option value="2" <?php if($_SESSION['resultadoBd']['perfil'] == 2){ echo'selected';} ?> >2</option>
                        <option value="3" <?php if($_SESSION['resultadoBd']['perfil'] == 3){ echo'selected';} ?> >3</option>
                        <option value="4" <?php if($_SESSION['resultadoBd']['perfil'] == 4){ echo'selected';} ?> >4</option>
                        <option value="5" <?php if($_SESSION['resultadoBd']['perfil'] == 5){ echo'selected';} ?> >5</option>
                        <option value="6" <?php if($_SESSION['resultadoBd']['perfil'] == 6){ echo'selected';} ?> >6</option>
                        <option value="7" <?php if($_SESSION['resultadoBd']['perfil'] == 7){ echo'selected';} ?> >7</option>
                        <option value="8" <?php if($_SESSION['resultadoBd']['perfil'] == 8){ echo'selected';} ?> >8</option>
                        
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
                    <textarea class="inputForm textoImput" name="objetivo" placeholder="Digite aqui!" rows="5"><?php echo $_SESSION['resultadoBd']['objetivo'] ?></textarea>
                </div>  
                
                <div class="linhaForm">
                    <span class="labelFrom">Ementa :</span>
                    <textarea class="inputForm textoImput" name="ementa" placeholder="Digite aqui!" rows="5"><?php echo $_SESSION['resultadoBd']['ementa']  ?></textarea>
                </div> 
               
                <div class="linhaForm">
                    <div class="meioForm">
                        <span class="labelFrom">Número de Créditos Práricos :</span>
                        <input class="inputForm numero" name="nCreditoPratico" type="number" value="<?php echo $_SESSION['resultadoBd']['nCreditopratico'] ?>">
                    </div>
                    <div class="meioForm">
                        <span class="labelFrom">Número de Créditos Teóricos :</span>
                        <input class="inputForm numero" name="nCreditoTeorico" type="number" value="<?php echo $_SESSION['resultadoBd']['nCreditoTeorico'] ?>">
                    </div>
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
    
var codNucleo = <?php echo $_SESSION['resultadoBd']['codNucleo'] ?>; 

// verifica se a materia possui pre-requisitos fortes e fracos para posteriormete marcar os checkbox;
var temPreReq = <?php if(isset($_SESSION['resultadoBd2'])){echo '1';}else{echo '0';} ?>

//monta um vetor com os pre-requisitos da materia em questao
var PreRObri = [<?php if(isset($_SESSION['resultadoBd2'])){  
    foreach ( $_SESSION['resultadoBd2'] as $lista) {
                                            if($lista['obrigatorio'] == 1){ 
                                            echo $lista['codMatPre'].',';
                                            }
}}?>];
var PreRNObri = [<?php  if(isset($_SESSION['resultadoBd2'])){
foreach ( $_SESSION['resultadoBd2'] as $lista) {
                                            if($lista['obrigatorio'] == 0){ 
                                            echo $lista['codMatPre'].',';
                                            }
}}?>];
// verifica materia por materia da busca ajax mais abaixo, se ela est� no vetor de pre-requisitos 
function verificaObri(idMat){
    var aux = 0;
        for(i=0;i<PreRObri.length;i++){
            if(PreRObri[i] == idMat){
                aux=1;
            }
        }
        return aux;
}
function verificaNObri(idMat){
    var aux = 0;
        for(i=0;i<PreRNObri.length;i++){
            if(PreRNObri[i] == idMat){
                aux=1;
            }
        }
        return aux;
}
//    move os quadrinhos de pre-requisitos a medida que se remove ou mostra mais quadros
function mudaPosiQuadros(){
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
}

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
                html+='<option value="">Selecione  </option>';
              for($i=0; $i < data.length; $i++){
                html+='<option value="'+data[$i].cod+'"';
                if (codNucleo == data[$i].cod){
                    html+='selected';
                }
                html+='>'+data[$i].nome+'</option>';
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
                    html+='<span class="disci">Perfil '+ i +'</span>';            
                $.each(item, function(j, item2) {
                    html+='<span class="disci"><input class="cildren"  name="preRequisito['+$cont+']" value="'+item2.cod+'" type="checkbox"';
                    if(verificaObri(item2.cod) == 1){
                        html+='checked="checked"';
                    }
                    html+='>'+item2.codDisciplina+'</span>';
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
           $.each(data, function(i, item) {
               if(i < 8){
                    html2+='<div id="perfil2_'+ i +'" class="perfil2">';
                    html2+='<span class="disci">Perfil '+ i +'</span>';            
                $.each(item, function(j, item2) {
                    html2+='<span class="disci"><input class="cildren"  name="preRequisitoF['+$cont+']" value="'+item2.cod+'" type="checkbox"';
                    if(verificaNObri(item2.cod) == 1){
                        html2+='checked="checked"';
                    }
                    html2+='>'+item2.codDisciplina+'</span>';
                    $cont++;
                });
                html2+='</div>';
                }
           });
           html2+='</div>';
           $('#prerequisitosForte').html(html);
           $('#prerequisitosFraco').html(html2);
           
           mudaPosiQuadros();
           
});    
    
    
    
$('#voltar2').click(function(){
      location.href="../views/visualizarMaterias.php";
});
       
$("#perfil").change(function() {
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

    mudaPosiQuadros();
    });
});
 
</script>
