<?php
	session_start();

	include('funciones/funciones.php');
	include('funciones/conexion/configuracion_db.php');
	require_once('funciones/conexion/conexion.php'); 
	$Conexion = new DB($Usuario,$Clave,$DB,$Host);

	if(isset($_POST["BuscarDonaciones"]))
	{
		$Fechas = " AND don.fecha BETWEEN ".$_POST["Fechab1"]." AND ".$_POST["Fechab2"]."";

		if($_POST["Recibob"] != '')
		{
			$Recibo = " AND don.recibo = '".$_POST['Recibob']."' ";
		}
		else
		{
			$Recibo  = "";
		}

		if($_POST["Usuariob"] != 0)
		{
			$Usuario = "WHERE don.idUsuario = ".$_POST["Usuariob"] ."";
		}
		else
		{
			$Usuario  = "";
		}

		echo "<div class='form-group'>
					<table id='tabla_donaciones' cellpadding='0' cellspacing='0' border='0' class='table table-striped'>
						<thead>
							<tr>
								<th> # </th>
								<th>Recibo No.</th>
								<th>COMITE, ASOCIACION, FUNDACION U OTRO</th>
								<th>LUGAR, MUNICIPIO Y DEPARTAMENTO</th>
								<th>Fecha</th>
								<th>Monto</th>
								<th>Motivo</th>
								<th>Persona que Recibe</th>
								<th>Usuario de Registro</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>";
								$Consulta = "SELECT don.noRecibo, don.recibo, don.nombreDonador, don.direccion, don.fecha, date_format(don.fecha, '%d/%m/%Y') fecha, don.cantidad, don.motivo, don.recibe, concat(per.CodEmpleado,  ' | '  , per.nombres) nombre, don.idUsuario, us.nombreUser 
											FROM donacion don
											INNER JOIN personal per ON per.idEmpleado = don.recibe
											INNER JOIN usuario us ON us.idUsuario = don.idUsuario
											".$Usuario.$Fechas.$Recibo.";";
								//echo $Consulta;
								$Respuesta = $Conexion->list_orders($Consulta);
								$x=0;
								while ($row = mysql_fetch_assoc($Respuesta))
								{
									$x++;
									$Modificar = '<image class=btn btn-default src=img/modificar.png title=Modificar Registro onclick="FncModificar(\''.$row["noRecibo"].'\', \''.$row["recibo"].'\', \''.$row["nombreDonador"].'\', \''.$row["direccion"].'\', \''.$row["fecha"].'\', \''.$row["cantidad"].'\', \''.$row["motivo"].'\', \''.$row["recibe"].'\');">';
									
									echo '<tr>
												<td>'.$x.'</td>
												<td>'.$row["recibo"].'</td>
												<td>'.$row["nombreDonador"].'</td>
												<td>'.$row["direccion"].'</td>
												<td>'.$row["fecha"].'</td>
												<td>'.$row['cantidad'].'</td>
												<td>'.$row["motivo"].'</td>
												<td>'.$row['nombre'].'</td>
												<td>'.$row["nombreUser"].'</td>
												<td>'.$Modificar.'</td>
											</tr>
											';
								}
						echo "</tbody>
					</table>
				</div>
				<script>
					FncTabla('tabla_donaciones');
				</script>";
	} 
?>