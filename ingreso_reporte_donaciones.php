<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Donaciones</title>
		<script type="text/javascript" src="funciones/ingreso_reporte_donaciones.js"></script>

	</head>
	<body>
		<?php
			include('funciones/funciones.php');
			include('funciones/conexion/configuracion_db.php');
			require_once('funciones/conexion/conexion.php'); 
			$Conexion = new DB($Usuario,$Clave,$DB,$Host);
		?>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" >
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3"> Recibo No:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo"> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Donante</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Direccion</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="lugar" name="lugar">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Fecha:</label>
						<div class="col-xs-2">
							<div class='input-group date' id='datetimepicker1'>
			                   <input class="form-control" type="text" id="fecha" name="fecha">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			            <div class="col-xs-3">
			            	<div class="input-group">
			            		<label class="input-group-addon" for="ingreso_por">Ingreso por:</label>
			                	<input class="form-control allownumericwithdecimal" type="text" id="ingreso_por" name="ingreso_por" >
			            	</div>
			            </div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Motivo</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="motivo" name="motivo">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">Persona que Recibe</label>
						<div class="col-xs-3">
							<?php 
								$Consulta = "SELECT idEmpleado id, concat(CodEmpleado, ' | ' , nombres) nombre from personal ORDER BY nombre;";
								echo FncCrearCombo($Consulta,"usuario",'','','','','');
							?>
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
			            <label class="control-label col-xs-1"> Recibo No:</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibob" name="recibob"> 
						</div>
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-success" id="guardar" name="guardar" onclick="FncBuscar();">Buscar</button>
			            </div> 
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-1">Persona que Recibe</label>
						<div class="col-xs-3">
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#datetimepicker1').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});
		$('#fecha').datetimepicker({
			locale: 'es',
        	format: 'DD/MM/YYYY'
		});

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

		$(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
		    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $('#usuario').select2();
        $('#usuariob').select2();
	});
</script>
<?php 
	if(isset($_POST["Ingreso_Reporte_Donaciones"]))
	{
		$Guardar = "INSERT INTO donacion (`noRecibo`, `recibo`, `nombreDonador`, `Direccion`, `fecha`, `cantidad`, `motivo`, `recibe`, `idUsuario`)
					VALUES ('', '".$_POST["Recibo"]."', '".$_POST["Nombre"]."', '".$_POST["Lugar"]."', '".$_POST["Fecha"]."', '".$_POST["Ingreso_por"]."', '".$_POST["Motivo"]."', '".$_POST["Usuario"]."', '".$_SESSION['idusuario']."');";
		$insert = $Conexion->Insertar($Guardar);
		
	
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_reporte_donaciones');
			</script>";
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE donacion SET recibo = '".$_POST["Recibo"]."', nombreDonador = '".$_POST["Nombre"]."', Direccion = '".$_POST["Lugar"]."', fecha = '".$_POST["Fecha"]."', cantidad = '".$_POST["Ingreso_por"]."', motivo = '".$_POST["Motivo"]."', recibe = '".$_POST["Usuario"]."', idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE noRecibo='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_reporte_donaciones');
			</script>";
	}
	else
	{
		
	}
?>