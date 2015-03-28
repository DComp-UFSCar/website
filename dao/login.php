<?php
    include("../conexaoBD/conexao.php");
    session_unset();
    session_start();
    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    $nome = $_POST["user"];
    $senha = md5($_POST["senha"]);
    
    $lista = $mysql->sql_query("select * from administrador AS ad WHERE ad.user = '".$nome."'");
    $resultado = arruma_array($lista);
    
    if($resultado["user"] == $nome ){
        if($resultado["senha"] == $senha){
            $_SESSION['user'] = $nome;
            $_SESSION['senha'] = $senha; 
            $_SESSION['codAdm'] = $resultado["cod"]; 
            $_SESSION['menuAtivo'] = 0;
            if($resultado["geral"] == 1){
                $_SESSION['geral'] = 1;
                header('location:../admin.php');
            }else{
                $_SESSION['prof'] = 1; 
                $_SESSION['geral'] = 0;
                $lista2 = $mysql->sql_query("select codProf from professoradm AS ad WHERE ad.codAdm = '".$_SESSION['codAdm']."'");
                $resultado2 = mysql_fetch_array($lista2, MYSQL_ASSOC);
                $_SESSION['cod'] = $resultado2['codProf']; 
                header('location:../profAdm.php');
            }
             //sucesso
        }else{
            unset ($_SESSION['user']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['prof']);
            header('location:../index.php');
            //senha invalida
        }
    }else{
        unset ($_SESSION['user']);
	unset ($_SESSION['senha']);
        unset ($_SESSION['prof']);
	header('location:../index.php');
        //Usuario nao encontrado
    }
    //print_r($resultado);
?>
