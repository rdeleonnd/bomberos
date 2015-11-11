<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Actividades</title>
		<script type="text/javascript" src="funciones/ingreso_categorias_incidentes.js"></script>

	</head>
	<body>
		<?php
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal" method="post" >
			<table>
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
						<label class="control-label col-xs-3">Seleccione la Sub-Categoria del Incidente:</label>
						<div class="col-xs-3" id="divsubcategoria">
							
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Ingrese el nombre del  Incidente:</label>
		            	<div class="col-xs-3">
			                <input type="text" class="form-control" id="incidente" name="incidente">
		            	</div>
			            <div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div> 
			            <div class="input-group" id="divBtnModificar" style="display:none;">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncModificacion()" >Actualizar</button>
			                <button type="button" class="btn btn-danger" id="guardar" name="guardar" onclick="FncCancelar();">Cancelar</button>
			            </div>
		            </div>
				</tr>
				<tr>
				<div class="form-group">
					<label class="control-label col-xs-1"></label>
					<div class="col-xs-6" >
						<table id='tabla_incidente' align='center' class='table table-striped' >
							<thead>
								<tr>
									<th>No</th>
									<th>Categoria Incidente</th>
									<th>Sub-Categoria</th>
									<th>Incidente</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$Consulta = "SELECT inc.idIncidente, inc.descIncidente, inc.idCausa, cau.descCausa, inc.idservicio, ser.descServicio
												from incidente inc
												INNER JOIN causa cau ON cau.idCausa = inc.idCausa
												INNER JOIN servicio ser ON ser.codServicio = inc.idservicio;";

									$Respuesta = $Conexion->list_orders($Consulta);
									while ($row = mysql_fetch_assoc($Respuesta))
									{
			                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificar(".$row['idIncidente'].", \"".$row['idservicio']."\", \"".$row['idCausa']."\", \"".$row['descIncidente']."\")'>";

										echo "<tr>
													<td>".$row['idIncidente']."</td>
													<td>".$row['descServicio']."</td>
													<td>".$row['descCausa']."</td>
													<td>".$row['descIncidente']."</td>
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
			</table>
		</form>
	</body>
</html>
<script>
	$(document).ready(function(){
		FncComboCategoria('1','divsubcategoria');
        $('#categoria').change(function(){
            FncComboCategoria(this.value,'divsubcategoria');
            $('#subcategorias').select2();
        });

		$('#categoria').select2();
		$('#subcategorias').select2();
		FncTabla('tabla_incidente');
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Incidente"]))
	{
		$Guardar = "INSERT INTO incidente (`idIncidente`, `descIncidente`, `idCausa`, `idservicio`, `idUsuario`)
					VALUES ('', '".$_POST["Incidente"]."', '".$_POST["Subcategorias"]."', '".$_POST["Categoria"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_categorias_incidentes');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE incidente SET  descIncidente = '".$_POST["Incidente"]."', idCausa = '".$_POST["Subcategorias"]."', idservicio = '".$_POST["Categoria"]."'
                  		WHERE idIncidente='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_categorias_incidentes');
			</script>";
	}
	else 
	{

	}
?>