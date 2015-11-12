<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de gastos</title>
		<script type="text/javascript" src="funciones/ingreso_personal.js"></script>
	</head>
	<body>
		<form class="form-horizontal ">
			<div class="panel panel-primary">
					<div class="panel-heading" id="Encabezado_Panel" name="Encabezado_Panel" align="center">
						<big>GENERAR SALDOS</big>
					</div>
				</div>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha de Inicio:</label>
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
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncBuscar();">Buscar</button>
			            </div> 
					</div>
				</tr>
				<div  id='mostrar' name='mostrar' >
				</div>	
			</table>
			<table id="tabla_saldos" cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
				<thead>
					<tr>
						<th> # </th>
						<th>Fecha</th>
						<th>Ingreso</th>
						<th>Motivo</th>
						<th></th>
						<th>Fecha</th>
						<th>Egreso</th>
						<th>Motivo</th>
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
    });
</script>
<?php 
	
	if(isset($_POST["Ingreso_Personal"]))
	{
		echo "Listo";
	}
	else
	{
		
	}

?>
