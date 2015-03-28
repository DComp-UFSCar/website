<meta charset="utf-8">
<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT cod, nome FROM professor WHERE ativo = 1 ORDER BY nome");
    
    $tabela = "";
    $tabela .= "<table class=\"tabelaListagen profTabela\">
        <tr>
        <th>Nome</th>
        <th style=\"width: 90px;\">A&ccedil&atildeo</th>
        </tr>";
    
    $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$cont]=$linha;
              $cont++;
    }
    $_SESSION['tabelaListagem'] = '<div class="linhaForm corVerm"><b>Não existe Professores cadastrados!</b></div>';   
    if(count($lista) > 0){
        foreach ($lista as $prof) {
            $tabela .= "<tr id=\"".$prof['cod']."\">";
                $tabela .= "<td>".$prof['nome']. "</td>";
                $tabela .= "<td> <image onclick='editProf(" .$prof['cod']. ")' title=\"Editar Professor\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removProf(" .$prof['cod']. ")' title=\"Excluir Professor\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
            $tabela .= "</tr>";
        }
        $tabela .= "</table>";

        $_SESSION['tabelaListagem'] = $tabela;   
    }
    header('location:../views/visualizarProf.php');
    
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
