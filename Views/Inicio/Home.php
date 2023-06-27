<?php encabezado() ?> <!-- Poner el header -->

<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

      <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
          <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
              <h4 class="stats-type mb-1">Nivel de Atención</h4>
              <div class="stats-figure"><?=number_format($data1[0]['surtida'],2)?><span>%</span></div>
              <?php if ($data1[0]['surtida']-$data1[1]['surtida'] > 0) { ?>
                <div class="stats-meta text-success">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
              <?php } else { ?>
                <div class="stats-meta text-danger">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                  </svg>
              <?php } ?>
                <?=number_format($data1[0]['surtida']-$data1[1]['surtida'],2).'%'?>
              </div>
            </div><!--//app-card-body-->
          </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
          <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
              <h4 class="stats-type mb-1">Negadas</h4>
              <div class="stats-figure"><?=$data2[0]['negadas']?><span></span></div>
              <?php if ($data2[0]['negadas']-$data2[1]['negadas'] < 0) { ?>
                <div class="stats-meta text-success">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                  </svg>
              <?php } else { ?>
                <div class="stats-meta text-danger">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
              <?php } ?>
                <?=$data2[0]['negadas']-$data2[1]['negadas']?>
              </div>
            </div><!--//app-card-body-->
          </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
          <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
              <h4 class="stats-type mb-1">Manuales</h4>
              <div class="stats-figure"><?=$data2[0]['manuales']?><span></span></div>
              <?php if ($data2[0]['manuales']-$data2[1]['manuales'] < 0) { ?>
                <div class="stats-meta text-success">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                  </svg>
              <?php } else { ?>
                <div class="stats-meta text-danger">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
              <?php } ?>
                <?=$data2[0]['manuales']-$data2[1]['manuales']?>
              </div>
            </div><!--//app-card-body-->
          </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
          <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
              <h4 class="stats-type mb-1">Costo X Receta</h4>
              <div class="stats-figure"><?='$'.number_format($data1[0]['costo'],2)?></div>
              <?php if ($data1[0]['costo']-$data1[1]['costo'] < 0) { ?>
                <div class="stats-meta text-success">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                  </svg>
              <?php } else { ?>
                <div class="stats-meta text-danger">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                  </svg>
              <?php } ?>
                <?='$'.number_format($data1[0]['costo']-$data1[1]['costo'],2)?>
              </div>
            </div><!--//app-card-body-->
          </div><!--//app-card-->
        </div><!--//col-->
      </div><!--//row-->

      <div class="row g-4 mb-4">          
        <div class="col-12 col-lg-6">
          <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h4 class="app-card-title">Nivel de Atención
                    <span style="font-weight: normal;font-size: 12px">(Semana Acutal)</span>
                  </h4>
                </div><!--//col-->
                <div class="col-auto">
                  <div class="card-header-action">
                    <a href="<?= base_url() ?>Inicio/DescargarAtencion">Histórico</a>
                  </div><!--//card-header-action-->
                </div><!--//col-auto-->
              </div><!--//row justify-content-between align-items-center-->
            </div><!--//app-card-header p-3-->
            <div class="app-card-body p-3 p-lg-4">
              <div class="chart-container">
                <canvas id="BarrasAtencion" width="100%" height="75"></canvas>
              </div><!-- //chart-container -->
            </div><!--//app-card-body p-3 p-lg-4-->
          </div><!--//card-header-action-->
        </div><!--//col-auto-->

        <div class="col-12 col-lg-6">
          <div class="app-card app-card-chart h-100 shadow-sm">
            <div class="app-card-header p-3">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h4 class="app-card-title">Negadas por unidad
                    <span style="font-weight: normal;font-size: 12px">(Recetas)</span>
                  </h4>
                </div><!--//col-->
                <div class="col-auto">
                  <div class="card-header-action">
                    <a href="<?= base_url() ?>Inicio/DescargarNegadas">Histórico</a>
                  </div><!--//card-header-action-->
                </div><!--//col-auto-->
              </div><!--//row justify-content-between align-items-center-->
            </div><!--//app-card-header p-3-->
            <div class="app-card-body p-3 p-lg-4">
              <div class="chart-container">
                <canvas id="pastelnegadas" width="100%" height="75"></canvas>
              </div><!-- //chart-container -->
            </div><!--//app-card-body p-3 p-lg-4-->
          </div><!--//card-header-action-->
        </div><!--//col-auto-->
      </div><!--//row-auto-->

      <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
        <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">15 NEGADAS</a>
        <a class="flex-sm-fill text-sm-center nav-link"  id="orders-cont-tab" data-toggle="tab" href="#orders-cont" role="tab" aria-controls="orders-cont" aria-selected="false">QUEJAS</a>
      </nav>
      <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
          <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body p-3">
              <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left" id="TableN">
							    <thead>
								    <tr>
                      <th class="cell">GPO</th>
                      <th class="cell">Descripción</th>
                      <th class="cell">CPM</th>
                      <th class="cell">Consumo</th>
                      <th class="cell">Existencia</th>
                      <th class="cell">Negadas</th>
                      <th class="cell">Transitos</th>
                    </tr>
                  </thead>
							    <tbody>
                    <?php foreach ($data3 as $neg) { ?>
                    <tr>
                      <?php if (substr($neg['clave'],0, 3) == "010") { ?>
                        <td class="font-weight-bold"><?= substr($neg['clave'],0, 3); ?></td>
                      <?php } else {?>
                        <td class="font-weight-bold text-info"><?= substr($neg['clave'],0, 3); ?></td>
                      <?php } ?>
                      <td><?= ucfirst(strtolower($neg['des_corta'])); ?></td>
                      <td><?= number_format($neg['cmp'],0,'.',','); ?></td>
                      <td><?= number_format($neg['consumo'],0,'.',','); ?></td>
                      <?php if ($neg['unidades']+$neg['almacen'] < $neg['cmp']) { 
                        $unidades = number_format($neg['unidades'],0,'.',','); 
                        $almacen = number_format($neg['almacen'],0,'.',',');
                        $total = miles($neg['unidades']+$neg['almacen']);
                        ?>
                        <td>
                          <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Unidades: <?=$unidades;?>. Almacén: <?=$almacen;?>.">
                            <span class="badge bg-danger"><?= $total;?></span>
                          </span>
                        </td>
                      <?php } else {?>
                        <td>
                          <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Unidades: <?=$unidades;?>. Almacén: <?=$almacen;?>.">
                            <span class="badge bg-warning"><?= $total;?></span>
                          </span>
                        </td>
                      <?php } ?>
                      <td><?php echo $neg['negadas']; ?></td>
                      <?php if ($neg['fecha_inc'] == null) { ?>
                        <td>
                          <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Pedidos Vigentes: <?=$neg['pedidos'];?>. Ordenes de reposición: <?=$neg['copel']+$neg['unops']+$neg['ooad']+$neg['transooad'];?>.">
                            <span class="badge bg-warning"><?=$neg['copel']+$neg['unops']+$neg['ooad']+$neg['transooad']+$neg['pedidos'];?></span>
                          </span>
                        </td>
                      <?php } else { ?>
                        <td>
                          <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Pedidos Vigentes: <?=$neg['pedidos'];?>. Ordenes de reposición: <?=$neg['copel']+$neg['unops']+$neg['ooad']+$neg['transooad'];?>.">
                            <span class="badge bg-danger"><?=$neg['copel']+$neg['unops']+$neg['ooad']+$neg['transooad']+$neg['pedidos'];?></span>
                          </span>
                        </td>
                      <?php } ?>
                    </tr>
                    <?php } ?>
							    </tbody>
                </table>
              </div><!--//table-responsive-->
            </div><!--//app-card-body-->
          </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
        </div><!--//tab-pane fade show active-->
        
        <div class="tab-pane fade show" id="orders-cont" role="tabpanel" aria-labelledby="orders-cont-tab">
          <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body p-3">
              <div class="row">
                  <div class="col-lg-8 mb-2 py-2">
                      <?php if ($_SESSION['rol'] == 7) { ?>
                          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1">Nueva Queja</button> 
                          <?php include('Modal_quejas.php'); ?>
                      <?php } ?>
                  </div>
                  <div class="col-lg-4">
                      <?php if (isset($_GET['msg'])) {
                          $alert = $_GET['msg'];
                          if ($alert == "error") { ?>
                              <div class="alert alert-danger" role="alert">
                                  <strong>Error al registrar.</strong>
                              </div>
                          <?php } else if ($alert == "registrado") { ?>
                              <div class="alert alert-success" role="alert">
                                  <strong>Queja registrada.</strong>
                              </div>
                          <?php } else if ($alert == "atendido") { ?>
                              <div class="alert alert-success" role="alert">
                                  <strong>La queja fue atendida.</strong>
                              </div>
                          <?php }
                      } ?>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left" id="Table">
							    <thead>
								    <tr>
                      <th class="cell">Descripción</th>
                      <th class="cell">Piezas</th>
                      <th class="cell">UMF</th>
                      <th class="cell">Receta</th>
                      <th class="cell">Fecha</th>
                      <th class="cell">Estado</th>
                    </tr>
                  </thead>
							    <tbody>
                    <?php foreach ($data4 as $que) { ?>
							      	<tr>
                        <td><?php echo ucfirst(strtolower($que['descripcion'])); ?></td>
                        <td><?php echo $que['piezas'].notificaciones(); ?></td>
                        <td><?php echo $que['abreviacion']; ?></td>
                        <td><?php echo $que['receta']; ?></td>
                        <td><?php echo substr($que['fecha'],0,10);?></td>
                        <?php if ($que['estado'] == 1) { ?>
                          <td>
                            <span class="badge bg-warning">Atendido</span>
                          </td>
                        <?php } elseif ($_SESSION['rol'] == 7){ ?>
                          <td>
                            <form id="formulario" action="<?php echo base_url() ?>Inicio/quejaestado?id=<?php echo $que['id']; ?>" method="post" class="d-inline aten">
                                <button style="padding: 0;" title="Atender" type="submit" class="btn btn-link"><span class="badge bg-danger">Pendiente</span></button>
                            </form>   
                          </td>
                        <?php } else { ?>
                          <td>
                            <span class="badge bg-danger">Pendiente</span>
                          </td>
                        <?php } ?>
                    <?php }?>
							    </tbody>
                </table>
              </div><!--//table-responsive-->
            </div><!--//app-card-body-->
          </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
        </div><!--//tab-pane fade show active-->
      </div><!--//tab-pane-->

      <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
          <div class="app-card app-card-progress-list h-100 shadow-sm">
            <div class="app-card-header p-3">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h4 class="app-card-title">Avance Del Gasto
                    <span style="font-weight: normal; font-size: 12px;">(Recibido/Atendido)</span>
                  </h4>
                </div><!--//col-auto-->
                <div class="col-auto">
                  <div class="card-header-action">
                    <a href="<?=base_url()?>Pedidos/Compras">Ver Pedidos</a>
                  </div><!--//card-header-action-->
                </div><!--//col-auto-->
              </div><!--//row justify-content-between align-items-center-->
            </div><!--//app-card-header-->
            <div class="app-card-body">
              <?php foreach ($data5 as $bar) { ?>
	  					  <div class="item p-3">
							    <div class="row align-items-center">
								    <div class="col">
									    <div class="title" style="color:black;"><span class="font-weight-bold"><?=ucfirst($bar['mes'])?></span><span style="font-weight: normal; font-size: 12px;"><?= ' ($'.number_format($bar['monto'],2,'.',',').' / $'.number_format($bar['pagado'],2,'.',',').')';?></span></div>
									    <div class="progress" style="height: 0.9rem;">
                        <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo number_format($bar['pagado']*100/$bar['monto'],2);?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($bar['pagado']*100/$bar['monto'],2);?>%</div>
                      </div>
								    </div>
							    </div>
							  </div>
                <hr style="margin: 0;">
              <?php } ?>
            </div><!--//app-card-body-->
            <div class="app-card-footer">
              <span style="font-size:12px;"class="text-muted px-3">*Actualizado al <?= $data5[0]['fecha']?></span>
            </div><!--//app-card footer-->
          </div><!--//app-card-->
        </div><!--//col-12 col-lg-6-->

            <div class="col-12 col-lg-6">
                <div class="app-card app-card-stats-table h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Despachos</h4> <!--FALTA REVIAR-->
                            </div><!--//col-auto-->

                            <div class="col-auto">
                                <div class="card-header-action">
                                <h6>Remisiones del Día</h6>
                                    <!--<a href="#">Remisiones del Día</a>-->
                                </div><!--//card-header-action-->
                            </div><!--//col-auto-->
                        </div><!--//row justify-content-between align-items-center-->
                    </div><!--//app-card-header p-3-->

                    <div class="app-card-body p-3 p-lg-4"> 
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th class="meta">Destino</th>
                                        <th class="meta stat-cell" style="text-align: center; width: 100%;">No. Remision</th>
                                        <th class="meta stat-cell" style="text-align: center">ECO</th>
                                        <th class="meta stat-cell" style="text-align: center">ETA</th>
                                        <th class="meta stat-cell" style="text-align: center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data7 as $despachos){?>
                                        <td class="text-success"><?= $despachos['abreviacion'];?></td>
                                        <td class="stat-cell" style="text-align: center"><?= $despachos['remision'];?></td>
                                        <td class="stat-cell" style="text-align: center"><?= $despachos['archivo'];?></td>
                                        <td class="stat-cell" style="text-align: center"><?= substr($despachos['fecha_entrega'],10,6);?></td>
                                        <td class="stat-cell" style="text-align: center">
                                        <?php if($despachos['negadas']==0){?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg>
<?php }elseif($despachos['negadas']==1){?>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg></td>
<?php }?>

                                    </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body p-3-->
                </div><!--//app-card app-card-stats-table h-100 shadow-sm-->
            </div><!--//col-12 col-lg-6-->
        </div><!--//row g-4 mb-4-->

        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
