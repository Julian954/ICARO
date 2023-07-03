<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 4 || $_SESSION['rol'] == 5){ ?> <!-- Si es Admin, Interno o de Jefatura-->
  <?php encabezado() ?> <!-- Poner el header -->
  
  <div class="app-wrapper">
    <div class="app-content pt-3 p-lg-4">
      <div class="container-xl">
        <div class="position-relative mb-3">
          <div class="row g-3 justify-content-between">
            <div class="col-auto">
              <h1 class="app-page-title mb-0">Panel General de Convenios/Contratos</h1>
            </div>
          </div>
        </div>

        <div class="app-card app-card-notification shadow-sm mb-4">
          <div class="app-card-header px-4 py-3">
            <div class="row g-3 align-items-center">
              <div class="col-6 col-lg-auto text-center text-lg-left">
                <img class="profile-image" src="<?php echo base_url(); ?>Assets/img/users/<?php echo $_SESSION['perfil'] ?>" alt="user profile">
              </div><!--//col-->
              <div class="col-6 col-lg-auto text-center text-lg-left">
                <div class="notification-type mb-2">
                  <span class="badge bg-info"><?php echo $_SESSION['nrol'] ?></span>
                </div>
                <h4 class="notification-title mb-1"><?php echo $_SESSION['nombre'] ?></h4>
                <ul class="notification-meta list-inline mb-0">
                  <li class="list-inline-item"><?php echo $_SESSION['correo'] ?></li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item"><?php echo telefono($_SESSION['telefono']) ?></li>
                </ul>
              </div><!--//col-->
              <div class="col-3 col-sm-auto text-center text-lg-right">
              </div><!--//col-->
              <div class="col-7 col-lg-auto col-md-auto text-center text-lg-center">
                <?php if (isset($_GET['msg'])) {
                    $alert = $_GET['msg'];
                    if ($alert == "registrado") { ?>
                        <div class="alert alert-success" role="alert">
	                        <h3 class="notification-title">REGISTRADO</h3>
	                        <div class="notification-subtitle">El Contrato se registró con éxito.</div>
                        </div>
                    <?php } else if ($alert == "error") { ?>
                        <div class="alert alert-danger" role="alert">
	                        <h3 class="notification-title">ERROR</h3>
	                        <div class="notification-subtitle">No se pudo registrar el Contrato, <br>intente de nuevo o cantacte a soporte.</div>
                        </div>
                    <?php }
                } ?>
              </div><!--//col-->
            </div><!--//row-->
          </div><!--//app-card-header-->
        </div><!--//perfil-->

        <div class="row g-4 mb-4">
			    <div class="col-12 col-lg-6">
				    <div class="app-card app-card-orders-table shadow-sm mb-4">
					    <div class="app-card-header p-3">
					      <div class="row justify-content-between align-items-center">
					        <div class="col-auto">
					          <h4 class="app-card-title">Estadísticas de la Oficina</h4>
					        </div><!--//col-->
					      </div><!--//row-->
					    </div><!--//app-card-header-->
					    <div class="app-card-body p-3 p-lg-4">
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-center">   
			  				    <thead>
			  				      <tr>
                        <th class="cell">Instrumentos</th>    
                        <th class="cell">Monto</th>                   
			  				      </tr>
			  				    </thead>
                    <tbody>
                      <td><span style="text-decoration:solid underline #5B99EA 2px;"><strong><?php echo $data3['total']; ?></strong></span></td>
                      <td><span style="text-decoration:solid underline #5B99EA 2px;"><strong>$<?php echo number_format($data3['maximo'], 0); ?> MXN.</span></strong></td>
                    </tbody>
                  </table>                          
                </div>
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-center">   
			  				    <thead>
			  				      <tr>
                        <?php foreach ($data4 as $ctr) { ?>
                          <th class="cell"><?=$ctr['categoria'].'s';?></th> 
                        <?php } ?>                
			  				      </tr>
			  				    </thead>
                    <tbody>
                        <?php foreach ($data4 as $ctr) { ?>
                          <td><span style="text-decoration:solid underline #5B99EA 2px;"><strong><?= $ctr['total']; ?></strong></span></td> 
                        <?php } ?>  
                    </tbody>
                  </table>                          
                </div>
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-center">   
			  				    <thead>
			  				      <tr>
                        <?php foreach ($data5 as $cov) { ?> 
                          <th class="cell"><span style="font-size:12px;"><?= $cov['tipo'];?></span></th> 
                        <?php } ?>            
			  				      </tr>
			  				    </thead>
                    <tbody>
                        <?php foreach ($data5 as $cov) { ?>
                          <td><span style="color:#000000; font-size:12px;"><?= $cov['total'];?></span></td> 
                        <?php } ?>
                    </tbody>
                  </table>                          
                </div>
                <br>
                <div class="item-data"><strong>Los estados de los Instrumentos son:</strong></div>
								<div class="item-label mb-2">   
                  <div class="table-responsive">                                  
                  <table>
			  				    <thead>
			  					    <tr>
                        <th scope="col" style="text_align:center; width:1%;"></th>    
                        <th scope="col" style="text_align:center; width:1%;"></th>
                        <th scope="col" style="text_align:center; width:1%;"></th>
                        <th scope="col" style="text_align:center; width:1%;"></th>                     
			  					    </tr>
			  				    </thead>
                    <tbody>
                      <strong>
                        <?php foreach ($data2 as $cn) { ?>
                          <tr>
                            <td>
                        <?php if ($cn['estado'] == 1) { ?>                                                    
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" />
                            </svg>                            
                          <?php } elseif ($cn['estado'] == 2) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" />
                            </svg>
                          <?php } elseif ($cn['estado'] == 3) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" />
                            </svg>
                          <?php } elseif ($cn['estado'] == 4) { ?>
                            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                              <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" />
                            </svg>                            
                          <?php } ?>
                          </td>
                          <td>
                          <?php echo $cn['nombre']; ?>
                          </td>
                          <td>
                          <span style="text-decoration:solid underline #5B99EA 2px;"><?php echo $cn['total'] ?></span>
                          </td>
                          <td>
                          <strong><span style="font-weight:semibold; color:#E74C3C; font-size:12px;">(<?php echo number_format($cn['total']*100/$data3['total'],2); ?>%)</span></strong><br>
                          </td>
                        </tr>                        
                          <?php } ?>
                      </strong>
                      </tbody>
                      </table>                          
                          </div>
                          </div>
                          
                   

					    </div><!--//app-card-body-->
				    </div><!--//app-card-->

				    <div class="app-card app-card-chart shadow-sm">
					    <div class="app-card-header p-3">
					      <div class="row justify-content-between align-items-center">
					        <div class="col-auto">
					          <h4 class="app-card-title">Estado de Contratos</h4>
					        </div><!--//col-->
					      </div><!--//row-->
					    </div><!--//app-card-header-->
					    <div class="app-card-body p-3 p-lg-4">
					      <div class="chart-container">
				          <canvas id="GeneralContratos" width="100%" height="75"></canvas>
					      </div>
					    </div><!--//app-card-body-->
				    </div><!--//app-card-->
			    </div><!--//col-->

        
          <div class="col-12 col-lg-6">
            <div class="app-card app-card-progress-list shadow-sm">
              <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h4 class="app-card-title">Flujo de Formalización
                      <span style="font-weight: normal; font-size: 12px;">(Creados / Formalizados)</span>
                    </h4>
                  </div><!--//col-auto-->
                  <div class="col-auto">
                    <div class="card-header-action">
                    </div><!--//card-header-action-->
                  </div><!--//col-auto-->
                </div><!--//row justify-content-between align-items-center-->
              </div><!--//app-card-header-->
              <div class="app-card-body">
                <?php foreach ($data6 as $bar) { ?>
	  		  			  <div class="item p-3">
				  			    <div class="row align-items-center">
				  				    <div class="col">
                        <div class="title " style="color:#000000;"><span class="font-weight-bold"><?php echo $bar['area'].'</span><span style="font-weight: normal; font-size: 12px;"> ('.$bar['form'].'/'.$bar['total'].')</span>';?></div>
				  					    <div class="progress" style="height: 0.9rem;">
                          <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo number_format($bar['form']*100/$bar['total'],2);?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($bar['form']*100/$bar['total'],2);?>%</div>
                        </div>
				  				    </div>
				  			    </div>
				  			  </div>
                  <hr style="margin: 0;">
                <?php } ?>
              </div><!--//app-card-body-->
              <div class="app-card-footer">
                <span style="font-size:12px;"class="text-muted px-3">*Actualizado al <?= date('Y-m-d')?></span>
              </div><!--//app-card footer-->
            </div><!--//app-card-->
          </div><!--//col-12 col-lg-6-->
              
          <div class="col-12 col-lg-6">
            <div class="app-card app-card-chart h-100 shadow-sm">
              <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h4 class="app-card-title">Devengo vs. Presupuesto Global</h4>
                  </div><!--//col-->
                </div><!--//row-->
              </div><!--//app-card-header-->
              <div class="app-card-body p-3 p-lg-4">
                <div class="chart-container">
                  <canvas id="chart_pie2" width="100%" height="75"></canvas>  
                </div>
              </div><!--//app-card-body-->
            </div><!--//app-card-->
          </div><!--//col-->
          <div class="col-12 col-lg-6">
            <div class="app-card app-card-chart h-100 shadow-sm">
              <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h4 class="app-card-title">Devengo vs. Instrumentos Formalizados</h4>
                  </div><!--//col-->
                </div><!--//row-->
              </div><!--//app-card-header-->
              <div class="app-card-body p-3 p-lg-4">
            <div class="chart-container">
              <canvas id="chart_pie" width="100%" height="75"></canvas>
            </div><!-- //chart-container -->
          </div><!--//app-card-body p-3 p-lg-4-->
          </div><!--//app-card-->
          </div><!--//col-->
        </div>
                      
 
      
        <div class="position-relative mb-3">
            <div class="row g-3 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Validaciones</h1>
                </div>
            </div>
        </div>
        <div class="app-card shadow-sm mb-4 border-left-decoration">
        	<div class="inner">
        		<div class="app-card-body p-4">
        			<div class="row gx-5 gy-3">
        			  <div class="col-12 col-lg-9">
        				  <div> También puede revisar el flujo de revisión de los contratos en "proceso de validación"  al dar click en el icono 
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                      </svg>
                      ubicado en la descripción de los contratos que no están "En contratacón".
                  </div>
        				</div><!--//col-->
        			  <div class="col-12 col-lg-3">
                  <a class="btn app-btn-primary" href="<?php echo base_url(); ?>Contratos/Validando">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                      <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                    </svg>Flujo de Validaciones
                  </a>
        			  </div><!--//col-->
        			</div><!--//row-->
            </div><!--//app-card-body-->
          </div><!--//inner-->
        </div><!--//app-card-->
        <div class="position-relative mb-3">
            <div class="row g-3 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Contratos y Convenios</h1>
                </div>
            </div>
        </div>
        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
          <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos</a>
          <a class="flex-sm-fill text-sm-center nav-link"  id="orders-cont-tab" data-toggle="tab" href="#orders-cont" role="tab" aria-controls="orders-cont" aria-selected="false">En Contratación</a>
          <a class="flex-sm-fill text-sm-center nav-link"  id="orders-rev-tab" data-toggle="tab" href="#orders-rev" role="tab" aria-controls="orders-rev" aria-selected="false">En Validación</a>
          <a class="flex-sm-fill text-sm-center nav-link"  id="orders-vali-tab" data-toggle="tab" href="#orders-vali" role="tab" aria-controls="orders-vali" aria-selected="false">Validados</a>
          <a class="flex-sm-fill text-sm-center nav-link"  id="orders-form-tab" data-toggle="tab" href="#orders-form" role="tab" aria-controls="orders-form" aria-selected="false">Formalizados</a>
        </nav>
			  <div class="tab-content" id="orders-table-tab-content">
		      <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table">
			  					  <thead>
			  						  <tr>
                        <th scope="col"></th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Máximo</th>
                        <th scope="col">Creación</th>
                        <th scope="col">Devengo</th>
                        <th scope="col">Foro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data1 as $us) { ?>
                        <?php if ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['id'] == $us['administrador']) { ?>
                          <tr>
                            <td>
                              <?php if ($us['estado'] == 2) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                              <?php } elseif ($us['estado'] == 3) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                              <?php } elseif ($us['estado'] == 4) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                              <?php } elseif ($us['estado'] == 1) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                              <?php } ?>
                            </td>
                            <td><?php echo $us['numero']; ?></td>
                            <td><?php echo $us['descripcion']; ?></td>
                            <td><?php echo $us['nombre']; ?></td>
                            <td><?php echo $us['termino']; ?></td>
                            <td><?php echo $us['maximo']; ?></td>
                            <td><?php echo $us['fecha']; ?></td>
                            <td>$<?php echo number_format($us['devengo']);?>&nbsp MXN</td>
                            <?php if ($us['estado'] != 1) { ?>
                              <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $us['numero']; ?>">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                  <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                                </svg>
                              </a></td>                            
                            <?php } else { ?>
                              <td></td>
                            <?php } ?>
                          </tr>
                        <?php }
                      } ?>
                    </tbody>
                  </table>  
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
		      <div class="tab-pane fade show" id="orders-cont" role="tabpanel" aria-labelledby="orders-cont-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table2">
			  					  <thead>
			  						  <tr>
                        <th scope="col"></th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Máximo</th>
                        <th scope="col">Creación</th>
                        <?php if ($_SESSION['rol'] == 7) { ?>
                          <th scope="col">Eliminación</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data1 as $us) { ?>
                        <?php if ($us['estado'] == 1 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == $us['administrador'])) { ?>
                          <tr>               
                            <td>
                              <?php if ($us['estado'] == 2) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                              <?php } elseif ($us['estado'] == 3) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                              <?php } elseif ($us['estado'] == 4) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                              <?php } elseif ($us['estado'] == 1) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                              <?php } ?>
                            </td>
                            <td><?php echo $us['numero']; ?></td>
                            <td><?php echo $us['descripcion']; ?></td>
                            <td><?php echo $us['nombre']; ?></td>
                            <td><?php echo $us['termino']; ?></td>
                            <td><?php echo $us['maximo']; ?></td>
                            <td><?php echo $us['fecha']; ?></td>
                            <?php if ($_SESSION['rol'] == 7) { 
                              $eliminar = new  DateTime($us['fecha_eliminar']);
                              $hoy = new DateTime(date('Y-m-d'));
                              $intervalo = $hoy->diff($eliminar);
                              ?>
                              <td><?php echo "En ".$intervalo->days." días"; ?></td>
                            <?php } ?>                         
                          </tr>
                        <?php  } ?>
                      <?php } ?>
                    </tbody>
                  </table>  
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
		      <div class="tab-pane fade show" id="orders-rev" role="tabpanel" aria-labelledby="orders-rev-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table3">
			  					  <thead>
			  						  <tr>
                        <th scope="col"></th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Máximo</th>
                        <th scope="col">Creación</th>
                        <?php if ($_SESSION['rol'] == 7) { ?>
                          <th scope="col">Eliminación</th>
                        <?php } ?>
                        <th scope="col">Foro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data1 as $us) { ?>
                        <?php if ($us['estado'] == 2 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == $us['administrador'])) { ?>
                          <tr>
                            <td>
                              <?php if ($us['estado'] == 2) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                              <?php } elseif ($us['estado'] == 3) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                              <?php } elseif ($us['estado'] == 4) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                              <?php } elseif ($us['estado'] == 1) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                              <?php } ?>
                            </td>
                            <td><?php echo $us['numero']; ?></td>
                            <td><?php echo $us['descripcion']; ?></td>
                            <td><?php echo $us['nombre']; ?></td>
                            <td><?php echo $us['termino']; ?></td>
                            <td><?php echo $us['maximo']; ?></td>
                            <td><?php echo $us['fecha']; ?></td>
                            <?php if ($_SESSION['rol'] == 7) { 
                              $eliminar = new  DateTime($us['fecha_eliminar']);
                              $hoy = new DateTime(date('Y-m-d'));
                              $intervalo = $hoy->diff($eliminar);
                              ?>
                              <td><?php echo "En ".$intervalo->days." días"; ?></td>
                            <?php } ?>
                            <?php if ($us['estado'] != 1) { ?>
                            <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $us['numero']; ?>">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                              </svg>
                            </a></td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>  
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
		      <div class="tab-pane fade show" id="orders-vali" role="tabpanel" aria-labelledby="orders-vali-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table4">
			  					  <thead>
			  						  <tr>
                        <th scope="col"></th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Máximo</th>
                        <th scope="col">Creación</th>
                        <?php if ($_SESSION['rol'] == 7) { ?>
                          <th scope="col">Eliminación</th>
                        <?php } ?>
                        <th scope="col">Foro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data1 as $us) { ?>
                        <?php if ($us['estado'] == 3 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == $us['administrador'])) { ?>
                          <tr>
                            <td>
                              <?php if ($us['estado'] == 2) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                              <?php } elseif ($us['estado'] == 3) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                              <?php } elseif ($us['estado'] == 4) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                              <?php } elseif ($us['estado'] == 1) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                              <?php } ?>
                            </td>
                            <td><?php echo $us['numero']; ?></td>
                            <td><?php echo $us['descripcion']; ?></td>
                            <td><?php echo $us['nombre']; ?></td>
                            <td><?php echo $us['termino']; ?></td>
                            <td><?php echo $us['maximo']; ?></td>
                            <td><?php echo $us['fecha']; ?></td>
                            <?php if ($_SESSION['rol'] == 7) { 
                              $eliminar = new  DateTime($us['fecha_eliminar']);
                              $hoy = new DateTime(date('Y-m-d'));
                              $intervalo = $hoy->diff($eliminar);
                              ?>
                              <td><?php echo "En ".$intervalo->days." días"; ?></td>
                            <?php } ?>
                            <?php if ($us['estado'] != 1) { ?>
                            <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $us['numero']; ?>">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                              </svg>
                            </a></td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>  
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
		      <div class="tab-pane fade show" id="orders-form" role="tabpanel" aria-labelledby="orders-form-tab">
			  	  <div class="app-card app-card-orders-table shadow-sm mb-5">
			  	    <div class="app-card-body p-3">
			  		    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table5">
			  					  <thead>
			  						  <tr>
                        <th scope="col"></th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Termino</th>
                        <th scope="col">Máximo</th>
                        <th scope="col">Creación</th>
                        <?php if ($_SESSION['rol'] == 7) { ?>
                          <th scope="col">Eliminación</th>
                        <?php } ?>
                        <th scope="col">Foro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data1 as $us) { ?>
                        <?php if ($us['estado'] == 4 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == $us['administrador'])) { ?>
                          <tr>
                            <td>
                              <?php if ($us['estado'] == 2) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                              <?php } elseif ($us['estado'] == 3) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                              <?php } elseif ($us['estado'] == 4) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                              <?php } elseif ($us['estado'] == 1) { ?>
                                <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                              <?php } ?>
                            </td>
                            <td><?php echo $us['numero']; ?></td>
                            <td><?php echo $us['descripcion']; ?></td>
                            <td><?php echo $us['nombre']; ?></td>
                            <td><?php echo $us['termino']; ?></td>
                            <td><?php echo $us['maximo']; ?></td>
                            <td><?php echo $us['fecha']; ?></td>
                            <?php if ($_SESSION['rol'] == 7) { 
                              $eliminar = new  DateTime($us['fecha_eliminar']);
                              $hoy = new DateTime(date('Y-m-d'));
                              $intervalo = $hoy->diff($eliminar);
                              ?>
                              <td><?php echo "En ".$intervalo->days." días"; ?></td>
                            <?php } ?>
                            <?php if ($us['estado'] != 1) { ?>
                            <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $us['numero']; ?>">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                              </svg>
                            </a></td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>  
                </div>
              </div>
            </div>
          </div><!--//app-card-body-->
        </div><!--//Table-->
      </div>
    </div>
  </div><!--//app-wrapper-->
  <script>
    window.addEventListener("load", function() {
        GeneralContratos();
        chart_pie();
        chart_pie2();
    })
  </script>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->