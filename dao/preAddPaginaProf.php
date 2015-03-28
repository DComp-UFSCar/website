<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT b.codProf, b.codMat, a.cod, a.cod2,a.nome, a.codDisciplina, a.perfil
            FROM ofertamateria as b , materia as a
            WHERE b.codProf = ".$_SESSION['cod']." AND a.cod = b.codMat AND a.ativo = 1 ORDER BY a.perfil");
    
     $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$linha['perfil']][$cont]=$linha;
              $cont++;
    }
//    print_r($lista);exit();

    
    $_SESSION['listaDeMaterias'] = $lista;   
    header('location:../forms/addPaginaProf.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
