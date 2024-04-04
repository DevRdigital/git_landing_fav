<?php 
    class RDCore
    {
        /* 
            // SECTION: Funcion token para la creacion del login
        */
        
            //NOTE - prepara el nombre de las sesiones de usuario
            public function getSessionNameUser()
            {
                return date('Ym') . 'AGR';
            }
        
            //NOTE - Arma el token para que no manden el login muchas veces
            public function armaTokenLogin()
            {
                $token = md5(date('YmdH'));
                return $token;
            }

            //NOTE - Arma el token para que no manden el login muchas veces
            public function endSessions()
            {
                session_destroy();
            }

        /* 
            // SECTION: true o false validando al usuario
        */
            public function verificaLoginStatus()
            {
                $SESSIONNAME = $this->getSessionNameUser();
                $user = false;
                if( isset($_SESSION[$SESSIONNAME]) )
                    if( gettype($_SESSION[$SESSIONNAME]) == "object" || gettype($_SESSION[$SESSIONNAME]) == "array" )
                        if($_SESSION[$SESSIONNAME]['expired'] == 0)
                            $user = true;
                return $user;
            }
        
        /* 
            // SECTION: Funciones generales de proceso / uso / optimizacion
        */
            function cambiaKeyArray( $array, $old_key, $new_key ) 
            {
                if( ! array_key_exists( $old_key, $array ) )
                    return $array;

                $keys = array_keys( $array );
                $keys[ array_search( $old_key, $keys ) ] = $new_key;

                return array_combine( $keys, $array );
            }
        /* 
            // SECTION: devuelve todos los datos del usuario que se encuentren en la session
        */
            public function traeLogin()
            {
                $SESSIONNAME = $this->getSessionNameUser();
                $user = false;
                if( isset($_SESSION[$SESSIONNAME]) )
                    if( gettype($_SESSION[$SESSIONNAME]) == "object" || gettype($_SESSION[$SESSIONNAME]) == "array" )
                        if($_SESSION[$SESSIONNAME]['expired'] == 0)
                            $user = $_SESSION[$SESSIONNAME];
                return $user;
            }
        
        /* 
            // SECTION: Debug de array
        */
            public function DebugArr($arr)
            {
                echo '<pre style="text-align:left;">';
                print_r($arr);
                echo '</pre>';
            }
            // HACE - Debug array mas corto
            public function da($arr)
            {
                echo '<pre style="text-align:left;">';
                print_r($arr);
                echo '</pre>';
            }
            // HACE - Debug array Exit
            public function dae($arr)
            {
                echo '<pre style="text-align:left;">';
                print_r($arr);
                echo '</pre>';
                exit();
            }
        
        /* 
            // SECTION: Peticiones URL
        */
            public function getcURL($url)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,				$url);
				curl_setopt($ch, CURLOPT_NOBODY,			0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 	1);
				curl_setopt($ch, CURLOPT_HEADER, 0);

				$resultado = curl_exec($ch);
				// Se cierra el recurso CURL y se liberan los recursos del sistema
				curl_close($ch);
				return $resultado;
            }

            public function customcURL($ctm)
            {
                $ch = curl_init();

                // NOTE - los formatos se pasan como array.
                foreach($ctm as $k => $v)
                    curl_setopt($ch, $v[0], ((gettype($v[1]) == "string") ? "{$v[1]}" : ((gettype($v[1]) == "int") ? intval($v[1]) : $v[1]) ));
				
				$resultado = curl_exec($ch);
				// Se cierra el recurso CURL y se liberan los recursos del sistema
				curl_close($ch);
				return $resultado;
            }

        /* 
            // SECTION: Procesa estructuras JS CSS
        */
            public function obtieneCssEstructura($asset,$p)
            {
                $resultado = false;
                {
                    $htmll = ["css"=>"","js"=>""];
                    for ($mii=0; $mii < count($asset['estructura']['menu']); $mii++) 
                    {
                        if( strtolower($asset['estructura']['menu'][$mii]['titulo']) == strtolower($p) )
                        {
                            for ($cssi=0; $cssi < count($asset['estructura']['menu'][$mii]['css']) ; $cssi++) 
                                $htmll["css"] .="{$asset['estructura']['menu'][$mii]['css'][$cssi]}";
                            
                            // HACE - Esta programación no incluye entero porque no se carga asyncrónico
                            for ($jsi=0; $jsi < count($asset['estructura']['menu'][$mii]['js']) ; $jsi++) 
                                $htmll["js"] .="{$asset['estructura']['menu'][$mii]['js'][$jsi]},";
                        }
                    };

                    if($htmll["css"] != "" || $htmll["js"] != "" )
                    {
                        if($htmll["js"] != "")
                            $htmll["js"] = substr_replace($htmll["js"] ,"", -1); // HACE - Le borra la coma al final de la concatenacion.
                        $resultado = $htmll;
                    }
                }
                return $resultado;
            }
            
    }
?>