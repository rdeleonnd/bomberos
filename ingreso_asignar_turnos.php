<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asignacion de Turnos</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Turno:</label>
		                <div class='input-group date col-xs-2' id='datetimepicker1'>
		                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
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
						<label class="control-label col-xs-3">Usuario a Asignar:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="usuario" name="usuario">
						</div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
        	format: 'DD/MM/YYYY, h:mm:ss a'
        });
        $('#fecha_inicio').datetimepicker({
        	format: 'DD/MM/YYYY, h:mm:ss a'
        });
    });
</script>
<?php 

?>