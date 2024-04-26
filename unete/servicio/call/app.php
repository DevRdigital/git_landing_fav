<?php
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);
    // Headers y verificación
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Rdseg, rdseg, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }
    
    // HACE - Linkea todos los archivos motores que tiene el sistema interno para su verificación de proceso.
	include('../../RD/index.php');
	include('./funciones/index.php');
    
    $rd          = new RDCore;
    $entorno     = 0;
    
    $r['status'] = "No se encontraron datos disponibles";
    $h           = $_REQUEST['call'];
    
    /* 
        * SECTION - Verifica la integridad del token
        * HACE - crea la función pra verificar el token del usuario que viene en la cabecera.
    */

        function verificaIdentidad($rd)
        {
            /* 
                * TODO 1- obtener las cabeceras
                * TODO 2- Verificar si tenemos la de seguridad
                * TODO 3- Revisar si el token esta correcto
                * TODO 4- resultado
            */
            $valida = false;
            // HACE - 1
            $kbz = getallheaders();
            
            if( isset($kbz['rdseg']) || isset($kbz['Rdseg']))
            {
                // estas dentro * HACE - paso 2
                $token = (isset($kbz['rdseg']) ? $kbz['rdseg'] : ( (isset($kbz['Rdseg'])) ? isset($kbz['Rdseg']) : "" ));
                $fecha = date("YmdHi");
                $hash = hash('sha256', "OrejaLandia");  // 832c0a8b987cf21d4fe0ded0edc86fd06741e4ff8f5d7c1745b59d1baeb575a4
                if($token == $hash)
                {
                    $valida = true;
                }
            }

            return $valida;
        };
        
        /* FIXME - Corregir cuándo se implemente la DB */
        $verificado = verificaIdentidad($rd);
        if($verificado == false)
        {
            $r['status']   = "No se pudo validar el token.";
            $r['header']   = 400;
            $r['response'] = [];
        }
    // !SECTION - Fin de la verificación del token

    if($verificado == true)
    {    
        switch($h) 
        {
            /* SECTION - Funciones PHP */
            case '{CASO}':
                $avanza = false;
               
                $rdC    = new RDMsql; // HACE - Carga las funciones de conexion;

                // HACE - conecta a la base de datos
                $c['c'] = $rdC->conectar();
                
                if( $c['c'] )
                {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                    $c['qry']  = "SELECT * FROM {$db}._neil_modelo WHERE seleccionable = 1 ORDER BY id DESC ;";
                    $resultado = $rdC->QRY($c);

                    /*
                        $c['qry']  = "INSERT INTO {$db}.`_neil_version` (`alias`, `nro_version`, `usuario`) VALUES ('Template base', '0', 'Sistema')";
                        $resultado = $rdC->QRY($c);
                        $dt['id_version'] = $resultado['ultimo_id'];
                    */

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;
                }

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;

            case "testApi":
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                $resultado = [ "empresas" => ["edenor","edesur","edema"], 
                                "dato"     => $c['c']
                             ];

                $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                $c['qry']  = "SELECT * FROM {$db}.table_tes WHERE id = 2";
                $resultado = $rdC->QRY($c);

                /*
                    $c['qry']  = "INSERT INTO {$db}.`_neil_version` (`alias`, `nro_version`, `usuario`) VALUES ('Template base', '0', 'Sistema')";
                    $resultado = $rdC->QRY($c);
                    $dt['id_version'] = $resultado['ultimo_id'];
                */

                if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                    $avanza = true;

                if($resultado != false)
                    $avanza = true;

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;

            case "testApiSimple":
                $avanza = false;
                
                $arrempresa = ["empresas" => ["edenor","edesur","edema"]];
                $resultado = $arrempresa["empresas"][$_GET['idempresa']];

                if($resultado != false)
                    $avanza = true;

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;
            
            /* !SECTION */
            case "loginUsuario":

                $errors     = [];
                $resultado  = [];
                $avanza    = false;
                
                if (!empty($_POST)) 
                {
                    $email       = ( isset($_POST['email']) ) ? addslashes($_POST['email']) : false;
                    $contrasenia = ( isset($_POST['contrasenia']) ) ? md5(addslashes($_POST['contrasenia'])) : false;

                }
                    
                    $r['mensaje'] = "No se encontraron datos registrados.";
                    if ($email !== false && $contrasenia !== false) 
                    {
                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                        $c['c']    = $rdC->conectar();
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                        if ($c['c']) 
                        {
                            // consulta si el usuario existe
                            $c['qry']  = "SELECT id,id_usuario FROM {$db}.`usuario_login` WHERE (email = '{$email}' AND clave = '{$contrasenia}') AND habilitado = 1 LIMIT 1";
                            $resultado = $rdC->QRY($c);

                            if ($resultado['estado'] == 1 && $resultado['cantidad'] == 1) 
                            {
                                $id_usuario =  $resultado['datos'][0]['id_usuario'];

                                $c['qry']  = "  SELECT 
                                                    u.id,
                                                    u.nombre,
                                                    u.apellido,
                                                    u.email,
                                                    u.dni,
                                                    u.direccion,
                                                    u.localidad,
                                                    u.fecha_creado
                                                FROM 
                                                    {$db}.`usuarios` AS u
                                                WHERE u.email = '{$email}' AND u.habilitado = 1 LIMIT 1";

                                $resultado = $rdC->QRY($c);
                                if ($resultado['estado'] == 1 && $resultado['cantidad'] == 1) 
                                {
                                    $resultado['datos'][0]['id'] = md5($resultado['datos'][0]['id']);
                                    $r['carga'] = 'false';
                                    $avanza = true;

                                    $c['qry']  = "  SELECT 
                                                        id
                                                    FROM
                                                        {$db}.`usuario_consumo` AS uc
                                                    WHERE uc.id_usuario LIKE '{$id_usuario}' AND uc.estado = 1
                                                    LIMIT 1";

                                    $consumos = $rdC->QRY($c);
                                    if ($consumos['estado'] == 1 && $consumos['cantidad'] == 1) 
                                    {
                                        $r['carga'] = 'true';
                                    }
                                }

                                $resultado['mensaje'] = "Bienvenido a Efis";
                            }
                        }
                    }

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else 
                    $r['header']   = 401;
            break;

            case "usuario":

                if ((!empty($_GET)) ) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        // listado de usuarios
                        $avanza    = false;
                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;

                        // HACE - conecta a la base de datos
                        $c['c']    = $rdC->conectar();
                        if ($c['c']) 
                        {
                            $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                            $c['qry']  = "SELECT id, nombre, apellido, email, dni, direccion, localidad, fecha_creado FROM {$db}.usuarios WHERE id = '{$id}'";
                            $resultado = $rdC->QRY($c);
                            //   $rd->dae($resultado);
                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                                $avanza = true;

                            if( $avanza === true )
                            {
                                $r['status']   = "OK";
                                $r['header']   = 200;
                                $r['response'] = $resultado;
                            }
                            else
                                $r['header']   = 401;
                        }
                        else 
                            $r['header']   = 401;
                    }
                    else 
                        $r['header']   = 401;
                }
                else 
                    $r['header']   = 401;                
            break;
            /** GERMAN */
            case "unUsuario":

                if ((!empty($_POST)) ) {
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        // listado de usuarios
                        $avanza    = false;
                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;

                        // HACE - conecta a la base de datos
                        $c['c']    = $rdC->conectar();
                        if ($c['c']) 
                        {
                            $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                            $c['qry']  = "SELECT us.id, us.nombre, us.apellido, us.email, us.dni, us.direccion, us.localidad, us.fecha_creado, log.id_usuario
                                          FROM {$db}.usuarios AS us,{$db}.usuario_login AS log
                                          WHERE log.email = us.email
                                          AND log.id_usuario = '{$id}'";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                                $avanza = true;

                            if( $avanza === true )
                            {
                                $r['status']   = "OK";
                                $r['header']   = 200;
                                $r['response'] = $resultado;
                            }
                            else
                                $r['header']   = 401;
                        }
                        else 
                            $r['header']   = 401;
                    }
                    else 
                        $r['header']   = 401;
                }
                else 
                    $r['header']   = 401;                
            break;

            case "editarUsuario":

                if ((!empty($_POST)) ) {

                    $error = false;

                    if (!isset($_POST['id']))
                        $error = 'id';
                    if (!isset($_POST['nombre']))
                        $error = 'nombre';
                    if (!isset($_POST['apellido']))
                        $error = 'apellido';
                    if (!isset($_POST['mail']))
                        $error = 'mail';
                    if (!isset($_POST['dni']))
                        $error = 'dni';
                    if (!isset($_POST['direccion']))
                        $error = 'direccion';
                    if (!isset($_POST['localidad']))
                        $error = 'localidad';

                    if ( $error == false ) {

                        {
                            $id = $_POST['id'];
                            $nombre = $_POST['nombre'];
                            $apellido = $_POST['apellido'];
                            $email = $_POST['mail'];
                            $dni = $_POST['dni'];
                            $direccion = $_POST['direccion'];
                            $localidad = $_POST['localidad'];
                        }

                        // listado de usuarios
                        $avanza    = false;
                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                        
                        // HACE - conecta a la base de datos
                        $c['c']    = $rdC->conectar();
                        if ($c['c'])
                        {
                            $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                            $c['qry']  = "UPDATE {$db}.usuarios
                                          SET 
                                                nombre='{$nombre}',
                                                apellido='{$apellido}',
                                                email='{$email}',
                                                dni='{$dni}',
                                                direccion='{$direccion}',
                                                localidad='{$localidad}'
                                          WHERE id = '{$id}'";

                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                                $avanza = true;

                            if( $avanza === true )
                            {
                                $r['status']   = "OK";
                                $r['header']   = 200;
                                $r['response'] = $resultado;
                            }
                            else
                                $r['header']   = 401;
                        }
                        else 
                            $r['header']   = 401;
                    }
                    else 
                        $r['header']   = 401;
                }
                else 
                    $r['header']   = 401;                
            break;

            case "unUsuarioConsumo":

                // lista el consumo de todos los usuario mensualmente
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();

                if ($c['c']) 
                {
                    if (isset($_POST['id']))
                    {
                        $id_usuario = $_POST['id'];
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                        $c['qry']  = "SELECT 
                                             e.entidad, e.localidad,
                                             uc.potencia, uc.total, uc.consumo, uc.empresa , uc.fecha, uc.fecha_creado, uc.estado
                                        FROM {$db}.usuario_consumo uc
                                        inner join {$db}.empresas e on uc.empresa = e.id
                                        WHERE uc.id_usuario = '{$id_usuario}'
                                        order by uc.fecha asc";
                        $resultado = $rdC->QRY($c);

                        if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                            $avanza = true;
    
                        if( $avanza === true )
                        {
                            $r['status']   = "OK";
                            $r['header']   = 200;
                            $r['response'] = $resultado;
                        }
                        else
                            $r['header']   = 401;
                    }
                }
                else
                    $r['header']   = 401;

            break;

            case "unUsuarioPeticion":

                // lista el consumo de todos los usuario mensualmente
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();

                if ($c['c']) 
                {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                    $error = false;

                    if (!isset($_POST['id_usuario']))
                        $error = true;
                    if (!isset($_POST['id_empresa_beneficio']))
                        $error = true;

                    if ($error == false)
                    {

                        {
                            $id_usuario = strip_tags($_POST['id_usuario']);
                            $id_empresa_actual = '0';
                            $id_empresa_beneficio = $_POST['id_empresa_beneficio'];
                            $fecha_creado = date('Y-m-d');
                        }
                        
                        
                        $avanza = true;
                        // Saco el id de usuario
                        /*
                        {
                            $c['qry']  = "SELECT id FROM {$db}.usuario_login
                                            WHERE id_usuario = '{$id_usuario}'  LIMIT 1";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                            {
                                $avanza = true;
                                $id_usuario = $resultado['datos'][0]['id'];
                            }
                        }
                        */

                        // Saco el id de empresa actual
                        $id_usuario = addslashes($_POST['id_usuario']);
                        {
                            $avanza = false;
                            $c['qry']  = "SELECT id_empresa FROM {$db}.empresa_usuario
                                            WHERE id_usuario = '{$id_usuario}' ORDER BY id DESC LIMIT 1";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                            {
                                $avanza = true;
                                $id_empresa_actual = $resultado['datos'][0]['id_empresa'];
                            }
                            
                            if($avanza)
                            {
                                $avanza = false;
                                $c['qry']  = "  SELECT id_usuario FROM {$db}.usuario_peticion
                                                WHERE 
                                                        id_usuario              = '{$id_usuario}'
                                                    AND id_empresa_actual       = {$id_empresa_actual}
                                                    AND id_empresa_beneficio    = {$id_empresa_beneficio}
                                                    AND estado                  = 0
                                                LIMIT 1";
                                $resultado = $rdC->QRY($c);

                                if($resultado['estado'] == 1 && $resultado['cantidad'] <= 0)
                                {
                                    $avanza = true;
                                }
                            }
                        }


                        if($avanza)
                        {
                            $avanza     = false;
                            $c['qry']   = "INSERT INTO {$db}.usuario_peticion
                                            (id_usuario, id_empresa_actual, id_empresa_beneficio)
                                            VALUES
                                            ('{$id_usuario}',{$id_empresa_actual},{$id_empresa_beneficio})";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                                $avanza = true;
                        }
    
                        if( $avanza === true )
                        {
                            $r['status']   = "OK";
                            $r['header']   = 200;
                        }
                        else
                            $r['header']   = 401;
                    }
                }
                else
                    $r['header']   = 401;

            break;

            case "habilitarUsuario":

                // lista el consumo de todos los usuario mensualmente
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();

                if ($c['c']) 
                {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                    $error = false;

                    if (!isset($_POST['token']))
                        $error = true;

                    if ($error == false)
                    {

                        {
                            $token      = $_POST['token'];
                        }

                        $c['qry']  = "  SELECT id_usuario 
                                        FROM {$db}.`usuario_login`
                                        WHERE token = '{$token}'
                                        LIMIT 1";

                        $resultado = $rdC->QRY($c);
                        
                        if ($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                        {
                            $idUsuario = $resultado['datos'][0]['id_usuario'];

                            if ($token ==  md5(date('Y-m-d').$idUsuario))
                            {
                                $c['qry']  = "  UPDATE {$db}.`usuario_login`
                                                    SET habilitado = 1
                                                WHERE id_usuario = '{$idUsuario}'
                                                AND habilitado = 0";

                                $update_login = $rdC->QRY($c);
                                $r['prueba'] = $update_login;
    
                                if ($update_login['estado'] == 1 && $update_login['afectadas'] == 1)
                                {
                                    $avanza = true;
                                }
                                else
                                    $r['mensaje'] = 'Token ya utilizado';
                            }
                            else
                                $r['mensaje'] = 'Token caducado';

                        }
                        else
                            $r['mensaje'] = 'Token inválido';
                        
    
                        if( $avanza === true )
                        {
                            $r['status']   = "OK";
                            $r['header']   = 200;
                        }
                        else
                            $r['header']   = 401;
                    }
                }
                else
                    $r['header']   = 401;

            break;

            /** FIN GERMAN */

            case "listadoUsuarios":
                // listado de usuarios
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                if ($c['c']) {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT id, nombre, apellido, email, dni, direccion, localidad, fecha_creado FROM {$db}.usuarios";
                    $resultado = $rdC->QRY($c);

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;

                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else 
                    $r['header']   = 401;
            break;
            
            case "listadoUsuariosConsumo":
                // lista el consumo de todos los usuario mensualmente
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();

                if ($c['c']) 
                {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT u.nombre, u.apellido, u.dni, u.direccion, u.fecha_creado,
                                        uc.costo_1, uc.costo_2, uc.costo_3,  uc.fecha, uc.fecha_creado, uc.estado 
                                    FROM {$db}.usuario_consumo uc
                                    inner join {$db}.usuarios u on uc.id_usuario = u.id
                                    order by uc.id_usuario, uc.id desc";
                    $resultado = $rdC->QRY($c);

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;

                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else
                    $r['header']   = 401;
            break;

            case "usuarioEmpresaActual":
                // trae el registro del usuario y la empresa actual
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                $id_usuario = (isset($_GET['idusuario'])) ? trim($_GET['idusuario']) : '';
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                if ($c['c']) {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT u.nombre, u.apellido, e.nombre, pvp_1, pvp_2, pvp_3, kwh, rd10
                                    FROM {$db}.empresa_usuario eu
                                    join {$db}.empresas e 
                                    join {$db}.usuarios u 
                                    WHERE 1 = eu.id_usuario and u.id = 1 and eu.id_empresa = e.id";
                    $resultado = $rdC->QRY($c);
    
                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;
    
                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else
                    $r['header']   = 401;                
            break;
            
            case "empresa":
                if ((!empty($_GET)) ) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        // listado de usuarios
                        $avanza    = false;
                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                        
                        // HACE - conecta a la base de datos
                        $c['c']    = $rdC->conectar();
                        if ($c['c']) {
                            $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                            $c['qry']  = "SELECT id, nombre, entidad, pvp_1, pvp_2, pvp_3, kwh, rd10,  fecha_creado, estado, localidad FROM {$db}.empresas WHERE id = '{$id}'";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                                $avanza = true;

                            if( $avanza === true )
                            {
                                $r['status']   = "OK";
                                $r['header']   = 200;
                                $r['response'] = $resultado;
                            }
                            else
                                $r['header']   = 401;
                        }
                        else 
                            $r['header']   = 401;
                    }
                    else 
                        $r['header']   = 401;
                }
                else 
                    $r['header']   = 401;                
            break;

            case "listadoEmpresas":
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                if ($c['c']) 
                {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT  id, nombre, entidad, pvp_1, pvp_2, pvp_3, kwh, rd10, fecha_creado, estado, localidad FROM {$db}.empresas";
                    $resultado = $rdC->QRY($c);

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;

                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else
                    $r['header']   = 401;                
            break;

            case "listadoEmpresasUsuarios":
                // listado de todas los usuarios con sus respectiva empresas
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                if ($c['c']) {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT u.nombre as u_nombre, u.nombre as u_nombre, u.apellido, e.id as e_id, e.nombre as e_nombre, pvp_1, pvp_2, pvp_3, kwh, rd10  
                                    FROM {$db}.empresa_usuario eu
                                    inner join {$db}.empresas e 
                                    inner join {$db}.usuarios u 
                                    WHERE e.id = eu.id_empresa and u.id = eu.id_usuario";
                    $resultado = $rdC->QRY($c);

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;

                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else
                        $r['header']   = 401;                
            break;

            case "listadoEmpresaComparacion":
                $avanza    = false;
                $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                
                // HACE - conecta a la base de datos
                $c['c']    = $rdC->conectar();
                if ($c['c']) {
                    $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                    $c['qry']  = "SELECT 
                                        up.id_empresa_actual as emp_actual,
                                        e_actual.nombre as nombre_actual,
                                        up.id_empresa_beneficio as emp_beneficio,
                                        e_beneficio.nombre as nombre_beneficio,
                                        up.id_usuario as us_nombre,
                                        u.nombre 
                                    FROM {$db}.usuario_peticion up
                                        INNER JOIN {$db}.empresas e_actual ON up.id_empresa_actual = e_actual.id
                                        INNER JOIN {$db}.empresas e_beneficio ON up.id_empresa_beneficio = e_beneficio.id
                                        INNER JOIN {$db}.usuarios u ON up.id_usuario = u.id
                                    WHERE 
                                        u.id = up.id_usuario
                                    GROUP BY 
                                        emp_actual, nombre_actual, emp_beneficio, nombre_beneficio, us_nombre, u.nombre;";
                    $resultado = $rdC->QRY($c);

                    if($resultado['estado'] == 1 && $resultado['cantidad'] > -1)
                        $avanza = true;

                    if( $avanza === true )
                    {
                        $r['status']   = "OK";
                        $r['header']   = 200;
                        $r['response'] = $resultado;
                    }
                    else
                        $r['header']   = 401;
                }
                else
                    $r['header']   = 401;                
            break;

            // INSERT 
            case "crearNuevoUsuario":
                //  Guardo los mensajes y errores 
                $errors     = [];
                $resultado  = [];
                $avanza    = false;

                if (!empty($_POST)) 
                {
                    //  comprobamos los campos requeridos
                    if
                    (
                        isset($_POST['registro']['clave']) &&
                        isset($_POST['registro']['cp']) &&
                        isset($_POST['registro']['dni']) &&
                        isset($_POST['registro']['email']) &&
                        isset($_POST['registro']['apellidos']) &&
                        isset($_POST['registro']['nombre'])
                    )
                    {
                        // Nombre
                            if (empty($_POST['registro']['nombre'])) 
                                $errors[] = "El campo nombre es requerido";
                            
                        // Apellido
                            if (empty($_POST['registro']['apellidos'])) 
                                $errors[] = "El campo apellido es requerido";
                        // Email
                            if (empty($_POST['registro']['email'])) 
                                $errors[] = "El campo email es requerido";
                            
                        // DNI
                            if (empty($_POST['registro']['dni'])) 
                                $errors[] = "El campo dni es requerido";
                            
                        // Dirección
                            if (empty($_POST['registro']['cp'])) 
                                $errors[] = "El codigo postal es requerido";
                            
                        // localidad
                            if (empty($_POST['registro']['clave'])) 
                                $errors[] = "La clave es requerida";
                    }
                    
                    $resultado[] = ['Errores encontrados' => [$errors]];
                    
                    if (count($errors)==0) 
                    {

                        $date      = date('Y-m-d H:i:s');

                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                        $c['c']    = $rdC->conectar();
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                        
                        if ($c['c']) 
                        {
                            $email    = addslashes($_POST['registro']['email']);
                            $dni      = addslashes($_POST['registro']['dni']);

                            // consulta si el usuario existe
                            $c['qry']  = "SELECT id FROM {$db}.`usuarios` WHERE email = '{$email}'";   //  AND dni = '{$dni}'
                            $resultado = $rdC->QRY($c);
                        
                            if($resultado['estado'] == 1 ) 
                            {
                                if ($resultado['cantidad'] > 0) 
                                {
                                    $r['mensaje'] = "El usuarios ya se encuentra registrado";
                                    $avanza = false;
                                }
    
                                if($resultado['cantidad'] == 0) 
                                {

                                    $nombre   = addslashes($_POST['registro']['nombre']);
                                    $apellido = addslashes($_POST['registro']['apellidos']);
                                    $cp       = addslashes($_POST['registro']['cp']);

                                    $c['qry']  = "INSERT INTO {$db}.`usuarios` 
                                                 (`nombre`, `apellido`, `email`, `dni`, `codigo_postal`) 
                                                VALUES (
                                                    '{$nombre}', 
                                                    '{$apellido}', 
                                                    '{$email}', 
                                                    '{$dni}', 
                                                    '{$cp}')";
                                    $resultado = $rdC->QRY($c);
                                    
                                    // valida primero que no exista en la bd el usuario
                                    if($resultado['estado'] == 1 && $resultado['afectadas'] == 1 ) 
                                    {
                                        $idUsuarioNuevo = md5($resultado['ultimo_id']);
                                        $clave          = md5($_POST['registro']['clave']);
                                        $token          = md5(date('Y-m-d').$idUsuarioNuevo);

                                        $c['qry']  = "INSERT INTO {$db}.`usuario_login` 
                                                         (`id_usuario`, `email`, `clave`, token, habilitado) 
                                                        VALUES (
                                                            '{$idUsuarioNuevo}', 
                                                            '{$email}', 
                                                            '{$clave}',
                                                            '{$token}',
                                                            0)";
                                        
                                        $insert_login = $rdC->QRY($c);
                                        
                                        $r['prueba'] = $insert_login;

                                        if ($insert_login['estado'] == 1)
                                        {
                                            $avanza = true;
                                            $ultimo_id = $insert_login['ultimo_id'];
                                            $r['token']     = $token;
                                            $r['mensaje']   = "Usuarios cargado con éxito";    
                                            $r['id_usuario']  = $idUsuarioNuevo;
                                        }

                                    }
                                }
                            }
                        }
                    }
                }
                
                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else {
                    $r['header']   = 401;
                }
            break;
            // Empresa
            case "crearNuevoEmpresa":
                //  Guardo los mensajes y errores 
                $errors     = [];
                $resultado  = [];
                $avanza    = false;
                // Patrón para comprobar que admita letras acentuadas y espacios
                $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
                
                if (!empty($_POST)) 
                {
                    //  comprobamos los campos requeridos
                    if (isset($_POST['nombre']) &&
                        isset($_POST['entidad']) &&
                        isset($_POST['pvp_1']) &&
                        isset($_POST['costo_2']) &&
                        isset($_POST['costo_3']) &&
                        isset($_POST['localidad'])
                    ) {
                        // Nombre
                            if (empty($_POST['nombre'])) 
                                $errors[] = "El campo nombre es requerido";
                            else {
                                if( !preg_match($patron_texto, $_POST['nombre']) )
                                    $errors[]  = "El nombre sólo puede contener letras y espacios";
                                $nombre = addslashes($_POST['nombre']);
                            }
                        // Enitidad
                            if (empty($_POST['entidad'])) 
                                $errors[] = "El campo entidad es requerido";
                            else {
                                if( !preg_match($patron_texto, $_POST['entidad']) )
                                    $errors[]  = "El entidad sólo puede contener letras y espacios";
                                    $entidad  = addslashes($_POST['entidad']);
                            }
                        // Costo 1
                            if (empty($_POST['costo_1'])) 
                                $errors[] = "El campo costo 1 es requerido";
                            else {
                                $costo_1  = addslashes($_POST['costo_1']);
                            }
                        // Costo 2
                            if (empty($_POST['costo_1'])) 
                                $errors[] = "El campo costo 1 es requerido";
                            else {
                                $costo_2  = addslashes($_POST['costo_2']);
                            }
                        // Costo 3
                            if (empty($_POST['costo_3'])) 
                                $errors[] = "El campo costo 1 es requerido";
                            else {
                                $costo_3  = addslashes($_POST['costo_3']);
                            }
                        // localidad
                            if (empty($_POST['localidad'])) 
                                $errors[] = "El campo localidad es requerido";
                            else {
                                if( !preg_match($patron_texto, $_POST['localidad']) )
                                    $errors[]  = "El localidad sólo puede contener letras y espacios";
                                    $localidad = addslashes($_POST['localidad']);
                            }
                    }
                    
                    $resultado[] = ['Errores encontrados' => [$errors]];
                    
                    if (count($errors)==0) {

                        $date      = date('Y-m-d H:i:s');

                        $rdC       = new RDMsql; // HACE - Carga las funciones de conexion;
                        $c['c']    = $rdC->conectar();
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos
                        
                        if ($c['c']) 
                        {
                            // consulta si el usuario existe
                            $c['qry']  = "SELECT id FROM {$db}.`empresas` WHERE nombre = '{$nombre}'";
                            $resultado = $rdC->QRY($c);
                        
                            if($resultado['estado'] == 1 ) 
                            {
                                if ($resultado['cantidad'] > 0) {
                                    $resultado['mensaje'] = "La empresa ya se encuentra registrado";
                                    $avanza = false;
                                }
    
                                if($resultado['cantidad'] == 0) {
                                    $c['qry']  = "INSERT INTO {$db}.`empresas` (`nombre`, `entidad`, `costo_1`, `costo_2`, `costo_3`, `fecha_creado`, `estado`, `localidad`) VALUES ('{$nombre}', '{$entidad}', '{$costo_1}', '{$costo_3}', '{$costo_2}', '{$date}', 1, '{$localidad}')";
                                    // print_r($c['qry']);   
                                    // $rd->dae($resultado);
                                    $resultado = $rdC->QRY($c);
                                    
                                    // valida primero que no exista en la bd el usuario
                                    if($resultado['estado'] == 1 && $resultado['afectadas'] == 1 ) {
                                        $avanza = true;
                                        $resultado['mensaje'] = "La empresa se ha cargado con éxito";
                                    }
                                }
                            }
                        }
                    }
                }
                
                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else {
                    $r['header']   = 401;
                }
            break;

            // Usuarios
            case "crearNuevoConsumo":
                $avanza = false;
               
                $rdC    = new RDMsql; // HACE - Carga las funciones de conexion;

                // HACE - conecta a la base de datos
                $c['c'] = $rdC->conectar();

                $archivo   = '';
                $procesado = 0;

                $costo     = 0;
                $potencia  = 0;
                $consumo   = 0;

                $idUsuario = (isset( $_REQUEST['idUsuario'] ))  ? addslashes($_REQUEST['idUsuario'])                : false;
                $fecha     = (isset( $_REQUEST['fecha'] ))      ? addslashes($_REQUEST['fecha'])                    : false;
                $empresa   = (isset( $_REQUEST['empresa'] ))    ? strtolower(addslashes(trim($_REQUEST['empresa']))) : false;

                if (isset( $_REQUEST['costo'] ))
                {
                    if ( $_REQUEST['costo'] != '')
                    {
                        $procesado ++;
                        $costo = number_format($_REQUEST['costo'], 6, ".", "");
                    }
                }
                if (isset( $_REQUEST['potencia'] ))
                {
                    if ( $_REQUEST['potencia'] != '')
                    {
                        $procesado ++;
                        $potencia = number_format($_REQUEST['potencia'], 6, ".", "");
                    }
                }
                if (isset( $_REQUEST['consumo'] ))
                {
                    if ( $_REQUEST['consumo'] != '')
                    {
                        $procesado ++;
                        $consumo = number_format($_REQUEST['consumo'], 6, ".", "");
                    }
                }

                $archivo     = (isset( $_REQUEST['archivo_nombre'] )) ? addslashes($_REQUEST['archivo_nombre']) : false;
                $archivo_url = (isset( $_REQUEST['archivo_url'] )) ? addslashes($_REQUEST['archivo_url']) : false;

                if(trim($archivo) != "" && strlen(trim($archivo)) > 3)
                    $archivo = trim(addslashes($_REQUEST['archivo_nombre']));
                else
                    $archivo = false;
                
                // fecha parseada
                if($fecha !== false)
                    $fechaParseada = explode("-",$fecha);

                if( $c['c'] )
                {
                    if( $idUsuario !== false && $empresa !== false && ($costo !== false || $potencia !== false || $consumo !== false || $archivo !== false) )
                    {
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                        $c['qry']  = "  SELECT id FROM {$db}.usuario_consumo 
                                        WHERE 
                                            fecha LIKE '{$fechaParseada[0]}-{$fechaParseada[1]}%' AND
                                            id_usuario = '{$idUsuario}'
                                        LIMIT 1";
                        $resultado = $rdC->QRY($c);

                        if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                        {
                            $r['mensaje'] = "<alerta>ya posee cargada una factura para el periodo seleccionado</alerta>";
                            $r['caso']    = 1;
                        }
                        else
                        {
                            $empresaNumero    = 0;
                            $c['qry']         = "SELECT id, LOWER(nombre) FROM {$db}.empresas WHERE LOWER(nombre) = '{$empresa}' LIMIT 1";
                            $resultadoEmpresa = $rdC->QRY($c);
                            if($resultadoEmpresa['estado'] == 1 && $resultadoEmpresa['cantidad'] == 1)
                                $empresaNumero = $resultadoEmpresa['datos'][0]['id'];


                            $c['qry']  = "  INSERT INTO {$db}.`usuario_consumo`
                                            (
                                                id_usuario,
                                                fecha,
                                                total,
                                                potencia,
                                                consumo,
                                                empresa,
                                                archivo,
                                                archivo_url,
                                                procesado,
                                                empresa_nombre
                                            ) 
                                            VALUES
                                            (
                                                '{$idUsuario}',
                                                '{$fecha}',
                                                 {$costo},
                                                 {$potencia},
                                                 {$consumo},
                                                '{$empresaNumero}',
                                                '{$archivo}',
                                                '{$archivo_url}',
                                                {$procesado},
                                                '{$empresa}'
                                            )";
                            $resultado = $rdC->QRY($c);
                            $dt['id_version'] = $resultado['ultimo_id'];
                            
                            if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                            {
                                $avanza = true;
                                $r['mensaje'] = "<exito>Carga procesada correctamente.<br>Ya puede regresar al panel para ver su optimización.</exito>";


                                /* CARGAMOS LA NUEVA EMPRESA AL USUARIO O LA ACTUALIZAMOS */
                                $existe           = false;
                                $c['qry']         = "SELECT id FROM {$db}.empresa_usuario WHERE id_usuario = '{$idUsuario}' LIMIT 1";
                                $resultadoUsuario = $rdC->QRY($c);
                                if($resultadoUsuario['estado'] == 1 && $resultadoUsuario['cantidad'] == 1)
                                    $existe = true;

                                if($existe == false)
                                    $c['qry']  = "  INSERT INTO {$db}.`empresa_usuario` (id_usuario, id_empresa ) VALUES ('{$idUsuario}', '{$empresaNumero}' )";
                                else
                                    $c['qry']  = "  UPDATE {$db}.`empresa_usuario` SET id_empresa = '{$empresaNumero}' WHERE id_usuario = '{$idUsuario}'";
                                
                                $resultado['eu'] = $rdC->QRY($c);
                            }
                        }
                        

                    }
                }

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;

            case "actualizarConsumoExistente":
                $avanza = false;
               
                $rdC    = new RDMsql; // HACE - Carga las funciones de conexion;

                // HACE - conecta a la base de datos
                $c['c'] = $rdC->conectar();

                $archivo   = '';
                $procesado = 0;

                $costo     = 0;
                $potencia  = 0;
                $consumo   = 0;

                $idUsuario = (isset( $_REQUEST['idUsuario'] ))  ? addslashes($_REQUEST['idUsuario'])                : false;
                $fecha     = (isset( $_REQUEST['fecha'] ))      ? addslashes($_REQUEST['fecha'])                    : false;
                $empresa   = (isset( $_REQUEST['empresa'] ))    ? strtolower(addslashes(trim($_REQUEST['empresa']))) : false;

                if (isset( $_REQUEST['costo'] ))
                {
                    if ( $_REQUEST['costo'] != '')
                    {
                        $procesado ++;
                        $costo = number_format($_REQUEST['costo'], 6, ".", "");
                    }
                }
                if (isset( $_REQUEST['potencia'] ))
                {
                    if ( $_REQUEST['potencia'] != '')
                    {
                        $procesado ++;
                        $potencia = number_format($_REQUEST['potencia'], 6, ".", "");
                    }
                }
                if (isset( $_REQUEST['consumo'] ))
                {
                    if ( $_REQUEST['consumo'] != '')
                    {
                        $procesado ++;
                        $consumo = number_format($_REQUEST['consumo'], 6, ".", "");
                    }
                }

                $archivo     = (isset( $_REQUEST['archivo_nombre'] )) ? addslashes($_REQUEST['archivo_nombre']) : false;
                $archivo_url = (isset( $_REQUEST['archivo_url'] )) ? addslashes($_REQUEST['archivo_url']) : false;

                if(trim($archivo) != "" && strlen(trim($archivo)) > 3)
                    $archivo = trim(addslashes($_REQUEST['archivo_nombre']));
                else
                    $archivo = false;
                
                // fecha parseada
                if($fecha !== false)
                    $fechaParseada = explode("-",$fecha);

                if( $c['c'] )
                {
                    if( $idUsuario !== false && $empresa !== false && ($costo !== false || $potencia !== false || $consumo !== false || $archivo !== false) )
                    {
                        $db        = $rdC->entorno($entorno); // NOTA - productivo datos

                        $c['qry']  = "  SELECT id FROM {$db}.usuario_consumo 
                                        WHERE 
                                            fecha LIKE '{$fechaParseada[0]}-{$fechaParseada[1]}%' AND
                                            id_usuario = '{$idUsuario}'
                                        LIMIT 1";

                        $resultado = $rdC->QRY($c);

                        if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                        {

                            $c['qry']  = "  SELECT id FROM {$db}.usuario_consumo 
                                            WHERE 
                                                fecha LIKE '{$fechaParseada[0]}-{$fechaParseada[1]}%' AND
                                                id_usuario = '{$idUsuario}' AND procesado = 3
                                            LIMIT 1";

                            $existe = $rdC->QRY($c);

                            if($existe['estado'] == 1 && $existe['cantidad'] > 0)
                            {
                                $r['mensaje'] = "<alerta>Ya posee cargada una factura para el periodo seleccionado</alerta>";
                                $r['caso']    = 1;
                            }
                            else {
                                $empresaNumero    = 0;
                                $c['qry']         = "SELECT id, LOWER(nombre) FROM {$db}.empresas WHERE LOWER(nombre) = '{$empresa}' LIMIT 1";
                                $resultadoEmpresa = $rdC->QRY($c);
                                if($resultadoEmpresa['estado'] == 1 && $resultadoEmpresa['cantidad'] == 1)
                                    $empresaNumero = $resultadoEmpresa['datos'][0]['id'];

                                $c['qry']  = "  UPDATE {$db}.`usuario_consumo`
                                                SET
                                                    fecha     = '{$fecha}',
                                                    total     =  {$costo},
                                                    potencia  =  {$potencia},
                                                    consumo   =  {$consumo},
                                                    empresa   =  '{$empresaNumero}',
                                                    procesado = {$procesado}
                                                WHERE id_usuario = '{$idUsuario}'
                                                AND fecha LIKE '{$fechaParseada[0]}-{$fechaParseada[1]}%'
                                                AND procesado < 3";

                                $resultado = $rdC->QRY($c);
                                
                                if($resultado['estado'] == 1)
                                {
                                    $avanza = true;
                                    $r['mensaje'] = "<exito>Consumo actualizado correctamente.<br></exito>";

                                    /* CARGAMOS LA NUEVA EMPRESA AL USUARIO O LA ACTUALIZAMOS */
                                    $existe           = false;
                                    $c['qry']         = "SELECT id FROM {$db}.empresa_usuario WHERE id_usuario = '{$idUsuario}' LIMIT 1";
                                    $resultadoUsuario = $rdC->QRY($c);
                                    if($resultadoUsuario['estado'] == 1 && $resultadoUsuario['cantidad'] == 1)
                                        $existe = true;

                                    if($existe == false)
                                        $c['qry']  = "  INSERT INTO {$db}.`empresa_usuario` (id_usuario, id_empresa ) VALUES ('{$idUsuario}', '{$empresaNumero}' )";
                                    else
                                        $c['qry']  = "  UPDATE {$db}.`empresa_usuario` SET id_empresa = '{$empresaNumero}' WHERE id_usuario = '{$idUsuario}'";
                                    
                                    $resultado['eu'] = $rdC->QRY($c);
                                }
                            }

                        }
                        else
                        {
                            $empresaNumero    = 0;
                            $c['qry']         = "SELECT id, LOWER(nombre) FROM {$db}.empresas WHERE LOWER(nombre) = '{$empresa}' LIMIT 1";
                            $resultadoEmpresa = $rdC->QRY($c);
                            if($resultadoEmpresa['estado'] == 1 && $resultadoEmpresa['cantidad'] == 1)
                                $empresaNumero = $resultadoEmpresa['datos'][0]['id'];

                            $c['qry']  = "  INSERT INTO {$db}.`usuario_consumo`
                                            (
                                                id_usuario,
                                                fecha,
                                                total,
                                                potencia,
                                                consumo,
                                                empresa,
                                                archivo,
                                                archivo_url,
                                                procesado,
                                                empresa_nombre
                                            ) 
                                            VALUES
                                            (
                                                '{$idUsuario}',
                                                '{$fecha}',
                                                 {$costo},
                                                 {$potencia},
                                                 {$consumo},
                                                '{$empresaNumero}',
                                                '{$archivo}',
                                                '{$archivo_url}',
                                                {$procesado},
                                                '{$empresa}'
                                            )";
                            $resultado = $rdC->QRY($c);
                            $dt['id_version'] = $resultado['ultimo_id'];
                            
                            if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                            {
                                $avanza = true;
                                $r['mensaje'] = "<exito>Carga procesada correctamente.<br>Ya puede regresar al panel para ver su optimización.</exito>";

                                /* CARGAMOS LA NUEVA EMPRESA AL USUARIO O LA ACTUALIZAMOS */
                                $existe           = false;
                                $c['qry']         = "SELECT id FROM {$db}.empresa_usuario WHERE id_usuario = '{$idUsuario}' LIMIT 1";
                                $resultadoUsuario = $rdC->QRY($c);
                                if($resultadoUsuario['estado'] == 1 && $resultadoUsuario['cantidad'] == 1)
                                    $existe = true;

                                if($existe == false)
                                    $c['qry']  = "  INSERT INTO {$db}.`empresa_usuario` (id_usuario, id_empresa ) VALUES ('{$idUsuario}', '{$empresaNumero}' )";
                                else
                                    $c['qry']  = "  UPDATE {$db}.`empresa_usuario` SET id_empresa = '{$empresaNumero}' WHERE id_usuario = '{$idUsuario}'";
                                
                                $resultado['eu'] = $rdC->QRY($c);
                            }
                        }
                        

                    }
                }

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;

            case "comparaConsumo":
                $avanza = false;
                $r['caso'] = 0;
                $rdC    = new RDMsql;

                $c['c'] = $rdC->conectar();
                
                $idUsuario = (isset( $_REQUEST['idUsuario'] ))  ? addslashes($_REQUEST['idUsuario']) : false;

                if( $c['c'] && $idUsuario !== false )
                {
                    {
                        $db        = $rdC->entorno($entorno);

                        $c['qry']  = "  SELECT id, empresa, potencia, consumo, total, fecha, empresa_nombre  FROM {$db}.usuario_consumo
                                        WHERE 
                                            id_usuario = '{$idUsuario}'
                                        AND procesado = 3
                                        ORDER BY id DESC
                                        LIMIT 1";

                        $resultado = $rdC->QRY($c);

                        if($resultado['estado'] == 1 && $resultado['cantidad'] == 1)
                        {
                            $datosComparativa = $resultado['datos'][0];

                            $c['qry']  = "  SELECT 
                                                e.id,
                                                e.nombre,
                                                e.entidad,
                                                e.pvp_1,
                                                e.pvp_2,
                                                e.pvp_3,
                                                e.kwh,
                                                e.rd10
                                            FROM {$db}.empresas AS e 
                                            WHERE 
                                                e.estado = 1
                                            ORDER BY nombre ASC";
                            $resultado = $rdC->QRY($c);

                            if($resultado['estado'] == 1 && $resultado['cantidad'] > 0)
                            {
                                // tenemos para pensar la logica de comparativa de datos.
                                $datos =[
                                            'usuario' => [
                                                            'id'                => $datosComparativa['id'],
                                                            'potencia'          => $datosComparativa['potencia'],
                                                            'consumo'           => $datosComparativa['consumo'],
                                                            'abonado'           => $datosComparativa['total'],
                                                            'descuento'         => 0,
                                                            'fecha_procesada'   => $datosComparativa['fecha'],
                                                            'empresa_nombre'    => $datosComparativa['empresa_nombre']
                                                         ],
                                            'empresas' => []
                                        ];

                                $fechaParseada = explode("-",$datosComparativa['fecha']);
                                $diasDelMes    = cal_days_in_month(CAL_GREGORIAN, $fechaParseada[1], $fechaParseada[0]);

                                for ($ei=0; $ei < $resultado['cantidad']; $ei++) 
                                { 
                                    $demp = $resultado['datos'][$ei];

                                    // verificamos los datos del usuario para obtener la empresa
                                    if($demp['id'] == $datosComparativa['empresa'])
                                    {
                                        $datos['usuario']['empresa'] = $demp['nombre'];
                                        $datos['usuario']['empresa_nombre'] = $demp['nombre'];
                                        continue;
                                    }

                                    if($demp['id'] == 0) // eliminamos la empresa fantasma
                                    {
                                        continue;
                                    }
                                    
                                    $totales = [    'TP_P1'=>0,
                                                    'TP_P2'=>0,
                                                    'TP_P3'=>0,
                                                    'TE_P1'=>0,
                                                    'TE_RD10'=>0,
                                                    'IMP_ELEC'=>0.005, // fijo
                                                    'ALQ_EQUI'=>0.83, // fijo
                                                    'IVA_GRAL'=>0.05, // fijo
                                                
                                                    'resultados'=>[]
                                                ];

                                    // Calculamos la potencia.
                                    $totales['TP_P1']                            = $datos['usuario']['potencia'] * $diasDelMes * $demp['pvp_1'];
                                    $totales['TP_P2']                            = $datos['usuario']['potencia'] * $diasDelMes * $demp['pvp_2'];

                                    if($demp['pvp_3'] > 0)
                                        $totales['TP_P3']                        = $datos['usuario']['potencia'] * $diasDelMes * $demp['pvp_3'];
                                    $totales['resultados']['id']                 = $resultado['datos'][$ei]['id'];
                                    $totales['resultados']['terminos_potencia']  = $totales['TP_P1'] + $totales['TP_P2'] + $totales['TP_P3'];
                                            $totales['resultados']['terminos_potencia']   = number_format($totales['resultados']['terminos_potencia'], 2, ".", "");
                                    // terminos de energía.
                                    $totales['TE_P1']                            = $datos['usuario']['consumo'] * $demp['kwh'];

                                    $totales['resultados']['terminos_energia']   = $totales['TE_P1'] + $totales['TE_RD10'] - $datos['usuario']['descuento'];
                                            $totales['resultados']['terminos_energia']   = number_format($totales['resultados']['terminos_energia'], 2, ".", "");
                                    // FIXME:  RD10 -> Evaluar como avanzar

                                    $totales['resultados']['impuesto_electrico'] = ($totales['resultados']['terminos_potencia'] + $totales['resultados']['terminos_energia']) * $totales['IMP_ELEC'];
                                            $totales['resultados']['impuesto_electrico']   = number_format($totales['resultados']['impuesto_electrico'], 2, ".", "");

                                    $totales['resultados']['iva_general']        = ($totales['resultados']['terminos_potencia'] + $totales['resultados']['terminos_energia'] + $totales['resultados']['impuesto_electrico'] + $totales['ALQ_EQUI']) * $totales['IVA_GRAL'];
                                            $totales['resultados']['iva_general']   = number_format($totales['resultados']['iva_general'], 2, ".", "");

                                    $totales['resultados']['total_factura']      = ($totales['resultados']['terminos_potencia'] + $totales['resultados']['terminos_energia'] + $totales['resultados']['impuesto_electrico'] + $totales['resultados']['iva_general'] + $totales['ALQ_EQUI']);
                                            $totales['resultados']['total_factura']   = number_format($totales['resultados']['total_factura'], 2, ".", "");
                                    $totales['resultados']['datos_empresa']      = $demp; 
                                    
                                    $datos['empresas'][] = $totales['resultados']; 
                                }

                                $resultado = $datos;
                                $avanza    = true;
                            }
                        }
                        else
                        {
                            $r['caso'] = 1; // sin datos a verificar
                        }
                    }
                }

                if( $avanza === true )
                {
                    $r['status']   = "OK";
                    $r['header']   = 200;
                    $r['response'] = $resultado;
                }
                else
                    $r['header']   = 401;
            break;
        }   
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($r, JSON_UNESCAPED_UNICODE);
?>