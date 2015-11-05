<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso equipo hidráulico</title>
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
						<label class="control-label col-xs-3">Nombre:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Código Reciente:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="cod_anterior" name="cod_anterior">
						</div>
						<div class="col-xs-2">
				            <label class="control-label col-xs-3">Marca:</label>
							<div class="col-xs-3">
							<select class="form-control" id="marca" name="marca">
								<option value="">Elige Marca</option>
							</select>
						</div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Asignado a:</label>
						<div class="col-xs-3">
							<select class="form-control" id="empleado" name="empleado">
								<option value="">Elige empleado</option>
							</select>
						</div>
						<div class="col-xs-2">
				            <div class="input-group">
				            	<label class="input-group-addon">Color:</label>
				            	<input class="form-control" type="text" id="color" name="color">
				            </div>
				        </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Cantidad:</label>
						<div class="col-xs-3">
							<input class="form-control" type="text" id="cantidad" name="cantidad">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">						
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
						<th>Marca</th>
						<th>Color</th>
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
        $('#datetimepicker1').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#nacimiento').datetimepicker({
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
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Personal"]))
	{
		echo "Listo";
	}
	else
	{
		echo "No Listo";
	}

?>
