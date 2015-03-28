<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="../images/favicon.ico"/>
        <link rel="icon" href="../images/favicon.png"/>
        <title>Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
         <header>
            <img id="menuBotao" src="../images/botMenu.png" onclick="mostraMenu();">
           
                <a href="../index.php"><image id="logoImg" src="../images/logo2.png"/></a>
                <a  href="../login.php"><image id='loginBotao' src="../images/adminBT.png"/></a>
        </header>
        <section id='corpo'>
            <ul id="menuBarra2" style="display:none;">
                <a href="projetoPedagogico.php"><li><image class='liimg' src="../images/pedag2.png"/> <span class="litxt">Projeto Pedagógico</span></li></a>
                <a href="atividadesDesenvolvidas.php"><li><image class='liimg' src="../images/edit2.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="paginasDisciplinas.php"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="professores.php"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
            <div class="disciplinaView">
                <div class="linhaView3">
                    <span><b>Disciplina : </b> </span> 
                </div> 
                <div class="linhaView2">
                        <?php echo  $_SESSION['disciplina']['cod2'].' - '.$_SESSION['disciplina']['codDisciplina'].' - '.$_SESSION['disciplina']['nome'];
                    if($_SESSION['disciplina']['optativa'] == 1){ echo '<b> - OPTATIVA</b>';}?><br>
                </div> 
                <div class="linhaView3">
                    <span><b>Ementa :</b></span>
                </div>
                <div class="linhaView2">
                    <p><?php echo  $_SESSION['disciplina']['ementa'] ?></p>
                </div>
                <div class="linhaView3">
                    <span><b>Objetivos :</b></span>
                </div>
                <div class="linhaView2" >
                    <p><?php echo  $_SESSION['disciplina']['objetivo'] ?></p>
                </div>
                
                <div class="linhaView2">
                    <span ><b>Créditos teóricos : </b> <?php echo  $_SESSION['disciplina']['nCreditoTeorico'] ?><b> Créditos práticos : </b><?php echo  $_SESSION['disciplina']['nCreditopratico'] ?></span>
                </div> 
            </div> 
            <div class="disciplinaView">
                <div class="linhaView3">
                    <span><b>Ofertas desta Disciplina:</b></span>
                </div>
                <?php if(isset($_SESSION['ofertas'])){
                            foreach ($_SESSION['ofertas'] as $oferta) {
                                echo '<div class="linhaView2">';
                                echo '<span><b>Professor : </b>'.$oferta['professor']['nome'].'<br>'; 
                                echo  '<b>Turma : </b>'.$oferta['turma'].'<b> - Semestre : </b>'.$oferta['semestre'].'º <br>';
                                foreach ($oferta['locais'] as $local) {
                                    echo  '<b>Dia : </b>'.$local['dia'].'<b> - Local : </b>' .$local['local'].'<b> - Horário : </b>'.$local['inicio'].' às '.$local['fim'].'<br>';
                                }
                                echo '</span></div>';
                            }
                }else{
                     echo'<div class="linhaView2"><span><b>Nenhuma!</b></span></div>';
                }
               ?>
            </div>
            <div class="disciplinaView">
                <div class="linhaView3">
                    <span><b>Pré-requisitos :</b></span>
                </div>
                <?php if(isset($_SESSION['requisitos'])){
                         foreach ($_SESSION['requisitos'] as $pre) {
                            echo '<div class="linhaView2">';
                              echo  '<span><b>Disciplina : </b>'.$pre['disciplina']['cod2'].' - '.$pre['disciplina']['codDisciplina'].' - '.$pre['disciplina']['nome'];
                              if($pre['obrigatorio'] == 1){
                                  echo '<b> - Obrigatório </b>';
                              }
                              echo '</span><br>';
                            echo '</div>'; 
                         }  
                      }else{
                              echo'<div class="linhaView2"><span><b>Nenhum!</b></span></div>';
                      } 
                ?>
            </div>
            <div class="disciplinaView">
                <div class="linhaView3">
                    <span><b>Páginas desta Disciplina:</b></span>
                </div>    
                <?php if(isset($_SESSION['paginas'])){
                        $i=1; 
                        foreach ($_SESSION['paginas'] as $pagina) {
                            echo '<div class="linhaView2">';
                              echo  '<span><b>Página ';
                              if($i == 1){
                                  echo 'Principal';
                              }else{
                                  echo $i;
                              }
                              echo  '</b> : '.$pagina['titulo'].'<image class="miniIcoPag" src="../images/ver.png" onclick="abrePagina('.$pagina['cod'].');"/>';
                            echo '</span></div>'; 
                            $i++;
                        }
                }else{
                    echo'<div class="linhaView2"><span><b>Nenhuma!</b></span></div>';
                }
                ?>
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
       
       
   });
</script>
