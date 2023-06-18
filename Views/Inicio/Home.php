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
                    <a href="">Histórico</a>
                  </div><!--//card-header-action-->
                </div><!--//col-auto-->
              </div><!--//row justify-content-between align-items-center-->
            </div><!--//app-card-header p-3-->
            <div class="app-card-body p-3 p-lg-4">
              <div class="chart-container">
                <canvas id="canvas-linechart" width="100%" height="75"></canvas>
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
                    <a href="">Histórico</a>
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

      <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
          <div class="app-card app-card-orders-table shadow-sm mb-4">
            <div class="app-card-body p-3">
              <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left" id="Table">
							    <thead>
								    <tr>
                      <th class="cell">Clave</th>
                      <th class="cell">Descripción</th>
                      <th class="cell">CPM</th>
                      <th class="cell">Consumo</th>
                      <th class="cell">Existencia</th>
                      <th class="cell">Negadas</th>
                      <th class="cell"></th>
                    </tr>
                  </thead>
							    <tbody>
                    <?php foreach ($data1 as $validar) { ?>
                      <?php if ($validar['estado'] == 2 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['id'] == $validar['id_validador'] || $_SESSION['id'] == $validar['id_creador'])) { ?>
							      	<tr>
                        <td>
                          <?php if ($validar['estado'] == 2) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                          <?php } elseif ($validar['estado'] == 3) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                          <?php } elseif ($validar['estado'] == 4) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                          <?php } elseif ($validar['estado'] == 1) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                          <?php } ?>
                        </td>
                        <td><?php echo $validar['id_contrato']; ?></td>
                        <td><?php echo $validar['fecha']; ?></td>
                        <td><?php echo $validar['creador']; ?></td>
                        <td><?php echo $validar['validador']; ?></td>
                        <td><?php echo $validar['intentos'];?></td>
                        <?php if ($validar['estado'] != 1) { ?>
                          <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $validar['id_contrato']; ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                              <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                            </svg>
                          </a></td>
                        <?php } else { ?>
                          <td></td>
                        <?php } ?>
                      <?php } ?>
                    <?php }?>
							    </tbody>
                  <tbody>
                                <tr>
                      <td class="cell" style="color:#000000;">010 000 1210 00 00</td>
                                              <td class="cell"><span class="truncate">Pinaverio</span></td>
                                              <td class="cell">7,187</td>
                                              <td class="cell"><span>7,118</span>
                      <!--<span class="note">2:16 PM</span>-->
                      <td class="cell"><span class="badge bg-danger">1,099</span></td>
                                              <td class="cell">69</td>
                                              <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                                          </tr>
                    <tr>
                      <td class="cell" style="color:#000000;">010 000 5186 01 00</td>
                                              <td class="cell"><span class="truncate">Pantoprazol</span></td>
                                              <td class="cell">22,858</td>
                                              <td class="cell"><span>22,698</span>
                      <!--<span class="note">2:16 PM</span>-->
                      <td class="cell"><span class="badge bg-warning">8,563</span></td>
                                              <td class="cell">48</td>
                                              <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Pedido</a></td>
                                          </tr>
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
                  <h4 class="app-card-title">Avance 
                    <span style="font-weight: normal; font-size: 12px;">(Pedidos con alta)</span>
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
              <?php foreach ($data6 as $bar) { ?>
							  <div class="item p-3">
							    <div class="row align-items-center">
								    <div class="col">
									    <div class="title " style="color:#000000;"><?php echo $bar['area'].' ('.$bar['form'].'/'.$bar['total'].')';?></div>
									    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo number_format($bar['form']*100/$bar['total'],2);?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($bar['form']*100/$bar['total'],2);?>%</div>
                      </div>
								    </div><!--//col-->
							    </div><!--//row-->
							  </div><!--//item-->
                <hr style="margin: 0;">
              <?php } ?>

              <div class="item p-3">
                <div class="row align-items-center">
                  <div class="col">
                    <div class="title mb-1 ">Enero</div>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div><!--//col-->
                  <div class="col-auto">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                  </div><!--//col-auto-->
                </div><!--//row align-items-center-->
                <a class="item-link-mask" href="#"></a>
              </div><!--//item-->
            </div><!--//app-card-body-->
          </div><!--//app-card-->
        </div><!--//col-12 col-lg-6-->

            <div class="col-12 col-lg-6">
                <div class="app-card app-card-stats-table h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Despachos</h4>
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
                                        <th class="meta stat-cell">ECO</th>
                                        <th class="meta stat-cell">ETA</th>
                                        <th class="meta stat-cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-success">HGZ#1 - Villa de Álvarez</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">10:00 AM</td>
                                        <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg></td>
                                    </tr>
                                    <tr>
                <td class="text-success">UMF#18 - Colima</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg></td></tr>
              <tr>
                <td class="text-success">UMF#19 - Colima</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg></td>
              </tr>
              <tr>
                <td class="text-success">HGZ#10 - Manzanillo</td>
                                        <td class="stat-cell">1079</td>
                                        <td class="stat-cell" style="color:#ff0000;">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg></td>
              </tr>
              <tr>
                <td class="text-success">HGSZ#4 - Tecoman</td>
                                        <td class="stat-cell">1079</td>
                                        <td class="stat-cell" style="color:#ff0000;">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg></td>
                                    </tr>
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
                       <a class="btn app-btn-secondary" href="#">Ver</a>
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
                        <div class="intro">Status de Pedidos Locales, con y sin alta generados por la Oficina de Adquisiciones, por autorización de compra.</div>
                    </div><!--//app-card-body-->

                    <div class="app-card-footer p-4 mt-auto">
                       <a class="btn app-btn-secondary" href="#">Ver</a>
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
                                <h4 class="app-card-title">Histórico de Claves</h4>
                            </div><!--//col-auto-->
                        </div><!--//row align-items-center gx-3-->
                    </div><!--//app-card-header p-3 border-bottom-0-->

                    <div class="app-card-body px-4">
                        <div class="intro">Registro de claves de medicamento y material de curación atendidas en el ejercicio encurso.</div>
                    </div><!--//app-card-body px-4-->

                    <div class="app-card-footer p-4 mt-auto">
                    <a class="btn app-btn-secondary" href="#">Ver</a>
                    </div><!--//app-card-footer p-4 mt-auto-->
                </div><!--//app-card app-card-basic d-flex flex-column align-items-start shadow-sm-->
            </div><!--//col-lg-4-->
        </div><!--//row g-4 mb-4-->

    </div><!--//content tab-content-->
</div><!--//container-xl-->

</div><!--app-content pt-3 p-md-3 p-lg-4-->  
<script>
  window.addEventListener("load", function() {
      pastelnegadas();
  })
</script>

<?php pie() ?> <!-- Pone el fotter -->