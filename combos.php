<?php 
	include('funciones/funciones.php');
			
	if(isset($_POST["subcategorias"]))
	{
		$Consulta = "SELECT idCausa as id, descCausa as nombre from causa
					 WHERE codServicio = '".$_POST["ID"]."'
					 ORDER BY nombre;";
		
		echo FncCrearCombo($Consulta,"subcategorias",'','','','','');	
	}
	else if(isset($_POST["incidente"]))
	{
		$Consulta = "SELECT idIncidente id, descIncidente nombre from incidente
					 WHERE idCausa = '".$_POST["ID"]."'
					 ORDER BY nombre;";
		echo FncCrearCombo($Consulta,"incidentes",'','','','','');
	}
	else
	{

	}
?>