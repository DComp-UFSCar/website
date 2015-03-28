<?php
    include("../conexaoBD/conexao.php");
    session_start();
    
    unset($_SESSION['disciplina']);
    unset($_SESSION['requisitos']);
    unset($_SESSION['ofertas']);
    unset($_SESSION['paginas']);
    
   $mysql = new conexao;
    try {
    
     $codigo = $_POST["cod"];     
     $resultBD = $mysql->sql_query("SELECT * FROM materia WHERE cod = ".$codigo);
     $materia = mysql_fetch_array($resultBD, MYSQL_ASSOC);
     
     $resultBD = $mysql->sql_query("SELECT * FROM prerequisito WHERE codMatPos = ".$codigo);
     
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $requisitos[$i] = $linha;
         $pre = $mysql->sql_query("SELECT cod2, codDisciplina, nome FROM materia WHERE cod = ".$requisitos[$i]['codMatPre']);
         $requisitos[$i]['disciplina'] = mysql_fetch_array($pre, MYSQL_ASSOC);
         $i++;
     }
     
     $resultBD = $mysql->sql_query("SELECT * FROM ofertamateria WHERE ativo = 1 AND codMat = ".$codigo);
     
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $ofertas[$i] = $linha;
         $resultBD2 = $mysql->sql_query("SELECT ofertahorario.codHorario, ofertahorario.codOferta, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$linha['cod']."' AND ofertahorario.codHorario = horario.cod");
         $cont = 0;
             while($linha2 = mysql_fetch_array($resultBD2, MYSQL_ASSOC)){
                      $ofertas[$i]['locais'][$cont ]= $linha2;
                      $cont++;
         }
         $prof = $mysql->sql_query("SELECT cod, nome, pagPessoal FROM professor WHERE ativo = 1 AND cod = ".$ofertas[$i]['codProf']);
         $ofertas[$i]['professor'] = mysql_fetch_array($prof, MYSQL_ASSOC);
         $i++;
     }
     $resultBD = $mysql->sql_query("SELECT * FROM paginamateria WHERE ativo = 1 AND codMat = ".$codigo." ORDER BY codPag DESC");
     
     $i=0;
     while($linha = mysql_fetch_array($resultBD, MYSQL_ASSOC)){
         $paginas[$i] = $linha;
         $pag = $mysql->sql_query("SELECT * FROM pagina WHERE cod = ".$paginas[$i]['codPag']);
         $paginas[$i] = mysql_fetch_array($pag, MYSQL_ASSOC);
         $i++;
     }
//     print_r($requisitos);
//     print_r($materia);
//     print_r($requisitos);
//     print_r($ofertas);
//     print_r($paginas);exit();
     $_SESSION['disciplina'] = $materia;   
     $_SESSION['requisitos'] = $requisitos;   
     $_SESSION['ofertas'] = $ofertas;   
     $_SESSION['paginas'] = $paginas;   
     $jSon = json_encode('1');
     echo $jSon;   
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
