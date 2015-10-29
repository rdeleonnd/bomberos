<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asistencia</title>
		<script type="text/javascript" src="funciones/ingreso_salida_asistencia.js"></script>
	</head>
	<body>
		<?php
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha de Turno:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php  $time = time(); echo date('d/m/Y H:i:s', $time);?>" disabled>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Turno:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT id_turno as id, nombreTurno as nombre FROM turno;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Codigo del Empleado:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idEmpleado as id, codEmpleado as nombre FROM Personal;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Obsrvaciones:</label>
						<div class="col-xs-3">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="observaciones" name="observaciones" maxlength="1000"></textarea>
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
		$('#nombre').select2();
		$('#usuario').select2();
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Salida_Asistencia"]))
	{
		$Guardar = "INSERT INTO asistenciasalida (`idAsistenciaSalida`, `idEmpleado`, `fecha`, `observaciones`, `id_turno`, `idUsuario`) 
					VALUES ('', '".$_POST["Usuario"]."', now(), '".$_POST["Observaciones"]."', '".$_POST["Nombre"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_salida_asistencia');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>