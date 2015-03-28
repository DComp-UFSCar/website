<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT * FROM materia WHERE cod = ".$codigo);
     $materia = mysql_fetch_array($resultBD, MYSQL_ASSOC);
     
     $resultBD = $mysql->sql_query("SELECT * FROM prerequisito WHERE codMatPos = ".$codigo);
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $requisitos[$i] = $linha;
         $i++;
     }
//     print_r($requisitos);exit();
     $_SESSION['resultadoBd'] = $materia;   
     $_SESSION['resultadoBd2'] = $requisitos;   
     $jSon = json_encode('1');
     echo $jSon;   
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
