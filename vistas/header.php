<input type="hidden" id="sid" value="<?php echo session_id(); ?>">

<div id="navegador_fav">
	<div id="cnt_navegador">

        <div class="cnt-logo-nav">
            <a href="<?php echo $config['direc']?>index.php">
                <figure>
                    <img src="<?php echo $config['direc']?>assets/img/icons/fav.svg">
                </figure>
            </a>
            <span>Ecuador</span>
        </div>

        <div class="cnt-links">
            <div class="cnt-links-division">
                <a href="<?php echo $config['direc']?>index.php#cnt_general_pre_beneficios" class="nav-link">
                    <span class="nav-span">Beneficios</span>
                </a>
                <a href="<?php echo $config['direc_sub']?>plataforma.php" class="nav-link">
                    <span class="nav-span">Plataforma</span>
                </a>
                <a href="<?php echo $config['direc_sub']?>membresia.php" class="nav-link">
                    <span class="nav-span">Membres&iacute;a</span>
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="nav-link icon-nav-link">
                    <figure>
                        <img src="<?php echo $config['direc']?>assets/img/icons/instagram.svg">
                    </figure>
                </a>

            </div>
            <a href="#form_contacto" class="btn btn-primary">
                Solicita tu Demo 
            </a>
        </div>
	</div>
</div>

<div id="navegador_fav_mobile" class="d-none">
    <div class="cnt-logo-nav">
        <a href="<?php echo $config['direc']?>index.php">
            <figure>
                <img src="<?php echo $config['direc']?>assets/img/icons/fav.svg">
            </figure>
            Ecuador
        </a>
        <a href="#form_contacto" class="btn btn-secondary">
            Solicita tu Demo 
        </a>
        <div class="btnHam">
            <div class="lineaRes -top"></div>
            <div class="lineaRes -mid"></div>
            <div class="lineaRes -bottom"></div>
        </div>
    </div>
	<div id="cnt_navegador_mobile">
        <div class="cnt-logo-nav">
            <a href="<?php echo $config['direc']?>index.php">
                <figure>
                    <img src="<?php echo $config['direc']?>assets/img/icons/fav_mobile.svg">
                </figure>
                Ecuador
            </a>
            <a href="#form_contacto" class="btn btn-secondary">
                Solicita tu Demo 
            </a>
            <div class="btnHam-invertido">
                <div class="lineaRes -top"></div>
                <div class="lineaRes -mid"></div>
                <div class="lineaRes -bottom"></div>
            </div>
        </div>
		<div class="cnt-links">
			<a href="<?php echo $config['direc']?>index.php#cnt_general_pre_beneficios" class="nav-link">Beneficios</a>
			<a href="<?php echo $config['direc_sub']?>plataforma.php" class="nav-link">Plataforma</a>
			<a href="<?php echo $config['direc_sub']?>membresia.php" class="nav-link">Membres&iacute;a</a>
			<a href="https://www.instagram.com/explorefav/" target="_blank" class="nav-link icon-nav-link">
                <figure>
                    <img src="<?php echo $config['direc']?>assets/img/icons/instagram_white.svg">
                </figure>
            </a>
		</div>
	</div>
</div>