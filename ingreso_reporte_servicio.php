<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ingreso de Servicio</title>
		<script type="text/javascript" src="funciones/ingreso_reporte_servicio.js"></script>
	</head>
	<body>
		<?php 
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" style="width: 90%">
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"> Reporte # :</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo" required> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3"> Direccion del Traslado:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="direccion_traslado" name="direccion_traslado" required> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Paciente:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="nombre_paciente" name="nombre_paciente" required>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Direccion del paciente:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="direccion_paciente" name="direccion_paciente" required>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Edad:</label>
						<div class="col-xs-1">
							<input class="form-control" type="text" id="edad" name="edad" required>
						</div>
						<div class="col-xs-1">
							<select id="rango_edad" name="rango_edad" class="form-control">
								<option value="A" select>Años</option>
								<option value="M">Meses</option>
								<option value="D">Dias</option>
							</select>
						</div>
						<div class="col-xs-3">
				            <div class="input-group">
				            	<label class="input-group-addon">Sexo de la Persona:</label>
				            	<select class="form-control" id="sexo" name="sexo">
									<option value="Hombre">Hombre</option>
									<option value="Mujer">Mujer</option>
								</select>
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Se Traslado a:</label>
						<div class="col-xs-5" >
							<input class="form-control" type="text" id="traslado_a" name="traslado_a" required>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Forma de aviso:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="aviso" name="aviso" required>
						</div>
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Telefono:</label>
				            	<input class="form-control" type="text" id="telefono" name="telefono" required>
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Telefonista de turno:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"telefonista",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Unidad No:</label>
						<div class="col-xs-1">
							<?php 
								$Consulta = "SELECT idUnidad as id, unidad_no as nombre FROM unidad;";
								echo FncCrearCombo($Consulta,"unidad",'','','','','');
							?>
						</div>
						<div class="col-xs-2">
							<div class="input-group">
								<label class="input-group-addon" for="hora_salida">Hora de Salida:</label>
								<input class="form-control" type"text" id="hora_salida" name="hora_salida" required>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="input-group">
								<label class="input-group-addon" for="hora_entrada">Hora de Entrada:</label>
								<input class="form-control" type"text" id="hora_entrada" name="hora_entrada" required>
							</div>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Piloto:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"piloto",'','','','','');
							?>
						</div>
						<div class="col-xs-2">
							<div class="input-group">
								<label class="input-group-addon" for="fecha">Fecha:</label>
								<div class='input-group date' id='datetimepicker1'>
				                   <input class="form-control" type="text" id="fecha" name="fecha">
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
							</div>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Kilometraje de Salida:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="kilometraje_salida" name="kilometraje_salida" required>
						</div>
						<div class="col-xs-3">
							<div class="input-group">
								<label class="input-group-addon" for="kilometraje_entrada">Kilometraje de Entrada:</label>
								<input class="form-control" type="text" id="kilometraje_entrada" name="kilometraje_entrada" required>
							</div>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Bombero que hizo el reporte:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"bombero_reporte",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Bomberos Asistentes:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="bombero_asistente" name="bombero_asistente" required>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Observaciones:</label>
						<div class="col-xs-5">
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
						<label class="control-label col-xs-3">Incidente:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT inc.idIncidente id,  concat(ser.descServicio, ' ',  cau.descCausa, ' ', inc.descIncidente ) nombre
											from incidente inc
											INNER JOIN causa cau ON cau.idCausa = inc.idCausa
											INNER JOIN servicio ser ON ser.codServicio = inc.idservicio;";
								echo FncCrearCombo($Consulta,"categoria",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"></label>
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div> 
			            <div class="input-group" id="divBtnModificar" style="display:none;">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncModificacion()" >Actualizar</button>
			                <button type="button" class="btn btn-danger" id="guardar" name="guardar" onclick="FncCancelar();">Cancelar</button>
			            </div>
					</div>
				</tr>
				<input id="Inputactualizacion" value="" hidden>
				<hr size="10" width="85%" style="#0000FF" />
				<div class="panel panel-primary">
					<div class="panel-heading" id="Encabezado_Panel" name="Encabezado_Panel" align="center">
						<big>BUSQUEDA DE REGISTROS</big>
					</div>
				</div>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-1">Fecha de Inicio:</label>
						<div class="col-xs-2">
							<div class='input-group date' id='datetimepicker1b'>
			                   <input class="form-control" type="text" id="fechab1" name="fechab1">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			            <label class="control-label col-xs-1">Fecha Fin:</label>
						<div class="col-xs-2">
							<div class='input-group date' id='datetimepicker2b'>
			                   <input class="form-control" type="text" id="fechab2" name="fechab2">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			            <label class="control-label col-xs-1">Piloto</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								$sufix="<option value='0' select>Todos</option>";
								echo FncCrearCombo($Consulta,"usuariob",'',$sufix,'','','');
							?>
						</div>
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncBuscar();">Buscar</button>
			            </div> 
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-1">Unidad No:</label>
						<div class="col-xs-1">
							<?php 
								$Consulta = "SELECT idUnidad as id, unidad_no as nombre FROM unidad ORDER BY nombre;";
								$sufix="<option value='0' select>Todos</option>";
								echo FncCrearCombo($Consulta,"unidadb",'',$sufix,'','','');
							?>
						</div>
						<label class="control-label col-xs-2">Incidente:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT inc.idIncidente id,  concat(ser.descServicio, ' ',  cau.descCausa, ' ', inc.descIncidente ) nombre
											from incidente inc
											INNER JOIN causa cau ON cau.idCausa = inc.idCausa
											INNER JOIN servicio ser ON ser.codServicio = inc.idservicio;";
								$sufix="<option value='0' select>Todos</option>";
								echo FncCrearCombo($Consulta,"categoriab",'',$sufix,'','','');
							?>
						</div>
					</div>
				</tr>
				<div  id='mostrar' name='mostrar' >
				</div>	
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
		$('#datetimepicker1b').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fechab1').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});

		$('#datetimepicker2b').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fechab2').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});

		$('#kilometraje_entrada').change(function(){
			$('#kilometros_recorridos').val($('#kilometraje_entrada').val()-$('#kilometraje_salida').val());
		});

		$('#hora_salida').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });

        $('#hora_entrada').datetimepicker({
        	locale: 'es',
        	format: 'H:mm:ss'
        });

        /*FncComboCategoria(1,'divsubcategoria');
        ValSubCategorias = $('#subcategorias').val();
		FncComboIncidente(ValSubCategorias,'divincidente');
        $('#categoria').change(function(){
            FncComboCategoria(this.value,'divsubcategoria');
            $('#subcategorias').select2();

            ValSubCategorias = $('#subcategorias').val();

            FncComboIncidente(ValSubCategorias,'divincidente');
	        $('#subcategorias').change(function(){
	            FncComboIncidente(this.value,'divincidente');
	            $('#incidentes').select2();
	        });
        });*/

        
        $('#telefonista').select2();
        $('#bombero_reporte').select2();
		$('#unidad').select2();
		$('#piloto').select2();
		$('#categoria').select2();
		$('#usuariob').select2();
		$('#categoriab').select2();
		$('#unidadb').select2();
		//$('#subcategorias').select2();
		//$('#incidentes').select2();
	});
