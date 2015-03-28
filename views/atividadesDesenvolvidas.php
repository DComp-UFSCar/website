<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title>Atividades Desenvolvidas - Projeto Pedagógico</title>
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
                <a href="#"><li><image class='liimg' src="../images/edit2.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="paginasDisciplinas.php"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="professores.php"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
                <div class="linhaView1">
                    <p><b>As atividades desenvolvidas pelos alunos do curso de Bacharelado em Ciências da Computação, 
                            estão contidas dentro das páginas de cada disciplina, clique sobre o título da página para acessá-la.</b></p>
                <hr class="separadorView">
                    <span><p><image class='galeriaImg' src="../images/imagem.png"/><b>Galeria :</b></p></span>
                </div> 
                <div id="galeriaPaginas" class="linhaView" style="width: 100%;">
                    
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
   
function abrePagina(idPag){
    $.ajax({
            type: "POST",
            url: "../dao/preVerPagina.php",
            dataType: "html",
            data: {cod: idPag}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="../views/viewPagina.php";
            }
    });
}  
   
$(document).ready(function(){

 $.ajax({//  ajax para mostrar as diciplinares de pre-requisitos
            type: "POST",
            url: "../dao/listaPagina.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){
              var html2="";
                html2+='<div class="paginaView">';
    //             pre requisitos fortes  
                    $.each(data, function(j, item2) {
                        html2+='<div class="paginaViewBox"><div class="linhaView3 botao" onclick="abrePagina('+item2.cod+');">'+item2.titulo+
                                '</div><div class="blockIframe"></div><iframe class="iframe" id="'+item2.cod+'" src="../temp/pag'+item2.numero+'.html" scrolling="no" width="200" height="250">';
                        html2+='</iframe></div>';
                    });
                    html2+='</div>';
                    $('#galeriaPaginas').html(html2);
}); 


});
</script>
