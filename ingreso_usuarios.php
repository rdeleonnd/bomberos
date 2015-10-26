<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Usuarios</title>
		<script type="text/javascript" src="funciones/ingreso_usuarios.js"></script>
	</head>
	<body>
		<?php
			include_once('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-3">Seleccione el Empleado:</label>
					<div class="col-xs-3">
						<?php 
							$Consulta = "SELECT per.idEmpleado id, concat(per.nombres, ' ', per.apellidos) nombre FROM personal per ORDER BY nombre;";
							echo FncCrearCombo($Consulta,"empleado",'class="form-control col-xs-3"','','','','');
						?>
					</div>
				</div>
			</tr>
			<tr>
				<div class="form-group">
	            	<label class="control-label col-xs-3">Ingrese el Nombre de Usuario:</label>
	            	<div class="col-xs-2">
		                <input type="text" class="form-control" id="nombre" name="nombre">
	            	</div>
	            </div>
			</tr>
			<tr>
				<div class="form-group">
	            	<label class="control-label col-xs-3">Ingrese la Clave de Usuario:</label>
	            	<div class="col-xs-2">
		                <input type="text" class="form-control" id="clave" name="clave">
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
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-3">Seleccione el Privilegio:</label>
					<div class="col-xs-2">
						<select class="form-control" id="privilegio" name="privilegio">
							<option value="Administrador">Administrador</option>
							<option value="Secretari@">Secretari@</option>
						</select>
					</div>
					<div class="input-group">
		                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
		            </div>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-1"></label>
					<div class="col-xs-6">
						<table id='tabla_usuario' align='center' class='table table-striped' >
							<thead>
								<tr>
									<th> # </th>
									<th>Empleado</th>
									<th>Usuario</th>
									<th>Clave</th>
									<th>Estado</th>
									<th>Privilegio</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT us.idUsuario, us.idPersonal, us.nombreUser, us.clave, us.idEstado, us.privilegio, concat(per.nombres, ' ', per.apellidos) empleado, es.Estado
												FROM usuario us
												INNER JOIN personal per ON per.idEmpleado = us.idPersonal
												INNER JOIN estado es ON es.idEstado = us.idEstado;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificarRango(".$row['idUsuario'].", \"".$row['descRango']."\")'>";

										echo "<tr>
													<td>".$row['idUsuario']."</td>
													<td>".$row['empleado']."</td>
													<td>".$row['nombreUser']."</td>
													<td>".$row['clave']."</td>
													<td>".$row['Estado']."</td>
													<td>".$row['privilegio']."</td>
													<td>".$Modificar."</td>
												</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</tr>
		</form>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#empleado').select2();
		FncTabla('tabla_usuario');
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Usuarios"]))
	{
		
		$Guardar = "INSERT INTO usuario (`idUsuario`, `idPersonal`, `nombreUser`, `clave`, `idEstado`, `privilegio`) 
					VALUES ('', '".$_POST["Empleado"]."', '".$_POST["Nombre"]."', '".$_POST["Clave"]."', '".$_POST["Estado"]."', '".$_POST["Privilegio"]."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_usuarios');
			</script>";
		
	}
	else
	{

	}
?>
