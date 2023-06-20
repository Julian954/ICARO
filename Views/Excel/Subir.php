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
								<label for="indicadores" class="form-label">Indicadores</label>
								<div class="mb-3">
									<div class="app-card-body text-center">		
										<form action="<?php echo base_url(); ?>Indicadores/procesarArchivo" method="post" enctype="multipart/form-data">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fecha" name="fecha" required>
                    						</div>
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
									</div><!--//app-card-body-->
								</div>	
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
								<label for="negadas" class="form-label">Negadas</label>
								<div class="mb-3">
									<div class="app-card-body text-center">
										<form action="<?php echo base_url(); ?>Inicio/subir_archivo" method="post" enctype="multipart/form-data">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fechas" name="fechas" required>
                    						</div>
											<div class="form-group">
                    						    <label for="img">Selecciona Archivo</label>
                    						    <div class="custom-file">
                    						      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo" required>
                    						      <label class="custom-file-label" for="customFile"></label>
                    						      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    						    </div>
                    						</div>
											<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>
										</form>

									</div><!--//app-card-body-->
								</div>
								
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
								<label for="nacional" class="form-label">Faltas Nacionales</label>
								<div class="mb-3">
									<div class="app-card-body text-center">
										<form action="<?php echo base_url(); ?>Inicio/subir_rank" method="post">
											<label for="date" class="form-label" style="color:#000000;">Fecha</label>
											<input type="date" class="form-control" id="fecha" name="fecha" value="" require><br>
											<label for="text" class="form-label" style="color:#000000;">Porcentaje de satisfaccion Nacional %</label>
											<input type="text" min="0" class="form-control" id="satisf" name="satisf" value="" required>
											<label for="text" class="form-label" style="color:#000000;">Ranking Nacional Colima</label>
											<input type="text" min="0" class="form-control" id="rank" name="rank" value="" required><br>
											<button class="btn btn-success mb-2" type="submit" id="subir"><i class="fas fa-save"></i> Actualizar Datos</button>
										</form>
									</div>	
								</div>
							</div>	
						</div>

					</div><br>

					<hr class="my-4">
					<div class="row g-4 settings-section">
						<div class="col-12 col-md-4">
							<h3 class="section-title">Pedidos</h3>
							<div class="section-intro">Apartado para subir los archivos diarios</div>
						</div>
						<div class="col-12 col-md-8">
							<div class="app-card app-card-settings shadow-sm p-4">
								<label for="pedidos" class="form-label">Pedidos</label>
								<div class="mb-3">
									<div class="app-card-body text-center">
										<form action="<?php echo base_url(); ?>Pedidos/subirarchivo" method="post" enctype="multipart/form-data">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fechaId" name="fechaId" required>
                    						</div>
											<div class="form-group">
                    						    <label for="img">Selecciona Archivo</label>
                    						    <div class="custom-file">
                    						      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo" required>
                    						      <label class="custom-file-label" for="customFile"></label>
                    						      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    						    </div>
                    						</div>
											<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>
										</form>
									</div><!--//app-card-body-->
								</div>
							</div><!--//app-card-->
						</div>
					</div>
			
				</div><!--//app-wrapper--> 
			</div>
		</div>

	<?php } ?>

	<?php pie() ?> <!-- Pone el fotter -->
