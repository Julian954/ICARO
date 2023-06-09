<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Carga de archivos Excel</h1>
			 
				<hr class="my-4">
               	 	<div class="row g-4 settings-section">
	                	<div class="col-12 col-md-4">
		                	<h3 class="section-title">Indicadores</h3>
		                	<div class="section-intro">Apartado para subir los archivos diarios</div>
	                	</div>

	                	<div class="col-12 col-md-8">
		                	<div class="app-card app-card-settings shadow-sm p-4">
							<label for="plataforma" class="form-label">Indicadores</label>
                            <div class="mb-3">
                 <label for="date" class="form-label" style="color:#000000;">Fecha</label>
                 <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="fecha" name="fecha" value="" require>
                </div><br>
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
		                <h3 class="section-title">Negadas</h3>
		                <div class="section-intro">Apartado para subir los archivos diarios</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						<label for="plataforma" class="form-label">Negadas</label>
                        <div class="mb-3">
                 <label for="date" class="form-label" style="color:#000000;">Fecha</label>
                 <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="fecha" name="fecha" value="" require>
                </div><br>
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
		                	<h3 class="section-title">Faltas Nacionales</h3>
		                	<div class="section-intro">Apartado para subir los archivos diarios</div>
	                	</div>
	                	<div class="col-12 col-md-8">
		                	<div class="app-card app-card-settings shadow-sm p-4">
							<label for="plataforma" class="form-label">Faltas Nacionales</label>
                            <div class="mb-3">
                 <label for="date" class="form-label" style="color:#000000;">Fecha</label>
                 <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="fecha" name="fecha" value="" require>
                </div><br>
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
		                <h3 class="section-title">Pedidos</h3>
		                <div class="section-intro">Apartado para subir los archivos diarios</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						<label for="plataforma" class="form-label">Pedidos</label>
                        <div class="mb-3">
                 <label for="date" class="form-label" style="color:#000000;">Fecha</label>
                 <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="fecha" name="fecha" value="" require>
                </div><br>
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
<br></div>

	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper--> 
	   					
<div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-upload"></i> Cargar Productos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Productos/subirarchivo" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo">
                            <label class="custom-file-label" for="customFile"></label>
                            <label><br><strong>Nota:</strong> Favor de solo subir el formato que se proporciona editado con los productos, si no sabe como usar el formato dirigase al módulo Ayuda->Materiales. El tamaño máximo del archivo debe ser menor a 20 MB.</label>
                        </div>
                    </div>
                    <button class="btn btn-success mb-2" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Registrar</button>
                    <a href="<?php echo base_url() ?>Assets/archivos/plantillas/PlantillaProductos.csv" class="btn btn-primary mb-2"><i class="fas fa-download"></i> Formato</a>
                    <button class="btn btn-danger mb-2" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->