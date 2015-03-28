<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT `cod`, `pagPessoal`, `areaAtuacao`, `nome`, `ativo`, `foto` FROM `professor` WHERE cod =".$codigo);
     $prof = mysql_fetch_array($resultBD, MYSQL_ASSOC);
//     print_r($prof);exit();
     
     $resultBD = $mysql->sql_query("SELECT codAdm, codProf FROM professoradm WHERE codProf =".$codigo);
     $profXadm = mysql_fetch_array($resultBD, MYSQL_ASSOC);
       
//     print_r($profXadm);exit();
     
     $resultBD = $mysql->sql_query("SELECT `cod`, `user`, `senha` FROM `administrador` WHERE cod =".$profXadm['codAdm']);
     $adm = mysql_fetch_array($resultBD, MYSQL_ASSOC);
//     print_r($adm);exit();
     
      unset($_SESSION['resultadoBd']);
      unset($_SESSION['resultadoBd2']);
     $_SESSION['prof'] = $prof;   
     $_SESSION['profXadm'] = $profXadm;   
     $_SESSION['adm'] = $adm;   
     $jSon = json_encode('1');
     echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
