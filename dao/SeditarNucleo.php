<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addProf
    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    
    $cod =  $_SESSION['nucleo']['cod'];
    $nome = $_POST["nomeNucleo"];
    try {
//       capitura id do ultimo elemento inserido no BD
        $mysql->sql_query("UPDATE nucleo SET nome='".$nome."' WHERE cod = '".$cod."'");
        header('location:../forms/remvNucleo.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
