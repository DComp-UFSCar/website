<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addProf
    
    
    $mysql = new conexao;
    
    $id = $_POST["cod"];
    try {
        $mysql->sql_query("DELETE FROM noticias WHERE id = '".$id."'");
         $jSon = json_encode('1');
        echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
