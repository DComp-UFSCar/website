<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addNucleo
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    $nome = $_POST["nomeNucleo"];
    try {
        $mysql->sql_query("INSERT INTO nucleo (nome) VALUES ('".$nome."')");
        header('location:../forms/remvNucleo.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>