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
					<div class="input-group" id="divBtnGuardar">
		                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
		            </div> 
		            <div class="input-group" id="divBtnModificar" style="display:none;">
		                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion()" >Actualizar</button>
		                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
		            </div>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-1"></label>
					<div class="col-xs-6" >
						<table id='tabla_actividad' align='center' class='table table-striped' >
							<thead>
								<tr>
									<th>No.</th>
									<th>Actividad</th>
									<th>Estado</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT act.idActividad, act.nombre, act.idEstado, est.Estado
													FROM actividad act
													INNER JOIN estado est ON est.idEstado = act.idEstado;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['idActividad'].", \"".$row['nombre']."\", \"".$row['idEstado']."\")'>";

										echo "<tr>
													<td>".$row['idActividad']."</td>
													<td>".$row['nombre']."</td>
													<td>".$row['Estado']."</td>
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
<script>
	$(document).ready(function(){
		FncTabla('tabla_actividad');
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
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE actividad SET  nombre ='".$_POST["Actividad"]."', idEstado = '".$_POST["Estado"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idActividad='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_actividades');
			</script>";
	}
	else
	{
		
	}
?>