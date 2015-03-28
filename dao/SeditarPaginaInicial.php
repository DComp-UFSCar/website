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
    $pagina = htmlEncodeSQL($_POST["pagina"]);
    
    try {
        $mysql->sql_query("UPDATE paginicial SET texto = '".$pagina."' WHERE 1");
        if ($_SESSION['geral'] == 1){
            header('location:../admin.php');
        }else{
            header('location:../profAdm.php');
        }
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
