<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Turnos</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table>
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
		            	<label class="control-label col-xs-3">Fecha de Inicio:</label>
		                <div class='input-group date col-xs-1' id='datepicker1'>
		                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Horario de Inicio:</label>
		                <div class='input-group date col-xs-1' id='timepicker1'>
		                    <input type="text" class="form-control" id="hora_inicio" name="hora_inicio">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Fin:</label>
		                <div class='input-group date col-xs-1' id='datepicker2'>
		                    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
		            	<label class="control-label col-xs-3">Horario de Finalizacion:</label>
		                <div class='input-group date col-xs-1' id='timepicker2'>
		                    <input type="text" class="form-control" id="hora_fin" name="hora_fin">
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
					
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
	 $(document).ready(function () {
        $('#datepicker1').datetimepicker({
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_inicio').datetimepicker({
        	format: 'DD/MM/YYYY'
        });
        $('#datepicker2').datetimepicker({
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_fin').datetimepicker({
        	format: 'DD/MM/YYYY'
        });
        $('#timepicker1').datetimepicker({
        	format: 'LT'
        });
        $('#hora_inicio').datetimepicker({
        	format: 'LT'
        });
        $('#timepicker2').datetimepicker({
        	format: 'LT'
        });
        $('#hora_fin').datetimepicker({
        	format: 'LT'
        });
    });
</script>
<?php 

?>