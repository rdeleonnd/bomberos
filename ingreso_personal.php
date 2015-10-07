<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Personal</title>
	</head>
	<body>
		<form class="form-horizontal ">
			<table align="center" class="table table-bordered" >
				<tr>
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
						<div class="col-xs-3">
							<input type="text" class="form-control" id="direccion" name="direccion">
						</div>
					</div>
				</tr>
				<tr>
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de Nacimiento del empleado :</label>
		                <div class='input-group date col-xs-1' id='datetimepicker1'>
		                    <input type='text' class="form-control" id="nacimiento" name="nacimiento"/>
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Sexo del empleado:</label>
						<div class="col-xs-1">
							<div class="col-xs-3" id="divsexo"></div>
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
						<div class="col-xs-1">
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
						<div class="form-inline col-xs-3">
							<select id="estado_sueldo" name="estado_sueldo" class="form-control col-xs-2">
								<option value="SI">SI</option>
								<option value="NO">NO</option>
							</select>
							 <label class="form-inline " for="sueldo">Ingrese el Sueldo:</label>
							<input type="text" class="form-control allownumericwithdecimal" id="sueldo" name="sueldo" value="0.00">
						</div>
					</div>
				</tr>
			</table>
		</form>
	</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
        	format: 'DD/MM/YYYY'
        });
        $('#nacimiento').datetimepicker({
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
include_once('funciones/funciones.php');
	$Consulta = "SELECT idusuario as id, usuario as nombre FROM usuario;";
	echo FncCrearCombo($Consulta,"divsexo2",'','','','','');

?>
