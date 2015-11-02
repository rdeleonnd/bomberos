<?php
	session_start();
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asignacion de Turnos</title>
		<script type="text/javascript" src="funciones/ingreso_asignar_turnos.js"></script>

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
		            	<label class="control-label col-xs-3">Fecha de Turno:</label>
						<div class="col-xs-2">
							<div class='input-group date' id='datetimepicker1'>
			                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						</div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Turno:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT id_turno as id, nombreTurno as nombre FROM turno;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Usuario a Asignar:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idusuario as id, nombreUser as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_inicio').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

        $('#usuario').select2();
        $('#nombre').select2();

    });
</script>
<?php 
	if(isset($_POST["Ingreso_Asignacion_Turnos"]))
	{
		$Guardar = "INSERT INTO asignacionturno (`idasigTurno`, `fecha`, `idTurno`, `idEmpleado`, `idUsuario`)
					VALUES ('', '".$_POST["Fecha_inicio"]."', '".$_POST["Nombre"]."', '".$_POST["Usuario"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_asignar_turnos');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>