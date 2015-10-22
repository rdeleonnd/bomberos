<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Personal</title>
		<script type="text/javascript" src="funciones/ingreso_personal.js"></script>
	</head>
	<body>
		<?php
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal ">
			<table align="center" class="table table-bordered" >
				<tr class="form-group">
					<div class="form-group">
						<label class="control-label col-xs-3">Codigo del empleado:</label>
						<div class="col-xs-1">
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Nombres del empleado:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Apellidos del empleado:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="apellido" name="apellido">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Direccion del empleado:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="direccion" name="direccion">
						</div>
					</div>
				</tr>
				<tr>
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Nacimiento del empleado :</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker1'>
			                    <input type='text' class="form-control" id="nacimiento" name="nacimiento"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Sexo del empleado:</label>
						<div class="col-xs-2">
							<select class="form-control" id="sexo" name="sexo">
								<option value="Hombre">Hombre</option>
								<option value="Mujer">Mujer</option>
							</select>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Estado civil del empleado:</label>
						<div class="col-xs-2">
							<select class="form-control" id="estado_civil" name="estado_civil">
								<option value="Soltero">Solter@</option>
								<option value="Casado">Casad@</option>
								<option value="Divorciado">Divorciad@</option>
								<option value="Viudo">Viud@</option>
							</select>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Telefono del empleado:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
				        <label class="control-label col-xs-3">Asalariado:</label>
				        <div class="col-xs-1">
				            <div class="input-group">
				                <select id="estado_sueldo" name="estado_sueldo" class="form-control col-xs-4">
									<option value="SI">SI</option>
									<option value="NO">NO</option>
								</select>
				            </div>
				        </div>
				        <div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Ingrese el Sueldo:</label>
								<input type="text" class="form-control allownumericwithdecimal" id="sueldo" name="sueldo" value="0.00">
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Ingreso del empleado :</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker2'>
			                    <input type='text' class="form-control" id="ingreso" name="ingreso"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Seleccione El Rango:</label>
						<div class="form-inline col-xs-6">
							<?php 
								$Consulta = "SELECT idRango as id, descRango as nombre FROM rango ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"rango",'class="form-control col-xs-3"','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Seleccione El Estado:</label>
						<div class="form-inline col-xs-3">
							<?php 
								$Consulta = "SELECT idEstado as id, Estado as nombre FROM estado ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"estado",'class="form-control col-xs-3"','','','','');
							?>
						</div>
						<div class="input-group">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div>
					</div>
				</tr>
			</table>
			<table id="tabla_personal" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th> # </th>
						<th>Codigo del Empleado</th>
						<th>Nombres del Empleado</th>
						<th>Apellidos del Empledo</th>
						<th>Direccion del empleado</th>
						<th>Telefono del empleado</th>
						<th>Fecha de Ingreso</th>
						<th>Sueldo</th>
						<th>Estado</th>
						<th>Puesto</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$Consulta = "SELECT per.idEmpleado, per.CodEmpleado, per.nombres, per.apellidos, per.direccion, per.telefono, per.fechaIngreso,per.salario, ra.descRango, es.Estado
									FROM personal per
									INNER JOIN rango ra ON ra.idRango = per.idRango
									INNER JOIN estado es ON es.idEstado = per.idEstado;";

						$Respuesta = $Conexion->list_orders($Consulta);
						while ($row = mysql_fetch_assoc($Respuesta))
						{
                    		$Modificar = "<image class='btn btn-default' src='img/modificar.png' title='Modificar Registro' onclick='FncMofificarEstado(".$row['idEmpleado'].", \"".$row['nombres']."\")'>";
							
							echo "<tr>
										<td>".$row['idEmpleado']."</td>
										<td>".$row['CodEmpleado']."</td>
										<td>".$row['nombres']."</td>
										<td>".$row['apellidos']."</td>
										<td>".$row['direccion']."</td>
										<td>".$row['telefono']."</td>
										<td>".$row['fechaIngreso']."</td>
										<td>".$row['salario']."</td>
										<td>".$row['descRango']."</td>
										<td>".$row['Estado']."</td>
										<td>".$Modificar."</td>
									</tr>
									";
						}
					?>
				</tbody>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#datetimepicker2').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#nacimiento').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#ingreso').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

        $('#estado_sueldo').change(function(){
        	Sueldo = $('#estado_sueldo').val();
        	if(Sueldo == 'SI')
        	{
        		$('#sueldo').prop('disabled', false);
        		$('#sueldo').val('0.00');
        	}
        	else
        	{
        		$('#sueldo').prop('disabled', true);
        		$('#sueldo').val('0.00');
        	}
        });

        $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
		    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $('#divsexo2').select2();
        FncTabla('tabla_personal');
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Personal"]))
	{
		$Guardar = "INSERT INTO personal(`idEmpleado`, `CodEmpleado`, `nombres`, `apellidos`, `direccion`, `fechaNacimiento`, `sexo`, `edoCivil`, `telefono`, `idRango`, `fechaIngreso`, `salario`, `idEstado`) 
					VALUES ('', '".$_POST["codigo"]."', '".$_POST["nombre"]."', '".$_POST["apellido"]."', '".$_POST["direccion"]."', '".$_POST["nacimiento"]."', 
							'".$_POST["sexo"]."', '".$_POST["estado_civil"]."', '".$_POST["telefono"]."', '".$_POST["rango"]."', '".$_POST["ingreso"]."', 
							'".$_POST["sueldo"]."', '".$_POST["estado"]."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_personal');
			</script>";
	}
	else
	{
		
	}

?>
