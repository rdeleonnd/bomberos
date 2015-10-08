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
					<div class="form-group">
						<label class="control-label col-xs-3"> Reporte # :</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo"> 
						</div>
					</div>
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
						<label class="control-label col-xs-3">Nombre del Piloto:</label>
						<div class="form-inline col-xs-6">
							<?php 
								
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"piloto",'class="form-control col-xs-3"','','','','');
							?>
							<label class="form-inline" for="fecha">Fecha:</label>
							<div class='input-group date col-xs-2' id='datetimepicker1'>
			                   <input class="form-control" type="text" id="fecha" name="fecha">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Kilometraje de Salida:</label>
						<div class="form-inline cols-xs-6">
							<input class="form-control" type="text" id="kilometraje_salida" name="kilometraje_salida">
							<label class="form-inline" for="kilometraje_entrada">Kilometraje de Entrada:</label>
							<input class="form-control" type="text" id="kilometraje_entrada" name="kilometraje_entrada">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Bombero que hizo el reporte:</label>
						<div class="form-inline col-xs-6">
							<?php 
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"bombero_reporte",'class="form-control col-xs-3"','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Bomberos Asistentes:</label>
						<div class="form-inline col-xs-6">
							<?php 
								$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
								echo FncCrearCombo($Consulta,"bombero_asistente",'class="form-control col-xs-3"','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Observaciones:</label>
						<div class="col-xs-6">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="observaciones" name="observaciones" maxlength="1000"></textarea>
						</div>
					</div>
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
		$('#kilometraje_salida').ForceNumericOnly();
		$('#kilometraje_entrada').ForceNumericOnly();

		$('#datetimepicker1').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fecha').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#kilometraje_entrada').change(function(){
			$('#kilometros_recorridos').val($('#kilometraje_entrada').val()-$('#kilometraje_salida').val());
		});
	});
</script>

