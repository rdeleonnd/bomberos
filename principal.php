<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="jquery/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.min.css" />
		<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
	</head>
	<body>
		</br><p align="center"><img src="img/logotipo.png"></p>
		<hr size="10" width="85%" style="#0000FF" />
		<table>
			<tr>
				<li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		          Ingreso de Reportes<b class="caret"></b>
		        </a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Reporte de Servicios</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Recibo de donaciones</a></li>
		        </ul>
		      </li>
				
			</tr>
			<tr>
				<div class="panel panel-success">
					<div class="panel-heading" id="Encabezado_Panel">
						<h3 class="panel-title">Titulo</h3>
					</div>
					<div id="Principal" name="Principal" class="panel-body"></div>
				</div>
				
			</tr>
		</table>
	</body>
</html>

<?php 
	$Usuario = "a";
	$Contrasenia = "a";

	if(($Usuario!="") && ($Contrasenia!=""))
	{
		echo "<script >
				$(document).ready(function(){
					$('#Principal').load('reporte_servicio.php');
				});
			</script>";
	}
	else
	{
		include("funciones/debe_iniciar_sesion.php");
	}
?>