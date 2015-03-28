<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
     $listaBD = $mysql->sql_query("SELECT cod, cod2, nome, codDisciplina, perfil, codNucleo FROM materia WHERE ativo = 1 and optativa = 0 ORDER BY perfil");
        

   $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$linha['perfil']][$cont]=$linha;
              $cont++;
    }
//    print_r($lista);exit();
    $jSon = json_encode($lista);
    echo $jSon;

     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
