<html>
<head>
  <style>

body{
    margin-left: 10%;
    margin-right: 10%;
}



h4{
	padding: 0;
    top: 0;
    height: 0px;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #adadad;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
a{
	text-decoration: none;
    color: #707070;
    font-weight: 900;
}

.button{
	 margin-top: 10px;
    height: 30px;
    border-radius: 40px;
    border: 1px solid #707070;
    background: #707070;
    width: 80px;
    cursor: auto;
}

td:last-child a{
	color:red;
}

td:last-child {
	text-align:center;
}

tr:first-child{
background:#202020;
color:#ffffff;
}

.hi{
background:blue;


}

  </style>
</head>
<body>
<h1>Componentes</h1>
<?php session_start(); echo "<div class='hi'>Hello {$_SESSION["user"]}</div>" ?>
<table>
			  <tr>
				<th>Tipo</th>
				<th>Modelo</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Eliminar</th>
				<th>Editar</th>
			  </tr>
<?php include 'controlador.php';?>
</table>
<a href="altas.php"><input type="button" class="button" name="submit" value="Nuevo"></a>
<a href="controlador.php?l=1"><input type="button" class="button" name="submit" value="Log out"></a>
</body>
</html>

