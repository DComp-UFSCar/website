<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    try{
    
        $menuAtivar = $_POST["menu"];
        $_SESSION['menuAtivo'] = $menuAtivar;
        
        $jSon = json_encode('1');
        echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
