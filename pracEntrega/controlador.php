<?php
//Connectar a una Base de dates
$servername = "localhost";
$username = "root";
$password = "Ageofempires2";
$dbname = "miDB";
$tipo="";
$modelo="";
$descripcion="";
$precio="";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
else {
   /*echo "Connected successfully";*/
}

/********************************************************************/

	if (isset($_POST["alta"])) {
		$tipo=procesarDatos($_POST["tipo"]);
		$modelo=procesarDatos($_POST["modelo"]);
		$descripcion=procesarDatos($_POST["descripcion"]);
		$precio=procesarDatos($_POST["precio"]);
		$precio=str_replace(",",".",$precio);




	$sql = "INSERT INTO componentes (tipo,modelo,descripcion,precio)  VALUES ('$tipo','$modelo','$descripcion','$precio')";
	if ($conn->query($sql) === TRUE) {
		 echo "Nou registre creat <br>";
		header('Location: pantalla_listado.php');
	} else {
		 echo "<br>Error:" . $conn->error;
	}



	}else{
	echo "<h4>Para agregar un registro, pulsa <a href='altas.php'><span>Nuevo</span></a><h4>";
	$sql = "SELECT * FROM componentes";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {    /*FETCH PARA AGARRAR UNA COLUMNA Y LUEGO SE GUARDAN EN EL ARRAY $row*/

		echo
			  "<tr>	
				<td>".$row['tipo']."</td>
				<td>".$row['modelo']."</td>
				<td>".$row['descripcion']."</td>
				<td>".$row['precio']."</td>
				<td><a onClick=\"javascript: return confirm('¿Desea borrar este registro?');\" href='controlador.php?ID={$row['ID']}'>x</a></td>
				<td><a href='editar.php?ID={$row['ID']}'>Editar</a></td>
			  </tr>";

       }
   } else {
       echo "No hay registros";
   }
}



/*********************************************************************/

	if (isset($_POST["editar"])) {
		$tipo=procesarDatos($_POST["tipo"]);
		$modelo=procesarDatos($_POST["modelo"]);
		$descripcion=procesarDatos($_POST["descripcion"]);
		$precio=procesarDatos($_POST["precio"]);
		$ID=procesarDatos($_POST["ID"]);
		$precio=str_replace(",",".",$precio);

 

	
	$sql =  "UPDATE componentes SET tipo='$tipo', modelo='$modelo',descripcion='$descripcion', precio='$precio' WHERE ID='$ID'";
	if ($conn->query($sql) === TRUE) {
		 echo "Registro actualizado<br>";
		header('Location: pantalla_listado.php');
	
	} else {
		 echo "<br>Error:" . $conn->error;
	}

}


/*******************************************************************/

	if(isset ($_GET["ID"])){
		$id=procesarDatos($_GET["ID"]);
		$sql = "DELETE FROM componentes WHERE ID ='$id'";
		if ($conn->query($sql) === TRUE) {
			echo "Registro borrado<br>";
			header('Location: pantalla_listado.php');
		}else {
			echo "<br>Error:" . $conn->error;
		}
	}


/********************************************************************/

	function procesarDatos($dato){
	$dato=trim($dato);
	$dato=stripslashes($dato);
	$dato=htmlspecialchars($dato);
	return $dato;

	}

/*******************Log in***********************************/

	if (isset($_POST["login"])) {
		$u=procesarDatos($_POST["user"]);
		$p=procesarDatos($_POST["password"]);

	$sql =  "SELECT * FROM users where user like '$u' AND password like '$p'";
   $result = $conn->query($sql) or trigger_error(mysqli_error($conn)." ".$sql);  /*Para que aparesca el error si es que lo tienes en la query*/
   if ($result->num_rows > 0){
		session_start();
		$_SESSION["user"]=$u;
		header('Location: pantalla_listado.php');
	} else {
		 header('Location: pantalla_login.php');
	}

}





/*********************Log out************************************/
	if(isset ($_GET["l"])){
	$u=$_GET["l"];
	if($u==1){
		session_start();
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
	}




?>
