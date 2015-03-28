<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    
    $mysql = new conexao;
    
    $codMat = $_POST["codMat"];
    
    $listaBD = $mysql->sql_query("select codMat, codPag FROM paginamateria WHERE paginamateria.ativo = 1 AND  paginamateria.codMat = '".$codMat."'");
    
    $cont = 0;
    while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $listaPagMat[$cont]=$linha;
              $cont++;
    }
    try {
         $mysql->sql_query("DELETE FROM paginamateria WHERE codMat = '".$codMat."'");
         if(count($listaPagMat) > 0){
             foreach ($listaPagMat as $pagina) {
                 $mysql->sql_query("DELETE FROM pagina WHERE cod = '".$pagina['codPag']."'");
             }
         }
         $mysql->sql_query("DELETE FROM ofertamateria WHERE codMat = '".$codMat."'");
         $mysql->sql_query("DELETE FROM prerequisito WHERE codMatPos = '".$codMat."'");
         $mysql->sql_query("DELETE FROM prerequisito WHERE codMatPre = '".$codMat."'");
         $mysql->sql_query("DELETE FROM materia WHERE cod = '".$codMat."'");
         $jSon = json_encode('1');
        echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
