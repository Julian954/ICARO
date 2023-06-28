<?php encabezado() ?> <!-- Poner el header -->

<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?> <!-- En caso de ser valido -->
<div class="app-wrapper">

      <div class="app-content pt-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Pedidos</h1>
					    </div>
				    </div>
			    </div>
<!--
          <div class="app-card app-card-notification shadow-sm">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <img class="profile-image" src="../Assets/img/users/<?php// echo $_SESSION['perfil'];?>" alt="">
					        </div>//col
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-info">Oficina de Adquisiciones</span></div>
						        <h4 class="notification-title mb-1"><?php// echo $_SESSION['nombre']; ?> </h4>

						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?php //echo $_SESSION['correo']; ?></li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item"><?php //echo $_SESSION['telefono']; ?></li>
						        </ul>

					        </div>//co
				        </div>//row
				    </div>//app-card-header
				    <div class="app-card-body p-4">
					    <div class="notification-content">Texto del Jefe de Oficina. Resumen de Solicitudes de Contratos o Convenio Recibidas, Instrumentos Elaborados, Instrumentos en validación con el àrea furidica, y formalizados, etc.</div>
				    </div>//app-card-body
				</div>//app-card
		    </div>//container-fluid
	    </div>//app-content
      <div class="app-content p-lg-4" style="margin-top:-25px !important; padding-top:-25px !important;">
-->
	  

<?php /*include('Config\Config.php');
$sqlCliente=("SELECT * FROM pedidos ");
//$sqlCantidad=("SELECT cantidad FROM pedidos");
$queryCliente=mysqli_query($con, $sqlCliente);
//$queryCant=mysqli_query($con, $sqlCantidad);
$cantidad=mysqli_num_rows($queryCliente);
*/
// while($pe=mysqli_fetch_array($queryCant)){  $final=$final+$pe;};
$final=0;
$final2=0;
$final3=0;
$total_pedi2=0;
$total_contratado=0;
$total_entregado=0;
$total_por_entregar=0;
$z=0;
foreach ($data1 as $pedi2){
  if(substr($pedi2['nopedido'], 0, 3) === "D3P"){
  $z++;
  }
  $total_pedi2=$total_pedi2+$pedi2['cantidad'];
  $total_contratado=$total_contratado+$pedi2['monto'];
  if($pedi2['monto2']!=0){
    $total_entregado=$total_entregado+$pedi2['monto'];
  }
  if($pedi2['monto2']==0){
    $total_por_entregar=$total_por_entregar+$pedi2['monto'];
  }
  if($pedi2['tipo']=="010" || $pedi2['tipo']=="020" || $pedi2['tipo']=="030" || $pedi2['tipo']=="040"){
  $final=$final+$pedi2['cantidad'];
  }
  if($pedi2['tipo']=="060"){
  $final2=$final2+$pedi2['cantidad'];
  }
  if($pedi2['tipo']=="010" || $pedi2['tipo']=="020" || $pedi2['tipo']=="030" || $pedi2['tipo']=="040" || $pedi2['tipo']=="060"){
    $final3=$final3+$pedi2['cantidad'];
    $resultado=$total_pedi2-$final3;
  }
};
?>
<?php //$i=0; while($pedidos=mysqli_fetch_array($queryCliente)){ if($pedidos['tipo']=="010" || $pedidos['tipo']=="020" || $pedidos['tipo']=="030" || $pedidos['tipo']=="040") $final=intval($final+$pedidos['cantidad']);}?> 
<div class="app-card app-card-stats-table h-100 shadow-sm">                    
  <div class="app-card-body p-3 p-lg-4"> 
    <div class="table-responsive">
      <table class="table table-borderless mb-0">
        <thead>
          <tr>
						<th style="text-align:center; width:200px">Datos</th>
						<th style="text-align:center; width:150px">Cantidad</th>
						<th style="text-align:center">Progreso</th>
					</tr>
        </thead>
      <tbody>
          <tr>      
            <td  >Total Pedidos</td>
            <td style="text-align:center"><?= $z ?></td>
            <!--<td class="stat-cell"><div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>      -->                                  
          </tr>
          <tr>
            <td  >Pedidos Medicamento</td>
            <td style="text-align:center"><?php echo number_format($final); ?></td>
            <td ><div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo number_format($final*100/$total_pedi2,2);?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($final*100/$total_pedi2,2);?>%</div>
</div></td>
          </tr>
          <tr>
            <td >Pedidos Curación</td>
            <?php //$i=0; while($pedidos=mysqli_fetch_array($queryCliente)){ if($pedidos['tipo']=="060") $final2=intval($final2+$pedidos['cantidad']);}?>             
              <td style="text-align:center"><?php echo number_format($final2); ?></td>                                        
              <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo number_format($final2*100/$total_pedi2,2);?>%;"  aria-valuemin="0" aria-valuemax="100"><?php echo number_format($final2*100/$total_pedi2,2);?>%</div>
</div></td>
          </tr>
          <tr>
              <td >Otros Pedidos</td>
              <?php //$i=0; while($pedidos=mysqli_fetch_array($queryCliente)){ if($pedidos['tipo']=="050" || $pedidos['tipo']=="040" || $pedidos['tipo']=="080") $final3=intval($final3+$pedidos['cantidad']);}?>                           
              <td style="text-align:center"><?php echo number_format($resultado); ?></td>                                        
              <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format($resultado*100/$total_pedi2,2);?>%;"  aria-valuemin="0" aria-valuemax="100"><?php echo number_format($resultado*100/$total_pedi2,2);?>%</div>
</div></td>
          </tr>
          <tr>
              <td >Total Contratado</td>
              <td style="text-align:center">$ <?php echo  number_format($total_contratado); ?></td>                                        
              <!--<td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>-->
          </tr>
					<tr>
              <td>Total Entregado</td>
              <td style="text-align:center">$ <?php echo number_format($total_entregado); ?></td>                                        
              <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format($total_entregado/$total_contratado*100,2);?>%;"  aria-valuemin="0" aria-valuemax="100"><?php echo number_format($total_entregado/$total_contratado*100,2);?>%</div>
</div></td>
          </tr>
					<tr>
              <td>Total Por Entregar</td>
              <td style="text-align:center">$ <?php echo number_format($total_por_entregar); ?></td>                                        
              <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format($total_por_entregar*100/$total_contratado,2);?>%;"  aria-valuemin="0" aria-valuemax="100"><?php echo number_format($total_por_entregar*100/$total_contratado,2);?>%</div>
</div></td>
          </tr>
        </tbody>
      </table>
    </div><!--//table-responsive-->
  </div><!--//app-card-body p-3-->
</div><!--//app-card app-card-stats-table h-100 shadow-sm-->            


<br>
        
      <h1 class="app-page-title mb-4">Autorizaciones PAC/Correo 2021</h1>
			  <div class="tab-content" id="orders-table-tab-content">
		      <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="TablePedidos" >
                    <thead>
                      <tr>
                        <th class="cell">Id</th>
                        <th class="cell"><span></span>No. Pedido</th>
                        <th class="cell">GPO</th>
                        <th class="cell">Clave</th>
                        <th class="cell">Cantidad</th>
                        <th class="cell">ETA</th>
                        <th class="cell">Top 15</th>
                        <th class="cell">$ IVA precio</th>
                        <th class="cell">Alta</th>
                        <th class="cell">Enlazar</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
			</div><!--//app-wrapper-->

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
	
	<?php include('modal.php'); } ?>

<?php pie() ?>