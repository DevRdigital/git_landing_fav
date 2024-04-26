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

      $r['mensaje'] = '';

       // HACE - Linkea todos los archivos motores que tiene el sistema interno para su verificación de proceso.
	include('../../RD/index.php');
	include('./funciones/index.php');

      $rd          = new RDCore;
      $entorno     = 0;

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

      $verificado = verificaIdentidad($rd);
      if($verificado == false)
      {
      $r['status']   = "No se pudo validar el token.";
      $r['header']   = 400;
      $r['response'] = [];
      }

      if($verificado == true)
      {
            function mime2ext($mime) 
            {
                  $mime_map = [
                  'video/3gpp2'                                                               => '3g2',
                  'video/3gp'                                                                 => '3gp',
                  'video/3gpp'                                                                => '3gp',
                  'application/x-compressed'                                                  => '7zip',
                  'audio/x-acc'                                                               => 'aac',
                  'audio/ac3'                                                                 => 'ac3',
                  'application/postscript'                                                    => 'ai',
                  'audio/x-aiff'                                                              => 'aif',
                  'audio/aiff'                                                                => 'aif',
                  'audio/x-au'                                                                => 'au',
                  'video/x-msvideo'                                                           => 'avi',
                  'video/msvideo'                                                             => 'avi',
                  'video/avi'                                                                 => 'avi',
                  'application/x-troff-msvideo'                                               => 'avi',
                  'application/macbinary'                                                     => 'bin',
                  'application/mac-binary'                                                    => 'bin',
                  'application/x-binary'                                                      => 'bin',
                  'application/x-macbinary'                                                   => 'bin',
                  'image/bmp'                                                                 => 'bmp',
                  'image/x-bmp'                                                               => 'bmp',
                  'image/x-bitmap'                                                            => 'bmp',
                  'image/x-xbitmap'                                                           => 'bmp',
                  'image/x-win-bitmap'                                                        => 'bmp',
                  'image/x-windows-bmp'                                                       => 'bmp',
                  'image/ms-bmp'                                                              => 'bmp',
                  'image/x-ms-bmp'                                                            => 'bmp',
                  'application/bmp'                                                           => 'bmp',
                  'application/x-bmp'                                                         => 'bmp',
                  'application/x-win-bitmap'                                                  => 'bmp',
                  'application/cdr'                                                           => 'cdr',
                  'application/coreldraw'                                                     => 'cdr',
                  'application/x-cdr'                                                         => 'cdr',
                  'application/x-coreldraw'                                                   => 'cdr',
                  'image/cdr'                                                                 => 'cdr',
                  'image/x-cdr'                                                               => 'cdr',
                  'zz-application/zz-winassoc-cdr'                                            => 'cdr',
                  'application/mac-compactpro'                                                => 'cpt',
                  'application/pkix-crl'                                                      => 'crl',
                  'application/pkcs-crl'                                                      => 'crl',
                  'application/x-x509-ca-cert'                                                => 'crt',
                  'application/pkix-cert'                                                     => 'crt',
                  'text/css'                                                                  => 'css',
                  'text/x-comma-separated-values'                                             => 'csv',
                  'text/comma-separated-values'                                               => 'csv',
                  'application/vnd.msexcel'                                                   => 'csv',
                  'application/x-director'                                                    => 'dcr',
                  'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
                  'application/x-dvi'                                                         => 'dvi',
                  'message/rfc822'                                                            => 'eml',
                  'application/x-msdownload'                                                  => 'exe',
                  'video/x-f4v'                                                               => 'f4v',
                  'audio/x-flac'                                                              => 'flac',
                  'video/x-flv'                                                               => 'flv',
                  'image/gif'                                                                 => 'gif',
                  'application/gpg-keys'                                                      => 'gpg',
                  'application/x-gtar'                                                        => 'gtar',
                  'application/x-gzip'                                                        => 'gzip',
                  'application/mac-binhex40'                                                  => 'hqx',
                  'application/mac-binhex'                                                    => 'hqx',
                  'application/x-binhex40'                                                    => 'hqx',
                  'application/x-mac-binhex40'                                                => 'hqx',
                  'text/html'                                                                 => 'html',
                  'image/x-icon'                                                              => 'ico',
                  'image/x-ico'                                                               => 'ico',
                  'image/vnd.microsoft.icon'                                                  => 'ico',
                  'text/calendar'                                                             => 'ics',
                  'application/java-archive'                                                  => 'jar',
                  'application/x-java-application'                                            => 'jar',
                  'application/x-jar'                                                         => 'jar',
                  'image/jp2'                                                                 => 'jp2',
                  'video/mj2'                                                                 => 'jp2',
                  'image/jpx'                                                                 => 'jp2',
                  'image/jpm'                                                                 => 'jp2',
                  'image/jpeg'                                                                => 'jpg',
                  'image/pjpeg'                                                               => 'jpg',
                  'application/x-javascript'                                                  => 'js',
                  'application/json'                                                          => 'json',
                  'text/json'                                                                 => 'json',
                  'application/vnd.google-earth.kml+xml'                                      => 'kml',
                  'application/vnd.google-earth.kmz'                                          => 'kmz',
                  'text/x-log'                                                                => 'log',
                  'audio/x-m4a'                                                               => 'm4a',
                  'audio/mp4'                                                                 => 'm4a',
                  'application/vnd.mpegurl'                                                   => 'm4u',
                  'audio/midi'                                                                => 'mid',
                  'application/vnd.mif'                                                       => 'mif',
                  'video/quicktime'                                                           => 'mov',
                  'video/x-sgi-movie'                                                         => 'movie',
                  'audio/mpeg'                                                                => 'mp3',
                  'audio/mpg'                                                                 => 'mp3',
                  'audio/mpeg3'                                                               => 'mp3',
                  'audio/mp3'                                                                 => 'mp3',
                  'video/mp4'                                                                 => 'mp4',
                  'video/mpeg'                                                                => 'mpeg',
                  'application/oda'                                                           => 'oda',
                  'audio/ogg'                                                                 => 'ogg',
                  'video/ogg'                                                                 => 'ogg',
                  'application/ogg'                                                           => 'ogg',
                  'font/otf'                                                                  => 'otf',
                  'application/x-pkcs10'                                                      => 'p10',
                  'application/pkcs10'                                                        => 'p10',
                  'application/x-pkcs12'                                                      => 'p12',
                  'application/x-pkcs7-signature'                                             => 'p7a',
                  'application/pkcs7-mime'                                                    => 'p7c',
                  'application/x-pkcs7-mime'                                                  => 'p7c',
                  'application/x-pkcs7-certreqresp'                                           => 'p7r',
                  'application/pkcs7-signature'                                               => 'p7s',
                  'application/pdf'                                                           => 'pdf',
                  'application/octet-stream'                                                  => 'pdf',
                  'application/x-x509-user-cert'                                              => 'pem',
                  'application/x-pem-file'                                                    => 'pem',
                  'application/pgp'                                                           => 'pgp',
                  'application/x-httpd-php'                                                   => 'php',
                  'application/php'                                                           => 'php',
                  'application/x-php'                                                         => 'php',
                  'text/php'                                                                  => 'php',
                  'text/x-php'                                                                => 'php',
                  'application/x-httpd-php-source'                                            => 'php',
                  'image/png'                                                                 => 'png',
                  'image/x-png'                                                               => 'png',
                  'application/powerpoint'                                                    => 'ppt',
                  'application/vnd.ms-powerpoint'                                             => 'ppt',
                  'application/vnd.ms-office'                                                 => 'ppt',
                  'application/msword'                                                        => 'ppt',
                  'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
                  'application/x-photoshop'                                                   => 'psd',
                  'image/vnd.adobe.photoshop'                                                 => 'psd',
                  'audio/x-realaudio'                                                         => 'ra',
                  'audio/x-pn-realaudio'                                                      => 'ram',
                  'application/x-rar'                                                         => 'rar',
                  'application/rar'                                                           => 'rar',
                  'application/x-rar-compressed'                                              => 'rar',
                  'audio/x-pn-realaudio-plugin'                                               => 'rpm',
                  'application/x-pkcs7'                                                       => 'rsa',
                  'text/rtf'                                                                  => 'rtf',
                  'text/richtext'                                                             => 'rtx',
                  'video/vnd.rn-realvideo'                                                    => 'rv',
                  'application/x-stuffit'                                                     => 'sit',
                  'application/smil'                                                          => 'smil',
                  'text/srt'                                                                  => 'srt',
                  'image/svg+xml'                                                             => 'svg',
                  'application/x-shockwave-flash'                                             => 'swf',
                  'application/x-tar'                                                         => 'tar',
                  'application/x-gzip-compressed'                                             => 'tgz',
                  'image/tiff'                                                                => 'tiff',
                  'font/ttf'                                                                  => 'ttf',
                  'text/plain'                                                                => 'txt',
                  'text/x-vcard'                                                              => 'vcf',
                  'application/videolan'                                                      => 'vlc',
                  'text/vtt'                                                                  => 'vtt',
                  'audio/x-wav'                                                               => 'wav',
                  'audio/wave'                                                                => 'wav',
                  'audio/wav'                                                                 => 'wav',
                  'application/wbxml'                                                         => 'wbxml',
                  'video/webm'                                                                => 'webm',
                  'image/webp'                                                                => 'webp',
                  'audio/x-ms-wma'                                                            => 'wma',
                  'application/wmlc'                                                          => 'wmlc',
                  'video/x-ms-wmv'                                                            => 'wmv',
                  'video/x-ms-asf'                                                            => 'wmv',
                  'font/woff'                                                                 => 'woff',
                  'font/woff2'                                                                => 'woff2',
                  'application/xhtml+xml'                                                     => 'xhtml',
                  'application/excel'                                                         => 'xl',
                  'application/msexcel'                                                       => 'xls',
                  'application/x-msexcel'                                                     => 'xls',
                  'application/x-ms-excel'                                                    => 'xls',
                  'application/x-excel'                                                       => 'xls',
                  'application/x-dos_ms_excel'                                                => 'xls',
                  'application/xls'                                                           => 'xls',
                  'application/x-xls'                                                         => 'xls',
                  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
                  'application/vnd.ms-excel'                                                  => 'xlsx',
                  'application/xml'                                                           => 'xml',
                  'text/xml'                                                                  => 'xml',
                  'text/xsl'                                                                  => 'xsl',
                  'application/xspf+xml'                                                      => 'xspf',
                  'application/x-compress'                                                    => 'z',
                  'application/x-zip'                                                         => 'zip',
                  'application/zip'                                                           => 'zip',
                  'application/x-zip-compressed'                                              => 'zip',
                  'application/s-compressed'                                                  => 'zip',
                  'multipart/x-zip'                                                           => 'zip',
                  'text/x-scriptzsh'                                                          => 'zsh',
                  ];

                  return isset($mime_map[$mime]) ? $mime_map[$mime] : false;
            }
            function getUrlMimeType($url) {
                  $buffer = file_get_contents($url);
                  $finfo = new finfo(FILEINFO_MIME_TYPE);
                  return mime2ext($finfo->buffer($buffer));
            }

            { 

                  if(isset($_POST['aorig']))
                  {
                        if( trim($_POST['aorig']) != "" )
                        {
                              // 1 .. cambiamos el archivo a la ruta deseada
                              if(!isset($_POST['ruta']))
                                    $ruta = './';
                              else
                                    $ruta = $_POST['ruta'];

                              if(!isset($_POST['nombre']))
                                    $nombre = md5(explode('/', $_POST['aorig'])[1]);
                              else
                                    $nombre = md5($_POST['nombre']).'.'.(substr($_POST['aorig'], -3));

                              // 2 .. cambiamos el nombre en el caso de que tenga nombre nuevo
                              if(rename($_POST['aorig'], $ruta.$nombre))
                              {
                                    // 3 .. eliminamos el archivo de la ruta provisoria
                                    $rutaprovisoria = "C:/xampp/htdocs/";      

                                    // 4 .. ejecutamos la función final con los datos actualizados
                                    $r['aviso']     = true;
                                    $r['ruta']      = $ruta;
                                    $r['archivo']   = $nombre;

                                    $r['rcompleta']    = str_replace($rutaprovisoria,"http://",realpath($ruta.$nombre));
                              }
                              else
                              {
                                    $r['aviso']     = false;
                                    $r['error']     = 'No se pudo modificar la ruta';
                              }
                        }
                        else
                        {
                              $r['aviso']     = false;
                              $r['error']     = 'No se pudo subir el archivo, intente nuevamente.';
                        }
                  }
                  else
                  {
                        $termina = false;
                        
                        // read contents from the input stream
                              $inputHandler = fopen('php://input', "r");
                              $unid         = uniqid();
                        // create a temp file where to save data from the input stream
                              $ruta 		= "prov/";
                              $rutaM            = "prov/";
                              $archivo 		= "prov/".$unid.".txt";
                              $fileHandler 	= fopen($archivo, "w+");
                              $r['termina'] 	= '__sube_archivo_evento';
                              $r['archivo'] 	= false;
                        
                        // save data from the input stream
                              while(true) 
                              {
                                    if($fileHandler)
                                    {
                                          
                                          $buffer = fgets($inputHandler, 4096);
                                          if (strlen($buffer) == 0) 
                                          {
                                                fclose($inputHandler);
                                                fclose($fileHandler);
                                                $termina = true;
                                                break;
                                          } 
                                          fwrite($fileHandler, $buffer);
                                    }
                                    else
                                          break;
                              }

                        if($termina == true)
                        {
                              $nuevoArchivoE    = $rutaM.md5($unid).'.'.getUrlMimeType($archivo); // para mandar y que muestre de una
                              $nuevoArchivo     = $ruta.md5($unid).'.'.getUrlMimeType($archivo);  // para calcular el peso y demas

                              rename ($archivo, $nuevoArchivo);
                              
                              $r['archivo'] = '';
                              $r['aviso'] = false;
                              $r['tipo'] = '';
                              $r['size'] = '';
                              $r['meta']  = "";

                              if ( (getUrlMimeType($nuevoArchivo) == 'jpg') || (getUrlMimeType($nuevoArchivo) == 'png') || (getUrlMimeType($nuevoArchivo) == 'tiff') || (getUrlMimeType($nuevoArchivo) == 'jpeg') )
                              {
                                    $size  = getimagesize($nuevoArchivo);

                                    if ( $size[0] >= 400 && $size[0] <= 2000 && $size[1] > 400 )
                                    {
                                          $r['archivo']   = $nuevoArchivoE;
                                          $r['aviso']     = true;
                                          $r['tipo']      = getUrlMimeType($nuevoArchivo);
                                          $r['size']      = filesize($nuevoArchivo);
                                          $r['meta']  = date('Y-m-d H:i:s'); 
                                    }
                                    else
                                          $r['mensaje']  = "La imagen debe tener 400x400px como mínimo";
                              }
                              else if ((getUrlMimeType($nuevoArchivo) == 'pdf') || (getUrlMimeType($nuevoArchivo) == 'txt'))
                              {
                                    $r['archivo']   = $nuevoArchivoE;
                                    $r['aviso']     = true;
                                    $r['tipo']      = getUrlMimeType($nuevoArchivo);
                                    $r['size']      = filesize($nuevoArchivo);
                                    $r['meta']  = date('Y-m-d H:i:s'); 
                              }
                              else
                                    $r['mensaje']  = "El archivo debe ser una imagen o un pdf";

                              clearstatcache();
                        }
                  }
                  echo json_encode($r);
            }
      }
?>