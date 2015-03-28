<?php

  function htmlDencodeSQL($paginaHtml){
        $aspasSimpl = "'";
        $newAspas = '##';
        $resp = str_replace($newAspas, $aspasSimpl, $paginaHtml);
        return $resp;
    }

    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    
    $listaBD = $mysql->sql_query("select texto FROM paginicial WHERE 1");
    
    $linha = mysql_fetch_array($listaBD, MYSQL_ASSOC);
    
    $linha =  htmlDencodeSQL($linha['texto']);
//    print_r($linha);exit();
     $jSon = json_encode($linha);
     echo $jSon;
     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
