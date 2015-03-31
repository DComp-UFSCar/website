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
        <script src="../js/jsDraw2D.js"></script>
    </head>
    <body>
         <header>
            <image id="menuBotao" src="../images/botMenu.png" onclick="mostraMenu();"/>

                <a href="../index.php"><image id="logoImg" src="../images/logo2.png"/></a>
                <a  href="../login.php"><image id='loginBotao' src="../images/adminBT.png"/></a>

        </header>
        <section id='corpo'>
            <ul id="menuBarra2" style="display:none;">
                <a href="#"><li><image class='liimg' src="../images/pedag2.png"/> <span class="litxt">Projeto Pedagógico</span></li></a>
                <a href="atividadesDesenvolvidas.php"><li><image class='liimg' src="../images/edit2.png"/> <span class="litxt">Atividades Desenvolvidas</span></li></a>
                <a href="paginasDisciplinas.php"><li><image class='liimg' src="../images/paginaBt2.png"/> <span class="litxt">Páginas das Disciplinas</span></li></a>
                <a href="professores.php"><li><image class='liimg' src="../images/profBt2.png"/> <span class="litxt">Professores</span></li></a>
            </ul>
            <article id='bloco'>
                <div class="linhaView1">
                    <span ><b>Núcleos Disciplinares : </b>Clique, para ver os pre-requisitos das disciplinas deste Núcleo</span>
                </div>
                <hr class="separadorView">
                <div id="nucleos" class="linhaView" style="width: 100%;">

                </div>
                <div class="linhaView1">
                    <span ><b>Disciplinas disponíveis para o curso de Bacharelado em Ciências da Computação</b></span>
                </div>
                <hr class="separadorView">

                <div id="materiasPeriodo" class="linhaView" style="width: 100%;">

                </div>


                <div class="linhaView1">
                    <span ><b>Disciplinas Optativas :</b></span>
                </div>
                <hr class="separadorView">
                <div id="materiasOptativa" class="linhaView" style="width: 100%;">

                </div>
                <div class="linhaView1">
                </div>
                <hr class="separadorView">
                <div class="linhaView" style="width: 100%;">
                    <div class="linhaView1">
                        <a href="../projetoPedagogicoBCCS-2010.pdf"  target="_blank" style="color: blue;"><image class="miniIcoPag" src="../images/paginaBt.png"/><b><span> Projeto Pedagógico BCCS 2010</span></b></a>
                    </div>
                </div>



            </article>
        </section>
    </body>
</html>
<script>
disciplinas = new Array();
preRequisitos = new Array();
codNucleos = new Array();
//Create jsGraphics object
var gr = new jsGraphics(document.getElementById("materiasPeriodo"));
var pt1 = new jsPoint();
var pt2 = new jsPoint();
var x1,x2,y1,y2;
//Create jsPen object
var cores = new Array();
    cores = ["blue","red","black","gray"]
var col = new jsColor("blue");
var pen = new jsPen(col,2);

function recarregar(){
     listaMaterias();
     gr.clear();
     $.each(codNucleos, function(i, item){
        $('#Nucl_'+item).show();
    });
}

