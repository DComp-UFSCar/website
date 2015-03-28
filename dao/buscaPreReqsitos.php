<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
     $listaBD = $mysql->sql_query("SELECT * FROM  prerequisito  WHERE ativo = 1 AND obrigatorio = 1");
     
       
    $lista = Array();
    $i = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$i]=$linha;
              $i++;
    }
    $jSon = json_encode($lista);
    echo $jSon;

     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
