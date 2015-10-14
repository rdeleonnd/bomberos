<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asistencia</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha de Turno:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php  $time = time(); echo date('d/m/Y H:i:s', $time);?>" disabled>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Turno:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Usuario:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Obsrvaciones:</label>
						<div class="col-xs-3">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="observaciones" name="observaciones" maxlength="1000"></textarea>
						</div>
						<div class="input-group">
				                <button type="button" class="btn btn-info" id="guardar" name="guardar">Guardar</button>
				        </div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script>
	$(document).ready(function(){
		$('#nombre').select2();
		$('#usuario').select2();
	});
</script>
<?php 

?>