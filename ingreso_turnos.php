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
	            	<label class="control-label col-xs-3">Horario de Finalizacion:</label>
	            	<div class="col-xs-2">
	            		<div class='input-group date' id='timepicker2'>
		                    <input type="text" class="form-control" id="hora_fin" name="hora_fin">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-time"></span>
		                    </span>
		                </div>
	            	</div>
	            	<div class="col-xs-2">
			            <div class="input-group" id="divBtnGuardar">
		                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
		            </div>  
		            <div class="input-group" id="divBtnModificar" style="display:none;">
		                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion()" >Actualizar</button>
		                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
		            </div>
			        </div>
	            </div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-1"></label>
					<div class="col-xs-6" >
						<table id='tabla_Turnos' align='center' class='table table-striped' >
							<thead>
								<tr>
									<th>No</th>
									<th>Nombre del Turno</th>
									<th>Hora Inicio</th>
									<th>Hora Fin</th>
									<th>Usuario de Registro</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT t.id_turno, t.nombreTurno, t.horaInicio, t.horaFin, u.idUsuario, u.nombreUser
													FROM turno t
													INNER JOIN usuario u ON t.idUsuario = u.idUsuario
													INNER JOIN personal p ON p.idEmpleado = u.idPersonal;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['id_turno'].", \"".$row['nombreTurno']."\", \"".$row['horaInicio']."\", \"".$row['horaFin']."\")'>";

										echo "<tr>
													<td>".$row['id_turno']."</td>
													<td>".$row['nombreTurno']."</td>
													<td>".$row['horaInicio']."</td>
													<td>".$row['horaFin']."</td>
													<td>".$row['nombreUser']."</td>
													<td>".$Modificar."</td>
												</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</tr>
			<input id="Inputactualizacion" value="" hidden>
		</form>
	</body>
</html>
<script type="text/javascript">
	 $(document).ready(function () {
        $('#timepicker1').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });
        $('#hora_inicio').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });
        $('#timepicker2').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });
        $('#hora_fin').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });

        FncTabla('tabla_Turnos');
    });
</script>
<?php 
	if(isset($_POST["Ingreso_Turnos"]))
	{
		$Guardar = "INSERT INTO turno (`id_turno`, `nombreTurno`, `horaInicio`, `horaFin`, `idUsuario`) 
					VALUES ('', '".$_POST["Nombre"]."', '".$_POST["Hora_inicio"]."', '".$_POST["Hora_fin"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_turnos');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE turno SET  nombreTurno = '".$_POST["Nombre"]."', horaInicio = '".$_POST["Hora_inicio"]."', horaFin = '".$_POST["Hora_fin"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE id_turno='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_turnos');
			</script>";
	}
	else
	{
		echo "No Listo";
	}
?>