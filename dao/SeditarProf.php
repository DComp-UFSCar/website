<?php
    include("../conexaoBD/conexao.php");
    session_start();
//    addProf
//largura padrao
 $w = 200;
 //altura padrao
 $h = 260;    
    function arruma_array($lista){
        $linha = mysql_fetch_array($lista, MYSQL_ASSOC);
        return $linha;
    }
    
    $mysql = new conexao;
    
    $cod = $_POST["cod"];
    $nome = $_POST["nome"];
    $user = $_POST["usuario"];
    $pagPessoal = $_POST["pagPessoal"];
    $areaAtua = $_POST["areaAtua"];
    $senha = md5($_POST["senhaNova"]);
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
            $nomeFinal = $_SESSION['prof']['foto'];
        }
//       capitura id do ultimo elemento inserido no BD
        $mysql->sql_query("UPDATE professor SET pagPessoal='".$pagPessoal."', areaAtuacao='".$areaAtua."', nome='".$nome."', foto='".$nomeFinal."' WHERE cod = '".$cod."'");
        $mysql->sql_query("UPDATE administrador SET user='".$user."', senha='".$senha."' WHERE cod='". $_SESSION['profXadm']['codAdm']."'");
        if ($_SESSION['geral'] == 1){
            header('location:../dao/preListaProf.php');
        }else{
            header('location:../index.php');
        }
    } catch (Exception $e) {
      echo "Erro encontrato: ",  $e->getMessage(), "\n";
      header('location:../index.php');
    } 
    
    
    
?>
