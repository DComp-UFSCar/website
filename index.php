<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>Home - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
    </head>
    <body>
        <header>
            <image id="menuBotao" src="images/botMenu.png" onclick="mostraMenu();"/>
           
                <a href="index.php"><image id="logoImg" src="images/logo2.png"/></a>
                <a  href="login.php"><image id='loginBotao' src="images/adminBT.png"/></a>
        </header>
        <section id='corpo'>
            <ul id="menuBarra">
                <a href="views/projetoPedagogico.php"><li><image class='liimg' src="images/logo.png"/> <span class="litxt">Projeto Pedagógico</span></li></a>
                <a href="views/atividadesDesenvolvidas.php"><li><image class='liimg' src="images/edit.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="views/paginasDisciplinas.php"><li><image class='liimg' src="images/paginaBt.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="views/professores.php"><li><image class='liimg' src="images/profBt.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <div id="imgCampi"></div>
            <article id='bloco'>
                <div id="corpoPaginaInicial" class="texto">
                </div>
                <div class="texto">
                    <h1>Notícias</h1>
                </div>
                <div class="texto">
                    <ul id="noticias" class="bxslider">
                    </ul>
                </div>
                    
            </article>
        <?php include 'templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
   
   function mostraMenu(){
       if( $('#menuBarra').is(':visible') ) {
           $('#menuBarra').slideUp();
       }else{
            $('#menuBarra').slideDown();
       }
   };
  
   $(document).ready(function(){
   $.ajax({//  ajax para mostrar os nucleos diciplinares  
            type: "POST",
            url: "dao/listaNoticias.php",
            dataType: "json",//tipo de retorno � um objeto json
            data: {}
        }).done(function(data){
            var html="";
            $.each(data, function(j, item) {
                    html+='<li class="linhaSlider"><p>'+item.texto+'</p></li>';
            });
            $('#noticias').html(html);
           $('#noticias').bxSlider({adaptiveHeight: true,auto:true,pause:10000,autoControls:true,autoControlsCombine:true,controls:false});
   });  
   
   
   
        $.ajax({//  ajax para mostrar os nucleos diciplinares  
            type: "POST",
            url: "dao/listaPagInicial.php",
            dataType: "json",//tipo de retorno � um objeto json
            data: {}
        }).done(function(data){
            var html="";
            html+= data;
            $('#corpoPaginaInicial').html(html);
        });  
   });
   
</script>
