<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso botas y pantalones</title>
		<script type="text/javascript" src="funciones/ingreso_botas_pantalones.js"></script>
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
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Talla:</label>
				            	<input class="form-control" type="text" id="talla" name="talla">
				            </div>
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
			<table id="tabla_Botas" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Equipo</th>
						<th>Codigo Anterior</th>
						<th>Codigo Reciente</th>
						<th>Asignado a</th>
						<th>Talla</th>
						<th>Observaciones</th>
						<th>Usuario de Registro</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$Consulta = "SELECT bp.idEquipo , bp.nombre, bp.codigoAnterior, bp.codigoReciente, bp.talla, bp.asignadoA, bp.observacion, concat(p.nombres, ' ', p.apellidos) as Asignado, bp.idUsuario , u.nombreUser
									FROM botaspantalones bp
									INNER JOIN personal p ON p.idEmpleado = bp.asignadoA
									INNER JOIN usuario u ON u.idUsuario = bp.idUsuario;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['idEquipo'].", \"".$row['nombre']."\", \"".$row['codigoAnterior']."\", \"".$row['codigoReciente']."\", \"".$row['asignadoA']."\", \"".$row['talla']."\", \"".$row['observacion']."\")'>";

							echo "<tr>
										<td>".$row['idEquipo']."</td>
										<td>".$row['nombre']."</td>
										<td>".$row['codigoAnterior']."</td>
										<td>".$row['codigoReciente']."</td>
										<td>".$row['Asignado']."</td>
										<td>".$row['talla']."</td>
										<td>".$row['observacion']."</td>
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
    	FncTabla('tabla_Botas');
        $('#empleado').select2();
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Botas_Pantalones"]))
	{
		$Guardar = "INSERT INTO botaspantalones (`idEquipo`, `nombre`, `codigoAnterior`, `codigoReciente`, `talla`, `observacion`, `asignadoA`, `idUsuario`)
					VALUES ('', '".$_POST["Nombre"]."', '".$_POST["Cod_anterior"]."', '".$_POST["Cod_reciente"]."', '".$_POST["Talla"]."', '".$_POST["Descripcion"]."', '".$_POST["Empleado"]."', '".$_SESSION['idusuario']."');";
		
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_botas_pantalones');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE botaspantalones SET  nombre = '".$_POST["Nombre"]."', codigoAnterior = '".$_POST["Cod_anterior"]."', codigoReciente = '".$_POST["Cod_reciente"]."', talla = '".$_POST["Talla"]."', asignadoA = '".$_POST["Empleado"]."', observacion = '".$_POST["Descripcion"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idEquipo='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_botas_pantalones');
			</script>";
	}
	else
	{
		
	}

?>
