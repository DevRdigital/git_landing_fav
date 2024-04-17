<?php
    @require 'mailer/PHPMailerAutoload.php';

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
            case 3: // Cambio de clave 
                $mensaje = ["largo" =>'
                                Recibiste este correo porque solicitaste recuperar la contraseña de tu cuenta de ParkinGo.<br><br>
                                Pincha el siguiente bot&oacute;n para crear una nueva. Si no lo pediste, pod&eacute;s ignorar este mensaje.<br><br>
                                <a href="%urlClave" style="width:fit-content; padding:0.6rem 3rem; text-align:center; color:#ffffff; background-color:#009C93; border-radius:7px;">Cambiar clave</a>
                                ',
                            "inApp" => 'Cambio de clave'
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
                $headers = "From: informacion@parkingo.rent \r\n";
                $headers .= "Reply-To: informacion@parkingo.rent \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                $cuerpo = getMensajes($mensaje['cuerpo'])['largo'];

                // CASOS DE CORRECCIONES
                $cuerpo = str_replace("%nombre", addslashes($aquien['nombre']), $cuerpo);
                $cuerpo = str_replace("%direccion", addslashes($mensaje['direccion']), $cuerpo);

                if(isset($mensaje['token']))
                    $cuerpo = str_replace("%urlClave", addslashes($mensaje['token']), $cuerpo);

                $message = "<table width='100%' style='width:100%'>
                                <tr style='background-color:#000000;'>
                                    <td style='text-align:left;'>
                                        <img src='https://parkingo.rent/mail-templates/logo.png' height='80px'/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <div>{$aquien['nombre']}</div>
                                        <div class='height:1rem;'>&nbsp;</div>
                                        <div>{$cuerpo}</div>
                                    </td>
                                </tr>
                                <tr style='background-color:#000000; height:10px;'>
                                    <td style='text-align:left;'>

                                    </td>
                                </tr>
                            </table>";

                $mail             = new PHPMailer;
                $mail->isSMTP();
                $mail->Host       = 'smtp-mail.outlook.com';
                $mail->SMTPAuth   = true;
                // $mail->SMTPDebug  = 2;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->Username   = 'parkingorent@outlook.es';
                $mail->Password   = 'P4rkingo99!';

                $mail->setFrom('parkingorent@outlook.es','Parkingo APP');
                $mail->addAddress($aquien['email']);
                $mail->isHTML(true);

                $mail->Subject = $mensaje['asunto'];
                $mail->Body    = $message;
                $deb = $mail->send();
                // if(!$deb)
                //     $deb = mail($to, $subject, $message, $headers);

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