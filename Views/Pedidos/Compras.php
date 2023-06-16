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

          <div class="app-card app-card-notification shadow-sm">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <img class="profile-image" src="../Assets/img/users/<?php echo $_SESSION['perfil'];?>" alt="">
					        </div><!--//col-->
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-info">Oficina de Adquisiciones</span></div>
						        <h4 class="notification-title mb-1"><?php echo $_SESSION['nombre']; ?> </h4>

						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?php echo $_SESSION['correo']; ?></li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item"><?php echo $_SESSION['telefono']; ?></li>
						        </ul>

					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					    <div class="notification-content">Texto del Jefe de Oficina. Resumen de Solicitudes de Contratos o Convenio Recibidas, Instrumentos Elaborados, Instrumentos en validación con el àrea furidica, y formalizados, etc.</div>
				    </div><!--//app-card-body-->
				</div><!--//app-card-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
      <div class="app-content p-lg-4" style="margin-top:-25px !important; padding-top:-25px !important;">

	  

	  	
	 
                <div class="app-card app-card-stats-table h-100 shadow-sm">
                    
                    <div class="app-card-body p-3 p-lg-4"> 
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
										<th style="text-align:center; width:200px">Datos</th>
										<th style="text-align:center; width:100px">Cantidad</th>
										<th style="text-align:center">Progreso</th>
									</tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td  >Total Pedidos</td>
                                        <td style="text-align:center">10</td>
                                        <td class="stat-cell"><div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>                                        
                                    </tr>
                                    <tr>
                <td  >Pedidos Medicamento</td>
                                        <td style="text-align:center">107</td>
                                        <td ><div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
                </tr>
              <tr>
                <td >Pedidos Curación</td>
                                        <td style="text-align:center">1076</td>
                                        
                <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
              </tr>
              <tr>
                <td >Otros Pedidos</td>
                                        <td style="text-align:center">1079</td>
                                        
                <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
              </tr>
              <tr>
                <td >Total </td>
                                        <td style="text-align:center">1079</td>                                        
                <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
                                    </tr>
									<tr>
                <td>Total Entregado</td>
                                        <td style="text-align:center">1079</td>                                        
                <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
                                    </tr>
									<tr>
                <td>Total</td>
                                        <td style="text-align:center">1079</td>                                        
                <td class="stat-cell">
				<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body p-3-->
                </div><!--//app-card app-card-stats-table h-100 shadow-sm-->
            <!--//col-12 col-lg-6-->


       


        <div class="card-body" style="border-color:#59d05d !important;">
      <h1 class="app-page-title mb-4">Autorizaciones PAC/Correo 2021</h1>

          <table class="table table-head-bg-success table-striped table-hover">
            <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
              <tr>
                <th scope="col"></th>
                <th scope="col"><span></span>Pedido</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Qty</th>
                <th scope="col">Top10</th>
                <th scope="col">Alta</th>
                <th scope="col">$ Monto</th>
                <th scope="col">$ Pagado</th>
                <th scope="col" style="background-color:#f5f6fe !important;"></th>
</tr>
            </thead>
            <tbody style="font-size: 0.875rem !important;">
              <tr>
                <td>1</td>
                <td><span style="font-weight:bold;">D1P0001</span></td>
                <td>Mediliver</td>
                <td>Medicamento</td>
                <td>2 claves</td>
                <td>Si</td>
                <td>1/01/2021</td>
                <td>$3,500,00.00</td>
                <td>$500,00.00</td>
                <td style="background:#f5f6fe !important;">
                    <svg width="1em" height="1em" viewBox="0 0 512 512" class="" fill="green" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/>
                  </svg>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><span style="font-weight:bold;">D1P0001</span></td>
                <td>Mediliver</td>
                <td>Medicamento</td>
                <td>2 claves</td>
                <td>Si</td>
                <td>1/01/2021</td>
                <td>$3,500,00.00</td>
                <td>$500,00.00</td>
                <td style="background:#f5f6fe !important;">
                  <svg width="1em" height="1em" viewBox="0 0 512 512" class="" fill="green" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/>
                </svg>
               &nbsp; &nbsp;  <svg width="1em" height="1em" viewBox="0 0 640 512" class="" fill="green" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h16c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"/>
              </svg>
                </td>

              </tr>
              <tr>
                <td>3</td>
                <td><span style="font-weight:bold;">D1P0001</span></td>
                <td>Mediliver</td>
                <td>Medicamento</td>
                <td>2 claves</td>
                <td>Si</td>
                <td>1/01/2021</td>
                <td>$3,500,00.00</td>
                <td>$500,00.00</td>
                <td style="background:#f5f6fe !important;">
                  <svg width="1em" height="1em" viewBox="0 0 512 512" class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/>
                </svg>
                </td>
              </tr>
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

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Descarga</a></h4>
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

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Listado</a></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">Formato:</span>Macro Excel</li>
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

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
	
	<?php } ?>

<?php pie() ?>