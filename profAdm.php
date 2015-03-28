<?php
session_start();

 if((!isset($_SESSION['user'])) && (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        unset ($_SESSION['prof']);
        header('location:index.php');
 }

 $logado = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>Painel Prof. Administrativo - Projeto Pedagógico</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
         <?php include 'templates/headerAdm.php' ?>
        <section id='corpo'>
            <div id='blocoAdm' class="box">
                <div id="menuAdm" class="texto">
                    <div class="PnIco">
                             <image class="imgPnIco" src="images/PnIco.png"/><span class="PnLabel"><b>Painel de Administrativo dos Professores</b></span>
                    </div>
                    <div class="colunaPainel" >
                        <div id="btProjPed" class="painel">
                             <image title="Projeto Pedagogico" class="imgBtPainel" src="images/pjBt.png"/>
                             <label class="labelBt2">Configurações do Projeto Pedagógico</label>
                        </div>
                        <div id="btPaginas" class="painel">
                            <image title="Paginas" class="imgBtPainel" src="images/paginaBtE.png"/>
                            <label class="labelBt2">Configurações das Páginas</label>
                        </div>
                        <div id="btProf" class="painel">
                            <image title="Professores" class="imgBtPainel" src="images/profBtE.png"/>
                            <label class="labelBt2">Configurações dos Professores</label>
                        </div>
                    </div>
                    <div id="info" class="painelInfo1" style="clear: both;">
                        <p><b>Observações:</b></p> 
                        <p>- Somente após a criação Oferta das diciplinas, adicione as páginas de cada uma.</p>
                        <p>- Para ajuda clique <a href="ajuda.php" style="color: blue;">Aqui</a>!</p>
                    </div>
                </div>
                
                <div id="subMenuPedago" class="texto box1" style="display: none;">
                    <div id="voltar" class="voltar">
                             <image class="imgBtvolta" src="images/voltar.png"/>
                    </div>
                    <br>
                    <span style="margin-left: 30px;font-size: 1.5em;"><b>Menu do Projeto Pedagógico</b></span>
                    <br>
                <div class="miniMenu">
                    <div  class="linhaPainel" >
                        <div class="botaoMiniMenu">
                            <div id="btaddOferta" class="painelMini">
                                 <a href="dao/preAddOfertaProf.php"><image title=" Adicionar oferta de disciplina" class="imgBtPainelMini" src="images/ofertaAdd.png"/></a>
                                 <label class="labelBt">Adicionar oferta de disciplina</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btaRemvOferta" class="painelMini">
                                 <a href="dao/preListaOfertaProf.php"><image title="Editar oferta de disciplina" class="imgBtPainelMini" src="images/ofertaRem.png"/></a>
                                 <label class="labelBt">Editar oferta de disciplina</label>
                            </div>
                        </div>
                    </div >
                    <br>
                    <div id="PainelROferta" class="coluna2Painel" style="display: none;">
                        
                    </div>
                    <div id="info" class="painelInfo">
                        <p><b>Observações:</b></p> 
                        <p>- Professores podem oferecer Disciplinas que ja foram Criadas no Banco de Dados.</p>
                    </div>
                </div>
                </div>
                
                <div id="subMenuPagina" class="texto box1" style="display: none;">
                    <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="images/voltar.png"/>
                    </div>
                    <br>
                    <span style="margin-left: 30px;font-size: 1.5em;"><b>Menu de Páginas</b></span>
                    <br>
                    <div class="miniMenu">
                    <div class="coluna1Painel" >
                        <div class="botaoMiniMenu">
                            <div id="btaddPag" class="painelMini">
                                <a href="dao/preAddPaginaProf.php"><image title="Adicionar Página para Disciplina ofertadas" class="imgBtPainelMini" src="images/add.png"/></a>
                                   <label class="labelBt">Adicionar Página para Disciplinas ofertadas</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btEditaMat" class="painelMini">
                                <a href="dao/preListaPaginaProf.php"><image title="Visualizar Página de Disciplinas ofertadas" class="imgBtPainelMini" src="images/ver.png"/></a>
                                 <label class="labelBt">Visualizar Páginas de Disciplinas ofertadas</label>
                            </div>
                        </div>
                    </div>
                    <div id="info" class="painelInfo" style="clear: both;">
                        <p><b>Observações:</b></p> 
                        <p>- Por padrão, ao criar uma página ela se torna a página atual da disciplina.</p>
                        <p>- Professores poderão editar somente páginas de disciplinas ofertadas por eles.</p>
                    </div>
                    </div>
                </div>
                
                <div id="subMenuProf" class="texto box1" style="display: none;">
                    <div id="voltar3" class="voltar">
                             <image class="imgBtvolta" src="images/voltar.png"/>
                    </div>
                    <br>
                    <span style="margin-left: 30px;font-size: 1.5em;"><b>Menu de Professores</b></span>
                    <br>
                    <div class="miniMenu">
                        <div class="coluna1Painel" >
                            <div class="botaoMiniMenu">
                                <div id="btaddPag" class="painelMini">
                                    <image title="Editar Professor" class="imgBtPainelMini" src="images/edit.png"  onclick="editProf(<?php echo $_SESSION['cod']?>);"/>
                                     <label class="labelBt">Editar Informações</label>
                                </div>
                            </div>
                        </div>
                    <div id="info" class="painelInfo" style="clear: both;">
                        <p><b>Observações:</b></p> 
                        <p>- Professores poderão adicionar páginas de Disciplinas e ofertar disiplinas.</p>
                        <p>- Cada um terá uma senha de acesso.</p>
                    </div>
                    </div>
                    <br>
                </div>
            </div>
          <?php include 'templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
 var menuAtivar = <?php echo $_SESSION['menuAtivo'] ?>;
 var menuRigthAtv = 0;
  
 function editProf(idProf){
     $.ajax({
            type: "POST",
            url: "dao/editarProfInfo.php",
            dataType: "html",
            data: {cod: idProf}
        }).done(function(data){
            if(data['1'] ==  '1'){
              location.href="forms/editarProfessor.php";
            }
    });
}
  
  function zeraVoltaMenu(){
         $.ajax({
            type: "POST",
            url: "dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '0'}
        }).done(function(){
//            nao faz nada
        });
  }
 //fun��o para a transi��o dos menus e submenus do painel administrativo
 function subMenu(filho){
        if( $(filho).is(':visible') ) {
           $(filho).slideUp();
            $('#menuAdm').slideDown();
       }else{
            $(filho).slideDown();
           $('#menuAdm').slideUp();
       }
   };
 function subMenuRigth(filho){
      if ( menuRigthAtv  > 0){     
           $('.coluna2Painel').hide();
       }else{
           menuRigthAtv = 1;
       }
   $(filho).show();
 };
      

 

   $(document).ready(function(){
//   verifica��es para definir qual menu volta ativo    
   if(menuAtivar == 1){
      subMenu('#subMenuPedago');
      zeraVoltaMenu();
   }
   if(menuAtivar == 2){
      subMenu('#subMenuPagina');
      zeraVoltaMenu();
   }
   if(menuAtivar == 3){
      subMenu('#subMenuProf');
      zeraVoltaMenu();
   }
   
  $('#btProjPed').click(function(){
      subMenu('#subMenuPedago');
  });
  $('#voltar').click(function(){
      subMenuRigth('');
      subMenu('#subMenuPedago');
  });
  $('#btPaginas').click(function(){
      subMenu('#subMenuPagina');
  });
  $('#voltar2').click(function(){
      subMenu('#subMenuPagina');
  });
  $('#btProf').click(function(){
      subMenu('#subMenuProf');
  });
  $('#voltar3').click(function(){
      subMenu('#subMenuProf');
  });
   
   });
</script>
