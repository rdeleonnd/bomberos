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
						<div class="input-group" id="divBtnGuardar">
			                <button type="button" class="btn btn-info" id="guardar" name="guardar" onclick="FncGuardar();">Guardar</button>
			            </div> 
			            <div class="input-group" id="divBtnModificar" style="display:none;">
			                <button type="button" class="btn btn-success" id="actualizar" name="actualizar" onclick="FncModificacion()" >Actualizar</button>
			                <button type="button" class="btn btn-danger" id="cancelar" name="cancelar" onclick="FncCancelar();">Cancelar</button>
			            </div>
					</div>
				</tr>
			</table>
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
		            <label class="control-label col-xs-1"> Comprobante:</label>
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
					<label class="control-label col-xs-1">Unidad:</label>
					<div class="col-xs-1">
						<?php 
							$Consulta = "SELECT idUnidad as id, unidad_no as nombre FROM unidad;";
							$sufix="<option value='0' select>Todos</option>";
							echo FncCrearCombo($Consulta,"unidadb",'',$sufix,'','','');
						?>
					</div>
				</div>
			</tr>
			<div  id='mostrar' name='mostrar' >
			</div>	
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

        $('#unidad').select2();
        $('#unidadb').select2();
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
		//echo $Guardar ;
		$insert = $Conexion->Insertar($Guardar);
		
		echo "<script>
				alert('Se Guardaron los registros');
				cargar_pagina('ingreso_combustibles');
			</script>";	
	}
	else if(isset($_POST["Modificar"]))
	{
		$Actualizar = "UPDATE combustible SET fecha = '".$_POST["Fecha"]."', cantGalones = '".$_POST["Galones"]."', costo = '".$_POST["Costo"]."', kilometraje = '".$_POST["Kilometraje"]."',  gasolinera = '".$_POST["Gasolinera"]."',
											no_vale = '".$_POST["Vale"]."', piloto = '".$_POST["Piloto"]."', idUnidad = '".$_POST["Unidad"]."', noComprobante = '".$_POST["Comprobante"]."', descripcion = '".$_POST["Descripcion"]."', 
											idUsuario = '".$_SESSION['idusuario']."'
                  		WHERE idAbastecimiento='".$_POST["ID"]."';";
        $Result = $Conexion->Actualizar($Actualizar);
	
		echo "<script>
				alert('Se Modificaron los registros');
				cargar_pagina('ingreso_combustibles');
			</script>";
	}
	else
	{
		
	}

?>
