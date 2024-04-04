<input type="hidden" name="item_esta_reservado" id="item_esta_reservado">
<input type="hidden" id="add_reserva_dias" 	name="add_reserva_dias"  value="1">
<input type="hidden" id="ecm_id"        	name="carrito['id']" value="0">
<input type="hidden" id="ecm_nombre"    	name="carrito['nombre']" value="">
<input type="hidden" id="ecm_cantidad"  	name="carrito['cantidad']" value="0">
<input type="hidden" id="ecm_info"      	name="carrito['info']" value="">
<input type="hidden" id="contIntCant"   	name="contIntCant" value="0">
<input type="hidden" id="ecm_tipo" 			name="carrito['info']" value="">
<input type="hidden" id="mostrar"  value="<?php echo ( (isset($_GET['mostrar']) == true) ? floatval(strip_tags($_GET['mostrar'])) : 0 ); ?>">


<input type="hidden" id="sid" value="<?php echo session_id(); ?>">

<script type="text/javascript">
	{
	    if ($r.vls('yrEcmCrr') == true)
	      if (JSON.parse($r.tls('yrEcmCrr')).articulos.length == 0)
	        $r.lls('yrEcmCrr');
	  }
</script>
<div id="navegador_osa" class="navegador_osa">
	<div class="contenedor_navegador" id="contenedor_navegador">
		<div class="contenido_nav">
			<div class="contenedor_logo">
				<figure>
					<a href="index.php"><img class="logo_osa" src="./img/logo_osa_tropical/logo_osa_tropical.png"></a>
				</figure>
			</div><div class="contenedor_links">
				<div class="contenedor_submenu">
					<a id="bookingNav" href="index.php" class="nav_links nav_links_type nav-p">
						<span  id="bookingNavSpan" class="nav_span" data-leng="n_0">Travel</span>
					</a>
					<div class="submnulink contenedor_booking media_grande" id="subm1">
						<div id="booking" class="contenedor_sublinks_booking ">
							<a data-leng="n_1_1" href="packages.php" class="nav_links_type nav-p">Custom Experience</a>
							<a data-leng="n_1_2" href="tours.php" class="nav_links_type nav-p">Activities</a>
							<a data-leng="n_1_3" href="booking.php" class="nav_links_type nav-p">Vacations Rentals</a>
							<a data-leng="n_1_4" href="packagesonly.php" class="nav_links_type nav-p">Packages</a>
							<a data-leng="n_1_5" href="bookinguno.php" class="nav_links_type nav-p">Hotels</a>
							<a data-leng="n_1_6" href="cars_rental.php" class="nav_links_type nav-p">Transportation</a>
						</div>
					</div>
				</div>
				<!-- Por peticion de Erik se mueve Property Management al lado derecho, dentro de contenedor_sign  
				<a href="management.php" class="nav_links nav_links_type nav-p">
					<span class="nav_span">Property Management</span>
				</a>
				-->
				<!-- Por peticion de Erik se oculta la seccion de Real State. Se le quita  a sus clases contenedor_submenu --> 
				<div class="d-none">
					<a id="estateNav" class="nav_links nav_links_type nav-p">
						<span id="estateNavSpan" class="nav_span">Real Estate</span>
					</a>
					<div class="submnulink contenedor_estate media_grande" id="subm2">
						<div id="estate" class="contenedor_sublinks_estate">
							<a href="estate.php" class="nav_links_type nav-p">Puerto Jimenez</a>
							<a href="" class="nav_links_type nav-p">Golfo Dulce</a>
							<a href="" class="nav_links_type nav-p">Matapalo</a>
							<a href="" class="nav_links_type nav-p">Carate</a>
							<a href="" class="nav_links_type nav-p">Corcovado</a>
							<a href="" class="nav_links_type nav-p">Drake</a>
							<a href="" class="nav_links_type nav-p">Pavones</a>
						</div>
					</div>
				</div>
				<a href="about.php" class="nav_links nav_links_type nav-p">
					<span class="nav_span" data-leng="n_2">About us</span>
				</a>
				<a href="contact.php" class="nav_links nav_links_type nav-p">
					<span class="nav_span" data-leng="n_3">Contact</span>
				</a>
	  			<!-- Por peticion de Erik se mueve Cart al lado derecho, dentro de contenedor_sign
				<a href="carrito.php" class="nav_links nav_links_type nav-p">
					<span class="nav_span"><i class="las la-shopping-cart"></i> Cart</span>
				</a>
				-->
			</div><div class="contenedor_sign">
				<div class="contenedor_links_sign">
					<a href="management.php" class="nav_links nav_links_type nav-p">
						<span class="nav_span" data-leng="n_4">Property Management</span>
					</a>					
				</div>
				<div class="sign">
					<?php
                		if( isset( $_SESSION['infoOsa']['srus'] ) == true )
                		{
                		// en el caso de que la sesion del usuario este creada avanzamos con este menu
                	?>
                		<div class="d-inline-block sign_contenedor">
	                    	<i class="las la-user"></i>
	                    	<div class="nav_textos">
		                        <div class="dropdown text-left drop_login">
		                            	<span class="dropdown-toggle c-hand" tabindex="0"> 
		                            	<?php 
		                            		echo $_SESSION['infoOsa']['srus']['nombre'];
		                            	?> 
		                            	<i class="la la-caret-down"></i> </span>
		                          	<ul class="menu">
		                            	<li class="menu-item"><a href="mi_perfil.php?section=datos" data-leng="n_6_1">Profile</a></li>
		                            	<!--<script type="text/javascript">
		                            		if ($r.vls('yrEcmCrr') == true)
		                            		{
		                            			document.write('<li class="menu-item"><a href="mi_perfil.php?section=compras">Mi Carrito</a></li>');
		                            		}
		                            	</script>-->
		                          		<?php 
		                          			if (isset($_SESSION['infoOsa']['reservas']))
		                          			{
		                          		?>
		                          			<li class="menu-item"><a href="mi_perfil.php?section=reservas" data-leng="n_6_2">Bookings</a></li>
		                            	<?php 
		                          			}
		                          		?>
		                          		<?php 
		                          			if (isset($_SESSION['infoOsa']['rs']))
		                          			{
		                          		?>
		                            		<li class="menu-item"><a href="mi_propiedad.php" data-leng="n_6_3">My properties</a></li>
		                            	<?php 
		                          			}
		                          		?>
		                            	<!--<li class="menu-item"><a href="./cuenta.php?a=3">Mis Reclamos</a></li> -->
		                            	<li class="menu-item"><a href="#" id="cierra_sesion">Log out</a></li>
		                          	</ul>
		                        </div>
		                     </div>
                		</div>
                    <?php 
                		}
                		else
                		{
                			// en el caso de que la sesion del usuario NO este creada avanzamos con este menu
                	?>
                		<div class="d-inline-block sign_contenedor">
							<i class="las la-user-circle"></i>
							<a href="#sign_in" class="nav_links_type nav-p">Sign in</a>
						</div>
                     <?php 
						} 
					?><div class="d-inline-block currencies_contenedor">
						<div class="popover popover-bottom">
							<img data-leng="n_7" src="./img/navegador/usaflag.jpg">
							<div class="popover-container language">
								<div class="card">
									<span class="nav_links_type nav-p">Language</span>
									<div class="card-body">
										<div class="currencies d-block" onclick="cambiarIdioma(0)">
											<img src="./img/navegador/espflag.jpg">
											<a href="#" class="nav_links_type nav-p"><button class="btn-idioma">Spanish</button></a>
										</div>
										<div class="currencies d-block" onclick="cambiarIdioma(1)">
											<img src="./img/navegador/usaflag.jpg">
											<a href="#" class="nav_links_type nav-p"><button class="btn-idioma">English</button></a>
										</div>
										<input type="hidden" id="idioma" name="idioma"/>
									</div>
								</div>
							</div>
						</div>
						<div class="popover popover-bottom">
							<button class="idioma nav_links_type nav-p">USD</button>
							<div class="popover-container currencies">
								<div class="card">
									<span class="nav_links_type nav-p">All Currencies</span>
									<div class="card-body">
										<div class="currencies d-block">
											<figure class="colones-icon"><img src="./img/navegador/costa-rica-colon-icon.svg"></figure>
											<a href="" class="nav_links_type nav-p">Costa Rica Colones</a>
										</div>
										<div class="currencies d-block">
											<i class="las la-euro-sign"></i>
											<a href="" class="nav_links_type nav-p">Euro</a>
										</div>
										<div class="currencies d-block">
											<i class="las la-dollar-sign"></i>
											<a href="" class="nav_links_type nav-p">United States Dollars</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="carrito.php" class="nav_links nav_links_type nav-p">
						<span class="nav_span" data-leng="n_5"><i class="las la-shopping-cart"></i> Cart</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="btnHam btnHam1">
	    <div class="lineaRes -top"></div>
	    <div class="lineaRes -mid"></div>
	    <div class="lineaRes -bottom"></div>
	</div>
