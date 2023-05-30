<?php encabezado() ?> <!-- Poner el header -->

<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?> <!-- En caso de ser valido -->

	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row mb-4">
				    <div class="col-12 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100" style="background-color:#F7F9F9;">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Acumulado<span style="color:#FF0000;">Negadas</span> <span style="font-weight: bold; color:#000000;">Hoy</span></h4>
							    <div class="stats-figure">76<span>&nbsp;recetas</span></div>
							    <div class="stats-meta text-danger">
								<span style="font-weight:bold;">389</span>&nbsp;"negadas ayer"</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
           	 <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span style="color:#FF0000;">Negadas</span> <span style="font-weight: bold; color:#000000;">YTD 2021</span></h4>
							    <div class="stats-figure">27.06<span>(k)</span></div>
							    <div class="stats-meta text-warning">
								   <span style="font-weight:bold;">540</span>&nbsp;"máximo diairo"</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
          	  <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span style="color:#FF0000;">Negadas</span> <span style="font-weight: bold; color:#000000;">Diario</span></h4>
							    <div class="stats-figure"><span>217</span></div>
							    <div class="stats-meta text-success">
								    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  									<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
									</svg>Promedio</div>
						   		 </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->

          <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4" style="background-color:#2ECC71;">
							    <h4 class="stats-type mb-1" style="color:#FFFFFF;">Nivel de Atención</h4>
							    <div class="stats-figure" style="color:#FFFFFF;">97.12<span>%</span></div>
							    <div class="stats-meta" style="color:#F9E79F">
								    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  		<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
		</svg> OOADR <span style="font-weight: bold;">Colima 2021</span></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->

				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4" style="background-color:#F39C12;">
							    <h4 class="stats-type mb-1" style="color:#FFFFFF;">Nivel de Atención</h4>
							    <div class="stats-figure" style="color:#FFFFFF;">96.70<span>%</span></div>
							    <div class="stats-meta" style="color:#FFFFFF;">Media <span style="font-weight: bold;">Nacional 2021</span></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
            <div class="col-12 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1 text-success">Ranking NACIONAL <span class="text-warning" style="font-weight:bold;">HOY</span></h4>
							    <div class="stats-figure"><span style="font-weight:bold;">4</span> &nbsp <span>lugar</span></div>
							    <div class="stats-meta text-success">
								    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  			<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
		</svg> <span>5</span>&nbsp<span>lugar Historico</span>  </div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->

          <div class="row g-4 mb-4">
				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span class="text-success">%</span>Eletrónica</h4>
							    <div class="stats-figure">96.87<span>%</span></div>
							    <div class="stats-meta text-success">
		<span class="text-danger">160</span>&nbsp<span class="text-danger">Manuales</span></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->

				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Manuales</h4>
							    <div class="stats-figure">160</div>
							    <div class="stats-meta text-success">Ayer</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Emitidas</h4>
							    <div class="stats-figure">5,117</div>
                  <div class="stats-meta text-success">Ayer</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">$ Receta</h4>
							    <div class="stats-figure">$53.74</div>
                  <div class="stats-meta text-success">
		<span class="text-success">Primer Nivel</span>  </div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
            <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">$ Paciente</h4>
							    <div class="stats-figure">$139.82</div>
                  <div class="stats-meta text-success">
		<span class="text-danger">Segundo Nivel</span>  </div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
           			<div class="col-4 col-lg-2">
					  		  	<div class="app-card app-card-stat shadow-sm h-100">
						   			 <div class="app-card-body p-3 p-lg-4">
							   	 	 <h4 class="stats-type mb-1">Pacientes</h4>
							   		 <div class="stats-figure">1,963</div>
                  				<div class="stats-meta text-warning">Atendidos</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
         		<div class="row g-1 mb-1">
          			<div class="col-24 col-lg-12">
            			<div class="app-card app-card-chart shadow-sm">
              				<div class="app-card-header p-3 border-0">
                				<h4 class="app-card-title">Historico Mensual / Atención de Recetas 2021</h4>
              				</div><!--//app-card-header-->
								<div class="app-card-body p-4">
                					<div class="chart-container">
                       					 <canvas id="chart-bar"></canvas>
                					</div>
              					</div><!--//app-card-body-->
            			</div><!--//app-card-->
            		</div><!--//col-->
           		</div>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	</div><!--//app-wrapper-->

		    <!-- Javascript -->
				<script src="Assets/plugins/popper.min.js"></script>
    			<script src="Assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   			 <!-- Charts JS -->
   				<script src="Assets/plugins/chart.js/chart.min.js"></script>
    			<script src="chart_indica.js"></script>

   			 <!-- Page Specific JS -->
   				 <script src="Assets/js/app.js"></script>
<?php } ?>

<?php pie() ?>