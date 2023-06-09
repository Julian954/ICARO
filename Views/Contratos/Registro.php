<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 4){ ?> <!-- Si es Admin o Interno Juridico -->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
	  <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">			    
		    <h1 class="app-page-title">Contratos/Convenios</h1>
		    <hr class="mb-4">
          <div class="row g-4 settings-section">
	          <div class="col-12 col-md-4">
	            <h3 class="section-title">Nuevo Contrato/Convenio</h3>
	            <div class="section-intro">Favor de llenar toda la información del Contrato o Convenio que desea registrar.</div><br>
                <?php if (isset($_GET['msg'])) {
                    $alert = $_GET['msg'];
                    if ($alert == "existe") { ?>
                        <div class="alert alert-warning" role="alert">
	                        <h3 class="section-title">ATENCIÓN</h3>
	                        <div class="section-intro">Ya existe un Contrato con ese número.</div>
                        </div>
                    <?php } else if ($alert == "error") { ?>
                        <div class="alert alert-danger" role="alert">
	                        <h3 class="section-title">ERROR</h3>
	                        <div class="section-intro">No se pudo registrar el Contrato, intente de nuevo o cantacte a soporte.</div>
                        </div>
                    <?php }
                } ?>
	          </div>
	          <div class="col-12 col-md-8">
	            <div class="app-card app-card-settings shadow-sm p-4">
					      <div class="app-card-body">
                  <form method="POST" action="<?php echo base_url(); ?>Contratos/agregar" autocomplete="off">
                    <div class="mb-3">
                      <label for="numero" class="form-label" style="color:#000000;">Número de Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                      <circle cx="8" cy="4.5" r="1"/>
                      </svg></span></label>
                      <input type="text" class="form-control" id="numero" name="numero" value="" required>
                    </div>
                    <div class="mb-3">
                      <label for="descripcion" class="form-label">Descripción del Contrato</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" cols="auto" rows="auto" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="area" class="form-label">Area Requirente</label>
                      <select class="form-control" id="area" name="area" required>
                        <?php foreach ($data1 as $area) { ?>
                          <option> <?php echo $area['area'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="tipo" class="form-label">Tipo del Contrato</label>
                      <select class="form-control" id="tipo" name="tipo" required>
                        <?php foreach ($data2 as $tipo) { ?>
                          <option> <?php echo $tipo['tipo'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
                  <div class="mb-3">
                   <label for="date" class="form-label" style="color:#000000;">Término</label>
                   <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="termino" name="termino" value="" require>
                  </div>
                  <div class="mb-3">
                      <label for="number" class="form-label" style="color:#000000;">Máximo $</label>
                      <input type="number" min="0" class="form-control" id="maximo" name="maximo" value="" required>
                  </div>
                  <div class="mb-3">
                      <label for="setting-input-3" class="form-label" style="color:#000000;">No. Fianza</label>
                      <input type="text" class="form-control" id="fianza" name="fianza" value="" required>
                  </div>
                  <div class="mb-3">
                    <label for="plataforma" class="form-label" style="color:#000000;">Plataforma de carga</label>
                    <select class="form-control" id="plataforma" name="plataforma" required>
                      <?php foreach ($data3 as $plataforma) { ?>
                        <option> <?php echo $plataforma['plataforma'] ?></option>
                       <?php } ?>
                    </select>
                  </div>
                  <button type="submit" class="btn app-btn-primary">Agregar Contrato</button>
                </form>
					    </div><!--//app-card-body-->
					  </div><!--//app-card-->
	        </div>
        </div><!--//row-->
	    </div><!--//container-fluid-->
	  </div><!--//app-content-->
  </div><!--//app-wrapper-->    
  					
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->