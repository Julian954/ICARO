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

	    <!-- theme stylesheet-->
		<link rel="stylesheet" href="<?= base_url(); ?>Assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>Assets/css/carga.css">
	    <link rel="stylesheet" href="<?= base_url(); ?>Assets/css/dataTables.bootstrap4.min.css">
		<link id="theme-style" rel="stylesheet" href="<?= base_url(); ?>Assets/css/portal.css">

	    <!-- Favicon-->
	    <link rel="shortcut icon" href="<?= base_url(); ?>Assets/img/favicon.ico">

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<!-- URL-->
		<?php
			$link = $_SERVER['REQUEST_URI'];
			$linkShort = substr($link, 0, strrpos($link, "/")); 
		?>
	
	</head>

	<body class="app">
		<div id="contenedor_carga">
			<div id="carga"><img class="logo-icon mr-2" src="<?= base_url(); ?>Assets/img/carga.gif" height="150px" alt="logo"></div>
		</div>
		
		<input type="hidden" id="url" value="<?= base_url(); ?>">
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
					        </div>
							<!--//TELEFONO-->
			                <div class="search-mobile-trigger d-sm-none col">
				                <i class="search-mobile-trigger-icon font-normal"><?= utf8_encode(strftime('%d/%B/%Y')); ?></i>
				            </div>
							<!--//TABLET Y PC-->
		            		<div class="app-search-box col">
								<i class="search-mobile-trigger-icon font-normal"><?= utf8_encode(strftime('%A %d de %B de %Y, %H:%M'));?></i>
		            		</div>
							<!--//NOTIFICACIONES-->
			            	<div class="app-utilities col-auto">
				            	<div class="app-utility-item app-notifications-dropdown dropdown">
									<?php if($_SESSION['rol']==2 || $_SESSION['rol']==3 || $_SESSION['rol']==4 || $_SESSION['rol']==7){?>
										<a  href="<?=base_url();?>Inicio/Notificaciones" title="Notificaciones">
						            	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
										  	<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
										</svg>
										<?php if (notificaciones() != 0) { ?>
											<span class=icon-badge><?=notificaciones();?></span>
										<?php } ?>
										
						        	</a><!--//dropdown-toggle-->
									<?php }?>
					        	</div><!--//app-utility-item-->
								<!--//PERFIL-->
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
			            <a class="app-logo text-decoration-none" href="<?= base_url(); ?>Inicio/Home"><img class="logo-icon mr-2" src="<?= base_url(); ?>Assets/img/app-logo.svg" alt="logo"><span class="logo-text">ICARO</span></a>
			        </div><!--//app-branding-->
				    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					    <ul class="app-menu list-unstyled accordion" id="menu-accordion">

							<!--//Opciones del menú--> 
						    <li class="nav-item">
						        <a class="nav-link <?php if ($link == "/".DOM."/Inicio/Home") { echo "active"; } ?>" href="<?php echo base_url(); ?>Inicio/Home">
							        <span class="nav-icon">
							        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										  	<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
										  	<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
										</svg>
							        </span>
			                        <span class="nav-link-text">Inicio</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==4 || $_SESSION['rol']==5 || $_SESSION['rol']==3){?>
								<li class="nav-item has-submenu">
						    	    <a class="nav-link submenu-toggle <?php if ($linkShort == "/".DOM."/Contratos") { echo 'active" aria-expanded="true"'; } else { echo '" aria-expanded="false"';} ?> href="#" data-toggle="collapse" data-target="#submenu-1"  aria-controls="submenu-1">
								        <span class="nav-icon">
								        	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
											  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
											  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
											</svg>
								        </span>
			                	        <span class="nav-link-text">Contratos</span>
			                	        <span class="submenu-arrow">
			                	            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
											</svg>
		                    	        </span><!--//submenu-arrow-->
						    	    </a><!--//nav-link-->
						    	    <div id="submenu-1" class="collapse submenu submenu-1 <?php if ($linkShort == "/".DOM."/Contratos") { echo "show"; } ?>" data-parent="#menu-accordion">
								        <ul class="submenu-list list-unstyled">
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 4){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contratos/Registro") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/Registro">Nuevo Contrato</a></li>
									    <?php }?>
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 4){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contratos/General") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/General">Seguimiento</a></li>
									    <?php }?>
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 4 || $_SESSION['rol']== 3){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contratos/Validando") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contratos/Validando">Flujo de Revisión</a></li>
								        <?php }?>
									</ul>
						    	    </div>
						    	</li><!--//nav-item-->
							<?php }?>

							<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 2 || $_SESSION['rol']==  4){?>
								<li class="nav-item has-submenu">
						    	    <a class="nav-link submenu-toggle <?php if ($linkShort == "/".DOM."/Contrataciones") { echo 'active" aria-expanded="true"'; } else { echo '" aria-expanded="false"';} ?> href="#" data-toggle="collapse" data-target="#submenu-2"  aria-controls="submenu-2">
								        <span class="nav-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
											<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
										</svg>
								        </span>
			                	        <span class="nav-link-text">Requerimientos</span>
			                	        <span class="submenu-arrow">
			                	            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
											</svg>
		                    	        </span><!--//submenu-arrow-->
						    	    </a><!--//nav-link-->
						    	    <div id="submenu-2" class="collapse submenu submenu-2 <?php if ($linkShort == "/".DOM."/Contrataciones") { echo "show"; } ?>" data-parent="#menu-accordion">
								        <ul class="submenu-list list-unstyled">
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 2){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contrataciones/Registro") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/Registro">Nuevo Requerimiento</a></li>
									    <?php }?>
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 2){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contrataciones/General") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/General">Seguimiento</a></li>
									    <?php }?>
										<?php if($_SESSION['rol']== 7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 4 || $_SESSION['rol']== 2){?>
										<li class="submenu-item"><a class="submenu-link <?php if ($link == "/".DOM."/Contrataciones/Validando") { echo "active"; } ?>" href="<?php echo base_url(); ?>Contrataciones/Validando">Flujo de Revisión</a></li>
								        <?php }?>
									</ul>
						    	    </div>
						    	</li><!--//nav-item-->
							<?php }?>

							<?php if($_SESSION['rol']==7 || $_SESSION['rol']== 5 || $_SESSION['rol']== 4){?>
						    	<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Pedidos/Compras") { echo "active"; } ?>" href="<?php echo base_url(); ?>Pedidos/Compras">
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
							<?php }?>

							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==1){?>
								<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Despachos/Registro") { echo "active"; } ?>" href="<?php echo base_url(); ?>Despachos/Registro">
								    	<span class="nav-icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
											  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
											</svg>
								        </span>
			                	        <span class="nav-link-text">Despachos</span>
						    	    </a><!--//nav-link-->
						    	</li><!--//nav-item-->
							<?php }?>

							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==5 || $_SESSION['rol']==6){?>
	              				<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Indicadores/Indicador") { echo "active"; } ?>" href="<?php echo base_url(); ?>Indicadores/Indicador">
								        <span class="nav-icon">
	                      					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  										  	<path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
	  										</svg>
								        </span>
			                	        <span class="nav-link-text">Indicadores</span>
						    	    </a><!--//nav-link-->
						    	</li><!--//nav-item-->
							<?php }?>

							<?php if($_SESSION['rol']==7 ){?>
								<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Usuarios/Listar") { echo "active"; } ?>" href="<?php echo base_url(); ?>Usuarios/Listar">
								        <span class="nav-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  											<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
										</svg>
								    	</span>
			                	        <span class="nav-link-text">Usuarios</span>
						    	    </a><!--//nav-link-->
						    	</li><!--//nav-item-->
							<?php }?>
							
							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==5 || $_SESSION['rol']==6 ){?>
								<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Articulos/Listarart") { echo "active"; } ?>" href="<?php echo base_url(); ?>Articulos/Listarart">
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
							<?php }?>
							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==6){?>
								<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Unidades/Unidad") { echo "active"; } ?>" href="<?php echo base_url(); ?>Unidades/Unidad">
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
							<?php }?>

							<?php if($_SESSION['rol']==7 || $_SESSION['rol']==6){?>
								<li class="nav-item">
						    	    <a class="nav-link <?php if ($link == "/".DOM."/Excel/Subir") { echo "active"; } ?>" href="<?php echo base_url(); ?>Excel/Subir">
									<span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
									  <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
									  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
									</svg>
								        </span>
			                	        <span class="nav-link-text">Carga de Documentos</span>
						    	    </a><!--//nav-link-->	
						    	</li><!--//nav-item-->
							<?php }?>
					    </ul><!--//app-menu-->
				    </nav><!--//app-nav-->
					
					<?php if($_SESSION['rol']==7 || $_SESSION['rol']==6){?>
				    	<div class="app-sidepanel-footer">
						    <nav class="app-nav app-nav-footer">
							    <ul class="app-menu footer-menu list-unstyled">

								    <li class="nav-item">
								        <a class="nav-link <?php if ($link == "/".DOM."/Inicio/Configuracion") { echo "active"; } ?>" href="<?php echo base_url(); ?>Inicio/Configuracion">
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
					<?php }?>
		        </div><!--//sidepanel-inner-->
		    </div><!--//app-sidepanel-->
	    </header><!--//app-header-->

		<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->