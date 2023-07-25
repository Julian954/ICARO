<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 1){ ?> <!-- Si es Admin o Almacén -->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
	  <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">			    
		    <h1 class="app-page-title">Despachos</h1>
		    <hr class="mb-4">
          <div class="row g-4 settings-section">
	          <div class="col-12 col-md-4">
	            <h3 class="section-title">Nuevo Despacho</h3>
	            <div class="section-intro">Favor de llenar toda la información del Despacho que desea registrar.</div><br>
                <?php if (isset($_GET['msg'])) {
                    $alert = $_GET['msg'];
                    if ($alert == "existe") { ?>
                        <div class="alert alert-warning" role="alert">
	                        <h3 class="section-title">ATENCIÓN</h3>
	                        <div class="section-intro">Ya existe un Despacho con ese número.</div>
                        </div>
                    <?php } else if ($alert == "error") { ?>
                        <div class="alert alert-danger" role="alert">
	                        <h3 class="section-title">ERROR</h3>
	                        <div class="section-intro">No se pudo registrar el Despacho, intente de nuevo o cantacte a soporte.</div>
                        </div>
                    <?php } else if ($alert == "registrado") { ?>
                        <div class="alert alert-success" role="alert">
	                        <h3 class="section-title">REALIZADO</h3>
	                        <div class="section-intro">El despacho se creó con éxito.</div>
                        </div>
                    <?php }
                } ?>
	          </div>
	          <div class="col-12 col-md-8">
	            <div class="app-card app-card-settings shadow-sm p-4">
					      <div class="app-card-body">
                  <form id="formulario1" method="POST" action="<?php echo base_url(); ?>Despachos/agregar" autocomplete="off" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="numero" class="form-label" style="color:#000000;">Destino<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar la unidad a la que sera entregado el despacho"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                      <circle cx="8" cy="4.5" r="1"/>
                      </svg></span></label>
                      <select class="form-control" id="unidad" name="unidad">
                        <?php foreach($data1 as $unidades){?>
                        <option  value="<?=$unidades['id'];?>"><?=$unidades['abreviacion']." - ".$unidades['nombre'];?></option>
                        <?php }?>
                      </select>                      
                    </div>

                    <div class="mb-3">
                    <label class="form-label" style="color:#000000;">¿Contiene Negadas?</label>
                    			<div class="form-check form-switch" style="padding: 0px;">
                        <label class="form-check-label" style="padding: 0 40px 0 0;">NO</label>
										    <input class="form-check-input" type="checkbox" id="negadas" name="negadas" checked>
										    <label class="form-check-label" for="contrato">SI</label>
									    </div>
                    </div>                  
                  <div class="mb-3">
                      <label for="number" class="form-label" style="color:#000000;">Numero de Remision</label>
                      <input type="text"  class="form-control" id="remision" name="remision" value="" required>
                  </div>
                  <div class="mb-3">
                      <label for="eco" class="form-label" style="color:#000000;">ECO</label>
                      <input type="text"  class="form-control" id="eco" name="eco" value="" required>
                  </div>

                  <div class="mb-3">
                   <label for="date" class="form-label" style="color:#000000;">Fecha de Entrega</label>
                   <input type="datetime-local" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="entrega" name="entrega" value="" required>
                  </div>
                  
                <label for="img" style="color:#000000;"><strong>Selecciona Archivo</strong></label>
                <div class="custom-file">
                  
                    <input type="file" class="custom-file-input" name="archivo" required>
                    <label class="custom-file-label" for="customFile"></label>
                    <label><br><strong>Nota:</strong> Solo se permiten archivos PDF, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                </div>            
                        </div>                        
                  <button type="submit" class="btn app-btn-primary">Agregar Despacho</button>
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