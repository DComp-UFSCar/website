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
    
         $listaBD = $mysql->sql_query("SELECT texto, ativo FROM noticias WHERE ativo = 1");
         $cont = 0;
         while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
                  $noticia[$cont]=$linha;
                  $noticia[$cont]['texto']=htmlDencodeSQL($noticia[$cont]['texto']);
                  $cont++;
        }
        $jSon = json_encode($noticia);
        echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
