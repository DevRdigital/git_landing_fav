<?php

// ini_set('display_errors', 1); 
// ini_set('display_startup_errors', 1); 
// error_reporting(E_ALL);
    //LINK - Linkea todos los archivos motores que tiene el sistema interno para su verificación de proceso.
	include('../../../RD/index.php');
    $rd   = new RDCore;

    // --------------------------------------------------
    $h = (isset($_POST['h']) ? $_POST['h'] : false);
    
    $urlAuth    = "https://beta.covermanager.com/api/";

    
    if($h)
    {
        switch($h)
        {
            /* 
                * SECTION -  API COVERMANAGER
            */
                case "ciudadHome":
                    
                    $urlAuth    .= "restaurant/list/{$_POST['tkn']}/{$_POST['p']['ciudad']}";
                    $arrCtm     =[
                                    "URL"            => [CURLOPT_URL,$urlAuth],
                                    "RETURNTRANSFER" => [CURLOPT_RETURNTRANSFER,1],
                                    "CUSTOMREQUEST"  => [CURLOPT_CUSTOMREQUEST,"GET"],
                                    "HTTPHEADER"     => [CURLOPT_HTTPHEADER, array(
                                                                'Content-Type: application/x-www-form-urlencoded'
                                                            )]
                                ];
                    $respuesta = json_decode($rd->customcURL($arrCtm),true);
                    $r['data'] = $respuesta;
                break;

                case "DEMO POSTFIELDS":
                    
                    $act     = traeToken($rd);

                    $urlAuth = "https://app.agrodato.com/api/v1/cultivos/{$_POST['idPac']}";
                    $arrCtm     =[
                        "URL"            => [CURLOPT_URL,$urlAuth],
                        "RETURNTRANSFER" => [CURLOPT_RETURNTRANSFER,1],
                        "CUSTOMREQUEST"  => [CURLOPT_CUSTOMREQUEST,"GET"],
                        "HTTPHEADER"     => [CURLOPT_HTTPHEADER,
                                                array(
                                                    'Accept: application/json',
                                                    'Content-Type: application/json',
                                                    'Authorization: Bearer '. $act
                                                )
                                            ],
                        "POSTFIELDS"     => [CURLOPT_POSTFIELDS,
                                                json_encode(array(
                                                    'from'     => "1987-01-01",
                                                    'to'       => date('Y-m-d'),
                                                    'polygons' => true,
                                                    'sigpac'   => true
                                                ))
                                            ],
                    ];
                    $respuesta = json_decode($rd->customcURL($arrCtm),true);
                    $r['data'] = $respuesta;
                break;

        }

    }

    echo json_encode($r,JSON_UNESCAPED_UNICODE );
?>