  
  <div id="VentanaModal<?php echo $pedidos['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title"> Enlazar Pedido</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url(); ?>Pedidos/Pagado" autocomplete="off" enctype="multipart/form-data">
          <div class="modal-body">
          <input style="display:none;" type="text" class="form-control" name="id" id="id"  value="<?php echo $pedidos['id']; ?>" readonly/>   
            <div class="form-group">
              <label for="setting-input-3" class="form-label" style="color:#000000;">No.Contrato y clave</label>              
              <input type="text" class="form-control" name="contrato" id="contrato"  value="<?php echo $pedidos['nopedido']." - ".$pedidos['clave']; ?>" readonly/>                                                        
            </div>
            
            <div class="form-group">
              <label  for="monto" class="form-label" style="color:#000000;">Monto</label>
              <input type="number" class="form-control" name="monto2" id="monto2"/>                            
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