</script>
<?php
	if(isset($_POST["Ingreso_Reporte_Servicio"]))
	{
		$Guardar = "INSERT INTO reporte (`idReporte`, `noReporte`, `direccionTraslado`, `paciente`, `direccionPaciente`, `edad`, `rangoedad`, `sexo`, `lugar_asistencia`, `aviso`, `Telefono`, `telefonista`, `unidad_no`, 
											`horaSalida`, `horaEntrada`, `piloto`, `fecha`, `kmSalida`, `kmEntrada`, `kmRecorridos`, `bomberoReporte`, `asistentes`, `observaciones`, `idIncidente`, `idUsuario`)
					VALUES ('', '".$_POST["Recibo"]."', '".$_POST["Direccion_traslado"]."', '".$_POST["Nombre_paciente"]."', '".$_POST["Direccion_paciente"]."', '".$_POST["Edad"]."', '".$_POST["Rango_edad"]."',
							'".$_POST["Sexo"]."', '".$_POST["Traslado_a"]."', '".$_POST["Aviso"]."', '".$_POST["Telefono"]."', '".$_POST["Telefonista"]."', '".$_POST["Unidad"]."', '".$_POST["Hora_salida"]."', 
							'".$_POST["Hora_entrada"]."', '".$_POST["Piloto"]."', '".$_POST["Fecha"]."', '".$_POST["Kilometraje_salida"]."', '".$_POST["Kilometraje_entrada"]."', '".$_POST["Kilometros_recorridos"]."',
							'".$_POST["Bombero_reporte"]."', '".$_POST["Bombero_asistente"]."', '".$_POST["Observaciones"]."', '".$_POST["Categoria"]."', '".$_SESSION['idusuario']."');";
		
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_reporte_servicio');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE reporte SET noReporte = '".$_POST["Recibo"]."', direccionTraslado = '".$_POST["Direccion_traslado"]."', paciente = '".$_POST["Nombre_paciente"]."', direccionPaciente = '".$_POST["Direccion_paciente"]."', 
										edad = '".$_POST["Edad"]."', rangoedad = '".$_POST["Rango_edad"]."', sexo = '".$_POST["Sexo"]."', lugar_asistencia = '".$_POST["Traslado_a"]."', aviso = '".$_POST["Aviso"]."', Telefono = '".$_POST["Telefono"]."', 
										telefonista = '".$_POST["Telefonista"]."', unidad_no = '".$_POST["Unidad"]."', horaSalida = '".$_POST["Hora_salida"]."', horaEntrada = '".$_POST["Hora_entrada"]."', piloto = '".$_POST["Piloto"]."', 
										fecha = '".$_POST["Fecha"]."', kmSalida = '".$_POST["Kilometraje_salida"]."', kmEntrada = '".$_POST["Kilometraje_entrada"]."', kmRecorridos = '".$_POST["Kilometros_recorridos"]."', 
										bomberoReporte = '".$_POST["Bombero_reporte"]."', asistentes = '".$_POST["Bombero_asistente"]."', observaciones = '".$_POST["Observaciones"]."', idIncidente = '".$_POST["Categoria"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idReporte='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_reporte_servicio');
			</script>";
	}
	else
	{
		
	}
?>

