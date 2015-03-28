<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
     function htmlDencodeSQL($paginaHtml){
        $aspasSimpl = "'";
        $newAspas = '##';
        $resp = str_replace($newAspas, $aspasSimpl, $paginaHtml);
        return $resp;
    }
    
    $mysql = new conexao;
    try {
     $listaBD = $mysql->sql_query("SELECT * FROM  pagina ORDER BY rand() LIMIT 10");
     
       
    $lista = Array();
    $paginasCod = Array();
    $i = 0;
     while($linha = mysql_fetch_array($listaBD)){
              $lista[$i]=$linha;
              $lista[$i]['pagina'] = htmlDencodeSQL($lista[$i]['pagina']);
              $i++;
    }
    $cont = 0;
    foreach($lista as $pagina){
        $paginasCod[$cont]['numero'] = $cont;
        $paginasCod[$cont]['cod'] = $pagina['cod'];
        $paginasCod[$cont]['titulo'] = $pagina['titulo'];
        $nomePagina= "../temp/pag".$cont.".html";
        $texto = $pagina['pagina'];
        $fp = fopen($nomePagina , "w");
        $fw = fwrite($fp, $texto);
        $cont++;
    }
    $jSon = json_encode($paginasCod);
    echo $jSon;

     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
