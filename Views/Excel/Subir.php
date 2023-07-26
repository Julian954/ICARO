<?php if($_SESSION['rol'] == 7 || $_SESSION['rol']==6){ ?> <!-- Si es Admin o Operador-->
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
            					<div class="app-card-header">
            					  <div class="row justify-content-between align-items-center">
            					    <div class="col-auto">
            					      <h4 class="app-card-title">Indicadores</h4>
            					    </div><!--//col-->
            					    <div class="col-auto">
            					      <div class="card-header-action">
            					        <span style="font-weight: normal;font-size: 12px">Actualizado el <?= $data1['fecha'];?></span>
            					      </div><!--//card-header-action-->
            					    </div><!--//col-auto-->
            					  </div><!--//row justify-content-between align-items-center-->
            					</div><!--//app-card-header p-3-->
									<div class="app-card-body mt-3">											
										<form action="<?php echo base_url(); ?>Indicadores/procesarArchivo" method="post" enctype="multipart/form-data" class="subirank">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fecha" name="fecha" required>
                    						</div>
											<div class="form-group">
                    						    <label for="img">Selecciona Archivo</label>
                    						    <div class="custom-file">
                    						      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo_csv"  <?php if($_SESSION['rol']!=7){ "required"; };?>>
                    						      <label class="custom-file-label" for="customFile"></label>
                    						      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    						    </div>
                    						</div>
											<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>											
										</form>		
										<form action="<?php echo base_url(); ?>Indicadores/elimina_Archivo" method="post" class="subir" style="position: relative;">											
											<script>
												document.getElementById("fecha").addEventListener("input", function() {
												  var valorFecha1 = document.getElementById("fecha").value;
												  document.getElementById("fecha2").value = valorFecha1;
												});
											</script>
											<input type="date"  id="fecha2" class="form-control" name="fecha2" value="" require style="display:none;" readonly><br>
											<?php if($_SESSION['rol']==7){ ?>
											<button class="btn btn-danger" type="submit" id="eliminararchivo" style="position: absolute;bottom: 24px;left: 180px;"><i class="fas fa-trash"></i> Eliminar Documento</button>
											<?php } ?>
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
            					<div class="app-card-header">
            					  <div class="row justify-content-between align-items-center">
            					    <div class="col-auto">
            					      <h4 class="app-card-title">Negadas</h4>
            					    </div><!--//col-->
            					    <div class="col-auto">
            					      <div class="card-header-acti3on">
            					        <span style="font-weight: normal;font-size: 12px">Actualizado el <?= $data2['fecha'];?></span>
            					      </div><!--//card-header-action-->
            					    </div><!--//col-auto-->
            					  </div><!--//row justify-content-between align-items-center-->
            					</div><!--//app-card-header p-3-->
									<div class="app-card-body mt-3">
										<form action="<?php echo base_url(); ?>Inicio/subir_archivo" method="post" enctype="multipart/form-data" class="subirank">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fechas" name="fechas" required>
                    						</div>
											<div class="form-group">
                    						    <label for="img">Selecciona Archivo</label>
                    						    <div class="custom-file">
                    						      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo" <?php if($_SESSION['rol']!=7){ "required"; };?>>
                    						      <label class="custom-file-label" for="customFile"></label>
                    						      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    						    </div>
                    						</div>
											<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>											
										</form>
										<form action="<?php echo base_url(); ?>Inicio/elimina_archivo" method="post" class="subir" style="position: relative;">											
											<script>
document.getElementById("fechas").addEventListener("input", function() {
  var valorFecha1 = document.getElementById("fechas").value;
  document.getElementById("fecha20").value = valorFecha1;
});
											</script>
											<input type="date"  id="fecha20" class="form-control" name="fecha2" value="" require style="display:none;" readonly><br>
											<?php if($_SESSION['rol']==7){ /*duda en dejar o no el eliminar el rank*/?>
											<button class="btn btn-danger" type="submit" id="eliminararchivo" style="position: absolute;bottom: 24px;left: 180px;"><i class="fas fa-trash"></i> Eliminar Documento</button>
											<?php } ?>
										</form>
									</div><!--//app-card-body-->
								
								
							</div><!--//app-card-->
						</div>
					</div><!--//row-->

					<hr class="my-4">
					<div class="row g-4 settings-section">
						<div class="col-12 col-md-4">
							<h3 class="section-title">Datos Nacionales</h3>
							<div class="section-intro">Apartado para subir los archivos diarios</div>
						</div>
						<div class="col-12 col-md-8">
							<div class="app-card app-card-settings shadow-sm p-4">
            					<div class="app-card-header">
            					  <div class="row justify-content-between align-items-center">
            					    <div class="col-auto">
            					      <h4 class="app-card-title">Nacionales</h4>
            					    </div><!--//col-->
            					    <div class="col-auto">
            					      <div class="card-header-acti3on">
            					        <span style="font-weight: normal;font-size: 12px">Actualizado el <?= $data3['fecha'];?></span>
            					      </div><!--//card-header-action-->
            					    </div><!--//col-auto-->
            					  </div><!--//row justify-content-between align-items-center-->
            					</div><!--//app-card-header p-3-->
									<div class="app-card-body mt-3">
										<form action="<?php echo base_url(); ?>Inicio/subir_rank" method="post" class="subirank" style="flex-direction: row;">
											<label for="date" class="">Fecha</label>
											<input type="date"  id="fecha1" class="form-control" name="fecha1" value="" require><br>
											<label for="text" class="">Porcentaje de satisfaccion Nacional %</label>
											<input type="text" min="0" class="form-control" id="satisf" name="satisf" value="" <?php if($_SESSION['rol']!=7){ "required"; };?>>
											<label for="text" class="">Ranking Nacional Colima</label>
											<input type="text" min="0" class="form-control" id="rank" name="rank" value="" <?php if($_SESSION['rol']!=7){ "required"; };?>><br>
											<button class="btn btn-success" type="submit" ><i class="fas fa-save"></i> Actualizar Datos</button>											
										</form>
										<form action="<?php echo base_url(); ?>Inicio/elimina_rank" method="post" class="subir" style="position: relative;">											
											<script>
document.getElementById("fecha1").addEventListener("input", function() {
  var valorFecha1 = document.getElementById("fecha1").value;
  document.getElementById("fecha22").value = valorFecha1;
});
											</script>
											<input type="date"  id="fecha22" class="form-control" name="fecha2" value="" require style="display:none;" readonly><br>
											<?php if($_SESSION['rol']==7){ /*duda en dejar o no el eliminar el rank*/?>
											<button class="btn btn-danger" type="submit" id="eliminararchivo" style="position: absolute;bottom: 23px;left: 170px;"><i class="fas fa-trash"></i> Eliminar Documento</button>
											<?php } ?>
										</form>
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
            					<div class="app-card-header">
            					  <div class="row justify-content-between align-items-center">
            					    <div class="col-auto">
            					      <h4 class="app-card-title">Pedidos</h4>
            					    </div><!--//col-->
            					    <div class="col-auto">
            					      <div class="card-header-acti3on">
            					        <span style="font-weight: normal;font-size: 12px">Actualizado el <?= $data4['fecha'];?></span>
            					      </div><!--//card-header-action-->
            					    </div><!--//col-auto-->
            					  </div><!--//row justify-content-between align-items-center-->
            					</div><!--//app-card-header p-3-->
									<div class="app-card-body mt-3">
										<form action="<?php echo base_url(); ?>Pedidos/subirarchivo" class="subirank" method="post" enctype="multipart/form-data">
                    						<div class="form-group">
                    						    <label for="date">Fecha</label>
												<input type="date" class="form-control" id="fechaId" name="fechaId" required>
                    						</div>
											<div class="form-group">
                    						    <label for="img">Selecciona Archivo</label>
                    						    <div class="custom-file">
                    						      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo" <?php if($_SESSION['rol']!=7){ "required"; };?>>
                    						      <label class="custom-file-label" for="customFile"></label>
                    						      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    						    </div>
                    						</div>
											<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>											
										</form>
										<form action="<?php echo base_url(); ?>Pedidos/elimina_archivo" method="post" class="subir" style="position: relative;">											
											<script>
document.getElementById("fechaId").addEventListener("input", function() {
  var valorFecha1 = document.getElementById("fechaId").value;
  document.getElementById("fecha24").value = valorFecha1;
});
											</script>
											<input type="date"  id="fecha24" class="form-control" name="fecha2" value="" require style="display:none;" readonly><br>
											<?php if($_SESSION['rol']==7){ ?>
											<button class="btn btn-danger" type="submit" id="eliminararchivo" style="position: absolute;bottom: 24px;left: 180px;"><i class="fas fa-trash"></i> Eliminar Documento</button>
											<?php } ?>
										</form>	
									</div><!--//app-card-body-->
							</div><!--//app-card-->
						</div>
					</div>
			
				</div><!--//app-wrapper--> 
			</div>
		</div>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->