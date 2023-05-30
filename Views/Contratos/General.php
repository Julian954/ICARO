<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el header -->
<?php } else { ?> <!-- En caso de ser válido -->
  <?php encabezado() ?> <!-- Poner el header -->
  
    <div class="app-wrapper">
        <div class="app-content pt-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Contratos y Convenios</h1>
                        </div>
                    </div>
                </div>

                <div class="app-card app-card-notification shadow-sm">
                    <div class="app-card-header px-4 py-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-auto text-center text-lg-left">
                                <img class="profile-image" src="<?php echo base_url(); ?>Assets/img/users/<?php echo $_SESSION['perfil'] ?>" alt="user profile">
                                </div><!--//col-->
                                  <div class="col-12 col-lg-auto text-center text-lg-left">
                                  <div class="notification-type mb-2">
                                    <span class="badge bg-info"><?php echo $_SESSION['nrol'] ?></span>
                                  </div>
                                  <h4 class="notification-title mb-1"><?php echo $_SESSION['nombre'] ?></h4>
                                  <ul class="notification-meta list-inline mb-0">
                                    <li class="list-inline-item"><?php echo $_SESSION['correo'] ?></li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item"><?php echo $_SESSION['telefono'] ?></li>
                                  </ul>
                                </div><!--//col-->
                              </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body p-4">
                              <div style="">
                                <span>
                                  <svg width="0.5em" height="0.5em"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="red">
                                    <path d="M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z"/>
                                  </svg>
                                  &nbsp&nbsp
                                  <span style="font-weight: bold;">Estadísticas de la Oficina</span>
                                </span>
                              </div>
                            <div class="row g-4 mb-4" style="padding-top:10px; font-size:14px;">
                              <div class="col-12 col-lg-6" style="color:#000000;">

  <div>
    <?php $tot = $data3[0]['total']; ?>
    <span style="font-weight:bold;"></span><span style="">Total de Instrumentos:</span>&nbsp<strong><span style="font-weight:bold; text-decoration:solid underline #5B99EA 2px;"> <?php echo $tot; ?> </strong> </span>
    <?php $max = $data3[0]['maximo']; ?>                                      
    </span>&nbsp<span>a un ascendente de :</span>&nbsp<span style="font-weight:bold;">$<?php echo number_format($max, 2); ?>
    </span>
  </div>
<div>
  <span style="text-decoration:solid underline #5B99EA 2px;">
  <?php $conV = $data4[1]['cont']; ?>
  <?php echo $conV; ?>
  </span>&nbsp<span style="font-weight:bold;">Convenios:</span>&nbsp
  <?php $sai = $data5[1]['conv_count']; ?>
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">SAI:</span>&nbsp<span style="font-weight:lighter; font-size:10px;"><strong><?php echo $sai; ?> </strong></span>&nbsp
  <?php $prei = $data5[0]['conv_count']; ?>
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">PREI:</span>&nbsp<span style="font-weight:lighter; font-size:10px;"><?php echo $prei; ?></span>&nbsp&nbsp
  <span style="text-decoration:solid underline #5B99EA 2px;">
  <?php $contr = $data4[0]['cont']; ?>
  <?php echo $contr; ?>
  </span>&nbsp<span style="font-weight:bold;">Contratos:</span>&nbsp
  <?php $sai2 = $data5[1]['contr_count']; ?>
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">SAI:</span>&nbsp<span style="font-weight:lighter; font-size:10px;"> <?php echo $sai2; ?>
  <?php $prei2 = $data5[0]['contr_count']; ?>
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">PREI:</span>&nbsp<span style="font-weight:lighter; font-size:10px;"> <?php echo $prei2; ?>
</div>

<div style="padding-top:15px;">
<?php foreach ($data2 as $cn) {
  if ($cn['estado'] == 4) { ?>
  <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
      <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
    <span style="font-weight:bold;"></span><span style="">Formalizado: </span>&nbsp<strong> <?php echo $cn['total'] ?>&nbsp</strong>
  <?php } elseif ($cn['estado'] == 2) { ?>
    <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
      <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
    <span style="font-weight:bold;"></span><span style="">Elaboracion:</span>&nbsp<strong> <?php echo $cn['total'] ?>&nbsp</strong>
  <?php } elseif ($cn['estado'] == 3) { ?>
    <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
    <span style="font-weight:bold;"></span><span style="">Validacion:</span>&nbsp<strong> <?php echo $cn['total'] ?>&nbsp</strong>
  <?php } elseif ($cn['estado'] == 1) { ?>
    <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
      <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
    <span style="font-weight:bold;"></span><span style="">Contratación: </span>&nbsp<strong> <?php echo $cn['total'] ?>&nbsp</strong>
  <?php }
} ?>

<div style="padding-top:30px; padding-right:30px;">
<canvas id="chart-pie0"></canvas>
</div>
</div>
                  </div><!--//col-->
                  <div class="col-12 col-lg-6">
<div style="padding-bottom:20px; font-weight:bold; font-size:16px; color:#F39C12;">Flujo de Formalización</div>
  <div style="padding-top:10px;"><span style="color:#000000;">Prestaciones Médicas</span></div>
  <div>
    <?php 
      // Verificar la existencia de los valores y asignar cero en caso de no estar definidos
      $pTotalContratosArea2 = isset($data7[0]['TCM']) ? $data7[0]['TCM'] : 0;
      $pTotalContratosAreaF = isset($data7[1]['TCM']) ? $data7[1]['TCM'] : 0;
      // Calcular el porcentaje de la barra de progreso
      $pTotalDatoBarra = ($pTotalContratosArea2 != 0) ? ($pTotalContratosAreaF / $pTotalContratosArea2) * 100 : 0;
    ?>
  </div>
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Jefatura de Servicios Administrativos</span></div>
  <div>
    <?php 
      $pTotalContratosAreaAdm = isset($data7[2]['TCM']) ? $data7[2]['TCM'] : 0;
      $pTotalContratosAreaAD = isset($data7[3]['TCM']) ? $data7[3]['TCM'] : 0;
      $pTotalDatoBarra2 = ($pTotalContratosAreaAdm != 0) ? ($pTotalContratosAreaAD / $pTotalContratosAreaAdm) * 100 : 0;
    ?>
  </div>
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra2;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra2;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra2, 2);?>%</div>
</div>


