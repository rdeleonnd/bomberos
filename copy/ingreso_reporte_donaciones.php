<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Donaciones</title>
		<script type="text/javascript" src="funciones/ingreso_reporte_donaciones.js"></script>

	</head>
	<body>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" >
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"> Reporte # :</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo"> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">(NOMBRE DEL COMITE, ASOCIACION, FUNDACION U OTRO)</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">(LUGAR, MUNICIPIO Y DEPARTAMENTO)</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="lugar" name="lugar">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha:</label>
						<div class="col-xs-2">
							<div class='input-group date' id='datetimepicker1'>
			                   <input class="form-control" type="text" id="fecha" name="fecha">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			            <div class="col-xs-3">
			            	<div class="input-group">
			            		<label class="input-group-addon" for="ingreso_por">Ingreso por:</label>
			                	<input class="form-control" type="text" id="ingreso_por" name="ingreso_por">
			            	</div>
			            </div>
			            <div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#datetimepicker1').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fecha').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Reporte_Donaciones"]))
	{
		echo "Listo";
	}
	else
	{
		echo "No Listo";
	}
?>