function mostraMenu(){
       if( $('#menuBarra2').is(':visible') ) {
           $('#menuBarra2').slideUp();
       }else{
            $('#menuBarra2').slideDown();
       }
   };
  function getRandomColor(semente) {
        r = Math.floor(Math.sin(semente) * 255);
        g = Math.floor(Math.sin(r) * 255);
        b = Math.floor(Math.sin(g) * 255);
        color = r+','+g+','+b;
        return color;
    }

    $(".botao").live({
       mouseenter: function () {
          $('#leg_'+this.id).show();
        },
        mouseleave: function () {
          $('#leg_'+this.id).hide();

        }
});

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
 function getWidth(cod){
     var offsetTrail = document.getElementById(cod);
     var largura = offsetTrail.offsetWidth;
     return largura;
 }
 function getPosicaoElm(cod){
     var offsetTrail = document.getElementById(cod);
     var offsetLeft = 0;
     var offsetTop = 0;
     if(offsetTrail.offsetParent){
         do{
             offsetLeft += offsetTrail.offsetLeft;
             offsetTop += offsetTrail.offsetTop;
         }while(offsetTrail = offsetTrail.offsetParent)
     }
     if(navigator.userAgent.indexOf("Mac")!= -1 && typeof document.body.leftMargin != "undefined"){
         offsetLeft += document.body.leftMargin;
         offsetTop += document.body.topMargin;
     }
     return {left:offsetLeft, top:offsetTop};
 }

 function drawSeta(x2,y2){
    pt1.x = x2;
    pt1.y = y2;
    pt2.x = pt1.x - 15;
    pt2.y = pt1.y;
    gr.drawLine(pen,pt1,pt2);
    pt1.x = pt2.x;
    pt1.y = pt2.y;
    pt2.x = pt1.x + 8;
    pt2.y = pt1.y - 4;
    gr.drawLine(pen,pt1,pt2);
    pt2.x = pt1.x + 8;
    pt2.y = pt1.y + 4;
    gr.drawLine(pen,pt1,pt2);
 }

 function mostraPreReq(codNucleo){
    var randoom = 0;
    $.each(disciplinas, function(i, perf){
        $.each(perf, function(j, disc){
            if(disc['codNucleo'] != codNucleo){
                $('#'+disc['cod']).css({background : 'rgba(255, 255, 255, 1)'});
            }else{
                $.each(preRequisitos, function(j, pre){
                    if(pre.codMatPos == disc['cod']){
                        x1 = getPosicaoElm(disc['cod']).left + 7;
                        y1 = getPosicaoElm(disc['cod']).top-215;

                        x2 = getPosicaoElm(pre.codMatPre).left;
                        var largura = getWidth(pre.codMatPre);
                        x2 += largura - 2;
                        y2 = getPosicaoElm(pre.codMatPre).top-215;
                        pt1.x = x1;
                        pt1.y = y1;
                        pt2.x = x2;
                        pt2.y = y2;
                        randoom++;
                        if(randoom > 3){randoom = 0;}
                        col = new jsColor(cores[randoom]);
                        pen = new jsPen(col,3);
                        gr.drawLine(pen,pt1,pt2);
                        drawSeta(x2,y2);
                    }
                });
            }
        });
    });
    $.each(codNucleos, function(i, item){
        if(item != codNucleo){
            $('#Nucl_'+item).hide();
        }
    });
 }

 function listaMaterias(){
      $.ajax({//  ajax para mostrar as diciplinas por periodos
            type: "POST",
            url: "../dao/listaMateriaPorPeriodo.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){
            var html="";
            html+='<div>';
            var $cont = 0;
            var a = 0, b = 0;
           $.each(data, function(i, item) {
                    disciplinas[a] = new Array();
                    html+='<div id="perfil_'+ i +'" class="perfilView">';
                    html+='<div class="linhaView3"><b>Perfil '+ i +'</b></div>';
                $.each(item, function(j, item2) {
                    disciplinas[a][b] = new Array();
                    disciplinas[a][b]['cod'] = item2.cod;
                    disciplinas[a][b]['prereq'] = 0;
                    disciplinas[a][b]['codNucleo'] = item2.codNucleo;
                    html+='<div class="disciViewBox botao" id="'+item2.cod+'" onclick="abreDiciplina('+item2.cod+')" style="background-color:rgba('+getRandomColor(item2.codNucleo)+',0.3);"><div id="leg_'+item2.cod+'" class="legenda"><span>'+item2.cod2+' - '+item2.nome+'</span></div>';
                        html+='<span>'+item2.codDisciplina+'</span>';
                        $cont++;
                        b++
                    html+='</div>';
                });
                html+='</div>';
                a++;
                b=0;
           });
           $('#materiasPeriodo').html(html);
   });
 }

   $(document).ready(function(){

   listaMaterias();

   $.ajax({//  ajax para mostrar as diciplinas optativas
            type: "POST",
            url: "../dao/listaMateriaOptativa.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){
            var html2="";
            html2+='<div class="OptativaView">';
            var $cont = 0;
//             pre requisitos fortes
                $.each(data, function(j, item2) {
                    html2+='<a href="#"><div class="OptativaViewBox botao" id="'+item2.cod+'" onclick="abreDiciplina('+item2.cod+')" style="background-color:rgba('+getRandomColor(item2.codNucleo)+',0.3);"><div id="leg_'+item2.cod+'" class="legenda"><span>'+item2.nome+'</span></div>';
                    html2+='<span>'+item2.codDisciplina+'</span>';
                    $cont++;
                    html2+='</div></a>';
                });
                html2+='</table>';
               $('#materiasOptativa').html(html2);
           });

    $.ajax({//  ajax para mostrar buscar os prerequisitos
        type: "POST",
        url: "../dao/buscaPreReqsitos.php",
        dataType: "json",
        data: {}
    }).done(function(data){
         var cont = 0;
         $.each(data, function(i, item) {
                 preRequisitos[cont] = new Array();
                 preRequisitos[cont]['codMatPos'] = item.codMatPos;
                 preRequisitos[cont]['codMatPre'] = item.codMatPre;
                 cont++;
         });
    });

    $.ajax({//  ajax para mostrar os nucleos
            type: "POST",
            url: "../dao/listaNucleo.php",
            dataType: "json",//tipo de retorno é um objeto json
            data: {}
        }).done(function(data){

            var html2="";
            html2+='<div class="nucleosView">';
            html2+='<div id="voltar2" class="voltar voltarP" onclick="recarregar();"  style="background-color: red; color: #FFF; font-weight: bold; margin: 7px 15px 7px 10px !important;"><image class="imgBtvoltaP" src="../images/voltar.png"/></div>';
            var $cont = 0;
//             pre requisitos fortes
                $.each(data, function(j, item2) {
                    codNucleos[$cont] = item2.cod;
                    html2+='<div onclick="mostraPreReq('+item2.cod+');" class="nucleosViewBox" id="Nucl_'+item2.cod+'"  style="background-color:rgba('+getRandomColor(item2.cod)+',0.3);">';
                    html2+='<span>'+item2.nome+'</span>';
                    $cont++;
                    html2+='</div>';
                });
                html2+='</div>';
               $('#nucleos').html(html2);
           });

   });
</script>
