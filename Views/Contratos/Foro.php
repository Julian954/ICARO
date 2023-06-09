<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 4 || $_SESSION['rol'] == 3){ ?> <!-- Si es Admin, Jefatura, Interno Juridico o Externo Juridico -->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
	  <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">
		    <h1 class="app-page-title">Foro Contratos/Convenios</h1>
        <div class="" id="faq2-heading-1">
          <a href="<?php echo base_url(); ?>Contratos/Validando">
            <i class="fas fa-arrow-left"></i> Volver
          </a>
        </div>
      </div>
    <div class='app-card shadow-sm h-100' style='margin-top:20px !important;'>
      <div class='app-card-body p-3 p-lg-4'>
        <div><h4 style='color:'><?php echo $data1['id_contrato']?></h4></div>
        <div class='sstats-meta text-success'><?php echo $data1['nombre']?></div>
        <div class='sstats-meta intro'><?php echo $data1['descripcion']?></div>
        <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php echo $data1['fecha']?></div>
        <div style='margin-top:15px; margin-bottom: 30px;'>
          <?php foreach ($data3 as $arc) {
            if ($arc['intento'] == 0) {?>
              <div style='height:12px !important;'><a href="<?php echo base_url(); ?>Assets/Documentos/Peticiones/<?php echo $arc['nombre']; ?>"  target="_blank" class='btn-sm app-btn-secondary mb-2' style='background-color:#F7DC6F; font-weight: bold; font-size:12px;'><?php echo $arc['nombre']; ?></a></div><br>
            <?php }
          } ?>
        </div>
      </div><!--//app-card-body-->  
    </div><!--//app-card-->
    <div class="col-12 col-lg-3"><br>
      <button class="btn app-btn-primary" data-toggle="modal" data-target="#VentanaModal">Responder Aqui</button>
      <form action="<?php echo base_url() ?>Contratos/validar?contrato=<?php echo $data1['id_contrato']; ?>" method="post" class="d-inline elim">
        <button title="Validar" type="submit" class="btn btn-primary mb-2">Validar</button>
      </form>
    </div><!--//col-->        
    <div class='app-card shadow-sm h-100' style='margin-top:20px !important;'>
          <div class='app-card-body p-3 p-lg-4'>
            <div>
              <h5 style=''>
              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-arrow-down' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z'/>
              </svg>Historial</h5></div>

              <div class="tab-content" id="orders-table-tab-content">
		        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			        <div class="app-card app-card-orders-table shadow-sm mb-5">
			    	    <div class="app-card-body">
          <?php foreach ($data2 as $validar) { ?>
          <div style="padding: 10px 0 0 20px">
          <div class='sstats-meta text-success'><?php echo $validar['nombre']?></div>
          <div class='sstats-meta intro'><?php echo $validar['respuesta']?></div>
          <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php echo $validar['fecha']?></div>
          <div style='margin-top:15px; margin-bottom: 30px;'>
            <?php foreach ($data3 as $arcv) {
              if ($arcv['intento'] == $validar['intento']) {?>
                <div style='height:12px !important;'><a href="<?php echo base_url(); ?>Assets/Documentos/Foro/<?php echo $arcv['nombre']; ?>" target="_blank" class='btn-sm app-btn-secondary mb-2' style='background-color:#F7DC6F; font-weight: bold; font-size:12px;'><?php echo $arcv['nombre']; ?></a></div><br>
              <?php }
            } ?>
            </div>
          </div>
          <hr>
          </div>
          <?php }?>


			    		    </div><!--//app-card-body-->		
			    		  </div><!--//app-card-->
					    </div><!--//app-card-body-->
					  </div><!--//app-card-->
		      </div><!--//tab-pane-->
        </div>
      </div><!--//tab-content-->


    </div>
  </div><!--//app-wrapper-->


</div>
</div>

<div id="VentanaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Cargar Datos</h5>
                  <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?php echo base_url(); ?>Contratos/agregar_comentario" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <div class="form-group">
                      <label for="setting-input-2" class="form-label">Comentarios</label>
                      <input type="hidden" class="form-control" id="number" name="number" value="<?php echo $data1['id_contrato'];?>"/>
                      <textarea rows="10" col="20" class="form-control" id="descripcion" name="descripcion" value="" required></textarea>
                    </div> 
                    <div class="form-group">
                      <span>Subir Archivo:</span>
                      <input type="file" name="archivo[]" value="" multiple/>
                    </div>                   
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar comentarios</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
              </form>
          </div>
      </div>
  </div>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->