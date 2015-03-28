<?php
    include("../conexaoBD/conexao.php");
    session_start();

    function htmlEncodeSQL($paginaHtml){
        $aspasSimpl = "'";
        $newAspas = '##';
        $resp = str_replace($aspasSimpl, $newAspas, $paginaHtml);
        return $resp;
    }
    
    $mysql = new conexao;
    $noticia = htmlEncodeSQL($_POST["noticia"]);
    
    try {
        $mysql->sql_query("INSERT INTO noticias (texto, ativo) VALUES ('".$noticia."','1')");
            header('location:../dao/preListaNoticia.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
