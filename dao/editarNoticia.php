<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $id = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT id, texto, ativo FROM noticias WHERE id =".$id);
     $noticia = mysql_fetch_array($resultBD, MYSQL_ASSOC);

    
     $_SESSION['noticia'] = $noticia;   
     $jSon = json_encode('1');
     echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