<div style="padding-top:10px;"><span style="color:#000000;">Servicios Prestaciones Económicas</span></div>
<div>
    <?php 
      $pTotalContratosAreaEcm = isset($data7[4]['TCM']) ? $data7[4]['TCM'] : 0;
      $pTotalContratosAreaEC = isset($data7[5]['TCM']) ? $data7[5]['TCM'] : 0;
      $pTotalDatoBarra3 = ($pTotalContratosAreaEcm != 0) ? ($pTotalContratosAreaEC / $pTotalContratosAreaEcm) * 100 : 0;
    ?>
  </div>
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra3;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra3;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra3, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Coordinación de Comuniación Social</span></div>
<div>
    <?php 
      $pTotalContratosAreaCsl = isset($data7[6]['TCM']) ? $data7[6]['TCM'] : 0;
      $pTotalContratosAreaCS = isset($data7[7]['TCM']) ? $data7[7]['TCM'] : 0;
      $pTotalDatoBarra4 = ($pTotalContratosAreaCsl != 0) ? ($pTotalContratosAreaCS / $pTotalContratosAreaCsl) * 100 : 0;
    ?>
  </div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra4;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra4;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra4, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Departamento de Conservación</span></div>
<div>
    <?php 
      $pTotalContratosAreaDcn = isset($data7[8]['TCM']) ? $data7[8]['TCM'] : 0;
      $pTotalContratosAreaDC = isset($data7[9]['TCM']) ? $data7[9]['TCM'] : 0;
      $pTotalDatoBarra5 = ($pTotalContratosAreaDcn != 0) ? ($pTotalContratosAreaDC / $pTotalContratosAreaDcn) * 100 : 0;
    ?>
  </div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra5;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra5;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra5, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Departamento de Servicios Generales</span></div>
