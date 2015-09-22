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
		<table class="table table-bordered">
			<tr>
				<td rowspan=4 align="justify">Recibo No. <input type="text" id="recibo" name="recibo"> </td>
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
				<td colspan="3">
					Kilometros Recorridos <input type="text" id="kilometros_recorridos" name="kilometros_recorridos" disabled>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					COD:
				</td>
			</tr>
		</table>
	</body>
</html>

