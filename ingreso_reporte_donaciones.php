<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ingreso de Donaciones</title>
	</head>
	<body>
		<form class="form-horizontal">
			<table align="center" class="table table-bordered" style="width: 60%">
				<tr>
					<div class="form-group">
						
						<div class="col-xs-6">
							<input type="text" class="form-control" id="nombre" name="nombre" size="100">
						</div>
					</div>
				</tr>
				<tr align="center">
					<label class="control-label col-xs-3">(NOMBRE DEL COMITE, ASOCIACION, FUNDACION U OTRO)</label>
				</tr>
				<tr>
					<td align="center">
						<input type="text" id="lugar" name="lugar" size="100">
					</td>
				</tr>
				<tr>
					<td align="center">
						(LUGAR, MUNICIPIO Y DEPARTAMENTO)
					</td>
				</tr>
				<tr>
					<td>
						Fecha <input type="text" id="fecha" name="fecha">
					</td>
					<td>
						Ingreso por <input type="text" id="ingreso_por" name="ingreso_por">
					</td>
				</tr>
				<tr>
					<td>
						Recibida de <input type="text" id="recibida_de" name="recibida_de">
					</td>
				</tr>
				<tr>
					<td>
						La cantidad de <input type="text" id="cantidad" name="cantidad">
					</td>
					<td align="center">
						(ESCRIBASE EN LETRAS)
					</td>
				</tr>
				<tr>
					<td>
						Por contribucion voluntaria <input type="text" id="contribucion" name="contribucion">
					</td>
				</tr>
				<tr>
					<td>
						Otros conceptos <input type="text" id="otros_conceptos" name="otros_conceptos">
					</td>
				</tr>
				<tr>
					<td>
						Segun autorizacion de Gobernacion Departamental No. <input type="text" id="gobernacion" name="gobernacion">
					</td>
				</tr>
				<tr>
					<td>
						De fecha <input type="text" id="fecha_resolucion" name="fecha_resolucion"> No. Cuentadancia o Registro de la Contraloria General de Cuentas
						<input type="text" id="Cuentadancia" name="Cuentadancia">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php 
	$Usuario = "l";
	$Contrasenia = "p";
	if(($Usuario!="") && ($Contrasenia!=""))
	{
		if(isset($_POST["reporte_donaciones"]))
		{
			
		}
	}
	else
	{
		include("funciones/debe_iniciar_sesion.php");
	}
?>