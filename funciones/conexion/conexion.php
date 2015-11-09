<?php
    date_default_timezone_set("America/Guatemala");
    class DB
    {
        var $user;
        var $password;
        var $namedb;

        
        function DB($r_Usuario, $r_Clave, $r_DB, $r_Host )
        {
            $this->user = $r_Usuario;
            $this->password = $r_Clave;
            $this->host  = $r_Host;
    		$this->namedb = $r_DB;       
        }

    	function get_allowed_types()
    	{
    		$Enlace = mysql_connect($this->host, $this->user, $this->password);
    		if($Enlace)
    		{
				$db_seleccionada = mysql_select_db($this->namedb) ;
				if ($db_seleccionada)
				{

					// Performing SQL query
					$Consulta = "select * from movement_type where show_list = 1;";
					$Resultado = mysql_query($Consulta, $Enlace);

					if($Resultado)
					{								
						while ($Fila = mysql_fetch_assoc($Resultado)) 
                        {
							$Respuesta_Encabezado = $Fila['idtype_movement'];//."#".row[""];
                        }
					}
					else 
                    {
						$Respuesta_Encabezado = "";
						die('Could not connect:1 ' . mysql_error());
					}
				}  
                else 
                {
					$Respuesta_Encabezado ="";
					die('Could not connect:2 ' . mysql_error());
				}
				// Closing connection
				mysql_close($Enlace);
    		}
    		else
            {
    			die('Could not connect:3 ' . mysql_error());
    		}
    	}

        function FncEjecutarProcedimiento($Procedimiento, $Parametros)
        {
            $Enlace = mysql_connect($this->host, $this->user, $this->password);
            if($Enlace)
            {
                $db_seleccionada = mysql_select_db($this->namedb) ;
                if ($db_seleccionada)
                {

                    // Performing SQL query
                    $Consulta = "call ".$Procedimiento."(".$Parametros.");";
                    $Resultado = mysql_query($Consulta, $Enlace);

                    if($Resultado)
                    {
                        $Respuesta = 0;
                    }
                    else 
                    {
                        $Respuesta_Encabezado = 1;
                        die('Could not connect:1 ' . mysql_error());
                    }
                }  
                else 
                {
                    $Respuesta_Encabezado = 2;
                    die('Could not connect:2 ' . mysql_error());
                }
                // Closing connection
                mysql_close($Enlace);
            }
            else 
            {
                die('Could not connect:3 ' . mysql_error());
            }
        }

        function FncProcedimientoAlmacenado($Procedimiento, $Parametros)
        {
            $Enlace = mysql_connect($this->host, $this->user, $this->password);
            if($Enlace)
            {
                $db_seleccionada = mysql_select_db($this->namedb) ;
                if ($db_seleccionada)
                {

                    // Performing SQL query
                    $Consulta = "call ".$Procedimiento."(".$Parametros.");";
                    $Resultado = mysql_query($Consulta, $Enlace);

    				if($Resultado)
					{								
						/*while ($row = mysql_fetch_assoc($Resultado)) {
							echo "<TR><TD><INPUT TYPE='CHECKBOX'></TD>"."<TD>".$row["order_date"]."</TD>"."<TD>".$row["idcustomer"]."</TD>"."<TD>".$row["lastname"]."</TD>"."<TD>".$row["firstname"]."</TD>"."<TD>".$row["idorder"]."</TD>"."<TD>".$row["edition_date"]."</TD>"."<TD>".$row["total_items"]."</TD>"."<TD>".$row["total_price"]."</TD>"."<TD>".$row["name"]."</TD>"."<TD>".$row["username"]."</TD></TR>";
                        }*/
					}
    				else 
                    {
						$Resultado = null;
						die('Could not connect:1 ' . mysql_error());
    				}
    			}  
                else 
                {
					$Resultado = null;
					die('Could not connect:2 ' . mysql_error());
				}
    				// Closing connection
    				mysql_close($Enlace);
        		}
    		else 
            {
				$Resultado = null;
				die('Could not connect:3 ' . mysql_error().$this->host."ddd");
    		}
        	return $Resultado;
        }

        function list_orders($Consulta)
        {
    		$Enlace = mysql_connect($this->host, $this->user, $this->password);
    		if($Enlace)
    		{
    				$db_seleccionada = mysql_select_db($this->namedb) ;
    				if ($db_seleccionada)
    				{

						// Performing SQL Consulta
												
						$Resultado = mysql_query($Consulta, $Enlace);

						if($Resultado)
						{								
							/*while ($row = mysql_fetch_assoc($Resultado)) {
								echo "<TR><TD><INPUT TYPE='CHECKBOX'></TD>"."<TD>".$row["order_date"]."</TD>"."<TD>".$row["idcustomer"]."</TD>"."<TD>".$row["lastname"]."</TD>"."<TD>".$row["firstname"]."</TD>"."<TD>".$row["idorder"]."</TD>"."<TD>".$row["edition_date"]."</TD>"."<TD>".$row["total_items"]."</TD>"."<TD>".$row["total_price"]."</TD>"."<TD>".$row["name"]."</TD>"."<TD>".$row["username"]."</TD></TR>";
                            }*/
						}
						else 
                        {
							$Resultado = null;
							die('Could not connect:1 ' . mysql_error());
						}
    				}  
                    else 
                    {
						$Resultado = null;
						die('Could not connect:2 ' . mysql_error());
    				}
    				// Closing connection
    				mysql_close($Enlace);
    		}
    		else 
            {
				$Resultado = null;
				die('No se puede conectar:3 ' . mysql_error().$this->host."ddd");
    		}
    		return $Resultado;
    	}

        function Insertar($Consulta)
        {
            $Respuesta = FALSE;
            $Enlace = mysql_connect($this->host, $this->user, $this->password);
            if($Enlace)
            {
                //echo "Enlace<br>";
                $db_seleccionada = mysql_select_db($this->namedb);
                if ($db_seleccionada)
                {
                    $Resultado = mysql_query($Consulta, $Enlace);

                    if($Resultado)
                    {
                        $Respuesta = TRUE;
                         // Free resultset
                        $this->transac_id = mysql_insert_id();
                        //mysql_free_result($Resultado);
                    }
                    else 
                    {
                        //$message  = 'Invalid query: ' . mysql_error() . "\n";
                        //$message .= 'Whole query: ' . $query;
                        die('001 No se puede conectar: ' . mysql_error());
                    }
                }
                else 
                {
                    $Respuesta_Encabezado = 2;
                    die('002 No se puede conectar: ' . mysql_error());
                }
                // Closing connection
                mysql_close($Enlace);
            }
            else 
            {
                    die('003 No se puede conectar: ' . mysql_error());
            }
            return $Respuesta;
        }

        function Actualizar($Consulta)
        {
            $Respuesta = FALSE;
            $Enlace = mysql_connect($this->host, $this->user, $this->password);
            if($Enlace)
            {
                //echo "Enlace<br>";
                $db_seleccionada = mysql_select_db($this->namedb);
                if ($db_seleccionada)
                {
                    $Resultado = mysql_query($Consulta, $Enlace);

                    if($Resultado)
                    {
                        $Respuesta = TRUE;
                         // Free resultset
                        $this->transac_id = mysql_affected_rows();
                        //mysql_free_result($Resultado);
                    }  
                    else 
                    {
                        //$message  = 'Invalid query: ' . mysql_error() . "\n";
                        //$message .= 'Whole query: ' . $query;
                        die('001 No se puede conectar: ' . mysql_error());
                    }
                }
                else 
                {
                    $Respuesta_Encabezado = 2;
                    die('002 No se puede conectar: ' . mysql_error());
                }
                // Closing connection
                mysql_close($Enlace);
            }
            else 
            {
                    die('003 No se puede conectar: ' . mysql_error());
            }
            return $Respuesta;
        }
    }
?>