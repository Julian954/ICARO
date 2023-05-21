<?php encabezado() ?> <!-- Poner el header -->

<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>login" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?> <!-- En caso de ser valido -->

    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

			    <h1 class="app-page-title">Contratos</h1>
			    <div class="app-card app-card-accordion shadow-sm mb-4">
				    <div class="app-card-header p-3">
				       <h4 class="app-card-title">Cargar Instrumento</h4>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4" style="padding-top:20px; important!">
              <div class="app-card-body">
                <form method="POST" action="php/agregaNuevoContrato.php">
                  <div class="mb-3">
                    <label for="setting-input-1" class="form-label" style="color:#000000;">Numero de Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                    <input type="text" class="form-control" id="no_contrato" name="no_contrato" value="" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Descripción del Contrato</label>
                    <input type="text" class="form-control" id="desc_contrato" name="desc_contrato" value="" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Area Requirente</label>
                    <select class="form-control" id="area_contrato" name="area_contrato">
                      <option>Jefatura de Prestaciones Médicas</option>
                        <option>Jefatura de Servicios Administrativos</option>
                        <option>Jefatura de Servicios Prestaciones Económicas</option>
                        <option>Coordinación de Comuniación Social</option>
                        <option>Departamento de Conservación</option>
                        <option>Departamento de Servicios Generales</option>
                        <option>Coordinación de Informática</option>
                        <option>Coordinación Biomédica</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Administrador del Contrato</label>
                    <input type="text" class="form-control" id="administrador_contrato" name="administrador_contrato" value="" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Tipo del Contrato</label>
                    <select class="form-control" id="tipo_contrato" name="tipo_contrato">
                      <option>Por Monto</option>
                      <option>Por Vigencia</option>
                      <option>Conv. Vigencia</option>
                      <option>Conv. Monto</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Término</label>
                    <input type="date" class="form-control" id="termino_contrato" name="termino_contrato" value="">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Máximo $</label>
                    <input type="text" class="form-control" id="monto_contrato" name="monto_contrato" value="">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">No. Fianza</label>
                    <input type="text" class="form-control" id="fianza_contrato" name="fianza_contrato" value="">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Status</label>
                    <select class="form-control" id="status_contrato" name="status_contrato">
                      <option value="A">En Contratación</option>
                      <option value="B">En Elaboración</option>
                      <option value="C">En Validación</option>
                      <option value="D">En Firma TOOADR</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Plataforma de carga</label>
                    <select class="form-control" id="sistema_contrato" name="sistema_contrato">
                      <option value="SAI">SAI</option>
                      <option value="PREI">PREI</option>
                    </select>
                </div>
                <button type="submit" class="btn app-btn-primary">Cargar</button>
                </form>
              </div><!--//app-card-body-->
				    </div><!--//app-card-body-->
				</div><!--//app-card desde aqui borrar-->
		  </div><!--//container-fluid-->
	  </div><!--//app-content-->

    <footer class="app-footer">
      <div class="container text-center py-3">
           <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
          <small class="copyright">Diseño y Desarrollo <i class="" style="color: #fb866a;"></i> por la <a class="app-link" href="" target="_blank">CDAE</a> Coordinación de Abastecimiento y Equipamiento</small>

      </div>
    </footer><!--//app-footer-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->