<div>
    <?php 
      $pTotalContratosAreaSgn = isset($data7[10]['TCM'])? $data7[10]['TCM'] : 0;
      $pTotalContratosAreaSG = isset($data7[11]['TCM'])? $data7[11]['TCM'] : 0;
      $pTotalDatoBarra6 = ($pTotalContratosAreaSgn != 0) ? ($pTotalContratosAreaSG / $pTotalContratosAreaSgn) * 100 : 0;
    ?>
  </div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra6;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra6;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra6, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Coordinación de Informática</span></div>
<div>
<?php 
$pTotalContratosAreaInf = isset($data7[12]['TCM']) ? $data7[12]['TCM'] : 0;
$pTotalContratosAreaIN = isset($data7[13]['TCM']) ? $data7[13]['TCM'] : 0;
$pTotalDatoBarra7 = ($pTotalContratosAreaInf != 0) ? ($pTotalContratosAreaIN / $pTotalContratosAreaInf) * 100 : 0;
    ?>
  </div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra7;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra7;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra7, 2);?>%</div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Coordinación Biomédica</span></div>
<div>
    <?php
      $pTotalContratosAreaBmd = isset($data7[14]['TCM']) ? $data7[14]['TCM'] : 0;
      $pTotalContratosAreaBI = isset($data7[15]['TCM']) ? $data7[15]['TCM'] : 0;
      $pTotalDatoBarra1 = ($pTotalContratosAreaBmd != 0) ? ($pTotalContratosAreaBI / $pTotalContratosAreaBmd) * 100 : 0;
    ?>
  </div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:<?php echo $pTotalDatoBarra1;?>%;" aria-valuenow="<?php echo $pTotalDatoBarra1;?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($pTotalDatoBarra1, 2);?>%</div>
</div>
                  </div><!--//col-->
              </div><!--//row-->
            </div><!--//app-card-body-->
				</div><!--//app-card-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->



      <div class="app-content p-lg-4" style="margin-top:-25px !important; padding-top:-25px !important;">

      <div class="card-body" style="border-color:#59d05d !important;">

        <div id="faq2-accordion" class="mb-3" style="margin-bottom:25px !important;">
                      <div class="">
                        <div class="" id="faq2-heading-1">
                                <a class="" type="button" data-toggle="collapse" data-target="#faq2-1" aria-expanded="false" aria-controls="faq2-1">
                                  Indicadores del Devengo<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                  </svg>
                                </a>
                        </div>
                          <div class="panel-collapse collapse" id="faq2-1" aria-labelledby="faq2-heading-1" data-parent="#faq2-accordion" style="margin-top:25px !important;">
                            <div class="row g-4 mb-4">
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
                                              <canvas id="chart-pie2"></canvas>
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
                                    <div class="app-card-body p-3 p-lg-4" style="margin-left: -60px;">
                                      <div class="chart-container">
                                              <canvas id="chart-pie" ></canvas>
                                      </div>
                                    </div><!--//app-card-body-->
                                  </div><!--//app-card-->
                                </div><!--//col-->

                            </div><!--//row-->
                          </div>
                      </div>
        </div><!--//faq2-accordion-->
      <h1 class="app-page-title mb-4">Inventario 2021</h1>
      <div class="app-card shadow-sm mb-4 border-left-decoration">
        <div class="inner">
          <div class="app-card-body p-4">
            <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-9">
                  <div>También puede revisar el <a href="https://www.chartjs.org/" target="_blank">flujo de revisión</a> de los contratos en "proceso de validación"  aldar click en el icono <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                    </svg>ubicado en la descripción de los contratos "que se encuentren sin formalizar".

                   </div>
              </div><!--//col-->
              <div class="col-12 col-lg-3">
                <a class="btn app-btn-primary" href="Contratos_Revision.php" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
