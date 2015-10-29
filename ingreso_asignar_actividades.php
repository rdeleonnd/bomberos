<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asignacion de Actividades</title>
		<script type="text/javascript" src="funciones/ingreso_asignar_actividades.js"></script>

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
						<label class="control-label col-xs-3">Seleccione nombre del Turno:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT id_turno as id, nombreTurno as nombre FROM turno;";
								echo FncCrearCombo($Consulta,"turno",'','','','','');
							?>
						</div
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre de la activiad:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idActividad as id, nombre as nombre FROM actividad;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Usuario a Asignar:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado as id, codEmpleado as nombre FROM Personal;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
						</div
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
		 $('#datetimepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_inicio').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        
        $('#turno').select2();
		$('#nombre').select2();
		$('#usuario').select2();
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Asignar_Actividades"]))
	{
		$Guardar = "INSERT INTO asignacionactividad (`idAsignacion`, `idEmpleado`, `idTurno`, `idActividad`, `idUsuario`)
					VALUES ('', '".$_POST["Usuario"]."', '".$_POST["Turno"]."', '".$_POST["Nombre"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_asignar_actividades');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>