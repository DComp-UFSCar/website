<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    
    $cod = $_POST["cod"];

    $mysql->sql_query("DELETE FROM prerequisito WHERE codMatPos = ".$cod);
    
    $cod2 = $_POST["cod2"];
    $codDisciplina = $_POST["codDiscplina"];
    $optativa = $_POST["optativa"];
    $nome = $_POST["nome"];
    $perfil = $_POST["perfil"];
    $ementa = $_POST["ementa"];
    $objetivo = $_POST["objetivo"];
    $nCeditoPratico = $_POST["nCreditoPratico"];
    $nCeditoTeorico = $_POST["nCreditoTeorico"];
    $codNucleo = $_POST["nucleoDisc"];
    
    $preRequisitoForte = $_POST["preRequisito"];
    $preRequisitoFraco = $_POST["preRequisitoF"];
    try {
//       capitura id do ultimo elemento inserido no BD
        $mysql->sql_query("UPDATE materia SET cod2 = '".$cod2."' , codDisciplina = '".$codDisciplina."' , optativa  = '".$optativa."' , nome = '".$nome."', perfil = '".$perfil."', nCreditoTeorico = '".$nCeditoTeorico."', objetivo = '".$objetivo."', ementa = '".$ementa."', nCreditopratico = '".$nCeditoPratico."', codNucleo = '".$codNucleo."' WHERE cod ='".$cod."'");
        if(isset($preRequisitoForte)){
            foreach ($preRequisitoForte as $codMatPre) {
                $mysql->sql_query("INSERT INTO prerequisito (codMatPos, codMatPre, obrigatorio) 
                                    VALUES ('".$cod."','".$codMatPre."','1')");
            }
        }
        if(isset($preRequisitoFraco)){
            foreach ($preRequisitoFraco as $codMatPre) {
                $mysql->sql_query("INSERT INTO prerequisito (codMatPos, codMatPre, obrigatorio) 
                                    VALUES ('".$cod."','".$codMatPre."','0')");
            }
        }
        header('location:../dao/preListaMaterias.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
