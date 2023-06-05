<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Configuración</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Contratos</h3>
		                <div class="section-intro">Ponga en el input la categoría que desea agregar y oprima el botón. Para eliminar presione la categoría que desea eliminar. <a href="#">Ayuda</a></div>
	                </div>

	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <form class="settings-form" action="<?php echo base_url() ?>Inicio/AgregarArea" method="post">
								    <div class="mb-3">
									    <label for="area" class="form-label">Áreas Requirientes
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem Ipsum Ltd.">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                    <circle cx="8" cy="4.5" r="1"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="area" name="area" placeholder="Area" required">
                                          <button class="btn app-btn-primary" type="submit" id="button-addon2">Agregar</button>
                                        </div>
									</div>
							    </form>
						    </div><!--//app-card-body--> 
                            <div class="app-card-footer">
                                <hr>
                                <?php foreach ($data1 as $area) { ?>
                                        <form action="<?php echo base_url() ?>Inicio/EliminarArea?id=<?php echo $area['id']; ?>" method="post" class="d-inline elim">
                                            <button title="Eliminar" type="submit" class="btn app-btn-primary mb-2"><?php echo $area['area']?> <i class="fas fa-trash"></i></button>
                                        </form>
                                <?php } ?>
                            </div><!--//app-card-body--> 
						</div><br><!--//app-card-->

		                <div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <form class="settings-form" action="<?php echo base_url() ?>Inicio/AgregarTipo" method="post">
								    <div class="mb-3">
									    <label for="tipo" class="form-label">Tipos de Contrato
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem Ipsum Ltd.">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                    <circle cx="8" cy="4.5" r="1"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de Contrato" required">
                                          <button class="btn app-btn-primary" type="submit" id="button-addon2">Agregar</button>
                                        </div>
									</div>
							    </form>
						    </div><!--//app-card-body--> 
                            <div class="app-card-footer">
                                <hr>
                                <?php foreach ($data2 as $tipo) { ?>
                                        <form action="<?php echo base_url() ?>Inicio/EliminarTipo?id=<?php echo $tipo['id']; ?>" method="post" class="d-inline elim">
                                            <button title="Eliminar" type="submit" class="btn app-btn-primary mb-2"><?php echo $tipo['tipo']?> <i class="fas fa-trash"></i></button>
                                        </form>
                                <?php } ?>
                            </div><!--//app-card-body--> 
						</div><br><!--//app-card-->

		                <div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <form class="settings-form" action="<?php echo base_url() ?>Inicio/AgregarPlataforma" method="post">
								    <div class="mb-3">
									    <label for="plataforma" class="form-label">Plataformas
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Lorem Ipsum Ltd.">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                    <circle cx="8" cy="4.5" r="1"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="plataforma" name="plataforma" placeholder="Plataforma" required">
                                          <button class="btn app-btn-primary" type="submit" id="button-addon2">Agregar</button>
                                        </div>
									</div>
							    </form>
						    </div><!--//app-card-body--> 
                            <div class="app-card-footer">
                                <hr>
                                <?php foreach ($data3 as $Plataforma) { ?>
                                        <form action="<?php echo base_url() ?>Inicio/EliminarPlataforma?id=<?php echo $Plataforma['id']; ?>" method="post" class="d-inline elim">
                                            <button title="Eliminar" type="submit" class="btn app-btn-primary mb-2"><?php echo $Plataforma['plataforma']?> <i class="fas fa-trash"></i></button>
                                        </form>
                                <?php } ?>
                            </div><!--//app-card-body--> 
						</div><!--//app-card-->
	                </div>
					
                </div><!--//row-->



				<hr class="my-4">
               	 	<div class="row g-4 settings-section">
	                	<div class="col-12 col-md-4">
		                	<h3 class="section-title">Documentos Negadas</h3>
		                	<div class="section-intro">Apartado para subir los archivos diarios</div>
	                	</div>
	                	<div class="col-12 col-md-8">
		                	<div class="app-card app-card-settings shadow-sm p-4">
							<label for="plataforma" class="form-label">Medicamentos Negados</label>
						    	<div class="app-card-body text-center">
									<form action="<?php echo base_url() ?>Inicio/subir_archivo" method="POST" enctype="multipart/form-data">
  										<div>
											<input type="file" name="archivo_csv" accept=".csv" required>
											<input type="submit" value="Subir Archivo" class="btn app-btn-primary mb-2">
										</div>
									</form>
						    	</div><!--//app-card-body-->
						    
							</div><!--//app-card-->
	               		 </div>
                	</div><!--//row-->


                <hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Documentos Recetas</h3>
		                <div class="section-intro">Apartado para subir los archivos diarios</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						<label for="plataforma" class="form-label">Recetas</label>
						    <div class="app-card-body text-center">
								<form action="<?php echo base_url() ?>Inicio/subir_archivo" method="POST" enctype="multipart/form-data">
  									<div>
										<input type="file" name="archivo_csv" accept=".csv" required>
										<input type="submit" value="Subir Archivo" class="btn app-btn-primary mb-2">
									</div>
								</form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->

                <hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Data &amp; Privacy</h3>
		                <div class="section-intro">Settings section intro goes here. Morbi vehicula, est eget fermentum ornare. </div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">						    
						    <div class="app-card-body">
							    <form class="settings-form">
								    <div class="form-check mb-3">
										<input class="form-check-input" type="checkbox" value="" id="settings-checkbox-1" checked>
										<label class="form-check-label" for="settings-checkbox-1">
										    Keep user app activity history
										</label>
									</div><!--//form-check-->
									<div class="form-check mb-3">
									    <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-2" checked>
										<label class="form-check-label" for="settings-checkbox-2">
										    Keep user app preferences
										</label>
									</div>
									<div class="form-check mb-3">
									    <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-3">
										<label class="form-check-label" for="settings-checkbox-3">
										    Keep user app search history
										</label>
									</div>
									<div class="form-check mb-3">
									    <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-4">
										<label class="form-check-label" for="settings-checkbox-4">
										    Lorem ipsum dolor sit amet
										</label>
									</div>
									<div class="form-check mb-3">
									    <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-5">
										<label class="form-check-label" for="settings-checkbox-5">
										    Aenean quis pharetra metus
										</label>
									</div>
									<div class="mt-3">
									    <button type="submit" class="btn app-btn-primary" >Save Changes</button>
									</div>
							    </form>
						    </div><!--//app-card-body-->						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                <hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Notifications</h3>
		                <div class="section-intro">Settings section intro goes here. Duis velit massa, faucibus non hendrerit eget.</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">						    
						    <div class="app-card-body">
							    <form class="settings-form">
								    <div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
										<label class="form-check-label" for="settings-switch-1">Project notifications</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" id="settings-switch-2">
										<label class="form-check-label" for="settings-switch-2">Web browser push notifications</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" id="settings-switch-3" checked>
										<label class="form-check-label" for="settings-switch-3">Mobile push notifications</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" id="settings-switch-4">
										<label class="form-check-label" for="settings-switch-4">Lorem ipsum notifications</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" id="settings-switch-5">
										<label class="form-check-label" for="settings-switch-5">Lorem ipsum notifications</label>
									</div>
									<div class="mt-3">
									    <button type="submit" class="btn app-btn-primary" >Save Changes</button>
									</div>
							    </form>
						    </div><!--//app-card-body-->						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    <hr class="my-4">
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->