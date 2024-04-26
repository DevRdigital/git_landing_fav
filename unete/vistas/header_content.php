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

        $config['css']	= "";
        $config['js']	= "<script type='text/javascript' src='{$config['direc']}assets/js/index.js'></script>";

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

    <!--FAVICON -->
    <link rel="apple-touch-icon"      sizes="57x57"     href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon"      sizes="60x60"     href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon"      sizes="72x72"     href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon"      sizes="76x76"     href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon"      sizes="114x114"   href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon"      sizes="120x120"   href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon"      sizes="144x144"   href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon"      sizes="152x152"   href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon"      sizes="180x180"   href="<?php echo $config['direc'];?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"   href="<?php echo $config['direc'];?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"     href="<?php echo $config['direc'];?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"     href="<?php echo $config['direc'];?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"     href="<?php echo $config['direc'];?>assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="<?php echo $config['direc'];?>assets/img/favicon/ms-icon-144x144.png">
    <link rel="manifest" href="<?php echo $config['direc'];?>manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!--
        FAVICON FIN-->

    <!-- JS configuracion general del sitio -->
    <script type="text/javascript" src="<?php echo $config['direc']?>r/r.js"></script>
    <!-- Css configuracion general del sitio -->
    <link rel='stylesheet' async type="text/css" href='<?php echo $config['direc'];?>assets/css/index.css'>
    
    <title>FAV</title>