<path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>
                                </div><!--//app icon-holder-->
                            </div><!--//col-auto-->

                            <div class="col-auto">
                                <h4 class="app-card-title">Contratos</h4>
                            </div><!--//col-auto-->
                        </div><!--//row align-items-center gx-3-->
                    </div><!--//app-card-header p-3 border-bottom-0-->

                    <div class="app-card-body px-4">
                        <div class="intro">Instrumentos jurídicos locales (contratos y convenios) "vigentes", formalizados y/o en proceso de formalización.</div>
                    </div><!--//app-card-body px-4-->

                    <div class="app-card-footer p-4 mt-auto"> 
                       <a class="btn app-btn-secondary" href="<?php echo base_url(); ?>Inicio/DescargarContratos">Descargar</a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card app-card-basic d-flex flex-column align-items-start shadow-sm-->
            </div><!--//col-12 col-lg-4-->

            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-code-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
<path fill-rule="evenodd" d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
</svg>
                                </div><!--//app icon-holder-->
                            </div><!--//col-auto-->

                            <div class="col-auto">
                                <h4 class="app-card-title">Pedidos</h4>
                            </div><!--//col-auto-->
                        </div><!--//row align-items-center gx-3-->
                    </div><!--//app-card-header p-3 border-bottom-0-->

                    <div class="app-card-body px-4">
                        <div class="intro">Estatus de Pedidos Locales, con y sin alta generados por la Oficina de Adquisiciones, por autorización de compra.</div>
                    </div><!--//app-card-body-->

                    <div class="app-card-footer p-4 mt-auto">
                       <a class="btn app-btn-secondary" href="<?php echo base_url(); ?>Inicio/DescargarPedidos">Descargar</a>
                    </div><!--//app-card-footer p-4 mt-auto-->
                </div><!--//app-card app-card-basic d-flex flex-column align-items-start shadow-sm-->
            </div><!--//col-12 col-lg-4-->

            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 448 512" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/>
