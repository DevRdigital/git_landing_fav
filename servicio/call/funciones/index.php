<?php

    include_once('define.php');
    include_once('functions_db.php');

    function pideEndPoints($endpoint,$rd)
    {

        // --------------------------------------------------
        $h         = (isset($endpoint['h']) ? $endpoint['h']: false);
        $urlAuth   = __ruta__;
        $respuesta = "No se encontraron resultados";

        $seg = ( isset(getallheaders()["rdseg"]) ) ? getallheaders()["rdseg"] : false;
        
        if($seg != false)
            if($seg == hash('sha256', 'TheFav#Project'.date('Ymd')))
                $seg = true;

        return json_encode($respuesta,JSON_UNESCAPED_UNICODE );
    }

    function getMensajes($tipo)
    {
        switch($tipo)
        {
            case 1: // Solicitud aceptada 
                $mensaje = ["largo" =>'
                                Han aceptado tu solicitud de reserva de parking en %direccion.<br>
                                Para ver los datos del Parking, ingrese a la aplicación y en el menú <b>"MIS RESERVAS"</b> dentro de la pestaña <b>"Solicitudes Realizadas"</b> tendrá la información visible.<br>',
                            "inApp" => 'Han aceptado tu solicitud de reserva de parking en %direccion'
                        ];
            break;
            case 2: // Solicitud aceptada 
                $mensaje = ["largo" =>'
                                Se ha cancelado el acuerdo de parking en %direccion.<br>
                                En caso de que este mensaje sea un error, contacte nuevamente al dueño del parking.<br>',
                            "inApp" => 'Han cancelado el acuerdo de parking en %direccion'
                        ];
            break;
        }
        return $mensaje;
    }

    function notifica($tipo,$aquien,$mensaje)
    {
        $deb = false;

        switch($tipo)
        {
            case "correo":
                $to      = "{$aquien['email']}";
                $subject = "{$mensaje['asunto']}";
                $headers = "From: no-reply@parkingo.rent \r\n";
                $headers .= "Reply-To: no-reply@parkingo.rent \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $cuerpo   = getMensajes($mensaje['cuerpo'])['largo'];

                $message = "{$aquien['nombre']},<br><br>
                            {$cuerpo} 
                            <br><br>";

                $deb = mail($to, $subject, $message, $headers);
            break;
        }

        return $deb;
    }

    function inAppNotifica($aquien,$mensaje,$rd,$rdC,$db,$c)
    {
        $deb    = false;

        $cuerpo = getMensajes($mensaje['cuerpo'])['inApp'];

        $cuerpo = str_replace("%nombre", addslashes($aquien['nombre']), $cuerpo);
        $cuerpo = str_replace("%direccion", addslashes($mensaje['direccion']), $cuerpo);

        $c['qry']   = " INSERT INTO {$db}.`p_notificaciones` 
                            (`id_usuario`, `id_usuario_emisor`, `titulo`, `mensaje`, `link`, `accion`) 
                        VALUES 
                            (
                                '{$aquien['id_us']}', 
                                '{$aquien['id_emi']}', 
                                '{$mensaje['asuntoInApp']}', 
                                '{$cuerpo}',
                                '{$mensaje['link']}',
                                '{$mensaje['accion']}'
                            )";

        return $rdC->QRY($c);
    }
?>