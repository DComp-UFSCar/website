<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addProf
    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    
    $cod = $_POST["cod"];
    try {
        $mysql->sql_query("DELETE FROM paginamateria WHERE codPag = '".$cod."'");
        $mysql->sql_query("DELETE FROM pagina WHERE cod = '".$cod."'");
         $jSon = json_encode('1');
        echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
