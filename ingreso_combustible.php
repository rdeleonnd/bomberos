<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de combustible</title>
		<script type="text/javascript" src="funciones/ingreso_combustibles.js"></script>
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
						<label class="control-label col-xs-3">Fecha:</label>
						<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker1'>
			                    <input type='text' class="form-control" id="fecha" name="fecha"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"># de Vale:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="vale" name="vale">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Unidad:</label>
						<div class="col-xs-1">
							<?php 
								$Consulta = "SELECT idUnidad as id, unidad_no as nombre FROM unidad;";
								echo FncCrearCombo($Consulta,"unidad",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Galones:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="galones" name="galones">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Costo:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control allownumericwithdecimal" id="costo" name="costo">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Kilometraje:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="kilometraje" name="kilometraje">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Gasolinera:</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="gasolinera" name="gasolinera">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Piloto:</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"piloto",'','','','','');
							?>
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Comprobante:</label>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="comprobante" name="comprobante">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Descripción:</label>
						<div class="col-xs-5">
							<textarea class="form-control" rows="3" placeholder="Campo de texto" id="descripcion" name="descripcion" maxlength="200"></textarea>
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
						<th>Unidad</th>
						<th>Galones</th>
						<th>Monto</th>
						<th>Fecha</th>
						<th>Piloto</th>						
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
        $('#fecha').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

        $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
		    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $('#unidad').select2();
        $('#piloto').select2();
        $('#kilometraje').ForceNumericOnly();
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Combustibles"]))
	{
		$Guardar = "INSERT INTO combustible (`idAbastecimiento`, `fecha`, `cantGalones`, `costo`, `kilometraje`, `gasolinera`, `no_vale`, `piloto`, `idUnidad`, `noComprobante`, `descripcion`, `idUsuario`)
					VALUES ('', '".$_POST["Fecha"]."', '".$_POST["Galones"]."', '".$_POST["Costo"]."', '".$_POST["Kilometraje"]."', '".$_POST["Gasolinera"]."', '".$_POST["Vale"]."',
							'".$_POST["Piloto"]."', '".$_POST["Unidad"]."', '".$_POST["Comprobante"]."', '".$_POST["Descripcion"]."','".$_SESSION['idusuario']."');";
		echo $Guardar ;
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_combustible');
			</script>";	}
	else
	{
		echo "No Listo";
	}

?>
