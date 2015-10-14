<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asignacion de Actividades</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha de Asigancion de Actividad:</label>
						<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker1'>
			                    <input type='text' class="form-control" id="fecha_inicio" name="fecha_inicio"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre de la activiad:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Usuario a Asignar:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
						</div
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
		 $('#datetimepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#fecha_inicio').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        
		$('#nombre').select2();
		$('#usuario').select2();
	});
</script>
<?php 

?>