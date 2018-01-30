<?php
	session_start();
	if (isset($_SESSION["user"])) {
		echo "{$_SESSION['user']}, en este apartado puedes registrar componentes";
	}else{
		header('location: pantalla_login.php');
	}
?>
<html>
<head>
<style>
	form > a{
	text-decoration: none;
	}
	
</style>
</head>
<body>
<form action="controlador.php" method="post">
Tipo
  <select name="tipo">
    <option value="No especificado">-- Elige un producto --</option>
    <option value="Procesador">Procesador</option>
      <option value="Placa Base">Placa Base</option>
        <option value="Memoria RAM">Memoria RAM</option>
        <option value="Disco Duro">Disco Duro</option>
  </select>
</br>

Modelo <input type="text" name="modelo" value="No especificado"></br>

Descripción </br>
<textarea rows="6" cols="80" name="descripcion" value="No especificado" style="resize: none;" >
</textarea></br>

Precio <input type="text"  step="any" name="precio" value="0"></br>


<input type="submit" name="alta" value="Guardar">
<a href="pantalla_listado.php"><input type="button" class="button" name="Cancelar" value="Cancelar"></a>
</form>

</body>
</head>

