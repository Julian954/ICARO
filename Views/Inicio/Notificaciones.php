<?php if($_SESSION['rol'] !=0){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->

<?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"><?=notificaciones();?> Notificaciones</h1>
					    </div>				
				    </div>
			    </div>
				<br>

				<?php foreach($data1 as $noti){ ?>

                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
					<a class="close" href="<?php echo base_url(); ?>Inicio/Visto?id=<?=$noti['id'];?>">
					&times;
					</a>
				        <div class="row g-3 align-items-center">					       
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
								  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
								  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
								</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <h4 class="notification-title mb-1"><?= $noti['asunto'];?></h4>
								<div class="notification-content"><?= $noti['mensaje'];?></div>
						         <ul class="notification-meta list-inline mb-0">

							        <li class="list-inline-item">Fecha: <?= $noti['fecha'];?></li>
							        
						        </ul> 
								
							
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->							
				</div><!--//app-card-->						
				<?php }?>


</div>
</div>
</div>



<?php } else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->