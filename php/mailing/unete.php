<?php
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	header("Access-Control-Allow-Headers: Rdigitalseg,rdigitalseg");
    header('Access-Control-Allow-Origin: *');

	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

    @require 'mailer/PHPMailerAutoload.php';

	$int['url'] 	= $_SERVER['HTTP_HOST'].'/';
	$int['host'] 	= $_SERVER['HTTP_HOST'];
	$r['aviso']		= false;
	$r['error'] 	= false;

	$error = false;

    if (!isset($_POST['nombre']))
        $error = 'nombre';
    else if (!isset($_POST['email']))
        $error = 'email';
    else if (!isset($_POST['establecimiento']))
        $error = 'establecimiento';
    else if (!isset($_POST['ciudad']))
        $error = 'ciudad';
    else if (!isset($_POST['tel']))
        $error = 'tel';

	if ($error == false)
	{
		$nombre = addslashes($_POST['nombre']);
        $email  = addslashes($_POST['email']);
        $establecimiento = addslashes($_POST['establecimiento']);
        $ciudad = addslashes($_POST['ciudad']);
        $tel    = addslashes($_POST['tel']);
		$mensaje_general = addslashes($_POST['mensaje']);


		/* Cambiar link en productivo */
		$message = "<div style='height: 150px; text-align: center;'>
						<div style='text-align: center;'>
							<p>Quiero ponerme en contacto. Mis datos:</p>
						</div>
						<br>
						<div style='text-align: center;'>
							<table>
								<thead>
									<tr>
										<th>Nombre</th>
										<th>E-mail</th>
										<th>Establecimiento</th>
										<th>Ciudad</th>
										<th>Tel.</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{$nombre}</td>
										<td>{$email}</td>
										<td>{$establecimiento}</td>
										<td>{$ciudad}</td>
										<td>{$tel}</td>
									</tr>
								</tbody>
							</table>
							<br>
							<div>
								{$mensaje_general}
							</div>
						</div>
					</div>";

		// Armado de mensaje
		$aquien['nombre'] = 'Explore FAV';
		//$aquien['email'] = 'maria.aguirre@explorefav.com';
		$aquien['email'] = 'german.rodriguez@reiatsu.com.ar';
		$mensaje['asunto'] = 'Unirme hoy mismo - Formulario';

		/*
			Mail no-reply@explorefav.com

			Outgoing Server: mail.explorefav.com

			SMTP Port: 465
			Pass: .Explorefav2023
			SMTP require authentication.

			Mail de destino: maria.aguirre@explorefav.com
		*/

		if ($error == false)
		{

			$mail             = new PHPMailer;
			$mail->isSMTP();
			$mail->Host       = 'smtp-mail.outlook.com';
			$mail->SMTPAuth   = true;
			// $mail->SMTPDebug  = 2;
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 465;
			//$mail->Username   = 'no-reply@explorefav.com';
			//$mail->Password   = '.Explorefav2023';
			$mail->Username		= "german.rodriguez@reiatsu.com.ar";
			$mail->Password		= "G3rmanR!";

			$mail->setFrom('no-reply@explorefav.com',$aquien['nombre']);
			$mail->addAddress($aquien['email']);
			$mail->isHTML(true);

			$mail->Subject = $mensaje['asunto'];
			$mail->Body    = $message;
			$deb = $mail->send();

			$r['aviso'] = $deb;
		}
	}
	else
		$r['mensaje'] = "Error de conexión";
		
	echo json_encode($r);
?>