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
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Usuario:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="usuario" name="usuario">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Obsrvaciones:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="observacion" name="observacion">
						</div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="">
	
</script>
<?php 

	
?>