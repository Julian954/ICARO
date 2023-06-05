<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Contrataciones</h1>
			    <div class="app-card app-card-accordion shadow-sm mb-4">
				    <div class="app-card-header p-3">
				      <h4 class="app-card-title">Nueva Contratacion</h4>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4" style="padding-top:20px; important!">
              <div class="app-card-body">
              <form method="POST" action="<?php echo base_url(); ?>Contrataciones/agregar" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="oficio" class="form-label" style="color:#000000;">Numero de Oficio<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                    <circle cx="8" cy="4.5" r="1"/>
                    </svg></span></label>
                    <input type="text" class="form-control" id="NoOficio" name="NoOficio" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="setting-input-2" class="form-label">Descripción del Requerimiento</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="" required>
                  </div>

                  <div class="form-group">
                    <label for="setting-input-3" class="form-label">Tipo de Contratacion</label>
                    <select class="form-control" id="tipocontrata" name="tipocontrata" required>
                      <?php foreach ($data4 as $tipocontrata) { ?>
                        <option> <?php echo $tipocontrata['tipoco'] ?></option>
                       <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="setting-input-3" class="form-label">Area Requirente</label>
                    <select class="form-control" id="Area" name="Area" required>
                      <?php foreach ($data1 as $area) { ?>
                        <option> <?php echo $area['area'] ?></option>
                       <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="setting-input-3" class="form-label">Tipo de Contrato</label>
                    <select class="form-control" id="Contrato" name="Contrato" required>
                      <?php foreach ($data2 as $tipo) { ?>
                        <option> <?php echo $tipo['tipo'] ?></option>
                       <?php } ?>
                    </select>
                  </div>

                 <div class="form-group">
                 <label for="setting-input-3" class="form-label" style="color:#000000;">Término</label>
                 <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="Termino" name="Termino" value="" require>
                 </div>

                  <div class="form-group">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Monto Máximo $</label>
                    <input type="number" min="0" class="form-control" id="Maximo" name="Maximo" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">No. Dictamen</label>
                    <input type="text" class="form-control" id="Dictamen" name="Dictamen" value="" required>
                  </div>

                    <div class="form-group text-center">
                      <span>Subir Archivo:</span>
										  <input type="file" id ="archivo_cont" name="archivo_cont" required>
						        </div>

                  <div class="form-group">
                    <label for="setting-input-3" class="form-label" style="display: none;">Inicio</label>
                    <input type="hidden" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                  
                  <button type="submit" class="btn app-btn-primary mb-2">Agregar Contratacion</button>

                </form>
              </div><!--//app-card-body-->
				    </div><!--//app-card-body-->
				</div><!--//app-card desde aqui borrar-->
		  </div><!--//container-fluid-->
	  </div><!--//app-content-->
    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->