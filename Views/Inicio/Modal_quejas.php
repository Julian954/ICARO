  
  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title"> Agregar la Queja</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formulario1" method="post" action="<?php echo base_url(); ?>Inicio/Queja" autocomplete="off" enctype="multipart/form-data">
          <div class="modal-body">
          
            <div class="form-group">
              <label for="setting-input-3" class="form-label" style="color:#000000;">Descripción</label>              
              <input type="text" class="form-control" name="descripcion" id="descripcion"  />                                                        
            </div>            
            <div class="form-group">
              <label  for="Piezas" class="form-label" style="color:#000000;">Piezas</label>
              <input type="number" class="form-control" name="piezas" id="piezas" />                            
            </div>      
             <div class="mb-3">
                      <label for="umf" class="form-label">UMF</label>
                      <select class="form-control" id="umf" name="umf" required>
                        <?php foreach ($data6 as $umf) { ?>
                          <option value="<?= $umf['id'] ?>"><?= $umf['nombre'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
            <div class="form-group">
              <label  for="receta" class="form-label" style="color:#000000;">Receta</label>
              <input type="number" class="form-control" name="receta" id="receta" />                            
            </div>                       
          </div>
          <div class="card-footer">
              <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Aceptar</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>