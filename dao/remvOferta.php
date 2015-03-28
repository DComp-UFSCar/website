<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    
    $mysql = new conexao;
    
    $cod = $_POST["cod"];
    try {
            $resultBD = $mysql->sql_query("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$cod."' AND ofertahorario.codHorario = horario.cod");
            $cont = 0;
                 while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
                          $horarios[$cont]=$linha;
                          $cont++;
            }
            if(count($horarios) > 0){
            foreach($horarios as $key => $horario){
                    $mysql->sql_query("DELETE FROM ofertahorario WHERE codOferta = '".$horario['codOferta']."'");
                    $mysql->sql_query("DELETE FROM horario WHERE cod = '".$horario['codHorario']."'");
                }
            }
            $mysql->sql_query("DELETE FROM `ofertamateria` WHERE cod = '".$cod."'");
            $jSon = json_encode('1');
            echo $jSon;
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
