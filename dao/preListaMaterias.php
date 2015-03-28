<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT cod, cod2 , codDisciplina, nome, perfil FROM materia WHERE ativo = 1 AND optativa = 0 ORDER BY perfil");
    
    $tabela = "";
    
    $cont = 0;
     while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$linha['perfil']][$cont]=$linha;
              $cont++;
    }
    
    
    $listaBD2 = $mysql->sql_query("SELECT cod, cod2, codDisciplina, nome, perfil FROM materia WHERE ativo = 1 AND optativa = 1 ORDER BY perfil");
    
    
    $cont = 0;
     while($linha = mysql_fetch_array($listaBD2, MYSQL_ASSOC)){
              $lista2[$cont]=$linha;
              $cont++;
    }
    $_SESSION['tabelaListagem'] = '<div class="linhaForm corVerm"><b>Não existe Disciplinas cadastradas!</b></div>';
    if(count($lista) > 0){
        $tabela .= "<table class=\"tabelaListagen\">
            <tr>
            <th style=\"width: 140px;\">Cod Disciplina</th>
            <th>Nome Disciplina</th>
            <th width='90px'>Ação</th>
            </tr>";
        foreach($lista as $key => $perfil){
            $tabela .= "<tr style=\"background-color: #ccff99;\">";
                $tabela .= "<td>Perfil ".$key."</td><td></td><td></td>";
            $tabela .= "</tr>";
            foreach ($perfil as $materia) {
                $tabela .= "<tr id=\"".$materia['cod']."\">";
                    $tabela .= "<td>".$materia['cod2']. "</td>";
                    $tabela .= "<td>".$materia['nome']. "</td>";
                    $tabela .= "<td> <image onclick='editMateria(" .$materia['cod']. ")' title=\"Editar Matéria\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removMateria(" .$materia['cod']. ")' title=\"Excluir Matéria\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
                $tabela .= "</tr>";
            }
        }
        $tabela .= "</table>";
        
       
        if(count($lista2) > 0){
            $tabela .= "<div class=\"linhaForm2\"><span><b>Disciplinas Optativas :</b></span></div>";
            $tabela .= "<table class=\"tabelaListagen\">
                        <tr>
                        <th style=\"width: 140px;\">Cod Disciplina</th>
                        <th>Nome Disciplina</th>
                        <th width='90px'>A&ccedil&atildeo</th>
                        </tr>";
            foreach ($lista2 as $materia) {
                $tabela .= "<tr id=\"".$materia['cod']."\">";
                    $tabela .= "<td>".$materia['cod2']. "</td>";
                    $tabela .= "<td>".$materia['nome']. "</td>";
                    $tabela .= "<td> <image onclick='editMateria(" .$materia['cod']. ")' title=\"Editar Mat�ria\" class=\"acaoIco\" src=\"../images/editIco.png\"/> <image onclick='removMateria(" .$materia['cod']. ")' title=\"Excluir Mat�ria\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
                $tabela .= "</tr>";
            }
            $tabela .= "</table>";
        }else{
             $tabela .= "<div class=\"linhaForm2 corVerm\"><b>N�o existe Disciplinas Optativas cadastradas!</b></div>";
        }
        $_SESSION['tabelaListagem'] = $tabela; 
        
    }
    
    header('location:../views/visualizarMaterias.php');
    
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>