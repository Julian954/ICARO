


<!DOCTYPE html>
<html lang="es"> 
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width" />
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
    	<title>ICARO OOARD Colima | Cambiar Contrasena</title>

    	<!-- App CSS -->  
    	<link id="theme-style" rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/portal.css">
  	</head> 

    <body class="app app-signup p-0">    	
        <div class="row g-0 app-auth-wrapper">
    	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
    		    <div class="d-flex flex-column align-content-end">
    			    <div class="app-auth-body mx-auto">	
    				    <div class="app-auth-branding mb-4"><a class="app-logo" href="<?php echo base_url(); ?>"><img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/app-logo.svg" alt="logo"></a></div>
    					<h2 class="auth-heading text-center mb-4">Cambiar Contraseña</h2>	

					    <div class="auth-form-container text-start mx-auto">
					    	<form class="auth-form auth-signup-form" id="user" action="<?php echo base_url(); ?>Iniciar/cambiarolvidada" method="POST" autocomplete="off">         
					    		<div class="email mb-3">
                                    <input id="id" name="id" type="hidden" class="form-control signup-name" value="<?= $_GET['id']; ?>" required="required">
					    			<input id="actual" name="actual" type="hidden" class="form-control signup-name" value="<?= $_GET['hash']; ?>" required="required">
                                    <input id="nombre" name="nombre" type="text" class="form-control signup-name" value="<?= $_GET['nombre']; ?>" readonly>
					    		</div>
					    		<div class="email mb-3">
					    			<input id="nueva" name="nueva" type="password" class="form-control signup-email" placeholder="Nueva Contraseña" required="required">
					    		</div>
					    		<div class="password mb-3">
					    			<input id="confirmar" name="confirmar" type="password" class="form-control signup-password" placeholder="Confirmar Contraseña" required="required">
					    		</div>
					    		<div class="text-center">
					    			<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Cambiar Contraseña</button>
					    		</div>
                                	<?php if (isset($_GET['msg'])) {
                                	    $alert = $_GET['msg'];
                                	    if ($alert == "noigual") { ?>
                                            <br>
                                	        <div class="alert alert-warning" role="alert">
                                	            <strong>Las contraseñas no coinciden.</strong>
                                	        </div>
                                	    <?php } else { ?>
                                            <br>
                                	        <div class="alert alert-danger" role="alert">
                                	            <strong>Error. Contacte a soporte.</strong>
                                	        </div>
                                	    <?php }
                                	} ?>
					    	</form><!--//auth-form-->
						</div><!--//auth-form-container-->
				    </div><!--//auth-body-->
			    	<footer class="app-auth-footer">
					    <div class="container text-center py-3">
			    	    	<small class="copyright">Diseño y Desarrollo por OOADR. Coordinación de Abastecimiento y Equipamiento.</small>
					    </div>
			    	</footer><!--//app-auth-footer-->
			    </div><!--//flex-column-->   
		    </div><!--//auth-main-col-->
		    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			    <div class="auth-background-holder"></div>
			    <div class="auth-background-mask"></div>
			    <div class="auth-background-overlay p-3 p-lg-5"></div><!--//auth-background-overlay-->
		    </div><!--//auth-background-col-->
	    </div><!--//row-->
	</body>
</html> 