<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de cascos y chaquetones</title>
		<script type="text/javascript" src="funciones/ingreso_casco_chaqueton.js"></script>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal ">
			<table align="center" class="table table-bordered" >
				<tr class="form-group">
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Código anterior:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="cod_anterior" name="cod_anterior">
						</div>
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Código reciente:</label>
				            	<input class="form-control" type="text" id="cod_reciente" name="cod_reciente">
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Asignado a:</label>
						<div class="col-xs-2">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"empleado",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Observaciones:</label>
						<div class="col-xs-4">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="descripcion" name="descripcion" maxlength="200"></textarea>
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
			</table>
			<table id="tabla_Cascos" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Equipo</th>
						<th>Codigo Anterior</th>
						<th>Codigo Reciente</th>
						<th>Asignado a</th>
						<th>Observaciones</th>
						<th>Usuario de Registro</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$Consulta = "SELECT casc.idEquipo, casc.nombre, casc.codAnterior, casc.codReciente, casc.asignadoA, concat(per.CodEmpleado, ' | ' , per.nombres) nombres, casc.observaciones, us.nombreUser
									FROM cascochaqueton casc
									INNER JOIN personal per ON per.idEmpleado = casc.asignadoA
									INNER JOIN Usuario us ON us.idUsuario = casc.idUsuario;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['idEquipo'].", \"".$row['nombre']."\", \"".$row['codAnterior']."\", \"".$row['codReciente']."\", \"".$row['asignadoA']."\", \"".$row['observaciones']."\")'>";

							echo "<tr>
										<td>".$row['idEquipo']."</td>
										<td>".$row['nombre']."</td>
										<td>".$row['codAnterior']."</td>
										<td>".$row['codReciente']."</td>
										<td>".$row['nombres']."</td>
										<td>".$row['observaciones']."</td>
										<td>".$row['nombreUser']."</td>
										<td>".$Modificar."</td>
									</tr>";
						}
					?>
				</tbody>
			</table>
			<input id="Inputactualizacion" value="" hidden>
		</form>
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
    	FncTabla('tabla_Cascos');
        $('#empleado').select2();
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Casco_Chaqueton"]))
	{
		$Guardar = "INSERT INTO cascochaqueton (`idEquipo`, `nombre`, `codAnterior`, `codReciente`, `asignadoA`, `observaciones`, `idUsuario`)
					VALUES ('', '".$_POST["Nombre"]."', '".$_POST["Cod_anterior"]."', '".$_POST["Cod_reciente"]."', '".$_POST["Empleado"]."', '".$_POST["Descripcion"]."', '".$_SESSION['idusuario']."');";
		echo $Guardar ;
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_casco_chaqueton');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE cascochaqueton SET  nombre = '".$_POST["Nombre"]."', codAnterior = '".$_POST["Cod_anterior"]."', codReciente = '".$_POST["Cod_reciente"]."', asignadoA = '".$_POST["Empleado"]."', observaciones = '".$_POST["Descripcion"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idEquipo='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_casco_chaqueton');
			</script>";
	}
	else
	{
		
	}

?>
