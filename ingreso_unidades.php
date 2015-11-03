<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Unidades</title>
		<script type="text/javascript" src="funciones/ingreso_unidades.js"></script>
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
						<label class="control-label col-xs-3">Codigo de unidad:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
					</div>
				</tr>
				<tr class="form-group">
					<div class="form-group">
						<label class="control-label col-xs-3">Modelo:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="modelo" name="modelo">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Tipo de vehículo:</label>
						<div class="col-xs-2">
							<select class="form-control" id="tipo" name="tipo">
								<option value="Pickup">Pickup</option>
								<option value="Microbus">Microbus</option>
								<option value="Camion">Camion</option>
								<option value="Cisterna">Cisterna</option>
								<option value="Motocicleta">Motocicleta</option>
								<option value="Bicicleta">Bicicleta</option>
							</select>
						</div>
					</div>
				</tr>
				<tr>
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de ingreso:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker1'>
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
						<label class="control-label col-xs-3">Número de chasis:</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="chasis" name="chasis">
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
						<th>Codigo unidad</th>						
						<th>Tipo</th>
						<th>Modelo</th>
						<th>Fecha de ingreso</th>
						<th>No. chasis</th>
						<th>Modificar</th>
					</tr>
				</thead>
				<tbody>
					
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
        $('#ingreso').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

        $('#divsexo2').select2();
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_unidad"]))
	{
		$Guardar = "INSERT INTO unidad (`idUnidad`, `unidad_no`, `tipo_vehiculo`, `modelo`, `fecha_ingreso`, `no_chasis`, `idUsuario`)
					VALUES ('', '".$_POST["Codigo"]."', '".$_POST["Tipo"]."', '".$_POST["Modelo"]."', '".$_POST["Ingreso"]."', '".$_POST["Chasis"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_unidades');
			</script>";
	}
	else
	{
		echo "No Listo";
	}

?>
