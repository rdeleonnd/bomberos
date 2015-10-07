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
						<div class="form-inline">
							<label class="control-label col-xs-3"> Reporte # :</label>
							<div class="col-xs-3">
								<input class="form-control" type="text" id="recibo" name="recibo"> 
							</div>
						</div>
					
					<td>
						Direccion del Traslado<input type="text" id="direccion_traslado" name="direccion_traslado">
					</td>
				</tr>
				<tr>
					<td>
						Nombre del paciente<input type="text" id="nombre_paciente" name="nombre_paciente">
					</td>
				</tr>	
				<tr>
					<td>
						Direccion del paciente<input type="text" id="direccion_paciente" name="direccion_paciente">
					</td>
				</tr>
				<tr>
					<td>
						Edad<input type="text" id="edad" name="edad" size="2"><?php //echo FncCrearCombo($ConsultaRango,'rango_edad', '', '','' ,'','');?>
						Sexo<?php //echo FncCrearCombo($ConsultaSexo,'sexo', '', '','' ,'','');?>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Se Traslado a <input type="text" id="traslado_a" name="traslado_a" size="100">
					</td>
				</tr>
				<tr>
					<td>
						Forma de aviso<input type="text" id="aviso" name="aviso">
					</td>
					<td>
						Telefono <input type="text" id="telefono" name="telefono">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Telefonista de turno<input id="telefonista" name="telefonista" size="100">
					</td>
				</tr>
				<tr>
					<td>
						Unidad No. <input type="text" id="unidad" name="unidad">
					</td>
					<td>
						Hora de Salida <input type"text" id="hora_salida" name="hora_salida">
					</td>
					<td>
						Hora de Entrada <input type"text" id="hora_entrada" name="hora_entrada">
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Nombre del Piloto 
						Fecha <input type="text" id="fecha" name="fecha">
					</td>
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

