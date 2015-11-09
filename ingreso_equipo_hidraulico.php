<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso equipo hidráulico</title>
		<script type="text/javascript" src="funciones/ingreso_equipo_hidraulico.js"></script>
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
						<label class="control-label col-xs-3">Código Reciente:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="cod_reciente" name="cod_reciente">
						</div>
					</div>
				</tr>
				<tr class="form-group">
					<div class="form-group">
						<label class="control-label col-xs-3">Marca:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="marca" name="marca">
						</div>
					</div>
				</tr>
				<tr class="form-group">
					<div class="form-group">
						<label class="control-label col-xs-3">Color:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="color" name="color">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Asignado a:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idUnidad as id, unidad_no as nombre FROM unidad;";
								echo FncCrearCombo($Consulta,"empleado",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Cantidad:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="cantidad" name="cantidad">
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
			<table id="tabla_Hidraulico" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Equipo</th>
						<th>Codigo Reciente</th>
						<th>Marca</th>
						<th>Color</th>
						<th>Asignado a Unidad</th>
						<th>Cantidad</th>
						<th>Usuario de Registro</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$Consulta = "SELECT hid.noEquipo, hid.nombre, hid.codigoReciente, hid.marca, hid.color, hid.cantidad, hid.asignadoA, un.unidad_no, us.nombreUser
									FROM hidraulicopersonal hid
									INNER JOIN unidad un ON un.idUnidad = hid.asignadoA
									INNER JOIN Usuario us ON us.idUsuario = hid.idUsuario;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['noEquipo'].", \"".$row['nombre']."\", \"".$row['codigoReciente']."\", \"".$row['marca']."\", \"".$row['color']."\", \"".$row['cantidad']."\", \"".$row['asignadoA']."\")'>";

							echo "<tr>
										<td>".$row['noEquipo']."</td>
										<td>".$row['nombre']."</td>
										<td>".$row['codigoReciente']."</td>
										<td>".$row['marca']."</td>
										<td>".$row['color']."</td>
										<td>".$row['unidad_no']."</td>
										<td>".$row['cantidad']."</td>
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
        $('#empleado').select2();
        FncTabla('tabla_Hidraulico');
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Equipo_Hidraulico"]))
	{
		$Guardar = "INSERT INTO hidraulicopersonal (`noEquipo`, `nombre`, `codigoReciente`, `marca`, `color`, `cantidad`, `asignadoA`, `idUsuario`)
					VALUES ('', '".$_POST["Nombre"]."', '".$_POST["Cod_reciente"]."', '".$_POST["Marca"]."', '".$_POST["Color"]."', '".$_POST["Cantidad"]."', '".$_POST["Empleado"]."', '".$_SESSION['idusuario']."');";
		
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_equipo_hidraulico');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE hidraulicopersonal SET  nombre = '".$_POST["Nombre"]."', codigoReciente = '".$_POST["Cod_reciente"]."', marca = '".$_POST["Marca"]."', color = '".$_POST["Color"]."', cantidad = '".$_POST["Cantidad"]."', asignadoA = '".$_POST["Empleado"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE noEquipo='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_equipo_hidraulico');
			</script>";
	}
	else
	{
		
	}

?>
