<meta   
        http-equiv="Content-Security-Policy" 
        content="   default-src 'self'; 
                    script-src * 'unsafe-eval' 'unsafe-inline'; 
                    connect-src * blob: 'unsafe-inline' 'unsafe-eval'; 
                    style-src 'self' data: chrome-extension-resource: 'unsafe-inline'; 
                    img-src 'self' https://*.wp.com/ https://iris.tattoo/  http://iris.tattoo/ 'unsafe-eval' 'unsafe-inline' blob: data: ;
                    frame-src 'self' data: chrome-extension-resource:; 
                    font-src 'self' data: chrome-extension-resource:; 
                    media-src *;">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Somos una plataforma tecnológica de reservas, orientada al consumidor, que brinda acceso a restaurantes y experiencias gastronómicas.">
    <meta name="format-detection" content="telephone=yes">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

    <!-- Social Tags -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content="http://rdigital.me/template/home/logodigital.svg"/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    
	<?php
        $config['direc'] = './';
        $config['direc_sub'] = './subsitios/';
		
        if ($config['place'] != 'home') {
            $config['direc'] .= './../';
            $config['direc_sub'] .= './';
        }

        $config['css']	="";
        $config['js']	="";

		switch($config['place'])
		{
			case "home":
				$config['css'] 	= "<link rel='stylesheet' async type='text/css' href='{$config['direc']}assets/css/home.css'>";
				$config['js']	.="<script type='text/javascript' async defer src='{$config['direc']}assets/js/home.js'></script>";
			break;
			case "membresia":
				$config['css'] 	= "<link rel='stylesheet' async type='text/css' href='{$config['direc']}assets/css/subsitios/membresia.css'>";
				$config['js']	.="<script type='text/javascript' async defer src='{$config['direc']}assets/js/subsitios/membresia.js'></script>";
			break;
			case "plataforma":
				$config['css'] 	= "<link rel='stylesheet' async type='text/css' href='{$config['direc']}assets/css/subsitios/plataforma.css'>";
				$config['js']	.="<script type='text/javascript' async defer src='{$config['direc']}assets/js/subsitios/plataforma.js'></script>";
			break;
			default:
				print_r('Error en búsqueda');
			break;
		}
	?>

    <!-- JS configuracion general del sitio -->
    <script type="text/javascript" src="<?php echo $config['direc']?>r/r.js"></script>
    <script type='text/javascript' src='<?php echo $config['direc']?>assets/js/index.js'></script>
    <!-- Css configuracion general del sitio -->
    <link rel='stylesheet' async type="text/css" href='<?php echo $config['direc'];?>assets/css/index.css'>
    
    <title>FAV</title>