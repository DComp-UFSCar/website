<?php
    include("../conexaoBD/conexao.php");
//largura padrao
 $w = 200;
 //altura padrao
 $h = 260;
 
    session_start();
//    addProf
    
    
    $mysql = new conexao;
    
    $nome = $_POST["nome"];
    $user = $_POST["usuario"];
    $pagPessoal = $_POST["pagPessoal"];
    $areaAtua = $_POST["areaAtua"];
    $senha = md5($_POST["senha"]);
    $nome_temporario=$_FILES["Arquivo"]['tmp_name']; 
    $nome_real = $_FILES["Arquivo"]["name"]; 
//    print_r($_FILES);exit();
    try {
        if($_FILES["Arquivo"]["error"] == 0){
    //        cria uma imagem 3x4 (200x260) da imagem que foi feita upload
            $imageOrignal = imagecreatefromstring(file_get_contents($nome_temporario));
            $temp = imagecreatetruecolor($w, $h);
            $size = getimagesize($nome_temporario);
            imagecopyresampled($temp, $imageOrignal, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);
            imagepng($temp, $user.$nome_real);
            $nomeFinal = $user.$nome_real;
            imagedestroy($imageOrignal);
            copy($nomeFinal,"../profFoto/$nomeFinal"); 
            unlink($nomeFinal);
        }else{
            $nomeFinal = 0;
        }
//       capitura id do ultimo elemento inserido no BD
        $codProf = $mysql->sql_insert("INSERT INTO professor (nome, areaAtuacao, pagPessoal, foto) 
                            VALUES ('".$nome."','".$areaAtua."','".$pagPessoal."','".$nomeFinal."')");
        $codAdm = $mysql->sql_insert("INSERT INTO administrador (user, senha) 
                            VALUES ('".$user."','".$senha."')");
        $mysql->sql_query("INSERT INTO professoradm (codAdm, codProf) 
                            VALUES ('".$codAdm."','".$codProf."')");
        header('location:../dao/preListaProf.php');
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>