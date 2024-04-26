<?php
	/* Clase de RD para hacer conexion y consultas al MYSQL*/
	class RDMsql
	{
		const SALT	=	'';
		const VALD	=	'';//['SELECT','UPDATE','INSERT','DELETE'];

		/*
			****************
			*****
				* Clases de Base de datos
			*****
			****************
		*/
		public function conectar($conn = __conector__)
		{ 
			$connect = "No se pudo conectar a la db";
			$con     = json_decode($conn);

			if($con->con != "")
				$connect = mysqli_connect($con->con, $con->usuario, $con->clave, $con->base);

			return $connect;
		}


		public function QRY($data)
		{
			// validamos el modelo de datos. 
			if (!isset($data['c']))
				return "No se encontró una conexión";
			else if (!isset($data['qry']))
				return "No se encontró una consulta";

			if(count($data) < 2)
				return "Se necesita, conexión y query para continuar";

			
			

			$re['estado'] = false;
			$data['qry'] = trim($data['qry']);
			if($data['qry'] != '')
			{
				$pattern = '/^(SELECT|HASH|UPDATE|INSERT|WITH|DELETE)[\s\S]+?\s*?$/';
				preg_match($pattern, $data['qry'], $mtch);
				if(count($mtch)>0)
				{
					// VALD -> En PHP 5.5.9 no soporta arrays 
						$VALD = ['SELECT','UPDATE','INSERT','DELETE'];
					if( in_array(strtoupper($mtch[1]), $VALD) )   // self::VALD se reemplaza por $VALD
					{
						switch (strtoupper($mtch[1])) {
							case 'SELECT':
								$res 			= 	@mysqli_query($data['c'], $data['qry']);
								if(!$res)
									$re['estado'] 		= false;
								else
								{
									$cant 			= @mysqli_num_rows($res);
									$re['cantidad'] = $cant;
									for ($i=0; $i<$cant; $i++)
										$re['datos'][$i] = @mysqli_fetch_array($res, MYSQLI_ASSOC);

									$re['estado'] 		= true;
								}

								$re['afectadas'] 	= $data['c']->affected_rows;
								$re['error'] 		= $data['c']->error;
							break;
							case 'INSERT':
							case 'UPDATE':
							case 'DELETE':
								
								$res 	         = @mysqli_query($data['c'], $data['qry']);
								$re['debug'] = $res;
								$re['afectadas'] = $data['c']->affected_rows;
								$re['cantidad']  = $re['afectadas'];

								if(strtoupper($mtch[1]) == 'INSERT')
									$re['ultimo_id'] = @mysqli_insert_id($data['c']);
								
								$re['error'] 	= $data['c']->error;
								$re['estado']	= (!$res) ? false :  true;
							
							break;

							case 'DELETE':
								$permitido = false;
									
								if( explode('-xx-x', $data['qry'])[1] == base64_encode(date('Ymd')) )
								{
									$permitido = true;
									$data['qry'] = explode('-xx-x', $data['qry'])[0];
								}
									echo $data['qry'];
								if($permitido === true)
								{
									$res 	= @mysqli_query($data['c'], $data['qry']);
									$re['afectadas'] = $data['c']->affected_rows;
									if(strtoupper($mtch[1]) == 'INSERT')
										$re['ultimo_id'] = @mysqli_insert_id($data['c']);
									
									$re['error'] 	= $data['c']->error;
									$re['estado']	= (!$res) ? false :  true;
								}
								else
								{
									$re['error'] 	= $data['qry'];
									$re['estado'] 	= 'No permitida la accion ねこ';
								}
							break;

							case 'HASH':
								$re['res'] = SELF::encrypta($data['qry']);
							break;
							default:
								$re['estado'] = 'No se identifico una sentencia SQL valida, para eliminar un campo de la base, utilice el update  neko.';
							break;
						}
					}
					else
						$re['estado'] = 'Error de consulta al validar la query';
				}
				else
					$re['estado'] = 'Error de consulta, verifique el formato de la query';
			}
			// $debug == 1 &&
			if( gettype($re) == 'array' && 1 == 2)
			{
				$re['debug']['qry'] 		= $data['qry'];
				$re['debug']['match']		= $mtch;
			}
			
			// if($ultima_consulta == 1)
			// 	SELF::cerrarConexion($c);
			
			return $re;
		}

		public function traeDatos($res, $modelo = MYSQLI_ASSOC)
		{
			return @mysqli_fetch_array($res, $modelo);
		}
		public function cerrarConexion($c)
		{
			return @mysqli_close($c);
		}
		public function ultimo_id($c)
		{
			return @mysqli_insert_id($c);
		}
		public function entorno($db)
		{
			$devuelve = __entornoQA__;
			if($db == 0)
			 $devuelve = __entornoProd__;
			if($db == 1)
			 $devuelve = __entornoPreprod__;
			
			return $devuelve;
		}

		/*
			****************
			*****
				* Clases de variables generales y DB
			*****
			****************
		*/
		public function proyecto()
		{
			return __proyecto__;
		}
		public function cantidadDeDatos($res)
		{
			return @mysqli_num_rows($res);
		}

		public function datosTotales()
		{
			return $this->total_consultas; 
		}

		/*
			****************
			*****
				* Clases de validaciones y encriptaciones
			*****
			****************
		*/
	    public static function encrypta($password) {
	        return hash('sha512', self::SALT . $password);
	    }
	    public static function verifica($password, $hash) {
	        return ($hash == self::encrypta($password));
	    }

		/*
			****************
			*****
				* Verificaciones y seguridad
			*****
			****************
		*/
	    public function verifica_cabeceras($cabecera)
	    {
	    	// verificamos la cabecera
	    	$seguro['rd'] = false;
	    	$seguro['mh'] = false;
			foreach ( $cabecera as $nombre => $valor) 
			{
				// verificamos si tiene RD Seguridad
				if($nombre == ('MhabitanSeg'))
					if($valor == serialize(base64_encode(date('Ymd'))))
						$seguro['rd'] = true;
				
				// verificamos si grulla tiene seguridad
				$seguro['gr'] = true;
				$seguro['us'] = true;
			}
			return $seguro;
	    }

	    public function verifica_tablas($tabla, $sql)
	    {
	    	// confiamos que tenemos datos de usuarios.
			$arrTablas		= explode(',', $tabla);
			$tienePermiso	= false;
			$r['error']		= true;
			
			// verificamos la cantidad de tablas disponibles.
			if(count($arrTablas)>0)
			{
				for ($artc=0; $artc < count($arrTablas); $artc++)
				{
				    if(preg_match("/(". trim($arrTablas[$artc]) .")+/i",$sql))
				    {
					    $tienePermiso	= true;
					    $r['error']		= false;
						$r['aviso']		= true;
					    break;
				    }
				}
			}
			
			if($tienePermiso == false)
			{
				$r['error'] = true;
				$r['aviso'] = 'El usuario no tiene permisos de tablas.';
			}

			unset($arrTablas);
			unset($tienePermiso);
			return $r;
	    }

	    public function verifica_usos($uso, $sql)
	    {
	    	// confiamos que tenemos datos de usuarios.

			switch (intval($uso)) 
			{
				case 1:
					if(preg_match("/(insert)+/i",$sql))
						return false;
					elseif(preg_match("/(update)+/i",$sql))
						return false;
					elseif(preg_match("/(delete)+/i",$sql))
						return false;
					elseif(preg_match("/(drop)+/i",$sql))
						return false;
					elseif(preg_match("/(truncate)+/i",$sql))
						return false;
				break;
				case 2:
					if(preg_match("/(update)+/i",$sql))
						return false;
					elseif(preg_match("/(delete)+/i",$sql))
						return false;
					elseif(preg_match("/(drop)+/i",$sql))
						return false;
					elseif(preg_match("/(truncate)+/i",$sql))
						return false;
				break;
				case 3:
					if(preg_match("/(delete)+/i",$sql))
						return false;
					elseif(preg_match("/(drop)+/i",$sql))
						return false;
					elseif(preg_match("/(truncate)+/i",$sql))
						return false;
				break;
				case 4:
					if(preg_match("/(drop)+/i",$sql))
						return false;
					elseif(preg_match("/(truncate)+/i",$sql))
						return false;
				break;
				default:
					return false;
				break;
			}
			
			return true;
	    }

	};
?>