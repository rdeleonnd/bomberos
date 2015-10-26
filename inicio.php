<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio de Sesión</title>
		<link rel="stylesheet" type="text/css" href="jquery/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="css/logueo.css" />
		<script type="text/javascript" src="jquery/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="funciones/funciones.js"></script>
		<script type="text/javascript" src="funciones/inicio.js"></script>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
		?>
		<div class="container" id="log" name ="log">
			<form class="form-signin">
				<table >
					
				</table>
				</br><p align="center"><img src="img/logotipo.png"></p>
				<h1 class="form-signin-heading">Inicio de Sesión</h1></br>
				<label class="sr-only">Nombre de Usuario</label>
				<input id="Usuario" class="form-control" placeholder="Nombre de Usuario" required autofocus>
				<label for="inputPassword" class="sr-only">Contraseña</label>
				<input type="password" id="Codigo" class="form-control" placeholder="Contraseña" required>
				<button class="btn btn-lg btn-success btn-block" type="submit" onclick="FncIngreso();">Ingresar</button>
			</form>
		</div>
	</body>
</html>
<?php 
	if(isset($_POST["Sesion"]))
	{
		echo "href=";
	}
	else
	{
		echo "No Listo";
	}
?>