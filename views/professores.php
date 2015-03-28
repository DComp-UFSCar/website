<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title>Professores - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
         <header>
            <image id="menuBotao" src="../images/botMenu.png" onclick="mostraMenu();"/>
           
                <a href="../index.php"><image id="logoImg" src="../images/logo2.png"/></a>
                <a  href="../login.php"><image id='loginBotao' src="../images/adminBT.png"/></a>
        </header>
        <section id='corpo'>
            <ul id="menuBarra2" style="display:none;">
                <a href="projetoPedagogico.php"><li><image class='liimg' src="../images/pedag2.png"/> <span class="litxt">Projeto Pedagógico</span></li></a>
                <a href="atividadesDesenvolvidas.php"><li><image class='liimg' src="../images/edit2.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="paginasDisciplinas.php"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="#"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
            <div id="professores" style="width: 100%;">
                    
            </div>    
            </article>
         <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
  function mostraMenu(){
       if( $('#menuBarra2').is(':visible') ) {
           $('#menuBarra2').slideUp();
       }else{
            $('#menuBarra2').slideDown();
       }
   };
   
   
function abreDiciplina(codMat){
  $.ajax({//  ajax para mostrar a diciplina
        type: "POST",
        url: "../dao/abreDisciplina.php",
        dataType: "html",
        data: {cod: codMat}
    }).done(function(data){
        if(data['1'] ==  '1'){
              location.href="viewDisciplina.php";
        }
    });  
 }
   $(document).ready(function(){
   
        $.ajax({//  ajax para mostrar as diciplinares de pre-requisitos
            type: "POST",
            url: "../dao/professoresDisciplinas.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){
              var html2="";
             try{
                    $.each(data, function(i, item) {

                        html2+='<div class="disciplinaView">';
                            html2+='<div class="linhaView3">';
                                html2+='<span><b>Professor : </b>'+item.nome+'</span> ';
                            html2+='</div>';
                            html2+=' <div class="linhaView2">';
                                html2+= '<image class="profFotoView" src="../profFoto/';
                                if(item.foto == 0){
                                    html2+= 'padrao.png" />';
                                }else{
                                    html2+= item.foto+'" />';
                                }
                                html2+= '<b>Área de atuação : </b>'+item.areaAtuacao+'<br>';
                                html2+= '<b>Página Pessoal : </b><a class="link" href="http://'+item.pagPessoal+'" target="_blank">'+item.pagPessoal+'</a>';
                            html2+='</div>';
                            html2+='<div class="disciplinaView">';
                                html2+='<div class="linhaView3">';
                                    html2+='<span><b>Ofertas de Disciplinas deste Professor :</b></span> ';
                                html2+='</div>';
                         try{
                             $.each(item.oferta, function(j, item2) {
                                    html2+=' <div class="linhaView2">';
                                            html2+= '<span><b>Disciplina : </b>'+item2.disciplina.nome+'<b> - Turma : </b>'+item2.turma+' - Semestre : </b>'+item2.semestre+'º <img class="miniIcoPag" src="../images/ver.png" onclick="abreDiciplina('+item2.codMat+');"><br>';
                                     $.each(item2.locais, function(j, item3) {
                                            html2+= '<b>Dia : </b>'+item3.dia+'<b> - Local : </b>'+item3.local+'<b> - Horário : </b>'+item3.inicio+' às '+item3.fim+'<br>';
                                     });
                                    html2+='</div>';
                             });
                         }catch(e){
                                    html2+=' <div class="linhaView2">';
                                            html2+= '<span><b>Nenhuma Oferta!</b>';
                                    html2+='</div>';
                         }
                            html2+='</div>';
                       html2+='</div>';
                    });
              }catch(e){
               html2+='<div class="disciplinaView">';
                    html2+='<div class="linhaView3">';
                        html2+='<span><b> Lamento nenhum professor cadastrado!</b></span> ';
                    html2+='</div>'
               html2+='</div>'
              }
        $('#professores').html(html2);
});     
       
   });
</script>
