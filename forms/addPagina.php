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
        <link rel="stylesheet" type="text/css" href="../css/chosen.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/chosen.js"></script>
        <script type="text/javascript" src="../js/tinymce.min.js" charset="utf-8"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include '../templates/headerAdm.php' ?>
        <section id='corpo'>
            <div id='blocoFrom'>
            
                <form class="formBloco" id="formulario" method="POST" action="../dao/addPagina.php">
                <span class="nameForm"><b>Adicionar nova Página de disciplina.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png"/>
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Disciplina :</span>
                    <select id="disciplinaDb" class="inputForm select" name="codMat">
                        <option>Selecione</option>
                       <?php 
                            foreach ($_SESSION['listaDeMaterias'] as $prefil => $materia) {
                                echo '<optgroup label="Perfil '.$prefil.'">';
                                    foreach($materia as $linha){
                                        echo '<option value="'.$linha['cod'].'">'.$linha['cod2'].' - '.$linha['nome'].'</option>';
                                    }
                                    echo '</optgroup>';
                            }
                        ?>
                    </select>
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Título :</span>
                    <input class="inputForm textoImput" name="titulo" id="titulo" type="text">
                </div>  
                <div class="linhaForm">
                    <span ><b> Corpo da Página : ( Você pode adicionar código HTML diretamente clicando no icone : < > Código Fonte )</b></span>
                </div>  
                <div class="fromTextArea">
                    <textarea name="pagina"><b>Digite o texto de sua página aqui...</b></textarea>
                </div>  
                <div class="linhaBtForm">
                        <input class="btForm submit" type="submit" value="Enviar">
                        <input class="btForm" type="reset" value="Limpar">
                </div>
            </form>
            </div>
         <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
var geral = <?php echo $_SESSION['geral'];?>;
    
$(document).ready(function() {
    
    $("#formulario").validate({
		// Define as regras
		rules:{
			disciplinaDb:{
				required: true
			},
			titulo:{
				required: true, minlength: 4, maxlength: 20
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			disciplinaDb:{
				required: "Escolha a disciplina"
			},
			titulo:{
				required: "Digite o título",
				minlength: "O título deve conter, no mínimo, 4 caracteres",
				maxlength: "O título deve conter, no máximo, 20 caracteres"
			}
		}
	});

    
    $('#voltar2').click(function(){
          $.ajax({
            type: "POST",
            url: "../dao/voltaMenu.php",
            dataType: "html",
            data: {menu: '2'}
        }).done(function(data){
            if(data['1'] ==  '1'){
                if(geral == 1){
                  location.href="../admin.php";
                }else{
                  location.href="../ProfAdm.php";
                }
        }
    });
    });
    
  $(".select").chosen();
  
  tinymce.init({
      theme:"modern",
    selector: "textarea",
    width: 900,
    height:1000,
    language : 'pt_BR',
     plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor jbimages"
        ],

        toolbar1: "newdocument fullpage | undo redo | bold italic underline strikethrough | styleselect formatselect fontselect fontsizeselect | code",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | alignleft aligncenter alignright alignjustify | outdent indent blockquote | forecolor backcolor | link unlink anchor jbimages media ",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | inserttime preview ",
        relative_urls:false,
        menubar: false,
        toolbar_items_size: 'small',
        
         style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]
});


    });

    
 
</script>
