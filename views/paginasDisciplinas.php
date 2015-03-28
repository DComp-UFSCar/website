<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title>Páginas Disciplinas - Projeto Pedagógico</title>
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
                <a href="#"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="professores.php"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
                <div class="linhaView1">
                    <b>Disciplinas que possuem Páginas</b>
                <hr class="separadorView">
                </div>
                <div id="galeriaPaginas" style="width: 100%;">
                    
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
$(".botao").live({
       mouseenter: function () {
          $('#leg_'+this.id).show();
        },
        mouseleave: function () {
          $('#leg_'+this.id).hide();

        }
});

$(document).ready(function(){

 $.ajax({//  ajax para mostrar as disciplinas que possuem páginas
            type: "POST",
            url: "../dao/listaDisciplinaPagina.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){
              var html2="";
                html2+='<div class="paginaView">';
    //             pre requisitos fortes  
                    $.each(data, function(i, item) {
                        html2+='<div class="paginaViewBox2"><div class="linhaView3 botao" id="'+item.disciplina.cod+'">'+item.disciplina.codDisciplina+'</div><div id="leg_'+item.disciplina.cod+'" class="legenda"><span>'+item.disciplina.nome+'</span></div>';
                        $.each(item.pagina, function(j, item2) {
                            html2+='<div class="pagMatViewBox botao" onclick="abrePagina('+item2.cod+')";">';
                            html2+='<span>'+item2.titulo+'</span>';
                            html2+='</div>';
                        });
                        html2+='</div>';
                    });
                    html2+='</div>';
                    $('#galeriaPaginas').html(html2);
}); 




});
</script>
