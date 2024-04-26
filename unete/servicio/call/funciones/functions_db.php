<?php


    function casoDB($rd, $case, $params)
    {
        $respuesta = [];
        switch ($case) 
        {
            case 'guardaReservaUsuario':
                $rdC  = new RDMsql; // HACE - Carga las funciones de conexion;
                /* FIXME - El $pais es 103 por defecto que corresponde a Ecuador */
                $pais = 103;
                
                // HACE - conecta a la base de datos
                $c['c'] = $rdC->conectar();        
                if( $c['c'] )
                {
                    $db        = $rdC->entorno(1); // productivo
                    
                    $md5Correo = md5($params['email']);
                    
                    // HACE - Verifica existencia de usuario
                    $c['qry']  = "SELECT token FROM {$db}._fv_usuarios WHERE email = '{$params['email']}' LIMIT 0,1";
                    $resultado = $rdC->QRY($c);
                    
                    // HACE - Si no existe
                    if($resultado['cantidad'] == 0)
                    {
                        // HACE - Crea el usuario. 
                        $c['qry']  = "INSERT INTO {$db}.`_fv_usuarios` 
                                            (`id_pais`, `nombre`, `apellido`, `telefono`, `email`, `documento`, `token`) 
                                        VALUES 
                                            ('{$pais}', '{$params['first_name']}', '{$params['last_name']}', '({$params['int_call_code']}){$params['phone']}', '{$params['email']}', 's/d', '{$md5Correo}')";
                        $resultado = $rdC->QRY($c);

                        if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                            $respuesta['usuario_creado'] = true;
                    }
                    
                    // HACE - Verifica existencia RESERVA
                    
                        $c['qry']  = "SELECT cod_reserva_cm FROM {$db}._fv_reservas WHERE cod_reserva_cm = '{$params['resultado']['id_reserv']}' LIMIT 0,1";
                        $resultado = $rdC->QRY($c);
                        
                        // HACE - Si no existe
                        if($resultado['cantidad'] == 0)
                        {
                            $c['qry']  = "INSERT INTO {$db}.`_fv_reservas` 
                                                (`cod_reserva_cm`, `cod_usuario`, `estado_reserva`, `slug`, `fecha`, `hora`, `comensales`)
                                            VALUES 
                                                ('{$params['resultado']['id_reserv']}', '{$md5Correo}', 'creada', '{$params['restaurant']}', '{$params['date']}', '{$params['hour']}', '{$params['people']}')";
                            
                            $resultado = $rdC->QRY($c);
        
                            if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                                $respuesta['reserva_creada'] = true;
                        }
                        else
                            $respuesta['reserva_creada'] = "existente";
                }
            break;
            
            default:
                # code...
            break;
        }

        return $respuesta;
    }
?>