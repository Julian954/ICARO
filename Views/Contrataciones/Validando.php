<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 4 || $_SESSION['rol'] == 2){ ?> <!-- Si es Admin, Jefatura, Interno Juridico o Requeriente -->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">
        <?php if($_SESSION['rol'] == 7){ ?> <!-- Si es Admin -->
          <div class="position-relative mb-3">
            <div class="row g-3 justify-content-between">
              <div class="col-auto">
                <h1 class="app-page-title mb-0">Asignar Validador</h1>
              </div>
            </div>
          </div>
          <div class="app-card shadow-sm mb-4 border-left-decoration">
          	<div class="inner">
          		<div class="app-card-body p-4">
          			<div class="row gx-5 gy-3">
          			  <div class="col-12 col-lg-9">
          				  <div> Asigna un responsable para validar el contrato creado.</div>
          				</div><!--//col-->
          			  <div class="col-12 col-lg-3">
                    <button class="btn app-btn-primary" data-toggle="modal" data-target="#Modal1">Asigna un validador al instrumento</button>
          			  </div><!--//col-->
          			</div><!--//row-->
              </div><!--//app-card-body-->
            </div><!--//inner-->
          </div><!--//app-card-->
        <?php } ?>
        <div class="position-relative mb-3">
          <div class="row g-3 justify-content-between">
            <div class="col-auto">
              <h1 class="app-page-title mb-0">Seguimiento</h1>
            </div>
          </div>
        </div>
        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
          <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-no" role="tab" aria-controls="orders-no" aria-selected="true">Requerimientos Sin Asignar</a>
          <a class="flex-sm-fill text-sm-center nav-link" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="false">Requerimientos Asignados</a>
          <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Requerimientos Validados</a>
        </nav>
        <div class="tab-content" id="orders-table-tab-content">
          <div class="tab-pane fade show active" id="orders-no" role="tabpanel" aria-labelledby="orders-no-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
              <div class="app-card-body p-3">
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table">
			  				    <thead>
			  					    <tr>
                        <th scope="col"></th>    
                        <th scope="col">Requerimiento</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Validador</th>                
                        <th scope="col">No. Intentos</th>
                        <th scope="col">Foro</th>
			  					    </tr>
			  				    </thead>
			  				    <tbody>
                      <?php foreach ($data4 as $no) { ?>
                        <?php if ($no['estado'] == 1 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['id'] == $no['id_validador'] || $_SESSION['id'] == $no['id_creador'])) { ?>
			  				      	<tr>
                          <td>
                            <?php if ($no['estado'] == 2) { ?>
                              <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z" /></svg>
                            <?php } elseif ($no['estado'] == 3) { ?>
                              <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" /></svg>
                            <?php } elseif ($no['estado'] == 4) { ?>
                              <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z" /></svg>
                            <?php } elseif ($no['estado'] == 1) { ?>
                              <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z" /></svg>
                            <?php } ?>
                          </td>
                          <td><?php echo $no['id_contrato']; ?></td>
                          <td><?php echo $no['fecha']; ?></td>
                          <td><?php echo $no['creador']; ?></td>
                          <td>SIN ASIGNAR</td>
                          <td><?php echo $no['intentos'];?></td>
                          <td><a href="<?php echo base_url(); ?>Contrataciones/Foro?contrato=<?php echo $no['id_contrato']; ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                              <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                            </svg>
                          </a></td>
                        <?php } ?>
                      <?php }?>
			  				    </tbody>
			  			    </table>
                </div><!--//table-responsive-->
              </div><!--//app-card-body-->
            </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
          </div><!--//tab-pane fade show active-->
          <div class="tab-pane fade show" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
              <div class="app-card-body p-3">
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table2">
			  				    <thead>
			  					    <tr>
                        <th scope="col"></th>    
                        <th scope="col">Requerimiento</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Validador</th>                
                        <th scope="col">No. Intentos</th>
                        <th scope="col">Foro</th>
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
                            <td><a href="<?php echo base_url(); ?>Contrataciones/Foro?contrato=<?php echo $validar['id_contrato']; ?>">
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
			  			    </table>
                </div><!--//table-responsive-->
              </div><!--//app-card-body-->
            </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
          </div><!--//tab-pane fade show active-->
          <div class="tab-pane fade show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
              <div class="app-card-body p-3">
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left" id="Table3">
			  				    <thead>
			  					    <tr>
                        <th scope="col"></th>    
                        <th scope="col">Requerimiento</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Validador</th>                 
                        <th scope="col">No. Intentos</th>
                        <th scope="col">Foro</th>
			  					    </tr>
			  				    </thead>
			  				    <tbody>
                      <?php foreach ($data1 as $validar) { ?>
                        <?php if ($validar['estado'] > 2 && ($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['id'] == $validar['id_validador'] || $_SESSION['id'] == $validar['id_creador'])) { ?>
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
                          <td><a href="<?php echo base_url(); ?>Contrataciones/Foro?contrato=<?php echo $validar['id_contrato']; ?>">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                              <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                            </svg>
                            </a>
                          </td>
                        <?php } ?>
                      <?php }?>
			  				    </tbody>
			  			    </table>
                </div><!--//table-responsive-->
			  	    </div><!--//app-card-body-->		
			  	  </div><!--//app-card-->
				  </div><!--//app-card-body-->
				</div><!--//app-card-->
		  </div><!--//tab-pane-->
    </div><!--//tab-content-->
  </div><!--//app-wrapper-->

  <div id="Modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="my-modal-title">Asignar Validador</h5>
            <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formulario1" method="post" action="<?php echo base_url(); ?>Contrataciones/agregar_validadcont" autocomplete="off" enctype="multipart/form-data"">
          <div class="modal-body">
            <div class="form-group">
              <label for="setting-input-3" class="form-label" style="color:#000000;">No.Trabajador y Nombre </label>
              <select class="form-control" name="miSelect1" id="miSelect1">
                <?php foreach ($data2 as $fila){ ?>
                  <option value="<?php echo $fila['id']; ?>"><?php echo $fila['usuario']." - ".$fila['nombre']; ?></option>                
                <?php } ?>
              </select>   
            </div>
            <div class="form-group">
              <label for="miSelect2" class="form-label" style="color:#000000;">Requerimiento</label>
              <select class="form-control" name="miSelect2" id="miSelect2">
                <?php foreach ($data3 as $filacont): ?>      
                  <option value="<?php echo $filacont['nooficio']; ?>"><?php echo $filacont['nooficio']; ?></option>                           
                <?php endforeach; ?>
              </select> 
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Registrar</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->