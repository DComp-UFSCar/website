<?php
    include("../conexaoBD/conexao.php");
    session_start();
    function htmlEncodeSQL($noticiaHtml){
        $aspasSimpl = "'";
        $newAspas = '##';
        $resp = str_replace($aspasSimpl, $newAspas, $noticiaHtml);
        return $resp;
    }

    $mysql = new conexao;
    $noticia = htmlEncodeSQL($_POST["noticia"]);
    
    try {
        $mysql->sql_query("UPDATE noticias SET texto = '".$noticia."' WHERE id = '".$_SESSION['noticia']['id']."'");
            header('location:../dao/preListaNoticia.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