</svg>
                                </div><!--//app icon-holder-->
                            </div><!--//col-auto-->

                            <div class="col-auto">
                                <h4 class="app-card-title">Requerimientos</h4>
                            </div><!--//col-auto-->
                        </div><!--//row align-items-center gx-3-->
                    </div><!--//app-card-header p-3 border-bottom-0-->

                    <div class="app-card-body px-4">
                        <div class="intro">Instrumentos jurídicos locales (contratos y convenios) "vigentes", formalizados y/o en proceso de formalización.</div>
                    </div><!--//app-card-body px-4-->

                    <div class="app-card-footer p-4 mt-auto">
                    <a class="btn app-btn-secondary" href="<?php echo base_url(); ?>Inicio/DescargarRequerimientos">Descargar</a>
                    </div><!--//app-card-footer p-4 mt-auto-->
                </div><!--//app-card app-card-basic d-flex flex-column align-items-start shadow-sm-->
            </div><!--//col-lg-4-->
        </div><!--//row g-4 mb-4-->
        <span style="font-size:12px;"class="text-muted">*Indicadores actualizados al <?= $data1[0]['fecha']?></span>
    </div><!--//content tab-content-->
</div><!--//container-xl-->

</div><!--app-content pt-3 p-md-3 p-lg-4-->  


<script>
  window.addEventListener("load", function() {
    BarrasAtencion();  
    pastelnegadas();
  })
</script>

<?php pie() ?> <!-- Pone el fotter -->