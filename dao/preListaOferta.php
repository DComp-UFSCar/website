<?php
function getColor($num) {
    srand($num);
    return array (rand(0, 255), rand(0, 255), rand( 0, 255));
}
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT ofertamateria.cod, ofertamateria.codProf, ofertamateria.codMat, ofertamateria.turma, ofertamateria.ano, ofertamateria.semestre, materia.cod2, materia.nome as nomeDisc, professor.nome  "
            . "FROM ofertamateria, materia, professor "
            . "WHERE ofertamateria.ativo = 1 AND  materia.cod = ofertamateria.codMat AND professor.cod = ofertamateria.codProf ORDER BY codProf");
    
    $tabela = "";
    $tabela .= "<table class=\"tabelaListagen ofertas\">
        <tr>
        <th>Disciplina</th>
        <th>Professor</th>
        <th>Local</th>
        <th>Dia</th>
        <th>Horários</th>
        <th>Turma</th>
        <th>Ano-Semestre</th>
        <th style=\"width: 90px;\">Ação</th>
        </tr>";
    
    $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $cont2 = 0;
              $lista[$cont]=$linha;
              $lista2BD = $mysql->sql_query("SELECT ofertahorario.codOferta, ofertahorario.codHorario, horario.dia, horario.inicio, horario.fim, horario.local FROM ofertahorario, horario WHERE ofertahorario.codOferta = '".$linha['cod']."' AND ofertahorario.codHorario = horario.cod");
              while($linha2 = mysql_fetch_array($lista2BD, MYSQL_ASSOC)){
                  $lista[$cont]['local'][$cont2] = $linha2;
                  $cont2++;
              }
              $cont++;
    }
    $_SESSION['tabelaListagem'] = '<div class="linhaForm corVerm"><b>Não existe Ofertas cadastradas!</b></div>';
    if(count($lista) > 0){
        foreach ($lista as $oferta) {
            list($r,$g,$b) = getColor($oferta['codProf']);
            $tabela .= "<tr style=\"background-color: rgba(".$r.", ".$g.", ".$b.", 0.25 ) !important;\">";
                $tabela .= "<td>".$oferta['cod2'].' - '.$oferta['nomeDisc']."</td>";
                $tabela .= "<td>".$oferta['nome']. "</td>";
                $tabela .= "<td>";
                if(isset($oferta['local'])){
                    foreach($oferta['local'] as $local){
                        $tabela .= $local['local']."<br>";
                    }
                    $tabela .= "</td>";
                    $tabela .= "<td>";
                    foreach($oferta['local'] as $local){
                        $tabela .= $local['dia']."<br>";
                    }
                    $tabela .= "</td>";
                    $tabela .= "<td>";
                    foreach($oferta['local'] as $local){
                        $tabela .= $local['inicio'].' às '.$local['fim']."<br>";
                    }
                    $tabela .= "</td>";
                }else{
                    $tabela .= "<td></td><td></td>";
                }
                $tabela .= "<td>".$oferta['turma']. "</td>";
                $tabela .= "<td>".$oferta['ano']."-".$oferta['semestre']."</td>";
                $tabela .= "<td> <image onclick='editOferta(".$oferta['codMat'].",".$oferta['codProf'].")' title=\"Editar Oferta\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removOferta(".$oferta['cod'].")' title=\"Excluir Oferta\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
            $tabela .= "</tr>";
        }
        $tabela .= "</table>";
        $_SESSION['tabelaListagem'] = $tabela;   
    }
    header('location:../views/visualizarOferta.php');
    
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>