<path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
</svg>Flujo de Revisión</a>
              </div><!--//col-->
            </div><!--//row-->
          </div><!--//app-card-body-->
        </div><!--//inner-->
      </div><!--//app-card-->
      <table class="table table-striped table-hover" id="Table">
  <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
    <tr>
      <th scope="col"></th>
      <th scope="col">Número</th>
      <th scope="col">Descripción</th>
      <th scope="col">Administrador</th>
      <th scope="col">Termino</th>
      <th scope="col">Máximo</th>
      <th scope="col">Devengado</th>
    </tr>
  </thead>
  <tbody style="font-size: 0.875rem !important;">

    <?php foreach ($data1 as $us) { ?>
      <tr>
        <td>
          <?php if ($us['estado'] == 4) { ?>
            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
              <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
          <?php } elseif ($us['estado'] == 2) { ?>
            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
          <?php } elseif ($us['estado'] == 3) { ?>
            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
              <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
          <?php } elseif ($us['estado'] == 1) { ?>
            <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
          <?php } ?>
        </td>
        <td><?php echo $us['numero']; ?></td>
        <td><?php echo $us['descripcion']; ?></td>
        <td><?php echo $us['administrador']; ?></td>
        <td><?php echo $us['termino']; ?></td>
        <td><?php echo $us['maximo']; ?></td>
        <td><?php echo $us['devengo']; ?></td>
      </tr>
    <?php } ?>

  </tbody>
</table>

        </div>
      </div>
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-4">
				    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
					    <div class="app-card app-card-doc shadow-sm h-100">

                <div class="app-card-thumb-holder p-3">
							    <span class="icon-holder">
	                                <i class="fas fa-file-pdf pdf-file"></i>
	                            </span>
	                             <a class="app-card-link-mask" href="#file-link"></a>
						    </div>
						    <div class="app-card-body p-3 has-card-actions">

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Descarga/a></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">Formato:</span> PDF</li>
									    <li><span class="text-muted">Peso (promedio):</span> 3MB</li>
									    <li><span class="text-muted">Vigencia:</span> 2021o</li>
								    </ul>
							    </div><!--//app-doc-meta-->

							    <div class="app-card-actions">
								    <div class="dropdown">
									    <div class="dropdown-toggle no-toggle-arrow" data-toggle="dropdown" aria-expanded="false">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
									    </div><!--//dropdown-toggle-->
									    <ul class="dropdown-menu dropdown-menu-right">
										    <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>View</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	</svg>Edit</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
	</svg>Download</a></li>
	                                        <li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg>Delete</a></li>
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
              <div class="app-card app-card-doc shadow-sm h-100">
						    <div class="app-card-thumb-holder p-3">
							    <span class="icon-holder">
	                                <i class="fas fa-file-excel excel-file"></i>
	                            </span>
	                             <a class="app-card-link-mask" href="#file-link"></a>
						    </div>
						    <div class="app-card-body p-3 has-card-actions">

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Relación</a></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">Formato:</span> Macro Excel</li>
									    <li><span class="text-muted">Peso:</span> 2 MB</li>
									    <li><span class="text-muted">Actualización:</span> 2 de maro 2021</li>
								    </ul>
							    </div><!--//app-doc-meta-->

							    <div class="app-card-actions">
								    <div class="dropdown">
									    <div class="dropdown-toggle no-toggle-arrow" data-toggle="dropdown" aria-expanded="false">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
									    </div><!--//dropdown-toggle-->
									    <ul class="dropdown-menu dropdown-menu-right">
										    <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>View</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	</svg>Edit</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
	</svg>Download</a></li>
	                                        <li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg>Delete</a></li>
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->

						    </div><!--//app-card-body-->

						</div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

              </div><!--//app-card-body-->
            </div>
          </div>
        </div>
      </div>
    </div><!--//app-wrapper-->
    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>

 <?php } ?>

<?php pie() ?> <!-- Pone el fotter -->