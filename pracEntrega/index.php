<?php
	session_start();
	if (isset($_SESSION["user"])) {
		include 'pantalla_listado.php';
	}else{
		include 'pantalla_login.php';
	}
?>	
