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
        $bdselect = $mysql->sql_query("SELECT codAdm FROM professoradm WHERE codProf = '".$cod."'");
         $codAdm = mysql_fetch_array($bdselect, MYSQL_ASSOC);
         $codAdm = $codAdm['codAdm'];
        $mysql->sql_query("DELETE FROM ofertamateria WHERE codProf =".$cod."");
        $mysql->sql_query("DELETE FROM professoradm WHERE codProf = ".$cod."");
        $mysql->sql_query("DELETE FROM administrador WHERE cod= ".$codAdm."");
        $mysql->sql_query("DELETE FROM professor WHERE cod = ".$cod."");
         $jSon = json_encode('1');
        echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
