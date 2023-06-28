<?php if($_SESSION['rol'] !=0){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->

<?php encabezado() ?> <!-- Poner el header -->
<?php
// Página 2
/*if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    
    // Regresar el valor a la página 1
    echo "<a href=echo base_url();'Inicio/Home?valor=".urlencode($valor)."'>Regresar a la página 1</a>";
	//echo "<a href= Inicio/Notificaciones?valor=" urlencode($valor);"></a>"
}*/
?>

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
<?php if($_SESSION['rol'] ==4 || $_SESSION['rol'] ==3){?>
<?php foreach($data1 as $contratos){ ?>
		
	<?php if($contratos['id_responde']!=$_SESSION['id']  && $contratos['visto']==0){ ?>
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">					       
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-exclamation-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
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
?>
							        <li class="list-inline-item">Recibido hace : <?= "$dias dias con $horas horas y $minutos minutos";?></li>
							        
						        </ul> 
								<br>
								<?php ?>
								
								<form action="<?php echo base_url(); ?>Inicio/Visto" method="post">
								<input type="text" name="id" id="id" value="<?= $contratos['id1'];?>" style="display:none;" readonly >
                                    <button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
									</form>								
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->

					<?php  //if($contratos['id_responde']!=$_SESSION['id'] && $contratos['contrato']==$mi){?>	
																				
				    <div class="app-card-body p-4">					
						
					    <div class="notification-content"><?php echo "TIENES UN MENSAJE NUEVO DE : ".$contratos['nombre'] ." : ".$contratos['respuesta'];?></div>			
				    </div> <!--//app-card-body-->							
				</div><!--//app-card-->						
				<?php }}}//}?>
						
				
	
				
				

<?php if($_SESSION['rol'] ==4 || $_SESSION['rol'] ==3/* || $_SESSION['rol'] != 2 || $_SESSION['rol'] != 5 || $_SESSION['rol'] != 6*/){?>
<?php foreach($data2 as $contrata){ ?>
		
	<?php if($contrata['id_responde']!=$_SESSION['id']  && $contrata['visto']==0){ ?>
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">					       
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-exclamation" viewBox="0 0 16 16">
  <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z"/>
  <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-secondary">Requerimiento</span></div> 
						        <h4 class="notification-title mb-1"><?= $contrata['contrato'];?></h4>
								
						         <ul class="notification-meta list-inline mb-0">
<?php $fecha1 = new DateTime($contrata['fecha']);
$fecha2 = new DateTime(date('H:i:s'));

$intervalo = $fecha1->diff($fecha2);

// Obtener la diferencia en horas, minutos y segundos
$dias = $intervalo->d;
$horas = $intervalo->h;
$minutos = $intervalo->i;
$segundos = $intervalo->s;
?>
							        <li class="list-inline-item">Recibido hace : <?= "$dias dias con $horas horas y $minutos minutos";?></li>
							        
						        </ul> 
								<br>
								<?php ?>
								
								<form action="<?php echo base_url(); ?>Inicio/Visto2" method="post">
								<input type="text" name="id2" id="id2" value="<?= $contrata['id1'];?>" style="display:none;" readonly >
                                    <button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
									</form>								
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->

					<?php  //if($contratos['id_responde']!=$_SESSION['id'] && $contratos['contrato']==$mi){?>	
																				
				    <div class="app-card-body p-4">					
						
					    <div class="notification-content"><?php echo "TIENES UN MENSAJE NUEVO DE : ".$contrata['nombre'] ." : ".$contrata['respuesta'];?></div>			
				    </div> <!--//app-card-body-->							
				</div><!--//app-card-->						
				<?php }}}//}?>



<?php if($_SESSION['rol'] ==7){?>
<?php foreach($data3 as $requerimiento){?>
	<?php if($requerimiento['estado']==3 && $requerimiento['visto']==0){?>
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
						         <div class="notification-type mb-2"><span class="badge bg-success">Requerimiento</span></div> 
						        <h4 class="notification-title mb-1"><?=$requerimiento['nooficio'];?></h4>
								<?php $fecha4 = new DateTime($requerimiento['inicio']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto3" method="post">
									<input type="text" name="id3" id="id3" value="<?= $requerimiento['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>REQUERIMIENTO VALIDADO</strong></div>			
					</div>
				</div>
<?php }}}?>

<?php if($_SESSION['rol'] ==7/*=3 || $_SESSION['rol'] !=1 || $_SESSION['rol'] != 2 || $_SESSION['rol'] != 5 || $_SESSION['rol'] != 4 || $_SESSION['rol'] != 6*/){?>
<?php foreach($data3 as $requerimiento2){?>
	<?php if($requerimiento2['estado']==3 && $requerimiento2['visto']==1){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Requerimiento</span></div> 
						        <h4 class="notification-title mb-1"><?=$requerimiento2['nooficio'];?></h4>
								<?php $fecha4 = new DateTime($requerimiento2['inicio']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto3_2" method="post">
									<input type="text" name="id3" id="id3" value="<?= $requerimiento2['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY NUEVOS REQUERIMIENTOS POR FORMALIZAR</strong></div>			
					</div>
				</div>
<?php }}}?>







<?php if($_SESSION['rol'] ==7){?>
<?php foreach($data4 as $contratacion){?>
	<?php if($contratacion['estado']==3 && $contratacion['visto']==0){?>
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
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-success">Contratacion</span></div> 
						        <h4 class="notification-title mb-1"><?=$contratacion['numero'];?></h4>
								<?php $fecha4 = new DateTime($contratacion['fecha']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto4" method="post">
									<input type="text" name="id4" id="id4" value="<?= $contratacion['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>CONTRATO VALIDADO</strong></div>			
					</div>
				</div>
<?php }}}?>

<?php if($_SESSION['rol'] ==7/*=3 || $_SESSION['rol'] !=1 || $_SESSION['rol'] != 2 || $_SESSION['rol'] != 5 || $_SESSION['rol'] != 4 || $_SESSION['rol'] != 6*/){?>
<?php foreach($data4 as $rcontratacion2){?>
	<?php if($rcontratacion2['estado']==3 && $rcontratacion2['visto']==1){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Contratos</span></div> 
						        <h4 class="notification-title mb-1"><?=$rcontratacion2['numero'];?></h4>
								<?php $fecha4 = new DateTime($rcontratacion2['fecha']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto4_2" method="post">
									<input type="text" name="id4" id="id4" value="<?= $rcontratacion2['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY NUEVOS REQUERIMIENTOS POR FORMALIZAR</strong></div>			
					</div>
				</div>
<?php }}}?>




<?php if($_SESSION['rol'] ==7/*=3 || $_SESSION['rol'] !=1 || $_SESSION['rol'] != 2 || $_SESSION['rol'] != 5 || $_SESSION['rol'] != 4 || $_SESSION['rol'] != 6*/){?>
<?php foreach($data4 as $vencer){?>
	<?php
$fechaActual = new DateTime($vencer['termino']); 
$fechaPasada = new DateTime('-1 year'); 
$intervalo = $fechaActual->diff($fechaPasada); 
$diasFaltantes = $intervalo->days; 

?>
	<?php if($diasFaltantes==15 && $vencer['visto']!=3){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-minus-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Contratos</span></div> 
						        <h4 class="notification-title mb-1"><?=$vencer['numero'];?></h4>
								<?php $fecha4 = new DateTime($vencer['fecha']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto6" method="post">
									<input type="text" name="id6" id="id6" value="<?= $vencer['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY CONTRATOS PROXIMOS A VENCER!</strong></div>			
					</div>
				</div>
<?php }}}?>


<?php if($_SESSION['rol'] ==7/*=3 || $_SESSION['rol'] !=1 || $_SESSION['rol'] != 2 || $_SESSION['rol'] != 5 || $_SESSION['rol'] != 4 || $_SESSION['rol'] != 6*/){?>
<?php foreach($data3 as $vence2){?>
	<?php
$fechaActual = new DateTime($vence2['termino']); 
$fechaPasada = new DateTime('-1 year'); 
$intervalo = $fechaActual->diff($fechaPasada); 
$diasFaltantes = $intervalo->days; 
?>
	<?php if($diasFaltantes==15 && $vence2['visto']!=3){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-minus-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Requerimientos</span></div> 
						        <h4 class="notification-title mb-1"><?=$vence2['nooficio'];?></h4>
								<?php $fecha4 = new DateTime($vence2['inicio']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto7" method="post">
									<input type="text" name="id7" id="7" value="<?= $vence2['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY CONTRATOS PROXIMOS A VENCER!</strong></div>			
					</div>
				</div>
<?php }}}?>


<?php if($_SESSION['rol'] ==3){?>
<?php foreach($data5 as $asignar){?>

	<?php if($asignar['id_validador']==$_SESSION['id'] && $asignar['visto']==0){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Asignacion de Contrato</span></div> 
						        <h4 class="notification-title mb-1"><?=$asignar['id_contrato'];?></h4>
								<?php $fecha4 = new DateTime($asignar['fecha']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">Asignado hace: <?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto8" method="post">
									<input type="text" name="id8" id="8" value="<?= $asignar['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>Descripcion: <?php echo $asignar['descripcion'];?></strong></div>			
					</div>
				</div>
<?php }}}?>



<?php if($_SESSION['rol'] ==3){?>
<?php foreach($data6 as $asignar2){?>

	<?php if($asignar2['id_validador']==$_SESSION['id'] && $asignar2['visto']==0){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-dark">Asignacion de Requerimiento</span></div> 
						        <h4 class="notification-title mb-1"><?=$asignar2['id_contrato'];?></h4>
								<?php $fecha4 = new DateTime($asignar2['fecha']);
	$fecha5 = new DateTime(date('H:i:s'));
	
	$intervalo2 = $fecha4->diff($fecha5);
	
	// Obtener la diferencia en horas, minutos y segundos
	$dias2 = $intervalo2->d;
	$horas2 = $intervalo2->h;
	$minutos2 = $intervalo2->i;
	$segundos2 = $intervalo2->s;
	?>
						         <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">Asignado hace: <?= "$dias2 dias con $horas2 horas y $minutos2 minutos";?></li>
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto9" method="post">
									<input type="text" name="id9" id="9" value="<?= $asignar2['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>Descripcion: <?php echo $asignar2['descripcion'];?></strong></div>			
					</div>
				</div>
<?php }}}?>


<?php if($_SESSION['rol'] ==7){?>
<?php foreach($data4 as $tercer_dia){?>
	<?php
$fechaPasada = new DateTime($tercer_dia['fecha_validado']); 
$fechaActual = new DateTime(); 
$intervalo = $fechaActual->diff($fechaPasada); 
$diasTranscurridos = $intervalo->days; 

?>
	<?php if($diasTranscurridos==3 && $tercer_dia['visto']!=3 && $tercer_dia['estado']==3){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
  <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-danger">Contrato aun sin formalizar</span></div> 
						        <h4 class="notification-title mb-1"><?=$tercer_dia['numero'];?></h4>
								
						         <ul class="notification-meta list-inline mb-0">
							        
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto10" method="post">
									<input type="text" name="id10" id="id10" value="<?= $tercer_dia['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY CONTRATOS VALIDADOS DESDE HACE 3 DIAS, FAVOR DE REVISAR</strong></div>			
					</div>
				</div>
<?php }}}?>


<?php if($_SESSION['rol'] ==7){?>
<?php foreach($data3 as $tercer_dia2){?>
	<?php
$fechaPasada = new DateTime($tercer_dia2['fecha_validado']); 
$fechaActual = new DateTime(); 
$intervalo = $fechaActual->diff($fechaPasada); 
$diasTranscurridos = $intervalo->days; 

?>
	<?php if($diasTranscurridos==3 && $tercer_dia2['visto']!=3 && $tercer_dia2['estado']==3){?>
					<div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        
							<div class="col-12 col-lg-auto text-center text-lg-left">
				                <div class="app-icon-holder">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
								</div><!--//app-icon-holder-->
					        </div>
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						         <div class="notification-type mb-2"><span class="badge bg-danger">Requerimiento aun sin formalizar</span></div> 
						        <h4 class="notification-title mb-1"><?=$tercer_dia2['nooficio'];?></h4>
								
						         <ul class="notification-meta list-inline mb-0">
							        
							     
						        </ul> <br>
								<form action="<?php echo base_url(); ?>Inicio/Visto11" method="post">
									<input type="text" name="id11" id="id11" value="<?= $tercer_dia2['id'];?>" style="display:none;" readonly >
										<button title="Atender" type="submit" class="btn btn-success mb-2"><strong style="color:white;">Leido <i class="fas fa-check"></i></strong></button>
										</form>		
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">												
						<div class="notification-content"><strong>HAY REQUERIMITOS VALIDADOS DESDE HACE 3 DIAS, FAVOR DE REVISAR</strong></div>			
					</div>
				</div>
<?php }}}?>
</div>
</div>



<?php } else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->