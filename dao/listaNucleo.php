<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
     $listaBD = $mysql->sql_query("SELECT * FROM  nucleo WHERE ativo = 1 ORDER BY nome");
     
       
    $lista = Array();
   $i = 0;
     while($linha = mysql_fetch_array($listaBD)){
          if ($linha['ativo'] == 1){
              $lista[$i]['nome']=$linha['nome'];
              $lista[$i]['cod']=$linha['cod'];
              $i++;
          }
    }
    $jSon = json_encode($lista);
    echo $jSon;

     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
