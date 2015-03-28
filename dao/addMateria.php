<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addMateria
    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    
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
        $codMatAdd = $mysql->sql_insert("INSERT INTO materia (cod2, codDisciplina, optativa, nome, perfil, nCreditoTeorico, objetivo, ementa, nCreditopratico, codNucleo) 
                            VALUES ('".$cod2."','".$codDisciplina."','".$optativa."','".$nome."','".$perfil."','".$nCeditoTeorico."','".$objetivo."','".$ementa."','".$nCeditoPratico."','".$codNucleo."')");
        if(isset($preRequisitoForte)){
            foreach ($preRequisitoForte as $codMatPre) {
                $mysql->sql_query("INSERT INTO prerequisito (codMatPos, codMatPre, obrigatorio) 
                                    VALUES ('".$codMatAdd."','".$codMatPre."','1')");
            }
        }
        if(isset($preRequisitoFraco)){
            foreach ($preRequisitoFraco as $codMatPre) {
                $mysql->sql_query("INSERT INTO prerequisito (codMatPos, codMatPre, obrigatorio) 
                                    VALUES ('".$codMatAdd."','".$codMatPre."','0')");
            }
        }
        header('location:../dao/preListaMaterias.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../erro.php');
    } 
    
    
    
?>
