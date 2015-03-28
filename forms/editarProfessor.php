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
        <script src="../js/themes/md5.js"></script>
    </head>
    <body>
        <?php include '../templates/headerAdm.php' ?>
         <section id='corpo'>
            <div id='blocoFrom'>
                <form class="formBloco" method="POST" action="../dao/SeditarProf.php" enctype="multipart/form-data">
                <span class="nameForm"><b>Editar este Professor.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png"/>
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Foto :</span>
                    <image class="fotoProf" src="../profFoto/<?php if($_SESSION['prof']['foto'] == '0'){ echo 'padrao.png';}else{echo $_SESSION['prof']['foto'];}  ?>"/>
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Nome :</span>
                    <input name="cod" type="text" value="<?php echo $_SESSION['prof']['cod'] ?>" hidden="hidden">
                    <input class="inputForm textoImput" name="nome" type="text" value="<?php echo $_SESSION['prof']['nome'] ?>">
                </div> 
                 <div class="linhaForm">
                    <span class="labelFrom">Foto (3x4):</span>
                    <input class="inputForm textoImput" type="file" name="Arquivo" id="Arquivo">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Nome de usuário :</span>
                    <input class="inputForm textoImput" name="usuario" type="text" value="<?php echo $_SESSION['adm']['user'] ?>">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Página pessoal :</span>
                    <input class="inputForm textoImput" name="pagPessoal" type="text" value="<?php echo $_SESSION['prof']['pagPessoal'] ?>">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">área de atuação :</span>
                    <input class="inputForm textoImput" name="areaAtua" type="text" value="<?php echo $_SESSION['prof']['areaAtuacao'] ?>">
                </div> 
                <div class="linhaForm" id="senhaAcesso">
                    <span class="labelFrom">Senha de acesso :</span>
                    <input class="inputForm" id="senha1" name="senhaAntiga" type="password">
                    <image id="verPass1" class="imgImput2" src="../images/olho.png"/>
                    <span id="passOk" style="color: green; display:none;"><b>Senha Correta</b></span>
                    <span id="loaderGif" style="color: black; display:none;"><image class="imgImput2 loader" src="../images/loader.gif"/><b>Analizando</b></span>
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Esqueceu a senha? :</span>
                    <input class="inputForm" id="esquecisenha" type="checkbox" value="1">
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Nova senha de acesso :</span>
                    <input class="inputForm" id="senha2" name="senhaNova" type="password" disabled="disabled">
                    <image id="verPass2" class="imgImput2" src="../images/olho.png"/>
                    <span id="cadeadoFx"><image class="imgImput2 loader" src="../images/cadeadoFX.png"/></span>
                    <span id="cadeadoAb" style="display:none;"><image class="imgImput2 loader" src="../images/cadeadoAb.png"/></span>
                </div> 
                <div class="linhaBtForm">
                    <input id="enviar" class="btForm" type="submit" value="Enviar" disabled="disabled">
                </div>
            </form>
            </div>
       <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
var geral = <?php echo $_SESSION['geral'];?>;
var aux ='<?php echo $_SESSION['adm']['senha'] ?>';

$('#verPass1').click(function(){
    if($('#senha1').prop('type') == 'text'){
        $('#senha1').prop('type', 'password');
    }else{
        $('#senha1').prop('type', 'text');
    }
});
$('#verPass2').click(function(){
    if($('#senha2').prop('type') == 'text'){
        $('#senha2').prop('type', 'password');
    }else{
        $('#senha2').prop('type', 'text');
    }
});

    
$('#voltar2').click(function(){
        if(geral == 1){
          location.href="../dao/preListaProf.php";
        }else{
             $.ajax({
                    type: "POST",
                    url: "../dao/voltaMenu.php",
                    dataType: "html",
                    data: {menu: '3'}
                }).done(function(data){
                   if(data['1'] ==  '1'){
                          location.href="../ProfAdm.php";
                        }
                    });
        }
    });


$('#senha1').keyup(function (){
    var aux2 = $('#senha1').val();
    var aux3 = CryptoJS.MD5(aux2).toString();
        if(aux == aux3){
            $('#passOk').show();
            $('#cadeadoFx').hide();
            $('#cadeadoAb').show();
            $('#loaderGif').hide();
            $('#senha2').removeAttr('disabled');
            $('#esquecisenha').attr('disabled', 'disabled');
        }else{
            if( $('#loaderGif').css('display') != 'none' ) {
                 if($('#senha1').val() == ''){
                    $('#loaderGif').hide();
                    $('#cadeadoFx').show();
                    $('#cadeadoAb').hide();
                    $('#esquecisenha').removeAttr('disabled');
                }
            }
            else {
                $('#senha2').attr('disabled', 'disabled');
                $('#passOk').hide();
                $('#loaderGif').show();
                $('#cadeadoFx').show();
                $('#cadeadoAb').hide();
                $('#esquecisenha').removeAttr('disabled');
                if($('#senha1').val() == ''){
                    $('#loaderGif').hide();
                }
            }
        }
});

$('#esquecisenha').change(function (){
    if($('#esquecisenha').prop('checked') != true ){
        $('#senha2').attr('disabled', 'disabled');
        $('#cadeadoAb').hide();
        $('#cadeadoFx').show();
        $('#senhaAcesso').show();
    }else{
        $('#senha2').removeAttr('disabled');
        $('#cadeadoFx').hide();
        $('#cadeadoAb').show();
        $('#senhaAcesso').hide();
        
    }
});

$('#senha2').keyup(function (){
    if($('#senha2').val() != ""){
        $('#enviar').removeAttr('disabled');
    }else{
        $('#enviar').attr('disabled', 'disabled');
    }
});

$(document).ready(function() {

});
</script>
