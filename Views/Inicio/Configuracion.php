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
							        <form class="settings-form" action="<?php echo base_url() ?>Inicio/ActualizaeDevengo" method="post">
								        <div class="mb-3 d-flex justify-content-between align-items-center">
								    	    <label for="area" class="form-label">Actualizar Devengo
                                                <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Presiona el boton para actualizar el devengo">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                        <circle cx="8" cy="4.5" r="1"/>
                                                    </svg>
                                                </span>
                                            </label>
                                            <button class="btn app-btn-primary" type="submit" id="button-addon2">Actualizar</button>
								    	</div>
                                    </form> 
						    </div><!--//app-card-body-->  
						</div><br><!--//app-card-->

		                <div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <form class="settings-form" action="<?php echo base_url() ?>Inicio/AgregarArea" method="post">
								    <div class="mb-3">
									    <label for="area" class="form-label">Áreas Requirientes
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresa las áreas requirientes">
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
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresa los tipos de contrato">
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
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresa la plataforma">
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
									<br>
						<div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <form class="settings-form" action="<?php echo base_url() ?>Inicio/AgregarTipoContratacion" method="post">
								    <div class="mb-3">
									    <label for="tipocontrata" class="form-label">Tipo de Contrataciones
                                            <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresa los tipos de contratacion">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                    <circle cx="8" cy="4.5" r="1"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control" id="tipocontrata" name="tipocontrata" placeholder="Tipos de Contratacion" required">
                                          <button class="btn app-btn-primary" type="submit" id="button-addon2">Agregar</button>
                                        </div>
									</div>
							    </form>
						    </div><!--//app-card-body--> 
                            <div class="app-card-footer">
                                <hr>
                                <?php foreach ($data4 as $tipocontrata) { ?>
                                        <form action="<?php echo base_url() ?>Inicio/EliminarTipoContratacion?id=<?php echo $tipocontrata['id']; ?>" method="post" class="d-inline elim">
                                            <button title="Eliminar" type="submit" class="btn app-btn-primary mb-2"><?php echo $tipocontrata['tipoco']?> <i class="fas fa-trash"></i></button>
                                        </form>
                                <?php } ?>
                            </div><!--//app-card-body--> 
						</div><!--//app-card-->
	                </div>
					
                </div><!--//row-->


                <hr class="my-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Dictamen</h3>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">						    
						    <div class="app-card-body">
                                <div class="col-lg-8 mb-2 py-2">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_dictamen"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#archivoDictamen"><i class="fas fa-plus-circle"></i> Subir Archivo</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-center" id="Table5">
			  					        <thead>
			  						        <tr>
                                              <th scope="col">Dictamen</th>
                                              <th scope="col">Monto</th>
                                              <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data5 as $us) { ?>
                                               <tr>
                                                 <td><?php echo $us['dictamen']; ?></td>
                                                 <td>$<?php echo $us['montomax']; ?> mxn</td>
                                                 <td>
                                                    <form id="formulario2" action="<?php echo base_url() ?>Inicio/eliminardictamen?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                        <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                 </td>
                                                
                                                    <?php } ?>
                                                </tr>
                                        </tbody>
                                    </table>  
                                </div>
						    </div><!--//app-card-body-->						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->

    <div id="nuevo_dictamen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title"> Nuevo Dictamen</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url(); ?>Inicio/insertar" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dictamen">No.Dictamen</label>
                            <input id="dictamen" class="form-control" type="text" name="dictamen" placeholder="No.Dictamen" required>
                        </div>
                        <div class="form-group">
                            <label for="monto">Monto</label>
                            <input id="monto" class="form-control" type="text" name="monto" placeholder="Monto Maximo" required>
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
    <div id="archivoDictamen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nuevos Dictamenes</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Inicio/procesarArchivo" method="post" enctype="multipart/form-data" id="formulario">
						<div class="form-group">
                    	    <label for="img">Selecciona Archivo</label>
                    	    <div class="custom-file">
                    	      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo_csv" required>
                    	      <label class="custom-file-label" for="customFile"></label>
                    	      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    	    </div>
                    	</div>
						<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>
					</form>
                </div>
            </div>
        </div>
    </div>   					

<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->