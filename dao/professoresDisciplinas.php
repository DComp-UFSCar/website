<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    
   $mysql = new conexao;
    try {
    
     $resultBD = $mysql->sql_query("SELECT * FROM professor WHERE ativo = 1 ORDER BY nome");
     
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $prof[$i] = $linha;
         $oferta = $mysql->sql_query("SELECT cod, codMat, turma, ano, semestre FROM ofertamateria WHERE codProf = ".$prof[$i]['cod']);
         $j=0;
         while($linhaoferta = mysql_fetch_array($oferta, MYSQL_ASSOC)){
             $mat = $mysql->sql_query("SELECT nome, cod FROM materia WHERE cod = ".$linhaoferta['codMat']);
             $prof[$i]['oferta'][$j]  = $linhaoferta;
             $prof[$i]['oferta'][$j]['disciplina']  = mysql_fetch_array($mat, MYSQL_ASSOC);
             $resultBD2 = $mysql->sql_query("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$linhaoferta['cod']."' AND ofertahorario.codHorario = horario.cod");
             $cont = 0;
             while($linha2 = mysql_fetch_array($resultBD2, MYSQL_ASSOC)){
                      $prof[$i]['oferta'][$j]['locais'][$cont ]= $linha2;
                      $cont++;
             }
             $j++;
         }
         $i++;
     }
    //print_r($prof);exit();
     $jSon = json_encode($prof);
     echo $jSon;   
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
