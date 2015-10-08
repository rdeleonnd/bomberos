<?php
	
	function FncCrearCombo($Consulta,$Nombre,$Funcion,$Prefijo,$Sufijo,$Seleccionado,$Error)
	{   
		include('conexion/configuracion_db.php');
		require_once('conexion/conexion.php'); 
		$MyOps = new DB($Usuario,$Clave,$DB,$Host);
		$count=0;
		$combo="<select id ='".$Nombre."' name ='".$Nombre."' ".$Funcion." >";
		$combo.=$Prefijo;
		$res = $MyOps->list_orders($Consulta);
		if ($res)
		{
			while ($row = mysql_fetch_assoc($res)) 
			{
				$count++;
				if ($Seleccionado==$row['id'])
					$combo.="<option value='".$row['id']."' selected>".utf8_encode($row["nombre"])." *</option>";
				else
					$combo.="<option value='".$row['id']."'>".utf8_encode($row["nombre"])."</option>";
			}
		}

		$combo.=$Sufijo."</select>";
		if ($count==0)
		{
			$combo =" <img src='img/cancelar.gif'> <font color =red><b>No existen Datos</b></font>";
		}
		return $combo;
	}

?>