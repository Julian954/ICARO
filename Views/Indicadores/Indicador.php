<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5){ ?> <!-- Si es Admin o de Jefatura-->
  <?php encabezado() ?> <!-- Poner el header -->

	<div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row mb-4">
				    <div class="col-12 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Acumulado<span style="color:#FF0000;"> Negadas</span> <span style="font-weight: bold; color:#000000;">Ayer</span></h4>
							    <div class="stats-figure"><?=$data3[0]['negadas']?><span>&nbsp;recetas</span></div>
							    <div class="stats-meta text-danger">
									<span style="font-weight:bold;"><?=$data3[1]['negadas']?></span>&nbsp;Día anterior
								</div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-12 col-lg-6-->

           	  		<div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span style="color:#FF0000;">Negadas</span> <span style="font-weight: bold; color:#000000;"><?=date('Y')?></span></h4>
							    <div class="stats-figure"><?=$data1['negada']?><span></span></div>
							    <div class="stats-meta text-warning">
								   <span style="font-weight:bold;"><?=formatok($data6['nega']);?></span>&nbsp;Máximo diairo</div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-6 col-lg-3-->

          	    	<div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span style="color:#FF0000;">Negadas</span> <span style="font-weight: bold; color:#000000;">Diario</span></h4>
							    <div class="stats-figure"><?=number_format($data7['promedio'],0)?></div>
							    <div class="stats-meta text-success">Promedio</div>
						   		 </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-6 col-lg-3-->
			    </div><!--//row mb-4-->

          <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4" style="background-color:#2ECC71;">
							    <h4 class="stats-type mb-1" style="color:#FFFFFF;">Nivel de Atención</h4>
							    <div class="stats-figure" style="color:#FFFFFF;"><?=number_format($data4['colima'],2)?><span>%</span></div>
							    <div class="stats-meta" style="color:#FFFFFF"> OOADR <span style="font-weight: bold;">COLIMA <?=date('Y')?></span></div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-6 col-lg-3-->

				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4" style="background-color:#F39C12;">
							    <h4 class="stats-type mb-1" style="color:#FFFFFF;">Nivel de Atención</h4>
							    <div class="stats-figure" style="color:#FFFFFF;"><?=number_format($data4['nacional'],2)?><span>%</span></div>
							    <div class="stats-meta" style="color:#FFFFFF;">Media <span style="font-weight: bold;">Nacional <?=date('Y')?></span></div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-6 col-lg-3-->

            <div class="col-12 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1 text-success">Ranking NACIONAL <span class="text-warning" style="font-weight:bold;">AYER</span></h4>
							    <div class="stats-figure"><span style="font-weight:bold;"><?=number_format($data5['ultimo'],0)?></span><span>° lugar</span></div>
							    <div class="stats-meta text-success">
<span><?=number_format($data5['maximo'],0)?></span>&nbsp<span>° Mejor lugar</span>  </div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-6 col-lg-3-->
			    </div><!--//row g-4 mb-4-->

          <div class="row g-4 mb-4">
				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1"><span class="text-success"></span>Eletrónicas</h4>
							    <div class="stats-figure"><?=formatok($data1['electronica']);?><span></span></div>
							    <div class="stats-meta text-success">Ayer <?=miles($data2['electronica'])?></div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->

				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Manuales</h4>
							    <div class="stats-figure"><?=formatok($data1['manuals']);?></div>
							    <div class="stats-meta text-success">Ayer <?=miles($data2['manuals'])?></div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->

				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Emitidas</h4>
							    <div class="stats-figure"><?=formatok($data1['presen']);?></div>
                  <div class="stats-meta text-success">Ayer <?=miles($data2['presen']);?></div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->

				    <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">$ Receta</h4>
							    <div class="stats-figure">$<?=formatokdecimal($data1['costor'])?></div>
                  <div class="stats-meta text-success">
		<span class="text-success">Ayer $<?=decimales($data2['costor'])?></span>  </div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->

            <div class="col-4 col-lg-2">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">$ Paciente</h4>
							    <div class="stats-figure">$<?=formatokdecimal($data1['costop'])?></div>
                  <div class="stats-meta text-success">
		<span class="text-succes">Ayer $<?=decimales($data2['costop'])?></span>  </div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->

           			<div class="col-4 col-lg-2">
					  		  	<div class="app-card app-card-stat shadow-sm h-100">
						   			 <div class="app-card-body p-3 p-lg-4">
							   	 	 <h4 class="stats-type mb-1">Pacientes</h4>
							   		 <div class="stats-figure"><?=formatok($data1['atend']);?></div>
                  				<div class="stats-meta text-warning">Atendidos</div>
						    </div><!--//app-card-body p-3 p-lg-4-->
						    <!--<a class="app-card-link-mask" href="#"></a>-->
					    </div><!--//app-card app-card-stat shadow-sm h-100-->
				    </div><!--//col-4 col-lg-2-->
			    </div><!--//row g-4 mb-4-->

         		<div class="row g-1 mb-1">
          			<div class="col-24 col-lg-12">
            			<div class="app-card app-card-chart shadow-sm">
              				<div class="app-card-header p-3 border-0">
                				<h4 class="app-card-title">Historico Mensual / Atención de Recetas 2021</h4>
              				</div><!--//app-card-header p-3 border-0-->
								<div class="app-card-body p-4">
                					<div class="chart-container">
                       					 <canvas id="barrasrankig"></canvas>
                					</div><!--chart-container-->
              					</div><!--//app-card-body p-4-->
            			</div><!--//app-card app-card-chart shadow-sm-->
            		</div><!--//col-24 col-lg-12-->
           		</div><!--row g-1 mb-1-->
				<br><span style="font-size:12px;"class="text-muted">*Indicadores actualizados al <?= $data3[0]['fecha']?></span>
		    </div><!--//container-xl-->
	    </div><!--//app-content p-md-3 p-lg-4-->
	</div><!--//app-wrapper-->

<script>
  window.addEventListener("load", function() {
    barrasrankig();  
  })
</script>

				 
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->