<script>
    var local = '<?php echo $_SERVER['SERVER_NAME'];?>';
      function logoff(){
      location.href= 'http://'+local+"/pedagogico/logoff.php";
  }
 function pagInicial(){
      location.href= 'http://'+local+"/pedagogico/index.php";
  }
</script>
<header>
    <div id="logoImg" onclick="pagInicial();"></div>
        <div id="adminBotao" onclick="logoff();"></div>
        <span id="ola">Bem Vindo <b><span id="user">
        <?php 
            echo"$logado";
        ?>
        </b></span>
</header>
