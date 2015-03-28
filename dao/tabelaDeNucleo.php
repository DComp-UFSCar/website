<?php
    include("../conexaoBD/conexao.php");
    session_start();
    $mysql = new conexao;
    try {
    $listaBD = $mysql->sql_query("SELECT * FROM  nucleo WHERE ativo = 1 ORDER BY nome");
     
    $cont = 0;
    while($linha = mysql_fetch_array($listaBD, MYSQL_ASSOC)){
              $lista[$cont]=$linha;
              $cont++;
    }
    if(count($lista) > 0){
        echo "<table class='tabela'>
            <tr>
            <th>Núcleos</th>
            <th width='90px'>Ação</th>
            </tr>";

        foreach ($lista as $linha){
              if ($linha['ativo'] == 1){
                  echo "<tr id=\"".$linha['cod']."\">";
                  echo "<td>" .$linha['nome']. "</td>";
                  echo "<td><image onclick='editNucleo(" .$linha['cod']. ")' title=\"Editar Núcleo\" class=\"acaoIco\" src=\"../images/editIco.png\"/>  <image onclick=\"removNucleo(" .$linha['cod']. ")\" title=\"Excluir Núcleo\" class=\"acaoIco\" src=\"../images/lixeiraIco.png\"/> </td>";
                  echo "</tr>";
              }
        }
        echo "</table>";
    }else{
        echo '<div class="linhaForm corVerm"><b>N&atildeo existe N&uacutecleos cadastradas!</b></div>';
    }   

     
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
