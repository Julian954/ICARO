<!DOCTYPE html>
<html lang="es"> 
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width" />
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
    	<title>Reset | ICARO OOARD</title>

    	<!-- App CSS -->  
    	<link id="theme-style" rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/portal.css">
  	</head> 

	<body class="app app-reset-password p-0">    	
	    <div class="row g-0 app-auth-wrapper">
		    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			    <div class="d-flex flex-column align-content-end">
				    <div class="app-auth-body mx-auto">	
					    <div class="app-auth-branding mb-4"><a class="app-logo" href="<?php echo base_url(); ?>"><img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/app-logo.svg" alt="logo"></a></div>
						<h2 class="auth-heading text-center mb-4">Restablecer Contraseña</h2>
						<div class="auth-intro mb-4 text-center">Ingresa tu correo y te enviaremos un link para restablecer tu contraseña.</div>
						<div class="auth-form-container text-left">
							<form class="auth-form resetpass-form" id="user" action="<?php echo base_url(); ?>Iniciar/reset" method="POST" autocomplete="off">                
								<div class="email mb-3">
									<input id="correo" name="correo" type="email" class="form-control login-email" placeholder="Dirección de correo" required="required">
								</div><!--//form-group-->
								<div class="text-center">
									<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Enviar Link</button>
								</div>
                                	<?php if (isset($_GET['msg'])) {
                                	    $alert = $_GET['msg'];
                                	    if ($alert == "noexiste") { ?>
											<br>
                                	        <div class="alert alert-danger" role="alert">
                                	            <strong>El usuario no fue encontrado.</strong>
                                	        </div>
                                	    <?php } elseif ($alert == "enviado") { ?>
											<br>
                                	        <div class="alert alert-success" role="alert">
                                	            <strong>El correo se ha enviado.</strong>
                                	        </div>
                                	    <?php } else { ?>
											<br>
                                	        <div class="alert alert-danger" role="alert">
                                	            <strong>Error. Contacte a soporte.</strong>
                                	        </div>
                                	    <?php }
                                	} ?>
							</form>
							<div class="auth-option text-center pt-5"><a class="app-link" href="<?php echo base_url(); ?>" >Iniciar Sesión</a></div>
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