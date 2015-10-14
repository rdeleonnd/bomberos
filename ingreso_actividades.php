<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Actividades</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Codigo de Actividad:</label>
						<div class="col-xs-1">
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre de la Actividad:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="actividad" name="actividad">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Estado de la Actividad:</label>
						<div class="col-xs-1">
							<select class="form-control" id="estado" name="estado">
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>
							</select>
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
	});
</script>
<?php ?>