  <?php 

  $nome = $db->quote($_POST['prof']);
  $usuario = $db->selectOne("SELECT codUsuario FROM professor WHERE nome = ".$nome);

  $result = $db->query("DELETE FROM professor WHERE nome = ".$nome);
  $resultUser = $db->query("DELETE FROM controle WHERE id = ".$usuario['codUsuario']);

  if ($result == 1 && $resultUser == 1){
    $_SESSION['excluido'] = 1;
  }else{
     echo "<script>alert('erro sql')</script>";
  } 

?>
