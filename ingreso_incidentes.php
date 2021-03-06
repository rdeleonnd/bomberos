<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Actividades</title>
		<script type="text/javascript" src="funciones/ingreso_incidentes.js"></script>

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
	            	<label class="control-label col-xs-3">Ingrese la categoria del Incidente:</label>
	            	<div class="col-xs-3">
		                <input type="text" class="form-control" id="incidente" name="incidente">
	            	</div>
		            <div class="input-group" id="divBtnGuardar">
		                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardarIncidente();">Guardar</button>
		            </div> 
		            <div class="input-group" id="divBtnModificar" style="display:none;">
		                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion()" >Actualizar</button>
		                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
		            </div>
	            </div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-2"></label>
					<div class="col-xs-5">
						<table id='tabla_incidente' align='center' class='table table-striped'>
							<thead>
								<tr>
									<th> # </th>
									<th>Categoria de Incidente</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT codServicio, descServicio
												FROM servicio;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificarCategoria(".$row['codServicio'].", \"".$row['descServicio']."\")'>";

										echo "<tr>
													<td>".$row['codServicio']."</td>
													<td>".$row['descServicio']."</td>
													<td>".$Modificar."</td>
												</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</tr>
			<hr size="10" width="80%" style="#0000FF" />
			<hr size="10" width="80%" style="#0000FF" /></br>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-3">Seleccione la Categoria del Incidente:</label>
					<div class="col-xs-3">
						<?php 
							$Consulta = "SELECT codServicio id, descServicio nombre from servicio ORDER BY nombre;";
							echo FncCrearCombo($Consulta,"categoria",'','','','','');
						?>
					</div>
				</div>
			</tr>
			<tr>
				<div class="form-group">
	            	<label class="control-label col-xs-3">Ingrese la Sub-Categoria del Incidente:</label>
	            	<div class="col-xs-3">
		                <input type="text" class="form-control" id="subcategoria" name="subcategoria">
	            	</div>
	            	<div class="input-group" id="divBtnGuardar2">
		                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardarSubCategoria();">Guardar</button>
		            </div> 
		            <div class="input-group" id="divBtnModificar2" style="display:none;">
		                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion2()" >Actualizar</button>
		                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
		            </div>
	            </div>
			</tr>
			<tr>
				<div class="form-group">
					<label class="control-label col-xs-2"></label>
					<div class="col-xs-5">
						<table id="tabla_subcategoria" align="center" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Sub-Categoria de Incidente</th>
									<th>Categoria de Incidente</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT cau.idCausa, cau.codServicio, cau.descCausa, ser.descServicio
												FROM causa cau
												INNER JOIN servicio ser ON ser.codServicio = cau.codServicio;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificarSubCategoria(".$row['idCausa'].", \"".$row['descCausa']."\", \"".$row['codServicio']."\")'>";
										
										echo "<tr>
													<td>".$row['idCausa']."</td>
													<td>".$row['descCausa']."</td>
													<td>".$row['descServicio']."</td>
													<td>".$Modificar."</td>
												</tr>
												";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</tr>
			<input id="Inputactualizacion" value="" hidden>
			<input id="Inputactualizacion2" value="" hidden>
		</form>
	</body>
</html>
<script type='text/javascript'>
	$(document).ready(function(){
		FncTabla('tabla_incidente');
		FncTabla('tabla_subcategoria');
		$('#categoria').select2();
		
	})
</script>
<?php 
	if(isset($_POST["Ingreso_Categoria"]))
	{
		
		$Guardar = "INSERT INTO servicio (`codServicio`, `descServicio`, `idUsuario`)  
					VALUES ('','".$_POST["Incidente"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_incidentes');
			</script>";
		
	}
	else if(isset($_POST["Ingreso_SubCategoria"]))
	{
		$Guardar = "INSERT INTO causa (`idCausa`, `descCausa`, `codServicio`, `idUsuario`)
						VALUES ('','".$_POST["Subcategoria"]."', '".$_POST["Categoria"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
			
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_incidentes');
			</script>";
	}
	else if(isset($_POST["Modificar_Categoria"]))
	{
		$Actualizar = "UPDATE servicio SET  descServicio='".$_POST["Incidente"]."'
                  		WHERE codServicio='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_incidentes');
			</script>";
	}
	else if(isset($_POST["Modificar_SubCategoria"]))
	{
		$Actualizar = "UPDATE causa SET  descCausa='".$_POST["Subcategoria"]."', codServicio='".$_POST["Categoria"]."'
                  		WHERE idCausa='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_incidentes');
			</script>";
	}
	else
	{

	}
?>