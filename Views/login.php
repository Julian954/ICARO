<?php
// Verificar si Outlook está en ejecución
$command = 'tasklist /FI "IMAGENAME eq OUTLOOK.EXE" /NH';
$output = shell_exec($command);

if (strpos($output, 'OUTLOOK.EXE') !== false) {
    // Outlook está en ejecución, cerrarlo antes de continuar
    $command = 'taskkill /F /IM OUTLOOK.EXE';
    shell_exec($command);
}

try {
    $objApp = new COM("Outlook.Application") or die("No se pudo cargar Outlook.Application");
    $namespace = $objApp->GetNamespace("MAPI");
    $namespace->Logon();
    $myItem = $objApp->CreateItem(0);
    $myItem->To = "miguel20010807@gmail.com";
    $myItem->SentOnBehalfOfName = "jordanrodriguezreyes@hotmail.com";
    $myItem->Subject = "Esto es una prueba";
    $myItem->Body = "¡Esto es una sección del cuerpo ahora...!";
    $myItem->Send();
    $objApp->Quit(); // Cierra la aplicación Outlook
    $objApp = null; // Libera el objeto COM
    echo "Correo enviado correctamente.";
} catch (Exception $e) {
    echo 'Hubo un error al enviar el correo: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es"> 
	
<head>
	
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width" />
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.ico">
    	<title>Login | ICARO OOARD</title>

    	<!-- App CSS -->  
    	<link id="theme-style" rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/portal.css">
  	</head> 

  	<body class="app app-login p-0">    	
  	  	<div class="row g-0 app-auth-wrapper">
  		  	<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
  		    	<div class="d-flex flex-column align-content-end">
  			    	<div class="app-auth-body mx-auto">	
  				    	<div class="app-auth-branding mb-4"><a class="app-logo" href="<?php echo base_url(); ?>"><img class="logo-icon mr-2" src="<?= base_url();?>Assets/img/app-logo.svg" alt="logo"></a></div>
  					  	<h2 class="auth-heading text-center mb-5">Ingresar al Portal</h2>
  			      		<div class="auth-form-container text-left">
  						  	<form class="auth-form login-form" id="user" action="<?php echo base_url(); ?>Iniciar/login" method="POST" autocomplete="off">         
  						    	<div class="email mb-3">
  							    	<input id="usuario" name="usuario" type="email" class="form-control signin-email" placeholder="Dirección de correo" required="required">
  						    	</div><!--//form-group-->
  						    	<div class="password mb-3">
  				    				<input id="clave" name="clave" type="password" class="form-control signin-password" placeholder="Contraseña" required="required">
  				    				<div class="extra mt-3 row justify-content-between">
  				    				</div><!--//form-group-->
  				    				<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto" >Ingresar</button>
  				    			</div>
                                	<?php if (isset($_GET['msg'])) {
                                	    $alert = $_GET['msg'];
                                	    if ($alert == "bien") { ?>
                                            <br>
                                	        <div class="alert alert-success" role="alert">
                                	            <strong>La contraseña se cambio con éxito.</strong>
                                	        </div>
                                	    <?php } elseif ($alert == "cont") { ?>
                                            <br>
                                	        <div class="alert alert-danger" role="alert">
                                	            <strong>Contraseña y/o usuario incorecto.</strong>
                                	        </div>
                                	    <?php } else { ?>
                                            <br>
                                	        <div class="alert alert-danger" role="alert">
                                	            <strong>Error. Contacte a soporte.</strong>
                                	        </div>
                                	    <?php }
                                	} ?>
  				    		</form>
							<div class="auth-option text-center pt-5"><a href="<?php echo base_url(); ?>Login/reset">¿Olvidaste la contraseña?</a></div>
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
  		    	<div class="auth-background-overlay p-3 p-lg-5">
  			    	<div class="d-flex flex-column align-content-end h-100">
  				    	<div class="h-100"></div>
  				  	</div>
  		    	</div><!--//auth-background-overlay-->
  		  	</div><!--//auth-background-col-->    
  	  	</div><!--//row-->
  	</body>
</html> 