<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT `cod`, `nome` FROM `nucleo` WHERE cod =".$codigo);
     $nucleo = mysql_fetch_array($resultBD, MYSQL_ASSOC);
     $_SESSION['nucleo'] = $nucleo;   
     $jSon = json_encode('1');
     echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
