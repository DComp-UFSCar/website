<?php
session_start();

 if((!isset($_SESSION['user'])) && (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('location:index.php');
 }

 $logado = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>Painel Administrativo - Projeto Pedagógico</title>
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
                             <image class="imgPnIco" src="images/PnIco.png"/><span class="PnLabel"><b>Painel de Administrativo</b></span>
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
                        <p>- Adicione primeiramente os Professores e Núcleos, pois eles são nescessários para inclusão das Disciplinas e Oferta de Disciplina.</p>
                        <p>- Somente após a criação das diciplinas, adicione as páginas de cada uma.</p>
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
                    <div class="coluna1Painel" >
                        <div class="botaoMiniMenu">
                            <div id="btaddMat" class="painelMini">
                                <a href="forms/addMateria.php"><image title="Adicionar Disciplina" class="imgBtPainelMini" src="images/add.png" /></a>
                                <label class="labelBt">Adicionar Disciplina</label>
                            </div>
                        </div>    
                        <div class="botaoMiniMenu">
                            <div id="btEditaMat" class="painelMini">
                                <a href="dao/preListaMaterias.php"><image title="Visualizar Disciplinas" class="imgBtPainelMini" src="images/ver.png"/></a>
                                <label class="labelBt">Visualizar Disciplinas</label>
                            </div>
                        </div>    
                    </div>
                    <br>
                    <div  class="linha2Painel" >
                        <div class="botaoMiniMenu">
                            <div id="btOfertaDisc" class="painelMini">
                                 <image title="Ofertas de Disciplinas" class="imgBtPainelMini" src="images/oferta.png"/>
                                 <label class="labelBt">Ofertas de Disciplina</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btNucleoDisc" class="painelMini">
                                 <image title="Núcleo de Disciplinas" class="imgBtPainelMini" src="images/nucleoDisc.png"/>
                                 <label class="labelBt">Núcleo de Disciplina</label>
                            </div>
                        </div>
                    </div >
                    <div id="PainelROferta" class="coluna2Painel" style="display: none;">
                        <div class="botaoMiniMenu">
                            <div id="btaddOferta" class="painelMini">
                                 <a href="dao/preAddOferta.php"><image title=" Adicionar oferta de disciplina" class="imgBtPainelMini" src="images/ofertaAdd.png"/></a>
                                 <label class="labelBt">Adicionar oferta de disciplina</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btaRemvOferta" class="painelMini">
                                 <a href="dao/preListaOferta.php"><image title="Editar oferta de disciplina" class="imgBtPainelMini" src="images/ofertaRem.png"/></a>
                                 <label class="labelBt">Editar oferta de disciplina</label>
                            </div>
                        </div>
                    </div>
                    <div id="PainelRNucleo" class="coluna2Painel" style="display: none;">
                        <div class="botaoMiniMenu">
                            <div id="btaddNucleo" class="painelMini">
                                 <a href="forms/addNucleo.php"><image title="Adicionar Núcleo de disciplina" class="imgBtPainelMini" src="images/nucleoDiscAdd.png"/></a>
                                 <label class="labelBt">Adicionar Núcleo de disciplinaa</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btaRemvNucleo" class="painelMini">
                                 <a href="forms/remvNucleo.php"><image title="Editar Núcleo de disciplina" class="imgBtPainelMini" src="images/nucleoDiscRem.png"/></a>
                                  <label class="labelBt">Editar Núcleo de disciplinaa</label>
                            </div>
                        </div>
                    </div>
                    <div id="info" class="painelInfo">
                        <p><b>Observações:</b></p> 
                        <p>- Adicione primeiramente os Núcleos, pois eles são nescessarios para a inclusão das Disciplinas.</p>
                        <p>- Durante a criação das diciplinas, é feita a escolha dos pré-requisitos.</p>
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
                                <a href="dao/preEditPaginaInicial.php"><image title="Adicionar Página" class="imgBtPainelMini" src="images/editPagIni.png"/></a>
                                   <label class="labelBt">Editar Página Inicial</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btaddPag" class="painelMini">
                                <a href="dao/preListaNoticia.php"><image title="Visualizar Notícias" class="imgBtPainelMini" src="images/verNoticia.png"/></a>
                                   <label class="labelBt">Visualizar Notícias</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btaddPag" class="painelMini">
                                <a href="dao/preAddPagina.php"><image title="Adicionar Página de disciplina" class="imgBtPainelMini" src="images/add.png"/></a>
                                   <label class="labelBt">Adicionar Página de disciplina</label>
                            </div>
                        </div>
                        <div class="botaoMiniMenu">
                            <div id="btEditaMat" class="painelMini">
                                <a href="dao/preListaPagina.php"><image title="Visualizar Página das disciplinas" class="imgBtPainelMini" src="images/ver.png"/></a>
                                 <label class="labelBt">Visualizar Páginas das disciplinas</label>
                            </div>
                        </div>
                    </div>
                    <div id="info" class="painelInfo" style="clear: both;">
                        <p><b>Observações:</b></p> 
                        <p>- Por padrão, ao criar uma página ela se torna a página atual da disciplina.</p>
                        <p>- Somente após a criação da diciplina, adicione uma páginas para ela.</p>
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
                                     <a href="forms/addProfessor.php"><image title="Adicionar Professor" class="imgBtPainelMini" src="images/add.png"/></a>
                                     <label class="labelBt">Adicionar Professor</label>
                                </div>
                            </div>
                            <div class="botaoMiniMenu">
                                <div id="btRemvMat" class="painelMini">
                                    <a href="dao/preListaProf.php"><image title="Visualizar Professor" class="imgBtPainelMini" src="images/ver.png"/></a>
                                    <label class="labelBt">Visualizar Professores</label>
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
  $('#btOfertaDisc').click(function(){
      subMenuRigth('#PainelROferta');
  });
  $('#btNucleoDisc').click(function(){
      subMenuRigth('#PainelRNucleo');
  });
   
   });
</script>
