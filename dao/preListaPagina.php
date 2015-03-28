<?php
function getColor($num) {
    srand($num);
    return array (rand(0, 255), rand(0, 255), rand( 0, 255));
}
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("select paginamateria.codMat, paginamateria.codPag, pagina.cod, pagina.pagina, pagina.titulo, materia.cod2
                                    FROM paginamateria, pagina, materia
                                    WHERE paginamateria.ativo = 1 AND  pagina.cod = paginamateria.codPag AND paginamateria.codMat = materia.cod
                                    ORDER BY paginamateria.codPag DESC");
    
   $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$linha['codMat']][$cont]=$linha;
              $cont++;
    }
    $_SESSION['tabelaListagem'] = '<div class="linhaForm corVerm"><b>Não existe P&aacuteginas cadastradas!</b></div>';   
    if(count($lista) > 0){
        //    print_r($lista);exit();
             $tabela = "";
            $tabela .= "<table class=\"tabelaListagen \">
                <tr>
                <th style=\"width: 330px;\">Titulo</th>
                <th>Código da Disciplina</th>
                <th style=\"width: 120px;\">Ação</th>
                </tr>";
            foreach ($lista as $paginas) {
                foreach ($paginas as $pagina) {
                    list($r,$g,$b) = getColor($pagina['codMat']);
                    $tabela .= "<tr id=\"".$pagina['cod']."\" style=\"background-color: rgba(".$r.", ".$g.", ".$b.", 0.25 ) !important;\">";
                        $tabela .= "<td>".$pagina['titulo']. "</td>";
                        $tabela .= "<td>".$pagina['cod2']. "</td>";
                        $tabela .= "<td> <image onclick='verPag(" .$pagina['cod']. ")' title=\"Ver Página\" class=\"acaoIco\" src=\"../images/verIcoMini.png\"/>  <image onclick='editPag(" .$pagina['cod']. ")' title=\"Editar Página\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removPag(" .$pagina['cod']. ")' title=\"Excluir Página\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
                    $tabela .= "</tr>";
                }
            }
            $tabela .= "</table>";
        //    print_r($tabela);exit();

        $_SESSION['tabelaListagem'] = $tabela;   
    }
    header('location:../views/visualizarPagina.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
