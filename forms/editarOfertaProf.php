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
    </head>
    <body>
        <?php include '../templates/headerAdm.php' ?>
        <section id='corpo'>
            <div id='blocoFrom'>
            
                <form class="formBloco" method="POST" action="../dao/SeditarOferta.php">
                <span class="nameForm"><b>Editar oferta de disciplina.</b></span>
                <div id="voltar2" class="voltar">
                             <image class="imgBtvolta" src="../images/voltar.png">
                </div>
                <br>
                <div class="linhaForm">
                    <span class="labelFrom">Disciplina :</span>
                    <select id="disciplinaDb" class="inputForm select" name="codMat">
                        <?php 
                            foreach ($_SESSION['listaDeMaterias'] as $prefil => $materia) {
                                echo '<optgroup label="Perfil '.$prefil.'">';
                                    foreach($materia as $linha){
                                        echo '<option value="'.$linha['cod'].'"';
                                        if($linha['cod'] == $_SESSION['oferta']['codMat']){
                                            echo  ' selected="selected" ';
                                        }
                                        echo '>'.$linha['cod2'].' - '.$linha['nome'].'</option>';
                                    }
                                    echo '</optgroup>';
                            }
                        ?>
                    </select>
                </div> 
                <div class="linhaForm">
                    <span class="labelFrom">Professor :</span>
                   <input class="inputForm textoImput" type="text" value="<?php echo  $_SESSION['user'] ?>" disabled="disabeld">
                   <input class="inputForm textoImput" name="codProf" type="text" value="<?php echo  $_SESSION['cod'] ?>" style="display: none">
                </div> 
                
                <div class="linhaForm">
                    <span class="labelFrom">Turma :</span>
                    <input class="inputForm" name="turma" type="text" value="<?php echo $_SESSION['oferta']['turma']; ?>">
                </div>  
                <div class="linhaForm">
                        <span class="labelFrom">Ano :</span>
                        <input style="width: 60px;" class="inputForm" id="ano" name="ano" type="number" value="<?php echo $_SESSION['oferta']['ano']; ?>">
                </div>
                <div class="linhaForm">
                    <span class="labelFrom">Semestre :</span>
                    <input class="inputForm" type="radio" name="semestre" value="1" <?php if($_SESSION['oferta']['semestre'] == 1){ echo ' checked=checked ';}; ?>> 1º
                    <input class="inputForm" type="radio" name="semestre" value="2" <?php if($_SESSION['oferta']['semestre'] == 2){ echo ' checked=checked ';}; ?>> 2º 
                </div> 
                 <div class="linhaForm">
                    <span class="labelFrom">Mais horários :</span>
                    <image class="imgBtminiAdd" src="../images/add.png" onclick="addHorario()"/>
                </div>
                 <div id="horarios">
                       <?php
                       if(isset($_SESSION['horarios'])){
                            foreach($_SESSION['horarios'] as $key => $horario){
                                echo '<div id="linha'.$key.'">';
                                    echo'<image class="imgBtminiRem" src="../images/lixeiraIco.png" onclick="RemHorario('.$key.')"/>';
                                    echo'<hr style="width: 50%;float:left;">';
                                    echo '<div class="linhaForm">';
                                        echo '<span class="labelFrom">Dia :</span>';
                                        echo '<select class="inputForm" name="dia['.$key.']">';
                                            if($horario['dia'] == 'Segunda-feira'){echo '<option value="Segunda-feira" selected>Segunda-feira</option>';}else{echo '<option value="Segunda-feira">Segunda-feira</option>';}
                                            if($horario['dia'] == 'Terça-feira'){echo '<option value="Terça-feira" selected>Terça-feira</option>';}else{echo '<option value="Terça-feira">Terça-feira</option>';}
                                            if($horario['dia'] == 'Quarta-feira'){echo '<option value="Quarta-feira" selected>Quarta-feira</option>';}else{echo '<option value="Quarta-feira">Quarta-feira</option>';}
                                            if($horario['dia'] == 'Quinta-feira'){echo '<option value="Quinta-feira" selected>Quinta-feira</option>';}else{echo '<option value="Quinta-feira">Quinta-feira</option>';}
                                            if($horario['dia'] == 'Sexta-feira'){echo '<option value="Sexta-feira" selected>Sexta-feira</option>';}else{echo '<option value="Sexta-feira">Sexta-feira</option>';}
                                            if($horario['dia'] == 'Sábado'){echo '<option value="Sábado" selected>Sábado</option>';}else{echo '<option value="Sábado">Sábado</option>';}
                                        echo '</select>';
                                    echo '</div>';
                                    echo '<div class="linhaForm">';
                                        echo '<div class="meioForm">';
                                            echo '<span class="labelFrom">Horário início :</span>';
                                            echo '<input class="inputForm" name="horarioIni['.$key.']" type="time" value="'.$horario['inicio'].'">';
                                        echo '</div>';
                                        echo '<div class="meioForm">';
                                            echo '<span class="labelFrom">Horário fim :</span>';
                                            echo '<input class="inputForm horario" name="horarioFim['.$key.']" value="'.$horario['fim'].'"  type="time">';
                                        echo '</div>'; 
                                    echo '</div> ';
                                    echo '<div class="linhaForm">';
                                        echo '<span class="labelFrom">Local :</span>';
                                        echo '<input class="inputForm textoImput local" name="local['.$key.']" type="text" value="'.$horario['local'].'">';
                                    echo '</div>';
                                echo '</div>';
                           }
                       }else{
                           echo '<div class="linhaForm">';
                                echo '<span class="labelFrom">Dia :</span>';
                                echo '<select class="inputForm" name="dia[0]">';
                                    echo '<option value="Segunda-feira">Segunda-feira</option>';
                                    echo '<option value="Terça-feira">Terça-feira</option>';
                                    echo '<option value="Quarta-feira">Quarta-feira</option>';
                                    echo '<option value="Quinta-feira">Quinta-feira</option>';
                                    echo '<option value="Sexta-feira">Sexta-feira</option>';
                                    echo '<option value="Sábado">Sábado</option>';
                                echo '</select>';
                            echo '</div>';
                            echo '<div class="linhaForm">';
                                echo '<div class="meioForm">';
                                    echo '<span class="labelFrom">Horário início :</span>';
                                    echo '<input class="inputForm" name="horarioIni[0]" type="time">';
                                echo '</div>';
                                echo '<div class="meioForm">';
                                    echo '<span class="labelFrom">Horário fim :</span>';
                                    echo '<input class="inputForm horario" name="horarioFim[0]" type="time">';
                                echo '</div>'; 
                            echo '</div> ';
                            echo '<div class="linhaForm">';
                                echo '<span class="labelFrom">Local :</span>';
                                echo '<input class="inputForm textoImput local" name="local[0]" type="text">';
                            echo '</div>';
                       }
                      ?>
                </div>
                <div class="linhaBtForm">
                        <input class="btForm" type="submit" value="Enviar">
                </div>
            </form>
            </div>
        <?php include '../templates/footer.php' ?>
        </section>
    </body>
</html>
<script>
$(document).ready(function() {
    
    $('#voltar2').click(function(){
         location.href="../dao/preListaOfertaProf.php";
    });
    
});

$(".select").chosen();  

</script>
