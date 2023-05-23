<!DOCTYPE html>
<html lang="es"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
    <title>Reset | MARYS BOARD Colima</title>
    
    <!-- FontAwesome JS-->
    <script defer src="<?php echo base_url(); ?>Assets/css/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/portal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">

  </head> 

<body class="app app-reset-password p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Restablecer Contraseña</h2>

					<div class="auth-intro mb-4 text-center">Ingresa tu correo para enviarte un link para restablecer tu contraseña.</div>
	
					<div class="auth-form-container text-left">
						
						<form class="auth-form resetpass-form">                
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Email</label>
								<input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Email" required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Restablecer Contraseña</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5"><a class="app-link" href="<?php echo base_url(); ?>" >Log in</a></div>
					</div><!--//auth-form-container-->


			    </div><!--//auth-body-->

		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 