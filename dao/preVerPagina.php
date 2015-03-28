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
    $cod = $_POST['cod'];
    
    $listaBD = $mysql->sql_query("select cod, pagina, titulo FROM pagina WHERE cod = '".$cod."'");
    
    $linha = mysql_fetch_array($listaBD, MYSQL_ASSOC);
    
    $linha['pagina'] =  htmlDencodeSQL($linha['pagina']);
//    print_r($linha);exit();
    $_SESSION['pagina'] = $linha;   
     $jSon = json_encode('1');
     echo $jSon;
     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
