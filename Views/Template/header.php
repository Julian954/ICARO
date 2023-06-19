<!DOCTYPE html>
<html lang="es">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="">
	    <meta name="robots" content="all,follow">

	    <title>MARYS OOARD Colima</title>
	    <!-- Bootstrap CSS-->
	    <!-- theme stylesheet-->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style.default.css" id="theme-stylesheet">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/carga.css">
	    <!-- Custom stylesheet - for your changes-->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
	    <!-- Favicon-->
	    <link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<!--Datatables-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

		<!-- Time Zone y URL-->
		<?php date_default_timezone_set('America/Mexico_City'); 
			setlocale(LC_ALL,'es_ES', 'Spanish_Spain', 'Spanish');
			$link = $_SERVER['REQUEST_URI'];
			$linkShort = substr($link, 0, strrpos($link, "/")); ?>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	    <!-- App CSS -->
	    <link id="theme-style" rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/portal.css">



	</head>

	<body class="app">
		<div id="contenedor_carga">
			<div id="carga"><img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/carga.gif" height="300px" alt="logo"></div>
		</div>
		<input type="hidden" id="url" value="<?php echo base_url(); ?>">
	    <header class="app-header fixed-top">
	        <div class="app-header-inner">
		        <div class="container-fluid py-2">
			        <div class="app-header-content">
			            <div class="row justify-content-between align-items-center">
					        <div class="col-auto">
						        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    	    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
										<title>Menu</title>
										<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
									</svg>
						        </a>
					        </div><!--//TELEFONO-->
			                <div class="search-mobile-trigger d-sm-none col">
				                <i class="search-mobile-trigger-icon"><?php echo utf8_encode(strftime('%d/%B/%Y')); ?></i>
				            </div><!--//TABLET Y PC-->
		            		<div class="app-search-box col">
								<i class="search-mobile-trigger-icon"><?php echo utf8_encode(strftime('%A %d de %B de %Y, %H:%M')); ?></i>
		            		</div><!--//NOTIFICACIONES-->
			            	<div class="app-utilities col-auto">
				            	<div class="app-utility-item app-notifications-dropdown dropdown">
					            	<a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notificaciones">
						            	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
										  	<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
										</svg>
						            	<span class="icon-badge">X</span>
						        	</a><!--//dropdown-toggle-->
						        	<div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
						        	    <div class="dropdown-menu-header p-3">
							    	        <h5 class="dropdown-menu-title mb-0">Notificaciones</h5>
							    	    </div><!--//AQUÍ VAN LAS NOTIFICACIONES-->
							    	    <div class="dropdown-menu-content">
											<!--//NOTIFICACIÓN CON IMÁGEN-->
									       <div class="item p-3">
										        <div class="row gx-2 justify-content-between align-items-center">
											        <div class="col-auto">
												       <img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">
											        </div><!--//col-->
											        <div class="col">
												        <div class="info"> 
													        <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
													        <div class="meta"> 2 hrs ago</div>
												        </div>
											        </div><!--//col--> 
										        </div><!--//row-->
										        <a class="link-mask" href="#"></a>
									       	</div><!--//item-->
											<!--//NOTIFICACIÓN CON NOTA-->
									       	<div class="item p-3">
										        <div class="row gx-2 justify-content-between align-items-center">
											        <div class="col-auto">
												        <div class="app-icon-holder">
													        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
															  	<path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
															  	<path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
															</svg>
											        	</div>
										        	</div><!--//col-->
										        	<div class="col">
											        	<div class="info"> 
												    	    <div class="desc">You have a new invoice. Proin venenatis interdum est.</div>
												    	    <div class="meta"> 1 day ago</div>
											        	</div>
										        	</div><!--//col-->
									        	</div><!--//row-->
									        	<a class="link-mask" href="#"></a>
									      	</div><!--//item-->
									   		<!--//NOTIFICACIÓN CON GRÁFICA-->
								       		<div class="item p-3">
									        	<div class="row gx-2 justify-content-between align-items-center">
										        	<div class="col-auto">
											        	<div class="app-icon-holder icon-holder-mono">
												        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
															  	<path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
															</svg>
											        	</div>
										        	</div><!--//col-->
										        	<div class="col">
											        	<div class="info"> 
												        	<div class="desc">Your report is ready. Proin venenatis interdum est.</div>
												        	<div class="meta"> 3 days ago</div>
											        	</div>
										        	</div><!--//col-->
									        	</div><!--//row-->
									        	<a class="link-mask" href="#"></a>
								       		</div><!--//item-->
							        	</div><!--//dropdown-menu-content-->
							        	<div class="dropdown-menu-footer p-2 text-center">
								    	    <a href="<?php echo base_url(); ?>Inicio/Notificaciones">View all</a>
							        	</div>					
									</div><!--//dropdown-menu-->					        
					        	</div><!--//app-utility-item-->
				            	<div class="app-utility-item app-user-dropdown dropdown">
					        	    <a class="dropdown-toggle" id="user-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="<?php echo base_url(); ?>Assets/img/users/<?php echo $_SESSION['perfil'] ?>" alt="user profile"></a>
					        	    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
										<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPic">Cambiar Foto</a></li>
										<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPass">Cambiar Contraseña</a></li>
										<li><hr class="dropdown-divider"></li>
										<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Salir</a></li>
									</ul>
				            	</div><!--//app-user-dropdown-->
			            	</div><!--//app-utilities-->
			        	</div><!--//row-->
		            </div><!--//app-header-content-->
		        </div><!--//container-fluid-->
	        </div>
	        <div id="app-sidepanel" class="app-sidepanel">
		        <div id="sidepanel-drop" class="sidepanel-drop"></div>
		        <div class="sidepanel-inner d-flex flex-column">
			        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
			        <div class="app-branding">
			            <a class="app-logo" href="<?php echo base_url(); ?>Inicio/Home"><img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/app-logo.svg" alt="logo"><span class="logo-text">MARYS</span></a>
			        </div><!--//app-branding-->
				    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					    <ul class="app-menu list-unstyled accordion" id="menu-accordion">

							<!--//Opciones del menú--> 
						    <li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Inicio/Home") { echo "active"; } ?>" href="<?php echo base_url(); ?>Inicio/Home">
							        <span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
										  	<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Inicio</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<li class="nav-item has-submenu">
						        <a class="nav-link submenu-toggle <?php if ($linkShort == "/IMSS/Contratos") { echo 'active" aria-expanded="true"'; } else { echo '" aria-expanded="false"';} ?> href="#" data-toggle="collapse" data-target="#submenu-1"  aria-controls="submenu-1">
							        <span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
										  	<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Contratos</span>
			                        <span class="submenu-arrow">
			                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
		                            </span><!--//submenu-arrow-->
						        </a><!--//nav-link-->
						        <div id="submenu-1" class="collapse submenu submenu-1 <?php if ($linkShort == "/IMSS/Contratos") { echo "show"; } ?>" data-parent="#menu-accordion">
							        <ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contratos/Registro") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/Registro">Nuevo Contrato</a></li>
								        <li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contratos/General") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/General">Seguimiento</a></li>
								        <li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contratos/Validando") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/Validando">Flujo de Revisión</a></li>
							        </ul>
						        </div>
						    </li><!--//nav-item-->

							<li class="nav-item has-submenu">
						        <a class="nav-link submenu-toggle <?php if ($linkShort == "/IMSS/Contrataciones") { echo 'active" aria-expanded="true"'; } else { echo '" aria-expanded="false"';} ?> href="#" data-toggle="collapse" data-target="#submenu-2"  aria-controls="submenu-2">
							        <span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
										  	<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Requerimientos</span>
			                        <span class="submenu-arrow">
			                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
		                            </span><!--//submenu-arrow-->
						        </a><!--//nav-link-->
						        <div id="submenu-2" class="collapse submenu submenu-2 <?php if ($linkShort == "/IMSS/Contrataciones") { echo "show"; } ?>" data-parent="#menu-accordion">
							        <ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contrataciones/Registro") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/Registro">Nuevo Requerimiento</a></li>
								        <li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contrataciones/General") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/General">Seguimiento</a></li>
								        <li class="submenu-item"><a class="submenu-link <?php if ($link == "/IMSS/Contrataciones/Validando") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/Validando">Flujo de Revisión</a></li>
							        </ul>
						        </div>
						    </li><!--//nav-item-->

						    <li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Pedidos/Compras") { echo "active"; } ?>" href="<?php echo base_url(); ?>Pedidos/Compras">
							    	<span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
											<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
											<circle cx="3.5" cy="5.5" r=".5"/>
											<circle cx="3.5" cy="8" r=".5"/>
											<circle cx="3.5" cy="10.5" r=".5"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Pedidos</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

	              			<li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Indicadores/Indicador") { echo "active"; } ?>" href="<?php echo base_url(); ?>Indicadores/Indicador">
							        <span class="nav-icon">
	                      				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  									  	<path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
	  									</svg>
							        </span>
			                        <span class="nav-link-text">Indicadores</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Usuarios/Listar") { echo "active"; } ?>" href="<?php echo base_url(); ?>Usuarios/Listar">
							        <span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
										  	<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
										</svg>
							    	</span>
			                        <span class="nav-link-text">Usuarios</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Articulos/Listarart") { echo "active"; } ?>" href="<?php echo base_url(); ?>Articulos/Listarart">
							        <span class="nav-icon">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
											<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
											<circle cx="3.5" cy="5.5" r=".5"/>
											<circle cx="3.5" cy="8" r=".5"/>
											<circle cx="3.5" cy="10.5" r=".5"/>
										</svg>
							    	</span>
			                        <span class="nav-link-text">Articulos</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Unidades/Unidad") { echo "active"; } ?>" href="<?php echo base_url(); ?>Unidades/Unidad">
							        <span class="nav-icon">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
  										<path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
											<circle cx="3.5" cy="5.5" r=".5"/>
											<circle cx="3.5" cy="8" r=".5"/>
											<circle cx="3.5" cy="10.5" r=".5"/>
										</svg>
							    	</span>
			                        <span class="nav-link-text">Unidades</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<li class="nav-item">
						        <a class="nav-link <?php if ($link == "/IMSS/Excel/Subir") { echo "active"; } ?>" href="<?php echo base_url(); ?>Excel/Subir">
								<span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hospital" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
										  	<path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Carga de Documentos</span>
						        </a><!--//nav-link-->	
						    </li><!--//nav-item-->

					    </ul><!--//app-menu-->
				    </nav><!--//app-nav-->

				    <div class="app-sidepanel-footer">
					    <nav class="app-nav app-nav-footer">
						    <ul class="app-menu footer-menu list-unstyled">

							    <li class="nav-item">
							        <a class="nav-link <?php if ($link == "/IMSS/Inicio/Configuracion") { echo "active"; } ?>" href="<?php echo base_url(); ?>Inicio/Configuracion">
								        <span class="nav-icon">
								            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
											  	<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
											</svg>
								        </span>
				                        <span class="nav-link-text">Configuración</span>
							        </a><!--//nav-link-->
							    </li><!--//nav-item-->

						    </ul><!--//footer-menu-->
					    </nav>
				    </div><!--//app-sidepanel-footer-->
		        </div><!--//sidepanel-inner-->
		    </div><!--//app-sidepanel-->
	    </header><!--//app-header-->

		<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->