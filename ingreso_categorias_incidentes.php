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
		<form class="form-horizontal">
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
							<?php 
								$Consulta = "SELECT idCausa id, descCausa nombre from causa
											 WHERE codServicio = '".$_POST["ID"]."'
											 ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"subcategoria",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
				<div class="form-group">
	            	<label class="control-label col-xs-3">Ingrese el nombre del  Incidente:</label>
	            	<div class="col-xs-3">
		                <input type="text" class="form-control" id="incidente" name="incidente">
	            	</div>
	            	<div class="col-xs-1">
			            <div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardarSubCategoria();">Guardar</button>
			            </div>
			        </div>
	            </div>
			</tr>
			</table>
		</form>
	</body>
</html>
<script>
	$(document).ready(function(){
        $('#categoria').change(function(){
            FncComboCategoria(this.value,'divsubcategoria');
        });

		$('#categoria').select2();
		$('#subcategoria').select2();
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
	else if(isset($_POST["subcategoria"]))
	{
		
		
	}
?>