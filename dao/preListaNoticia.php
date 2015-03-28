<?php
 function htmlDencodeSQL($paginaHtml){
        $aspasSimpl = "'";
        $newAspas = '##';
        $resp = str_replace($newAspas, $aspasSimpl, $paginaHtml);
        return $resp;
}
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT id, texto, ativo FROM noticias WHERE ativo = 1");
    
   $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$cont]=$linha;
              $cont++;
    }
    $_SESSION['tabelaListagem'] = '<div class="linhaForm corVerm"><b>Não existe Notícias cadastradas!</b></div>';   
    
    if(count($lista) > 0){
        //    print_r($lista);exit();
             $tabela = "";
            $tabela .= "<table class=\"tabelaListagen \">
                <tr>
                <th>Notícias</th>
                <th style=\"width: 90px;\">Ação</th>
                </tr>";
            foreach ($lista as $noticia) {
                    $tabela .= "<tr id=\"".$noticia['id']."\" \">";
                        $tabela .= "<td>".htmlDencodeSQL($noticia['texto']). "</td>";
                        $tabela .= "<td> <image onclick='editNot(" .$noticia['id']. ")' title=\"Editar Notícia\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removNot(" .$noticia['id']. ")' title=\"Excluir Notícia\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
                    $tabela .= "</tr>";
            }
            $tabela .= "</table>";
        //    print_r($tabela);exit();

        $_SESSION['tabelaListagem'] = $tabela;   
    }
    header('location:../views/visualizarNoticias.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
