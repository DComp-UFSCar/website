<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $mysql->sql_query("UPDATE nucleo SET ativo = 0 WHERE cod = ".$codigo);
     $jSon = json_encode('1');
    echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
