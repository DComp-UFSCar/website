<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addNucleo
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    $codMat = $_POST["codMat"];
    $codProf = $_POST["codProf"];
    if($_SESSION['nHorarios'] > 0){
        foreach($_SESSION['horarios'] as $key => $horario){
            $mysql->sql_query("DELETE FROM ofertahorario WHERE codOferta = '".$horario['codOferta']."'");
            $mysql->sql_query("DELETE FROM horario WHERE cod = '".$horario['codHorario']."'");
        }
    }
    $mysql->sql_query("DELETE FROM ofertamateria WHERE codProf = '".$_SESSION['oferta']['codProf']."' AND codMat='".$_SESSION['oferta']['codMat']."'");
    $locais = $_POST["local"];
    $dias = $_POST["dia"];
    $horariosIni = $_POST["horarioIni"];
    $horariosFim = $_POST["horarioFim"];
    $turma = $_POST["turma"];
    $ano = $_POST["ano"];
    $semestre = $_POST["semestre"];
    $resultBD = $mysql->sql_query("SELECT * FROM  `ofertamateria` WHERE ativo = 1 AND codProf = '".$codProf."' AND codMat='".$codMat."'");
    $oferta = mysql_fetch_array($resultBD, MYSQL_ASSOC);
    try {
        if(count($oferta) > 1){
            $_SESSION['elemtentoEncontrado'] = 1;
            if ($_SESSION['geral'] == 1){
                header('location:../dao/preListaOferta.php');
            }else{
                header('location:../dao/preListaOfertaProf.php');
            }
        }else{
            $_SESSION['elemtentoEncontrado'] = 0;
            $codOferta = $mysql->sql_insert("INSERT INTO `ofertamateria` (`codProf`, `codMat`, `turma`, `ano`, `semestre`) VALUES ('".$codProf."','".$codMat."','".$turma."','".$ano."','".$semestre."')");
            if(isset($locais)){
                foreach ($locais as $key => $local) {
                    $codHorario = $mysql->sql_insert("INSERT INTO horario (dia, inicio, fim, local) 
                                        VALUES ('".$dias[$key]."','".$horariosIni[$key]."','".$horariosFim[$key]."','".$local."')");
                    $mysql->sql_query("INSERT INTO ofertahorario (codHorario, codOferta) values ('".$codHorario."','".$codOferta."')");
                }
            }
            if($_SESSION['geral'] == 1){
              header('location:../dao/preListaOferta.php');
            }else{
              header('location:../dao/preListaOfertaProf.php');
            }
        }
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
