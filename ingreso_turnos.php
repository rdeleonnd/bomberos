<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Turnos</title>
		<script type="text/javascript" src="funciones/ingreso_turnos.js"></script>
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
						<label class="control-label col-xs-3">Nombre del Turno:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					 <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Inicio:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datepicker1'>
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
		            	<label class="control-label col-xs-3">Horario de Inicio:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='timepicker1'>
			                    <input type="text" class="form-control" id="hora_inicio" name="hora_inicio">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-time"></span>
			                    </span>
			                </div>
		            	</div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Fin:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datepicker2'>
			                    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Horario de Finalizacion:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='timepicker2'>
			                    <input type="text" class="form-control" id="hora_fin" name="hora_fin">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-time"></span>
			                    </span>
			                </div>
		            	</div>
		            	<div class="col-xs-1">
				            <div class="input-group">
				            	<?php 
				                	echo "<button type='button' class='btn btn-info' id='guardar' name='guardar' onclick='FncGuardar();'>Guardar</button>";
				            	?>
				            </div>
				        </div>
		            </div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
	 $(document).ready(function () {
        $('#datepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_inicio').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#datepicker2').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_fin').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#timepicker1').datetimepicker({
        	locale: 'es',
        	format: 'LT'
        });
        $('#hora_inicio').datetimepicker({
        	locale: 'es',
        	format: 'LT'
        });
        $('#timepicker2').datetimepicker({
        	locale: 'es',
        	format: 'LT'
        });
        $('#hora_fin').datetimepicker({
        	locale: 'es',
        	format: 'LT'
        });
    });
</script>
<?php 
	if(isset($_POST["Ingreso_Turnos"]))
	{
		$Guardar = "INSERT INTO turno (`id_turno`, `fechaInicio`, `fechaFin`, `nombreTurno`, `horaInicio`, `horaFin`, `idUsuario`) 
					VALUES ('', '".$_POST["Fecha_inicio"]."', '".$_POST["Fecha_fin"]."', '".$_POST["Nombre"]."', '".$_POST["Hora_inicio"]."', '".$_POST["Hora_fin"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_turnos');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>