<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT a.cod, a.pagina, a.titulo, b.codMat
                                        FROM pagina AS a, paginamateria AS b
                                        WHERE a.cod =".$codigo."
                                        AND a.cod = b.codPag");
     $pag = mysql_fetch_array($resultBD, MYSQL_ASSOC);
     $resultBD = $mysql->sql_query("SELECT cod, codDisciplina, perfil FROM materia WHERE ativo = 1 ORDER BY perfil");
    
       $cont = 0;
         while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
                  $lista[$linha['perfil']][$cont]=$linha;
                  $cont++;
        }
//    print_r($lista);exit();

    
     $_SESSION['listaDeMaterias'] = $lista;  
//     print_r($lista);
     $_SESSION['pagina'] = $pag;   
//     print_r($pag);exit();
     $jSon = json_encode('1');
     echo $jSon;
         
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
