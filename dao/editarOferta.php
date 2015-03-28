<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $codProf = $_POST["codProf"];     
     $codMat = $_POST["codMat"];     
     $resultBD = $mysql->sql_query("SELECT `cod`,`codProf`, `codMat`,  `turma`, `ano`, `semestre`, `ativo` FROM `ofertamateria` WHERE codProf ='".$codProf."' AND codMat ='".$codMat."'");
     $oferta = mysql_fetch_array($resultBD, MYSQL_ASSOC);
//     print_r($oferta);exit();
     
     $resultBD = $mysql->sql_query("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$oferta['cod']."' AND ofertahorario.codHorario = horario.cod");
     $cont = 0;
         while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
                  $horarios[$cont]=$linha;
                  $cont++;
     }
     
     $resultBD = $mysql->sql_query("SELECT cod, cod2, nome, codDisciplina, perfil FROM materia WHERE ativo = 1 ORDER BY perfil");
    
       $cont = 0;
         while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
                  $lista[$linha['perfil']][$cont]=$linha;
                  $cont++;
        }
//    print_r($lista);exit();
    $listaBD = $mysql->sql_query("SELECT cod, nome FROM professor WHERE ativo = 1 ORDER BY nome");
        
    $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $listaProf[$cont]=$linha;
              $cont++;
    }
    
    
     $_SESSION['listaDeMaterias'] = $lista;  
     $_SESSION['listaDeProfessor'] = $listaProf;  
     $_SESSION['oferta'] = $oferta;   
     $_SESSION['horarios'] = $horarios;   
     $_SESSION['nHorarios'] = count($horarios);   
     $jSon = json_encode('1');
     echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
