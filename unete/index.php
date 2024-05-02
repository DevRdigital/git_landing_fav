<!DOCTYPE html>
<html>
    <head>
        <?php
            $config['place'] = "home";
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

            <section class="home-content home-bkg-no-color dos-mitades">
                <div class="max-ancho">
                    <div id="cnt_general_presentacion" >
    
                        <div class="cnt-general-doble">
        
                            <div class="cnt-general-doble-izq">
        
                                <div id="cnt_home_presentacion">
                                    <div>
                                        <p class="texto-claro">
                                            Somos una plataforma tecnológica de reservas, orientada al consumidor, que brinda acceso a restaurantes y experiencias gastronómicas.
                                        </p>
                                    </div>
                                    <div>
                                        <span>&Uacute;nete a</span>
                                        <figure>
                                            <img async loading="lazy" src="./assets/img/icons/fav.svg">
                                        </figure>
                                        <a href="#form_contacto" class="btn btn-primary">Solicita tu Demo</a>
                                    </div>
                                </div>
                            </div>
        
                            <div class="cnt-general-doble-der">
        
                                <div id="cnt_home_img_libres">
                                    <figure class="img-cuadro-uno">
                                        <img async loading="lazy" src="./assets/img/home/home-img-cuadro-uno.png">
                                        <img async loading="lazy" src="./assets/img/home/home-img-cuadro-tres.jpg">
                                        <img async loading="lazy" src="./assets/img/home/home-img-cuadro-dos.png">
                                    </figure>
                                </div>
        
                            </div>
        
                        </div>
    
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-no-color">

                <div id="cnt_general_pre_beneficios">
                    <figure class="img-borde-izq">
                        <img async loading="lazy" src="./assets/img/home/home-borde-izq.png">
                    </figure>
    
                    <div class="cnt-centrado">
                        <div>
                            <figure class="icono-centrado">
                                <img src="./assets/img/icons/heart.png">
                            </figure>
        
                            <span class="titulo-decorado">
                                Todo lo que tu Restaurante necesita
                            </span>
                        </div>
    
                        <div>
                            <span class="subtitulo">
                                Beneficios para potenciar tu negocio
                            </span>
                        </div>
                    </div>
                    <figure class="img-borde-der">
                        <img async loading="lazy" src="./assets/img/home/home-borde-der.png">
                    </figure>
                </div>

            </section>

            <section class="home-content home-bkg-no-color">

                <div class="max-ancho">
                    <div id="cnt_general_beneficio">
                        <div class="cnt-items-beneficio">
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_multiplica.svg"></figure>
                                <span>Multiplica reservas</span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_maximiza.svg"></figure>
                                <span>Maximiza tus ingresos y mejora la rentabilidad</span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_evita.svg"></figure>
                                <span>Evita no-shows</span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_eventos.svg"></figure>
                                <span>Eventos gastronómicos</span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_conoce.svg"></figure>
                                <span>Conoce y construye relaciones con tus Clientes</span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_soporte.svg"></figure>
                                <span>Soporte los <strong>365 días del año</strong></span>
                            </div>
                            <div class="item-beneficio">
                                <figure class="item-beneficio-img"><img async loading="lazy" src="./assets/img/home/beneficio_mas.svg"></figure>
                                <span><strong>Y mucho m&aacute;s</strong></span>
                            </div>
                        </div>
    
                        <div class="cnt-btn-beneficio">
                            <a href="#form_contacto" class="btn btn-primary">
                                Solicita tu Demo
                            </a>
                        </div>
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-image">
                <figure>
                    <img async loading="lazy" src="./assets/img/bkg-completo-home-uno.svg">
                </figure>
            </section>

            <section class="home-content home-bkg-color-light">

                <div class="max-ancho">
                    <div id="cnt_general_covermanager" >
    
                        <div class="cnt-general-doble">
                            <div class="cnt-general-doble-izq">
                                <span class="subtitulo">Alianza estratégica con COVERMANAGER</span>
                                <div class="cnt-alianza-imagenes">
                                    <figure>
                                        <img async loading="lazy" src="./assets/img/icons/fav.svg">
                                        <img async loading="lazy" src="./assets/img/home/+.png">
                                    </figure>
                                    <figure>
                                        <img async loading="lazy" src="./assets/img/home/covermanager.png">
                                    </figure>
                                </div>
    
                                <figure class="alianza-img-calcu">
                                    <img async loading="lazy" src="./assets/img/home/calcu_uno.png">
                                    <img async loading="lazy" src="./assets/img/home/calcu_dos.png">
                                </figure>
            
                                <div class="cnt-alianza-texto">
                                    <span>
                                        Con FAV tu restaurante accede a la plataforma tecnológica de reservas de <strong>Cover Manager</strong> para gestionar mejor su negocio, maximizar sus ingresos y obtener mayor valor.
                                    </span>
                                </div>
            
                                <div class="cnt-alianza-pre-numeros">
                                    <span>Cover Manager es un referente de la industria de Hospitality hace mas de 10 años.</span>
                                    <br>
                                    <span class="subtitulo">Presente en m&aacute;s de:</span>
                                </div>
            
                                <div class="cnt-alianza-numeros">
                                    <div class="cnt-numero-item">
                                        <span class="numero-item-titulo">+25K</span>
                                        <span class="numero-item-texto">Pa&iacute;ses en todo el mundo</span>
                                    </div>
                                    <div class="cnt-numero-item">
                                        <span class="numero-item-titulo">+14K</span>
                                        <span class="numero-item-texto">Restaurantes</span>
                                    </div>
                                    <div class="cnt-numero-item">
                                        <span class="numero-item-titulo">+150M</span>
                                        <span class="numero-item-texto">De reservas en restaurantes realizadas en 2023</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cnt-general-doble-der">
                                <figure class="alianza-img-calcu">
                                    <img async loading="lazy" src="./assets/img/home/calcu_uno.png">
                                    <img async loading="lazy" src="./assets/img/home/calcu_dos.png">
                                </figure>
                            </div>
                        </div>
    
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-no-color">


                <div class="max-ancho">
                    <div id="cnt_general_servicios">
    
                        <p class="titulo-general">Impulsamos el &eacute;xito<br>en cada paso del camino</p>
                        <div class="cnt-general-triple">
                            <div class="item-impulso">
                                <figure><img async loading="lazy" src="./assets/img/home/cont_pre_servicio.png"/></figure>
                                <span class="titulo-impulso">Pre-servicio</span>
                                <p>
                                    Multiplicar reservas<br>
                                    Optimizar las mesas/oferta<br>
                                    Manejo de reservas, colas y no-shows.
                                </p>
                            </div>
    
                            <div class="item-impulso">
                                <figure><img async loading="lazy" src="./assets/img/home/cont_servicio.png"/></figure>
                                <span class="titulo-impulso">Durante el servicio</span>
                                <p>
                                    Conocer más a su cliente<br>
                                    Digitalizar e innovar la experiencia.<br>
                                    Personalizar y mejorar la comunicación y relacionamiento.
                                </p>
                            </div>
    
                            <div class="item-impulso">
                                <figure><img async loading="lazy" src="./assets/img/home/cont_post.png"/></figure>
                                <span class="titulo-impulso">Post-servicio</span>
                                <p>
                                    Medición de satisfacción<br>
                                    Manejo del CRM, estrategia de marketing<br>
                                    Servicio 24/7 los 365 días del año, integración POS, servicio para delivery y take away
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-image">
                <figure>
                    <img async loading="lazy" src="./assets/img/bkg-completo-home-dos.svg">
                </figure>
            </section>

            <section class="home-content home-bkg-color">

                <div class="max-ancho">
                    <div id="cnt_general_experiencia">
    
                        <div class="cnt-general-doble">
    
                            <div class="cnt-general-doble-izq">
                                <p class="titulo-general-blanco">Con FAV tus clientes disfrutarán una experiencia de reserva rápida y sencilla</p>
                            </div>
    
                            <div class="cnt-general-doble-der">
                                <span id="experiencia_titulo">&iquest;C&oacute;mo ser&aacute; tu experiencia?</span>
                                
                                <div id="cnt_experiencia_items">
                                    <div class="experiencia-item">
                                        <span class="experiencia-item-titulo">#1: Conocer</span>
                                        <span>Descargarán la APP FAV o ingresarán a la website 
                                            <a href="https://www.explorefav.com/" target="_blank"><strong>www.explorefav.com</strong></a>
                                        </span>
                                    </div>
        
                                    <div class="experiencia-item">
                                        <span class="experiencia-item-titulo">#2: Inscribirse</span>
                                        <span>Completarán el perfil de preferencias y medios de pagos.</span>
                                    </div>
        
                                    <div class="experiencia-item">
                                        <span class="experiencia-item-titulo">#3: Explorar</span>
                                        <span>Podrán explorar restaurantes y generar reservas.</span>
                                    </div>
        
                                    <div class="experiencia-item">
                                        <span class="experiencia-item-titulo">#4: Disfrutar</span>
                                        <span>Recibirán novedades, eventos y notificaciones.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-color-light">

                <div class="max-ancho">
                    <div id="cnt_general_membresia">
                        <div id="cnt_membresia_titulo">
                            <span class="titulo-general-rosa">Membresías FAV</span>
                            <span class="subtitulo">Elige el plan que se adapte mejor a tu restaurante</span>
                        </div>
                        <div class="cnt-general-triple">
                            <div class="item-membresia membresia-standard">
                                <div class="membresia-body">
                                    <span class="titulo-membresia">Standard</span>
                                    <p>
                                        Un completo sistema de inteligencia de gestión de reservas, mesas, lista de espera valoración post reserva y eventos gastronómicos.<br><br>
                                        CRM avanzado de clientes e informes y Integración con herramientas de MKT.<br><br>
                                        Incluye coberturas, usuarios y dispositivos ilimitados.
                                    </p>
                                </div>
                                <footer class="membresia-footer">
                                    <span>U$s 110/</span><span>MES</span>
                                </footer>
                            </div>
    
                            <div class="item-membresia membresia-premium">
                                <div class="membresia-body">
                                    <span class="titulo-membresia">Premium</span>
                                    <p>
                                         Todo lo incluido en el STANDARD + Cross-selling con grupo de restaurantes propios. Integración en POS y centralita de teléfonos.
                                         Establecimiento de orden de ocupación de mesas. NON-shows y política de cancelación.<br>
                                    </p>
                                </div>
                                <footer class="membresia-footer">
                                    <span>U$s 210/</span><span>MES</span>
                                </footer>
                            </div>
    
                            <div class="item-membresia membresia-performance">
                                <div class="membresia-body">
                                    <span class="titulo-membresia">Performance</span>
                                    <p>
                                        Todo lo incluido en el PREMIUM + Plan interactivo, configuración de alto rendimiento, precios dinámicos dependiendo fechas y zonas, reportes personalizados y Acceso de uso de la Api.
                                    </p>
                                </div>
                                <footer class="membresia-footer">
                                    <span>U$s 310/</span><span>MES</span>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="home-content home-bkg-image">
                <figure>
                    <img async loading="lazy" src="./assets/img/bkg-completo-home-tres.svg">
                </figure>
            </section>

            <section class="home-content home-bkg-color-obscure">

                <div class="max-ancho">
                    <div id="cnt_general_formulario">
    
                        <div class="cnt-general-doble">
                            <div class="cnt-general-doble-izq">
                                <span class="titulo-general-blanco">&Uacute;nete<br> hoy mismo</span>
                                <span class="titulo-general-rosa">Hablemos</span>
                            </div>
                            <div class="cnt-general-doble-der">
    
                                <form id="form_contacto" onsubmit="return false;">
    
                                    <div class="form-group">
                                        <label class="form-label" for="contacto_nombre">Nombre completo</label>
                                        <input class="form-input" type="text" id="contacto_nombre" name="nombre">
                                    </div>
    
                                    <div class="form-group">
                                        <label class="form-label" for="contacto_email">Correo Electr&oacute;nico</label>
                                        <input class="form-input" type="text" id="contacto_email" name="email">
                                    </div>
    
                                    <div class="form-group">
                                        <label class="form-label" for="contacto_establecimiento">Nombre del Establecimiento</label>
                                        <input class="form-input" type="text" id="contacto_establecimiento" name="establecimiento">
                                    </div>
    
                                    <div class="cnt-input">
    
                                        <div class="form-group">
                                            <label class="form-label" for="contacto_ciudad">Ciudad</label>
                                            <input class="form-input" type="text" id="contacto_ciudad" name="ciudad">
                                        </div>
    
                                        <div class="form-group">
                                            <label class="form-label" for="contacto_tel">Tel&eacute;fono</label>
                                            <input class="form-input" type="text" id="contacto_tel" name="tel">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group">
                                        <textarea class="form-input" id="contacto_mensaje" name="mensaje" rows="6"></textarea>
                                    </div>
    
                                    <div class="form-btn-content">
                                        <!--<input type="submit" class="btn btn-primary" id="btn_submit_contacto" value="Solicita tu Demo">-->
                                        <button type="submit" class="btn btn-primary" id="btn_submit_contacto">Solicita tu Demo</button>
                                    </div>
    
                                </form>
    
                            </div>
                        </div>
    
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
