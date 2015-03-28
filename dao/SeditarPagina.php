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
    $codDisciplina = $_POST["codMat"];
    $pagina = htmlEncodeSQL($_POST["pagina"]);
//    print_r($pagina);exit();
    $titulo = $_POST["titulo"];
    
    try {
        $mysql->sql_query("UPDATE pagina SET pagina = '".$pagina."', titulo = '".$titulo."' WHERE cod = '".$_SESSION['pagina']['cod']."'");
//        $mysql->sql_query("INSERT INTO paginamateria (codPag, codMat, ativo) VALUES ('".$codPag."','".$codDisciplina."','1')");
        if ($_SESSION['geral'] == 1){
            header('location:../dao/preListaPagina.php');
        }else{
            header('location:../dao/preListaPaginaProf.php');
        }
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
