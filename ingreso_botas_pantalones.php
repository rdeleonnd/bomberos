<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso botas y pantalones</title>
		<script type="text/javascript" src="funciones/ingreso_botas_pantalones.js"></script>
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
						<label class="control-label col-xs-3">Nombre:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Código anterior:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="cod_anterior" name="cod_anterior">
						</div>
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Código reciente:</label>
				            	<input class="form-control" type="text" id="cod_reciente" name="cod_reciente">
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Asignado a:</label>
						<div class="col-xs-2">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"empleado",'','','','','');
							?>
						</div>
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Talla:</label>
				            	<input class="form-control" type="text" id="talla" name="talla">
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Observaciones:</label>
						<div class="col-xs-4">
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
						<th>Nombre</th>
						<th>Talla</th>
						<th>Código anterior</th>
						<th>Código reciente</th>
						<th>Asignado a </th>
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

        $('#empleado').select2();
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Botas_Pantalones"]))
	{
		echo "Listo";
	}
	else
	{
		echo "No Listo";
	}

?>
