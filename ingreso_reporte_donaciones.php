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
						<label class="control-label col-xs-3"> Reporte # :</label>
						<div class="col-xs-2">
							<input class="form-control" type="text" id="recibo" name="recibo"> 
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">(NOMBRE DEL COMITE, ASOCIACION, FUNDACION U OTRO)</label>
						<div class="col-xs-5">
							<input class="form-control" type="text" id="nombre" name="nombre">
						</div>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<label class="control-label col-xs-3">(LUGAR, MUNICIPIO Y DEPARTAMENTO)</label>
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
			                	<input class="form-control allownumericwithdecimal" type="text" id="ingreso_por" name="ingreso_por" value="0.00">
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
						<div class="input-group">
				                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
				        </div>
					</div>
				</tr>
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

		$(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
		    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $('#usuario').select2();
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
	else
	{
		echo "No Listo";
	}
?>