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
<!--//app-header-->
    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Validación de Contratos</h1>
          <div class="" id="faq2-heading-1">
                  <a class="" type="button" href="contratos.php">
                    <svg width="1em" height="1em" viewBox="0 0 512 512" class="bi bi-arrow-right ml-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                    <path d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"/></svg>
                    Volver
                  </a>
          </div>
        </div>
        <div class="tab-content pt-4" id="">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left">
	                  <thead>
                    <tr>
                      <th class="cell" width=""></td>
                  		<th class="cell" width="">Contrato</td>
                  		<th class="cell" width="">Fecha de Ingreso</td>
                  		<th class="cell" width="">Revisión</td>
                      <th class="cell" width="">Archivo</td>
                  	</tr>
                   </thead>
                  <?php
                  	include("conexionBD.php");
                  	$query = "SELECT foro.ID as FID, foro.autor as FA, foro.titulo as FT, foro.mensaje as FM, foro.fecha as FF, foro.respuestas as FR, foro.identificador as FI, foro.ult_respuesta as FU, info_contratos.no_contrato as NC, info_contratos.status_contrato as NS FROM foro INNER JOIN info_contratos ON foro.titulo=info_contratos.no_contrato WHERE foro.identificador = 0 AND status_contrato ='C' ORDER BY foro.fecha ASC";




                  	$result = $mysqli->query($query);
                  	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  		$id = $row['FID'];
                  		$titulo = $row['FT'];
                      $archivoName = $row['FT'];
                  		$fecha = $row['FF'];
                  		$respuestas = $row['FR'];
                  		echo "<tr>";
                        echo "<td class='cell'><a href='foro_rev.php?id=$id'>ver</a></td>";
                        echo "<td class='cell'>$titulo</td>";
                  			echo "<td class='cell'>$fecha</td>";
                  			echo "<td class='cell'>$respuestas</td>";
                        echo "<td class='cell'><span class='badge bg-success'>".$archivoName."zip</span></td>";
                  		echo "</tr>";
                  	}
                  ?>
                  </table>
						      </div><!--//table-responsive-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
			      </div><!--//tab-pane-->
            <div style="margin-top:-20px;">
              <div class='btn app-btn-primary'><a href="formulario0a.php" style="color:#FFFFFF">Solicitar Validación</a></div>
          </div>
        </div><!--//tab-content-->
      </div>
    </div><!--//app-wrapper-->
    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

    <?php } ?>

<?php pie() ?> <!-- Pone el fotter -->