<?php

	function get_post_action($name){
	    $params = func_get_args();

	    foreach ($params as $name) {
	        if (isset($_POST[$name])) {
	            return $name;
	        }
	    }
	}

	switch (get_post_action('selecionar', 'excluir')) {
	    case 'selecionar':
	        header("Location: profConfig.php");
	        break;

	    case 'excluir':
	        header("Location: new-dao/excluirProf.php");
	        break;
	}
?>