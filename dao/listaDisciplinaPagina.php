<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    
   $mysql = new conexao;
    try {
    
     $resultBD = $mysql->sql_query("SELECT * FROM paginamateria WHERE ativo = 1 GROUP BY codMat");
     
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $materiaPag[$i] = $linha;
         $mat = $mysql->sql_query("SELECT cod, cod2, codDisciplina, nome FROM materia WHERE cod = ".$materiaPag[$i]['codMat']);
         $materiaPag[$i]['disciplina'] = mysql_fetch_array($mat, MYSQL_ASSOC);
         $pagMat = $mysql->sql_query("SELECT * FROM paginamateria WHERE ativo = 1 AND codMat = ".$materiaPag[$i]['codMat']." ORDER BY codPag DESC");
         $j=0;
         while($linhaPag = mysql_fetch_array($pagMat, MYSQL_ASSOC)){
             $pag = $mysql->sql_query("SELECT * FROM pagina WHERE cod = ".$linhaPag['codPag']);
             $materiaPag[$i]['pagina'][$j]  = mysql_fetch_array($pag, MYSQL_ASSOC);
             $j++;
         }
         $i++;
     }
//     print_r($materiaPag);exit();
     $jSon = json_encode($materiaPag);
     echo $jSon;   
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
