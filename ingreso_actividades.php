<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Actividades</title>
		<script type="text/javascript" src="funciones/ingreso_actividades.js"></script>

	</head>
	<body>
		<?php
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre de la Actividad:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="actividad" name="actividad">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Seleccione El Estado:</label>
						<div class="form-inline col-xs-3">
							<?php 
								$Consulta = "SELECT idEstado as id, Estado as nombre FROM estado ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"estado",'class="form-control col-xs-3"','','','','');
							?>
						</div>
						<div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script>
	$(document).ready(function(){

	});
</script>
<?php 
	if(isset($_POST["Ingreso_Actividades"]))
	{
		$Guardar = "INSERT INTO actividad (`idActividad`, `nombre`, `idEstado`, `idUsuario`) 
					VALUES ('', '".$_POST["Actividad"]."', '".$_POST["Estado"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_actividades');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>