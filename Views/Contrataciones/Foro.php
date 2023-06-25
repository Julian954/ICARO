<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $data1['id_creador'] == $_SESSION['id'] || $data1['id_validador'] == $_SESSION['id']){ ?> <!-- Si es Admin, Jefatura, Interno Juridico (ASIGNADO) o Externo Juridico (ASIGNADO)-->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
	  <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">
		    <h1 class="app-page-title">Foro Requerimientos</h1>
        <div class="" id="faq2-heading-1">
          <a href="<?php echo base_url(); ?>Contrataciones/Validando">
            <i class="fas fa-arrow-left"></i> Volver
          </a>
        </div>
      
        <div class='app-card shadow-sm h-100' style='margin-top:20px !important;'>
          <div class='app-card-body p-3 p-lg-4'>
            <div>
              <h4 style='color:'><?php echo $data1['id_contrato'];?> 
                <?php if ($data4['estado'] == 3) { ?>
                  <span class="badge bg-success">Validado</span>
                <?php } elseif ($data4['estado'] == 4) { ?>
                  <span class="badge bg-secondary">Formalizado</span>
                <?php }?>
              </h4>
            </div>
            <div class='sstats-meta text-success'><?php echo $data1['nombre']?></div>
            <div class='sstats-meta intro'><?php echo $data1['descripcion']?></div>
            <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php echo $data1['fecha']?></div>
            <div style="margin: 15px 0; height:12px !important;">
            <?php foreach ($data3 as $arc) {
              if ($arc['intento'] == 0) {?>
                <a href="<?php echo base_url(); ?>Assets/Documentos/Peticiones/<?php echo $arc['nombre']; ?>" target="_blank" 
                <?php if (strstr($arc['nombre'], ".") == ".xlsx") {?>
                  class='btn-sm app-btn-primary'><?php echo strstr($arc['nombre'], "."); ?></a>
                <?php } elseif (strstr($arc['nombre'], ".") == ".zip") { ?>
                  class='btn-sm app-btn-secondary'><?php echo $arc['nombre']; ?></a>
                <?php } elseif (strstr($arc['nombre'], ".") == ".pdf") { ?>
                  class='btn-sm btn-danger'><?php echo $arc['nombre']; ?></a>
                <?php } elseif (strstr($arc['nombre'], ".") == ".docx") { ?>
                  class='btn-sm btn-info'><?php echo $arc['nombre']; ?></a>
                <?php }?>
              <?php }
            } ?>
            </div>
          </div><!--//app-card-body-->  
        </div><!--//app-card-->
        <div style="margin: 20px 0;">    
          <?php if ($_SESSION['rol'] != 5 && ($data4['estado'] <= 2)) {?>  
            <button class="btn app-btn-secondary" data-toggle="modal" data-target="#VentanaModal">Responder</button>
            <?php if ($_SESSION['rol'] == 4 || $_SESSION['rol'] == 7) {?>
              <form action="<?php echo base_url() ?>Contrataciones/validar?contrato=<?php echo $data1['id_contrato']; ?>" method="post" class="d-inline validar">
              <input type="text" id="fecha_valida" name="fecha_valida" value="<?= date('Y-m-d')?>" style="display:none;" readonly>
              <button title="Validar" type="submit" class="btn app-btn-primary">Validar</button>
              </form>
            <?php }
          } elseif ($_SESSION['rol'] == 7 && ($data4['estado'] <= 3)) { ?>
            <form action="<?php echo base_url() ?>Contrataciones/formalizar?contrato=<?php echo $data1['id_contrato']; ?>" method="post" class="d-inline forma">
              <button title="Formalizar" type="submit" class="btn app-btn-primary">Formalizar</button>
            </form>
          <?php } ?>
        </div><!--//col-->         
        <div class='app-card shadow-sm h-100'>
          <div class='app-card-body p-3 p-lg-4'>
            <h5>
              <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-arrow-down' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z'/>
              </svg> Historial
              <?php if (isset($_GET['msg'])) {
                $alert = $_GET['msg'];
                if ($alert == "Registrado") { ?>
                  <span class="badge bg-success">El comentario se registró con éxito.</span>
                <?php } else if ($alert == "Error") { ?>
                  <span class="badge bg-danger">No se pudo registrar el comentario, intente de nuevo o cantacte a soporte.</span>
                <?php }
              } ?>
            </h5>
            <div class="tab-content" id="orders-table-tab-content">
		          <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			          <div class="app-card app-card-orders-table shadow-sm">
			      	    <div class="app-card-body">
                    <?php foreach ($data2 as $validar) { ?>
                      <div style="padding: 10px 0 0 20px">
                        <div class='sstats-meta text-success'><?php echo $validar['nombre']?></div>
                        <div class='sstats-meta intro'><?php echo $validar['respuesta']?></div>
                        <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php echo $validar['fecha']?></div>
                        <div style='margin-top:15px; margin-bottom: 30px;'>
                          <?php foreach ($data3 as $arcv) {
                            if ($arcv['intento'] == $validar['intento']) {?>
                              <a href="<?php echo base_url(); ?>Assets/Documentos/Foro/<?php echo $arcv['nombre']; ?>" target="_blank" 
                              <?php if (strstr($arcv['nombre'], ".") == ".xlsx") {?>
                                class='btn-sm app-btn-primary'><?php echo strstr($arcv['nombre'], "."); ?></a>
                              <?php } elseif (strstr($arcv['nombre'], ".") == ".zip") { ?>
                                class='btn-sm app-btn-secondary'><?php echo $arcv['nombre']; ?></a>
                              <?php } elseif (strstr($arcv['nombre'], ".") == ".pdf") { ?>
                                class='btn-sm btn-danger'><?php echo $arcv['nombre']; ?></a>
                              <?php } elseif (strstr($arcv['nombre'], ".") == ".docx") { ?>
                                class='btn-sm btn-info'><?php echo $arcv['nombre']; ?></a>
                              <?php }
                            }
                          } ?>
                        </div>
                      </div>
                      <hr>
                    <?php }?>
		      		    </div><!--//app-card-body-->		
		      		  </div><!--//app-card-->
			  	    </div><!--//app-card-body-->
			  	  </div><!--//app-card-->
		      </div><!--//tab-pane-->
        </div>
      </div>
    </div><!--//tab-content-->
  </div><!--//app-wrapper-->
  <div id="VentanaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title">Añadir Comentarios</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url(); ?>Contrataciones/agregar_comentario" autocomplete="off" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="setting-input-2" class="form-label">Comentarios</label>
              <input type="hidden" class="form-control" id="number" name="number" value="<?php echo $data1['id_contrato'];?>"/>
              <textarea rows="auto" col="auto" class="form-control" id="descripcion" name="descripcion" value="" required></textarea>
            </div> 
            <div class="form-group">
              <div class="container2">
                <input style="display: none;" type="file" id="file-input" multiple name="archivo[]"/>
                <label id="fileup" for="file-input">
                  <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  &nbsp; Selecciona los archivos.
                </label>
                <div id="num-of-files">Sin archivos cargados.</div>
                <ul id="files-list"></ul>
                <hr>
                <div><strong>Nota:</strong> Solo se permiten archivos PDF, WORD, EXCEL y ZIP, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</div>
              </div>
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