    <div id = "login">
      <?php 
      	if (isset($_SESSION['ativo']) && $_SESSION['ativo'] == 1){
      		echo "Bem Vindo ";
        	echo $_SESSION['user'];	
          echo "<a href = 'aux-files/logout.php'> Logout </a>";
      	}else{
      ?>
      <form  action = "settings/controle.php" method = "post">
        <input type = "text" size = "10" placeholder = "Usuario" name = "user">
        <input type = "password" size = "10" placeholder = "senha" name ="pass">
        <input type = "submit" value = "Logar">
      </form>
      <?php } ?> 
    </div>