</div>

<!--Sublinks booking-->

<div id="linkBookingChico" class="contenedor_booking sub_contenedor_navegador">
	<div class="cont_booking_chico">
		<div id="booking" class="contenedor_sublinks_booking_chico ">
			<a href="booking.php" class="nav_links_type nav-p">Vacations Rentals</a>
			<a href="bookinguno.php" class="nav_links_type nav-p">Hotels</a>
			<a href="tours.php" class="nav_links_type nav-p">Activities</a>
			<a href="cars_rental.php" class="nav_links_type nav-p">Car Rental</a>
			<a href="https://www.aeropuertos.net/aeropuerto-internacional-juan-santamaria/" target="_blank" class="nav_links_type nav-p">Flights</a>
			<a href="packagesonly.php" class="nav_links_type nav-p">Packages</a>
			<a href="packages.php" class="nav_links_type nav-p">Custom Package</a>
		</div>
	</div>
	<div class="btnHam btnHam2 is-active">
	    <div class="lineaRes -top"></div>
	    <div class="lineaRes -mid"></div>
	    <div class="lineaRes -bottom"></div>
	</div>
</div>

<!--Sublinks estate-->

<div id="linkEstateChico" class="contenedor_estate sub_contenedor_navegador">
	<div class="cont_estate_chico">
		<div id="estate_chico" class="contenedor_sublinks_estate_chico">
			<a href="estate.php" class="nav_links_type nav-p">Puerto Jimenez</a>
			<a href="" class="nav_links_type nav-p">Golfo Dulce</a>
			<a href="" class="nav_links_type nav-p">Matapalo</a>
			<a href="" class="nav_links_type nav-p">Carate</a>
			<a href="" class="nav_links_type nav-p">Corcovado</a>
			<a href="" class="nav_links_type nav-p">Drake</a>
			<a href="" class="nav_links_type nav-p">Pavones</a>
		</div>
	</div>
	<div class="btnHam btnHam3 is-active">
	    <div class="lineaRes -top"></div>
	    <div class="lineaRes -mid"></div>
	    <div class="lineaRes -bottom"></div>
	</div>
</div>


