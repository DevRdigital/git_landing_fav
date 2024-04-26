<!DOCTYPE html>
<html>
    <head>
        <?php
            $config['place'] = "membresia";
        ?>
        <!--Headers-->
        <?php include('./vistas/header_content.php')?>
        
        <!--Traigo CSS-->
        <?php echo $config['css']; ?>
        
    </head>
    <body>
        <!-- Navegador -->
        <?php include('./vistas/header.php')?>

        <main>

            <section class="membresia-content home-bkg-image">
                <figure>
                    <img async loading="lazy" src="./assets/img/membresia/bkg-membresia.jpg">
                </figure>

                <div class="access-cuadro-en-imagen">

                    <div class="access-cuadro-en-imagen-content">

                        <div class="access-logo">
                            <figure>
                                <img src="./assets/img/membresia/logo_blanco_membresia.svg">
                            </figure>
                        </div>
        
                        <div class="access-texto">
                            <span>Plataforma tecnológica de reservas con beneficios exclusivos para clientes [...]</span>
                        </div>
        
                        <div class="access-empresas">
                            <figure>
                                <img src="./assets/img/membresia/logo_generico.png">
                            </figure>
                        </div>
                        
                    </div>

                </div>

            </section>

            <section class="membresia-content home-bkg-color-azul">
                
                <div class="max-ancho">
                    <div id="cnt_general_beneficios_access">
    
                        <div class="beneficios-titulo-access">
                            Beneficios FAV Access
                        </div>
    
                        <div class="cnt-general-cuadruple">
    
                            <div class="item-access">
    
                                <div class="item-access-titulo">
                                    <span>HASTA</span>
                                    <div class="titulo-porcentaje-numero">X <span class="titulo-porcentaje">%</span> </div>
                                    
                                </div>
    
                                <div class="item-access-subtitulo">
                                    <span>ACCESO A DESCUENTOS Y EXPERIENCIAS</span>
                                </div>
                                
                                <div class="item-access-texto">
                                    <p><strong>Hasta X de descuento</strong> todos los Jueves en restaurantes <strong>FAV ACCESS</strong> seleccionados, eventos y más.</p>
                                </div>
    
                            </div>
    
                            <div class="item-access">
    
                                <div class="item-access-titulo">
                                    <figure>
                                        <img src="./assets/img/membresia/grupo_2.svg">
                                    </figure>
                                </div>
    
                                <div class="item-access-subtitulo">
                                    <span>RESERVA EXCLUSIVA</span>
                                </div>
                                
                                <div class="item-access-texto">
                                    <p>Mesas en horarios estelares en restaurantes de alta demanda.</p>
                                </div>
                                
                            </div>
    
                            <div class="item-access">
    
                                <div class="item-access-titulo">
                                    <figure>
                                        <img src="./assets/img/membresia/grupo_3.svg">
                                    </figure>
                                </div>
    
                                <div class="item-access-subtitulo">
                                    <span>NOTIFICACIÓN PRIORITARIA</span>
                                </div>
                                
                                <div class="item-access-texto">
                                    <p>Cuando las mesas se liberen, serán los primeros en saber.</p>
                                </div>
                                
                            </div>
    
                            <div class="item-access">
    
                                <div class="item-access-titulo">
                                    <figure>
                                        <img src="./assets/img/membresia/grupo_4.svg">
                                    </figure>
                                </div>
    
                                <div class="item-access-subtitulo">
                                    <span>VIP DINNER BADGE</span>
                                </div>
                                
                                <div class="item-access-texto">
                                    <p>Reconocimiento de huésped valioso.</p>
                                </div>
                                
                            </div>
    
                        </div>
    
                    </div>
                </div>

            </section>

            <section class="membresia-content home-bkg-color-gris">

                <div class="max-ancho">
                    <div id="cnt_general_beneficios">

                        <div class="cnt-beneficios-titulo">
    
                            <span class="beneficios-titulo">Conoce todos los beneficios</span>
                            <!--<span>Ingresa el BIN de tu tarjeta American Express del Banco Guayaquil para acceder a beneficios exclusivos</span>-->
                            <!--
                            <span>Ingresa los primeros 6 digitos de tu tarjeta de crédito</span>
                            <form id="form_ingreso_bin">
    
                                <div class="input-grupo">
                                    <div class="form-group">
                                        <input type="text" pattern="[0-9]{6}" class="form-input" id="bin_digitos" name="bin_digitos">
                                        <div id="bin_digitos_p">
                                            <p class="form-input-hint">Ingrese sus primeros 6 d&iacute;gitos.</p>
                                            <figure>
                                                <img src="./assets/img/icons/icon_i.svg">
                                            </figure>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" id="btn_submit_bin" name="btn_submit_bin" value="Acceder">
                                </div>
    
                            </form>
                            -->
                        </div>
    
                        <div class="cnt-general-cuadruple">
    
                            <div class="item-beneficio">
                                <span class="item-beneficio-titulo">1</span>
                                <p>Descarga la aplicación FAV para iOS/Android o ingresa a <strong>explorefav.com</strong> para crear un perfil o iniciar sesión.</p>
                            </div>
    
                            <div class="item-beneficio">
                                <span class="item-beneficio-titulo">2</span>
                                <p>Ingresa los primeros 6 dígitos de tu Tarjeta de Crédito del Banco X</p>
                            </div>
    
                            <div class="item-beneficio">
                                <span class="item-beneficio-titulo">3</span>
                                <p>Explora y reserva en los restaurantes adheridos.</p>
                            </div>
    
                            <div class="item-beneficio">
                                <span class="item-beneficio-titulo">4</span>
                                <p>Disfruta de todos los beneficios que FAV Access tiene para ti.</p>
                            </div>
    
                        </div>
                    </div>
                </div>

            </section>

            <section class="membresia-content home-bkg-no-color">

                <div class="max-ancho">
                    <div id="cnt_general_restaurantes">
    
                        <span class="restaurantes-titulo">Restaurantes adheridos a FAV ACCESS</span>
    
                        <div class="cnt-general-cuadruple">
    
                            <div class="item-restaurante">
    
                                <div class="restaurante-imagen">
                                    <figure>
                                        <img src="./assets/img/membresia/item_restaurante.png">
                                    </figure>
                                </div>
    
                                <div class="restaurante-titulo">
                                    <span>Mikka</span>
                                    <span class="info-restaurante-icon" id="restaurante_like">
                                        <figure>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                                <mask id="path-1-inside-1_7_658" fill="white">
                                                <path d="M24.7636 0H2.60168C1.36649 0 0.364227 0.995843 0.364227 2.22313V18.9996C0.364227 20.2269 1.36649 21.2227 2.60168 21.2227H8.93046L13.6821 25.9439L18.4338 21.2227H24.7625C25.9988 21.2227 27 20.2269 27 18.9996V2.22313C27 0.995843 25.9977 0 24.7625 0"/>
                                                </mask>
                                                <path d="M8.93046 21.2227L9.63529 20.5133L9.34279 20.2227H8.93046V21.2227ZM13.6821 25.9439L12.9773 26.6533L13.6821 27.3536L14.3869 26.6533L13.6821 25.9439ZM18.4338 21.2227V20.2227H18.0214L17.7289 20.5133L18.4338 21.2227ZM24.7636 -1H2.60168V1H24.7636V-1ZM2.60168 -1C0.82027 -1 -0.635773 0.437511 -0.635773 2.22313H1.36423C1.36423 1.55417 1.91271 1 2.60168 1V-1ZM-0.635773 2.22313V18.9996H1.36423V2.22313H-0.635773ZM-0.635773 18.9996C-0.635773 20.7852 0.820271 22.2227 2.60168 22.2227V20.2227C1.91271 20.2227 1.36423 19.6685 1.36423 18.9996H-0.635773ZM2.60168 22.2227H8.93046V20.2227H2.60168V22.2227ZM8.22563 21.9321L12.9773 26.6533L14.3869 25.2346L9.63529 20.5133L8.22563 21.9321ZM14.3869 26.6533L19.1386 21.9321L17.7289 20.5133L12.9773 25.2346L14.3869 26.6533ZM18.4338 22.2227H24.7625V20.2227H18.4338V22.2227ZM24.7625 22.2227C26.5453 22.2227 28 20.7849 28 18.9996H26C26 19.6688 25.4523 20.2227 24.7625 20.2227V22.2227ZM28 18.9996V2.22313H26V18.9996H28ZM28 2.22313C28 0.437511 26.544 -1 24.7625 -1V1C25.4515 1 26 1.55417 26 2.22313H28Z" fill="#FF246B" mask="url(#path-1-inside-1_7_658)"/>
                                                <path d="M13.159 7.45918L13.5096 7.80434L13.8604 7.45934C14.8536 6.48247 16.466 6.48208 17.4574 7.45902C18.445 8.43214 18.4451 10.0051 17.4576 10.9783C17.4576 10.9783 17.4576 10.9783 17.4576 10.9783C17.4575 10.9784 17.4575 10.9784 17.4574 10.9784L13.5098 14.8647L9.56197 10.9783C8.57346 10.0051 8.57346 8.43232 9.56197 7.45918C10.5547 6.48186 12.1671 6.48269 13.159 7.45918Z" stroke="#FF246B"/>
                                            </svg>
                                        </figure>
                                    </span>
                                </div>
    
                                <div class="restaurante-info">
    
                                    <div class="restaurante-info-item">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star-half-alt"></i>
                                        <i class="lar la-star"></i>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/precio.svg">
                                            </figure>
                                        </span>
                                        <span>5.000</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/ubicacion.svg">
                                            </figure>
                                        </span>
                                        <span>Av. Rio Esmeraldas</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/restaurant.svg">
                                            </figure>
                                        </span>
                                        <span>Asi&aacute;tica</span>
                                    </div>
    
                                </div>
    
                                
    
                            </div>
    
                            <div class="item-restaurante">
    
                                <div class="restaurante-imagen">
                                    <figure>
                                        <img src="./assets/img/membresia/item_restaurante.png">
                                    </figure>
                                </div>
    
                                <div class="restaurante-titulo">
                                    <span>Mikka</span>
                                    <span class="info-restaurante-icon" id="restaurante_like">
                                        <figure>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                                <mask id="path-1-inside-1_7_658" fill="white">
                                                <path d="M24.7636 0H2.60168C1.36649 0 0.364227 0.995843 0.364227 2.22313V18.9996C0.364227 20.2269 1.36649 21.2227 2.60168 21.2227H8.93046L13.6821 25.9439L18.4338 21.2227H24.7625C25.9988 21.2227 27 20.2269 27 18.9996V2.22313C27 0.995843 25.9977 0 24.7625 0"/>
                                                </mask>
                                                <path d="M8.93046 21.2227L9.63529 20.5133L9.34279 20.2227H8.93046V21.2227ZM13.6821 25.9439L12.9773 26.6533L13.6821 27.3536L14.3869 26.6533L13.6821 25.9439ZM18.4338 21.2227V20.2227H18.0214L17.7289 20.5133L18.4338 21.2227ZM24.7636 -1H2.60168V1H24.7636V-1ZM2.60168 -1C0.82027 -1 -0.635773 0.437511 -0.635773 2.22313H1.36423C1.36423 1.55417 1.91271 1 2.60168 1V-1ZM-0.635773 2.22313V18.9996H1.36423V2.22313H-0.635773ZM-0.635773 18.9996C-0.635773 20.7852 0.820271 22.2227 2.60168 22.2227V20.2227C1.91271 20.2227 1.36423 19.6685 1.36423 18.9996H-0.635773ZM2.60168 22.2227H8.93046V20.2227H2.60168V22.2227ZM8.22563 21.9321L12.9773 26.6533L14.3869 25.2346L9.63529 20.5133L8.22563 21.9321ZM14.3869 26.6533L19.1386 21.9321L17.7289 20.5133L12.9773 25.2346L14.3869 26.6533ZM18.4338 22.2227H24.7625V20.2227H18.4338V22.2227ZM24.7625 22.2227C26.5453 22.2227 28 20.7849 28 18.9996H26C26 19.6688 25.4523 20.2227 24.7625 20.2227V22.2227ZM28 18.9996V2.22313H26V18.9996H28ZM28 2.22313C28 0.437511 26.544 -1 24.7625 -1V1C25.4515 1 26 1.55417 26 2.22313H28Z" fill="#FF246B" mask="url(#path-1-inside-1_7_658)"/>
                                                <path d="M13.159 7.45918L13.5096 7.80434L13.8604 7.45934C14.8536 6.48247 16.466 6.48208 17.4574 7.45902C18.445 8.43214 18.4451 10.0051 17.4576 10.9783C17.4576 10.9783 17.4576 10.9783 17.4576 10.9783C17.4575 10.9784 17.4575 10.9784 17.4574 10.9784L13.5098 14.8647L9.56197 10.9783C8.57346 10.0051 8.57346 8.43232 9.56197 7.45918C10.5547 6.48186 12.1671 6.48269 13.159 7.45918Z" stroke="#FF246B"/>
                                            </svg>
                                        </figure>
                                    </span>
                                </div>
    
                                <div class="restaurante-info">
    
                                    <div class="restaurante-info-item">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star-half-alt"></i>
                                        <i class="lar la-star"></i>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/precio.svg">
                                            </figure>
                                        </span>
                                        <span>5.000</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/ubicacion.svg">
                                            </figure>
                                        </span>
                                        <span>Av. Rio Esmeraldas</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/restaurant.svg">
                                            </figure>
                                        </span>
                                        <span>Asi&aacute;tica</span>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class="item-restaurante">
    
                                <div class="restaurante-imagen">
                                    <figure>
                                        <img src="./assets/img/membresia/item_restaurante.png">
                                    </figure>
                                </div>
    
                                <div class="restaurante-titulo">
                                    <span>Mikka</span>
                                    <span class="info-restaurante-icon" id="restaurante_like">
                                        <figure>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                                <mask id="path-1-inside-1_7_658" fill="white">
                                                <path d="M24.7636 0H2.60168C1.36649 0 0.364227 0.995843 0.364227 2.22313V18.9996C0.364227 20.2269 1.36649 21.2227 2.60168 21.2227H8.93046L13.6821 25.9439L18.4338 21.2227H24.7625C25.9988 21.2227 27 20.2269 27 18.9996V2.22313C27 0.995843 25.9977 0 24.7625 0"/>
                                                </mask>
                                                <path d="M8.93046 21.2227L9.63529 20.5133L9.34279 20.2227H8.93046V21.2227ZM13.6821 25.9439L12.9773 26.6533L13.6821 27.3536L14.3869 26.6533L13.6821 25.9439ZM18.4338 21.2227V20.2227H18.0214L17.7289 20.5133L18.4338 21.2227ZM24.7636 -1H2.60168V1H24.7636V-1ZM2.60168 -1C0.82027 -1 -0.635773 0.437511 -0.635773 2.22313H1.36423C1.36423 1.55417 1.91271 1 2.60168 1V-1ZM-0.635773 2.22313V18.9996H1.36423V2.22313H-0.635773ZM-0.635773 18.9996C-0.635773 20.7852 0.820271 22.2227 2.60168 22.2227V20.2227C1.91271 20.2227 1.36423 19.6685 1.36423 18.9996H-0.635773ZM2.60168 22.2227H8.93046V20.2227H2.60168V22.2227ZM8.22563 21.9321L12.9773 26.6533L14.3869 25.2346L9.63529 20.5133L8.22563 21.9321ZM14.3869 26.6533L19.1386 21.9321L17.7289 20.5133L12.9773 25.2346L14.3869 26.6533ZM18.4338 22.2227H24.7625V20.2227H18.4338V22.2227ZM24.7625 22.2227C26.5453 22.2227 28 20.7849 28 18.9996H26C26 19.6688 25.4523 20.2227 24.7625 20.2227V22.2227ZM28 18.9996V2.22313H26V18.9996H28ZM28 2.22313C28 0.437511 26.544 -1 24.7625 -1V1C25.4515 1 26 1.55417 26 2.22313H28Z" fill="#FF246B" mask="url(#path-1-inside-1_7_658)"/>
                                                <path d="M13.159 7.45918L13.5096 7.80434L13.8604 7.45934C14.8536 6.48247 16.466 6.48208 17.4574 7.45902C18.445 8.43214 18.4451 10.0051 17.4576 10.9783C17.4576 10.9783 17.4576 10.9783 17.4576 10.9783C17.4575 10.9784 17.4575 10.9784 17.4574 10.9784L13.5098 14.8647L9.56197 10.9783C8.57346 10.0051 8.57346 8.43232 9.56197 7.45918C10.5547 6.48186 12.1671 6.48269 13.159 7.45918Z" stroke="#FF246B"/>
                                            </svg>
                                        </figure>
                                    </span>
                                </div>
    
                                <div class="restaurante-info">
    
                                    <div class="restaurante-info-item">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star-half-alt"></i>
                                        <i class="lar la-star"></i>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/precio.svg">
                                            </figure>
                                        </span>
                                        <span>5.000</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/ubicacion.svg">
                                            </figure>
                                        </span>
                                        <span>Av. Rio Esmeraldas</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/restaurant.svg">
                                            </figure>
                                        </span>
                                        <span>Asi&aacute;tica</span>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class="item-restaurante">
    
                                <div class="restaurante-imagen">
                                    <figure>
                                        <img src="./assets/img/membresia/item_restaurante.png">
                                    </figure>
                                </div>
    
                                <div class="restaurante-titulo">
                                    <span>Mikka</span>
                                    <span class="info-restaurante-icon" id="restaurante_like">
                                        <figure>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                                                <mask id="path-1-inside-1_7_658" fill="white">
                                                <path d="M24.7636 0H2.60168C1.36649 0 0.364227 0.995843 0.364227 2.22313V18.9996C0.364227 20.2269 1.36649 21.2227 2.60168 21.2227H8.93046L13.6821 25.9439L18.4338 21.2227H24.7625C25.9988 21.2227 27 20.2269 27 18.9996V2.22313C27 0.995843 25.9977 0 24.7625 0"/>
                                                </mask>
                                                <path d="M8.93046 21.2227L9.63529 20.5133L9.34279 20.2227H8.93046V21.2227ZM13.6821 25.9439L12.9773 26.6533L13.6821 27.3536L14.3869 26.6533L13.6821 25.9439ZM18.4338 21.2227V20.2227H18.0214L17.7289 20.5133L18.4338 21.2227ZM24.7636 -1H2.60168V1H24.7636V-1ZM2.60168 -1C0.82027 -1 -0.635773 0.437511 -0.635773 2.22313H1.36423C1.36423 1.55417 1.91271 1 2.60168 1V-1ZM-0.635773 2.22313V18.9996H1.36423V2.22313H-0.635773ZM-0.635773 18.9996C-0.635773 20.7852 0.820271 22.2227 2.60168 22.2227V20.2227C1.91271 20.2227 1.36423 19.6685 1.36423 18.9996H-0.635773ZM2.60168 22.2227H8.93046V20.2227H2.60168V22.2227ZM8.22563 21.9321L12.9773 26.6533L14.3869 25.2346L9.63529 20.5133L8.22563 21.9321ZM14.3869 26.6533L19.1386 21.9321L17.7289 20.5133L12.9773 25.2346L14.3869 26.6533ZM18.4338 22.2227H24.7625V20.2227H18.4338V22.2227ZM24.7625 22.2227C26.5453 22.2227 28 20.7849 28 18.9996H26C26 19.6688 25.4523 20.2227 24.7625 20.2227V22.2227ZM28 18.9996V2.22313H26V18.9996H28ZM28 2.22313C28 0.437511 26.544 -1 24.7625 -1V1C25.4515 1 26 1.55417 26 2.22313H28Z" fill="#FF246B" mask="url(#path-1-inside-1_7_658)"/>
                                                <path d="M13.159 7.45918L13.5096 7.80434L13.8604 7.45934C14.8536 6.48247 16.466 6.48208 17.4574 7.45902C18.445 8.43214 18.4451 10.0051 17.4576 10.9783C17.4576 10.9783 17.4576 10.9783 17.4576 10.9783C17.4575 10.9784 17.4575 10.9784 17.4574 10.9784L13.5098 14.8647L9.56197 10.9783C8.57346 10.0051 8.57346 8.43232 9.56197 7.45918C10.5547 6.48186 12.1671 6.48269 13.159 7.45918Z" stroke="#FF246B"/>
                                            </svg>
                                        </figure>
                                    </span>
                                </div>
    
                                <div class="restaurante-info">
    
                                    <div class="restaurante-info-item">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star-half-alt"></i>
                                        <i class="lar la-star"></i>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/precio.svg">
                                            </figure>
                                        </span>
                                        <span>5.000</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/ubicacion.svg">
                                            </figure>
                                        </span>
                                        <span>Av. Rio Esmeraldas</span>
                                    </div>
    
                                    <div class="info-restaurante-icon-ctn">
                                        <span class="info-restaurante-icon">
                                            <figure>
                                                <img src="./assets/img/icons/restaurant.svg">
                                            </figure>
                                        </span>
                                        <span>Asi&aacute;tica</span>
                                    </div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                        <footer class="restaurantes-footer"><span>Las reservas están sujetas a disponibilidad</span></footer>
    
                    </div>
                </div>

            </section>
        </main>

        <!--footer-->
        <?php include('./vistas/footer.php')?>

        <!-- Traigo JS -->
        <?php echo $config['js']; ?>

    </body>
</html>
