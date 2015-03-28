<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT cod, cod2, nome, codDisciplina, perfil FROM materia WHERE ativo = 1 ORDER BY perfil");
    
   $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
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
    header('location:../forms/addOferta.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
