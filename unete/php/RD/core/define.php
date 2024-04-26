<?php 
	/*
		DEFINICIONES DE BASE DE DATOS
	*/
	define('__conector__', '{"con":"162.240.100.149", "puerto":"3306", "usuario":"efis_dev", "clave":"B3RdigitalDesarrollo!", "base":"","motor":"mysql"}');

	define('__basePath__',__DIR__);
	define('__satelitePath__','http://127.0.0.1/reiatsu/clientes/efis/git_efis/WEBSITE/admin/satelites/');

	// base de datos - BBDD Parkingo
	define('__entornoProd__' ,'efis_dev.');
	define('__entornoPreprod__' ,'efis_dev.');
	define('__entornoQA__' ,'efis_dev.');  // este no se va a usar ahora

	// idioma por defecto
	define('__idioma__','ES');

?>