<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Asistencia</title>
		<script type="text/javascript" src="funciones/ingreso_salida_asistencia.js"></script>
	</head>
	<body>
		<?php
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<table>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha de Turno:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php  $time = time(); echo date('d/m/Y H:i:s', $time);?>" disabled>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombre del Turno:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT id_turno as id, nombreTurno as nombre FROM turno;";
								echo FncCrearCombo($Consulta,"nombre",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Codigo del Empleado:</label>
						<div class="col-xs-3">
							<?php 
								include_once('funciones/funciones.php');
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Obsrvaciones:</label>
						<div class="col-xs-3">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="observaciones" name="observaciones" maxlength="1000"></textarea>
						</div>
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div> 
			            <div class="input-group" id="divBtnModificar" style="display:none;">
			                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion()" >Actualizar</button>
			                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
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
			            <div >
							<label class="control-label col-xs-1">Nombre del Turno:</label>
							<div class="col-xs-2">
								<?php 
									$Consulta = "SELECT id_turno as id, nombreTurno as nombre FROM turno;";
									$sufix="<option value='0' select>Todos</option>";
									echo FncCrearCombo($Consulta,"nombreb",'',$sufix,'','','');
								?>
							</div>
						</div>
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncBuscar();">Buscar</button>
			            </div> 
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-1">Usuario:</label>
						<div class="col-xs-1">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								$sufix="<option value='0' select>Todos</option>";
								echo FncCrearCombo($Consulta,"usuariob",'',$sufix,'','','');
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
<script>
	$(document).ready(function(){
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

		$('#nombre').select2();
		$('#usuario').select2();
		$('#usuariob').select2();
		$('#nombreb').select2();
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Salida_Asistencia"]))
	{
		$Guardar = "INSERT INTO asistenciasalida (`idAsistenciaSalida`, `idEmpleado`, `fecha`, `observaciones`, `id_turno`, `idUsuario`) 
					VALUES ('', '".$_POST["Usuario"]."', now(), '".$_POST["Observaciones"]."', '".$_POST["Nombre"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_salida_asistencia');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE asistenciasalida SET idEmpleado = '".$_POST["Usuario"]."', observaciones = '".$_POST["Observaciones"]."', id_turno = '".$_POST["Nombre"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idAsistenciaSalida='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_salida_asistencia');
			</script>";
	}
	else
	{
		
	}
?>