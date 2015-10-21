<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Estados y Rangos</title>
		<script type="text/javascript" src="funciones/ingreso_rangos_estados.js"></script>
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
	            	<label class="control-label col-xs-3">Ingrese el Rango:</label>
	            	<div class="col-xs-3">
		                <input type="text" class="form-control" id="rango" name="rango">
	            	</div>
	            	<div class="col-xs-1">
			            <div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardarRango();">Guardar</button>
			            </div>
			        </div>
	            </div>
			</tr>
			<table id='tabla_rango' align='center' width='100%' class='table table-striped' >
				<thead>
					<tr>
						<th> # </th>
						<th>Rango</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$Consulta = "SELECT idRango, descRango
									FROM rango;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificarRango(".$row['idRango'].", \"".$row['descRango']."\")'>";

							echo "<tr>
										<td>".$row['idRango']."</td>
										<td>".$row['descRango']."</td>
										<td>".$Modificar."</td>
									</tr>";
						}
					?>
				</tbody>
			</table>
			<hr size="10" width="80%" style="#0000FF" />
			<tr>
				<div class="form-group">
	            	<label class="control-label col-xs-3">Ingrese el Estado:</label>
	            	<div class="col-xs-3">
		                <input type="text" class="form-control" id="estado" name="estado">
	            	</div>
	            	<div class="col-xs-1">
			            <div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardarEstado();">Guardar</button>
			            </div>
			        </div>
	            </div>
			</tr>
			<table id="tabla_estado" align="center" class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Estado</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php

						$Consulta = "SELECT idEstado, Estado
									FROM estado;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
							echo "<tr>
										<td>".$row['idEstado']."</td>
										<td>".$row['Estado']."</td>
										<td></td>
									</tr>
									";
						}
					?>
				</tbody>
			</table>
		</form>
	</body>
</html>
<script type='text/javascript'>
	$(document).ready(function(){
		FncTabla('tabla_rango');
		FncTabla('tabla_estado');
	})
</script>
<?php 
	if(isset($_POST["Ingreso_Rangos"]))
	{
		
		$Guardar = "INSERT INTO rango (`idRango`, `descRango`) 
					VALUES ('','".$_POST["Rango"]."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_rangos_estados');
			</script>";
		
	}
	else if(isset($_POST["Ingreso_Estados"]))
	{
		$Guardar = "INSERT INTO estado (`idEstado`, `Estado`) 
						VALUES ('','".$_POST["Estado"]."');";
		$insert = $Conexion->Insertar($Guardar);
			
		echo "<script>
				alert('Se Guardaron los registros');
			</script>";
	}
	else
	{

	}
?>