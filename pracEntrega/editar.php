<?php	
	session_start();
	if (isset($_SESSION["user"])) {
		echo "{$_SESSION['user']}, en este apartado puedes editar componentes";
	}else{
		header('location: pantalla_login.php');
	}


$servername = "localhost";
$username = "root";
$password = "Ageofempire2";
$dbname = "miDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
else {
  /*Nos hemos conectado exitosamente*/
}

	$id=$_GET["ID"];
	$sql = "SELECT * FROM componentes WHERE ID=$id";
   $result = $conn->query($sql);

   if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
	}else{
		echo "No hay registros";
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

		<option value="No especificado" <?php 	if($row['tipo'] =="No especificado"){ echo "selected";}?>>-- Elige un producto --</option>
		<option value="Procesador"  <?php 	if($row['tipo'] =="Procesador"){ echo "selected";}?> >Procesador</option>
		<option value="Placa Base"  <?php 	if($row['tipo'] =="Placa Base"){ echo "selected";}?>>Placa Base</option>
		<option value="Memoria RAM" <?php 	if($row['tipo'] =="Memoria RAM"){ echo "selected";}?> >Memoria RAM</option>
		<option value="Disco Duro"  <?php 	if($row['tipo'] =="Disco Duro"){ echo "selected";}?>>Disco Duro</option>
  </select>
</br>

Modelo <input type="text" name="modelo" value="<?php echo $row['modelo'];?>"></br>

Descripción </br>
<textarea rows="6" cols="80" name="descripcion" style="resize: none;" ><?php echo $row['descripcion'];?>
</textarea></br>

Precio <input type="text"  step="any" name="precio" value="<?php echo $row['precio'];?>"></br>
<input type="Number" style="display: none;" name="ID" value="<?php echo $_GET['ID'];?>"></br>


<input type="submit" name="editar" value="Guardar">
<a href="pantalla_listado.php"><input type="button" class="button" name="Cancelar" value="Cancelar"></a>
</form>

</body>
</head>


	
