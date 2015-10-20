<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Personal</title>
		<script type="text/javascript" src="funciones/ingreso_personal.js"></script>
	</head>
	<body>
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
						<label class="control-label col-xs-3">Estado del Bombero:</label>
						<div class="col-xs-1">
							<select class="form-control" id="estado" name="estado">
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>
							</select>
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
						<th>Sueldo</th>
						<th>Estado</th>
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
