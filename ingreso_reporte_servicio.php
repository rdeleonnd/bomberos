<!DOCTYPE html>
<html>
	<head>
		<title>Ingreso de Servicio</title>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
			$ConsultaRango = "";
			$ConsultaSexo = "";
		?>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" style="width: 90%">
				<tr>
					
					<img class="img-thumbnail" src="img/logotipo.png">
					<div class="form-group">
						<label class="control-label col-xs-3"> Reporte # :</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo"> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"> Direccion del Traslado:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="direccion_traslado" name="direccion_traslado"> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Paciente:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="nombre_paciente" name="nombre_paciente">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Direccion del paciente:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="direccion_paciente" name="direccion_paciente">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Edad:</label>
						<div class="form-inline col-xs-6">
							<input class="form-control col-xs-1" type="text" id="edad" name="edad" >
							<select id="rango_edad" name="rango_edad" class="form-control col-xs-1">
								<option value="A" select>Años</option>
								<option value="M">Meses</option>
								<option value="D">Dias</option>
							</select>
							<label class="form-inline " for="sexo"> Sexo de la Persona:</label>
							<select class="form-control" id="sexo" name="sexo">
								<option value="Hombre">Hombre</option>
								<option value="Mujer">Mujer</option>
							</select>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Se Traslado a:</label>
						<div class="col-xs-3" >
							<input class="form-control" type="text" id="traslado_a" name="traslado_a">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Forma de aviso:</label>
						<div class="form-inline col-xs-6">
							<input class="form-control" type="text" id="aviso" name="aviso">
							<label class="form-inline" for="telefono">Telefono:</label>
							<input class="form-control" type="text" id="telefono" name="telefono">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Telefonista de turno:</label>
						<div class="col-xs-3">
							<input class="form-control" id="telefonista" name="telefonista">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Unidad No:</label>
						<div class="form-inline col-xs-6">
							<input class="form-control" type="text" id="unidad" name="unidad">
							<label class="form-inline" for="hora_salida">Hora de Salida:</label>
							<input class="form-control" type"text" id="hora_salida" name="hora_salida">
							<label class="form-inline" for="hora_entrada">Hora de Entrada:</label>
							<input class="form-control" type"text" id="hora_entrada" name="hora_entrada">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label">Nombre del Piloto:</label>
						<div class="form-inline col-xs-6">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"divsexo2",'','','','','');
							?>
							<label class="form-inline" for="fecha">Fecha:</label>
							<input class="form-control" type="text" id="fecha" name="fecha">
						</div>
					</div>
				</tr>
				<tr>
					<td colspan="3">
						Kilometraje de Salida <input type="text" id="kilometraje_salida" name="kilometraje_salida">
						Kilometraje de Entrada <input type="text" id="kilometraje_entrada" name="kilometraje_entrada">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Bombero que hizo el reporte
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Bomberos Asistentes
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Observaciones
					</td>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Kilometros Recorridos:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="kilometros_recorridos" name="kilometros_recorridos" disabled>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">COD:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="cod" name="cod">
						</div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#edad').ForceNumericOnly();	
	});
</script>

