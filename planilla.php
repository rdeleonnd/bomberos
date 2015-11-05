<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Planilla</title>
		<script type="text/javascript" src="funciones/ingreso_personal.js"></script>
	</head>
	<body>
		<form class="form-horizontal ">
			<table align="center" class="table table-bordered" >
				<tr class="form-group">
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de inicio:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker1'>
			                    <input type='text' class="form-control" id="inicio" name="inicio"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
		            </div>
				</tr>
				<tr>
		            <div class="form-group">
		            	<label class="control-label col-xs-3">Fecha de cierre:</label>
		            	<div class="col-xs-2">
		            		<div class='input-group date' id='datetimepicker2'>
			                    <input type='text' class="form-control" id="cierre" name="cierre"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
		            	</div>
						<div class="form-group">
							<div class="input-group">
					                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
					        </div>
						</div>
		            </div>
				</tr>
			</table>
			<table id="tabla_personal" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th> # </th>
						<th>Empleado</th>
						<th>Días trabajados</th>
						<th>IGSS</th>
						<th>Adelantos</th>
						<th>Bonificación</th>
						<th>Total líquido</th>
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
        $('#inicio').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

        $('#datetimepicker2').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });
        $('#cierre').datetimepicker({
        	locale: 'es',
        	format: 'DD/MM/YYYY'
        });

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
