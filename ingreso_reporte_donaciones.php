<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Donaciones</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" >
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
						<div class="form-inline col-xs-6">
							<div class='input-group date col-xs-2' id='datetimepicker1'>
			                   <input class="form-control" type="text" id="fecha" name="fecha">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		                	<label class="form-inline" for="ingreso_por">Ingreso por:</label>
			                <input class="form-control" type="text" id="ingreso_por" name="ingreso_por">
			            </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Recibida de:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="recibida_de" name="recibida_de">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">La cantidad de:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="cantidad" name="cantidad">
							<label class="control-label">(ESCRIBASE EN LETRAS)</label>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Por contribucion voluntaria:</label>
						<div class="form-inline col-xs-7">
							<label class="checkbox-inline"><input id="ChkSI" name="ChkSI" type="checkbox" value="">SI</label>
							<input class="form-control" type="text" id="contribucion" name="contribucion">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Otros conceptos:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="otros_conceptos" name="otros_conceptos">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Segun autorizacion de Gobernacion Departamental No:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="gobernacion" name="gobernacion">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">De fecha:</label>
						<div class="form-inline col-xs-6">
							<div class='input-group date col-xs-2' id='datetimepicker2'>
			                   <input class="form-control" type="text" id="fecha_resolucion" name="fecha_resolucion">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">No. Cuentadancia o Registro de la Contraloria General de Cuentas:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="Cuentadancia" name="Cuentadancia">
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
		$('#datetimepicker2').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fecha_resolucion').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		
	});
</script>
<?php 
	$Usuario = "l";
	$Contrasenia = "p";
	if(($Usuario!="") && ($Contrasenia!=""))
	{
		if(isset($_POST["reporte_donaciones"]))
		{
			
		}
	}
	else
	{
		include("funciones/debe_iniciar_sesion.php");
	}
?>