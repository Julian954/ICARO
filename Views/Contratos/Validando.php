<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el header -->
<?php } else { ?> <!-- En caso de ser válido -->
  <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
            <div class="position-relative mb-3">
                <div class="row g-3 justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Nueva Validación</h1>
                    </div>
                </div>
            </div>

            <div class="app-card shadow-sm mb-4 border-left-decoration">
            	<div class="inner">
            		<div class="app-card-body p-4">
            			<div class="row gx-5 gy-3">
            			  <div class="col-12 col-lg-9">
            				  <div> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim eum, corrupti expedita nam consequatur blanditiis fugit labore minus a provident beatae architecto, nulla neque adipisci minima. Facere autem eius id?</div>
            				</div><!--//col-->
            			  <div class="col-12 col-lg-3">
                      <button class="btn app-btn-primary" data-toggle="modal" data-target="#VentanaModal">Cargar Contratos de Validación</button>
            			  </div><!--//col-->
            			</div><!--//row-->
                </div><!--//app-card-body-->
              </div><!--//inner-->
            </div><!--//app-card-->
                
            <div class="position-relative mb-3">
                <div class="row g-3 justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Seguimiento</h1>
                    </div>
                </div>
            </div>
				    <div class="tab-content" id="orders-table-tab-content">
			          <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
				    	    <div class="app-card app-card-orders-table shadow-sm mb-5">
				    		    <div class="app-card-body">
				    			    <div class="table-responsive">
				    			      <table class="table app-table-hover mb-0 text-left" id="Table">
				    						  <thead>
				    							  <tr>
                              <th scope="col"></th>    
                              <th scope="col">Contrato</th>
                              <th scope="col">Fecha de creacion</th>
                              <th scope="col">Interno Juridico</th>
                              <th scope="col">Externo Juridico</th>                
                              <th scope="col">Estado</th>
                              <th scope="col">Ver</th>
				    							  </tr>
				    						  </thead>
				    						  <tbody>
                            <?php foreach ($data1 as $validar) { ?>
				    						    	<tr>
                                <td></td>
                                <td><?php echo $validar['id_contrato']; ?></td>
                                <td><?php echo $validar['fecha']; ?></td>
                                <td><?php echo $validar['id_creador']; ?></td>
                                <td><?php echo $validar['id_validador']; ?></td>
                                <td>2</td>
                                <td><a href="<?php echo base_url(); ?>Contratos/Foro?contrato=<?php echo $validar['id_contrato']; ?>">VER</a></td>
				    						    	</tr>
                            <?php }?>
				    						  </tbody>
				    					  </table>
				    		      </div><!--//table-responsive-->  
				    		    </div><!--//app-card-body-->		
				    		  </div><!--//app-card-->
						    </div><!--//app-card-body-->
						  </div><!--//app-card-->
			      </div><!--//tab-pane-->
          </div>
        </div><!--//tab-content-->
      </div>
    </div><!--//app-wrapper-->
    <div id="VentanaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Cargar Datos</h5>
                  <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?php echo base_url(); ?>Contratos/agregar_validadcont" autocomplete="off" enctype="multipart/form-data"">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="setting-input-3" class="form-label" style="color:#000000;">No.Trabajador y Nombre </label>
                      <select class="form-control" name="miSelect1" id="miSelect1">
                          <?php foreach ($data2 as $fila): ?>
                            <?php if($fila['rol']==3){ ?>
                              <option value="<?php echo $fila['usuario']; ?>"><?php echo $fila['usuario'] ." - ". $fila['nombre']; ?></option>     
                              <?php } ?>                
                          <?php endforeach; ?>
                      </select>   
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="miSelect2" id="miSelect2">
                        <?php foreach ($data3 as $filacont): ?>      
                            <option value="<?php echo $filacont['numero']; ?>"><?php echo $filacont['numero']; ?></option>                           
                        <?php endforeach; ?>
                      </select> 
                    </div>
                    <div class="form-group">
                      <label for="setting-input-2" class="form-label">Solicitante</label><!--utilizo el nombre de usuario que se encuentra logeado y lo uso en el campo solicitante--> 
                      <input type="text" class="form-control" id="yo" name="yo" value="<?php echo $_SESSION['usuario'] . " - ". $_SESSION['nombre'];?>" required disabled>   
                    </div>
                    <div class="form-group">
                      <label for="setting-input-2" class="form-label">Descripción del Contrato</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                    </div>
                    <div class="form-group">
                      <span>Subir Archivo:</span>
                      <input type="file" name="archivo" value=""/>
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

  <?php } ?>

 <?php pie() ?> <!-- Pone el fotter -->