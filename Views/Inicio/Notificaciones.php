<?php if($_SESSION['rol'] >= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->



<?php encabezado() ?> <!-- Poner el header -->





    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Notifications</h1>
					    </div>
					    <!-- <div class="col-auto">
					        <div class="page-utilities">
							    <select class="form-select form-select-sm w-auto" >
								  <option selected value="option-1">All</option>
								  <option value="option-2">News</option>
								  <option value="option-3">Product</option>
								  <option value="option-4">Project</option>
								  <option value="option-4">Billing</option>
								</select>
					        </div>//page-utilities
					    </div> -->
				    </div>
			    </div>
<br>
<?php foreach ($data1 as $contratos ) { ?>

<?php if( $contratos['id']==$_SESSION['id'] && $contratos['visto']==0){?>
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">					       
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-info">Contratos</span></div> 
						        <h4 class="notification-title mb-1"><?= $contratos['contrato'];?></h4>

						         <ul class="notification-meta list-inline mb-0">
<?php $fecha1 = new DateTime($contratos['fecha']);
$fecha2 = new DateTime(date('H:i:s'));

$intervalo = $fecha1->diff($fecha2);

// Obtener la diferencia en horas, minutos y segundos
$dias = $intervalo->d;
$horas = $intervalo->h;
$minutos = $intervalo->i;
$segundos = $intervalo->s;

// Imprimir la diferencia
?>
							        <li class="list-inline-item">Recibido hace : <?= "$dias dias con $horas horas y $minutos minutos";?></li>
							        
						        </ul> 
								<br>
								
                                    <button title="Atender" type="submit" class="btn btn-success mb-2"><a href="<?php echo base_url(); ?>Inicio/Notificaciones?id=<?php echo $contratos['id']; //pedillos ?>"><i class="fas fa-check"></i></a></button>
                               
								
								<?php// $mi=$contratos['contrato'];?>
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <!-- <div class="app-card-body p-4">
						<?php //if($contratos['contrato']==$mi){?>
					    <div class="notification-content"><?php//$contratos['nombre'] ." : ".$contratos['respuesta'];?></div>
						<?php// }?>
				    </div> --><!--//app-card-body-->		
				</div><!--//app-card-->
				<?php }?>
				<?php }?>
	


				<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-warning">Pedidos</span></div> 
						        <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">2 hrs ago</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">Amy Doe</li>
						        </ul> 

					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					    <div class="notification-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ultrices dolor, ac maximus ligula. Donec ex orci, mollis ac purus vel, tempor pulvinar justo. Praesent nibh massa, posuere non mollis vel, molestie non mauris. Aenean consequat facilisis orci, sed sagittis mauris interdum at.</div>
				    </div><!--//app-card-body-->
				    <!-- <div class="app-card-footer px-4 py-3">
					    <a class="action-link" href="#">View all<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></a>
				    </div> --><!--//app-card-footer-->
				</div><!--//app-card-->



				<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg>
								</div>
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-secondary">Contrataciones</span></div>
						        <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">3 days ago</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">System</li>
						        </ul>

					        </div>
				        </div>
				    </div>
				    <div class="app-card-body p-4">
					    <div class="notification-content">Proin a magna sit amet mauris mollis mattis in at dui. Fusce laoreet metus et nunc lobortis, suscipit sollicitudin augue pellentesque. Maecenas maximus iaculis scelerisque.</div>
				    </div>
				    
</div>

<!-- 
				<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <img class="profile-image" src="assets/images/profiles/profile-2.png" alt="">
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-secondary">Product</span></div>
						        <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">7 days ago</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">James Smith</li>
						        </ul>

					        </div>
				        </div>
				    </div>
				    <div class="app-card-body p-4">
					    <div class="notification-content">Sed tempor faucibus arcu, nec tristique erat congue sed. Pellentesque auctor ut elit vel feugiat. Sed a mauris tempor, tempor lacus vel, tristique metus. Nulla interdum felis id metus fermentum laoreet.</div>
				    </div>
				    <div class="app-card-footer px-4 py-3">
					    <a class="action-link" href="#">View all<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></a>
				    </div>
				</div>

 -->
				<!-- <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <img class="profile-image" src="assets/images/profiles/profile-3.png" alt="">
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-success">News</span></div>
						        <h4 class="notification-title mb-1">Notification Heading Lorem Ipsum</h4>

						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">7 days ago</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">Kate Sanders</li>
						        </ul>

					        </div>
				        </div>
				    </div>
				    <div class="app-card-body p-4">
					    <div class="notification-content">Sed tempor faucibus arcu, nec tristique erat congue sed. Pellentesque auctor ut elit vel feugiat. Sed a mauris tempor, tempor lacus vel, tristique metus. Nulla interdum felis id metus fermentum laoreet.</div>
				    </div>
				    <div class="app-card-footer px-4 py-3">
					    <a class="action-link" href="#">Read more<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></a>
				    </div>
				</div>





				<div class="text-center mt-4"><a class="btn app-btn-secondary" href="#">Load more notifications</a></div> -->
</div>
</div>






<?php } else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->