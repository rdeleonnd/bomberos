<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio de Sesión</title>
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="css/logueo.css" />
		<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="funciones/funciones.js"></script>
		<script type="text/javascript" src="funciones/inicio.js"></script>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
		?>
		<div class="container">
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
	
?>