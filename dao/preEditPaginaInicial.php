<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT texto FROM paginicial");
     $pag = mysql_fetch_array($resultBD, MYSQL_ASSOC);
//    print_r($lista);exit();

    
     $_SESSION['pagina'] = $pag;   
//     print_r($pag);exit();
     header('location:../forms/editarPaginaInicial.php');    
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
