<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 6){ ?> <!-- Si es Admin-->
    <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Unidades Registradas</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-4">
                            <div class="app-card-body p-3">
                                <div class="row">
                                    <div class="col-lg-8 mb-2 py-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "Eliminado") { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>La unidad fue eliminada.</strong>
                                                </div>
                                            <?php } elseif($alert == "modificado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>La unidad fue modificada.</strong>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>La unidad fue registrada.</strong>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="Table">
    							        <thead>
                                            <tr>
                                                <th class="cell" >Codigo de Unidad</th>
                                                <th class="cell" >Descripcion</th>
                                                <th class="cell" >Descripcion corta</th>
                                                <th class="cell" >Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data1 as $us) { ?>
                                             <tr>
                                                    <td><?php echo $us['clave']; ?></td>
                                                    <td><?php echo $us['nombre']; ?></td>
                                                    <td><?php echo $us['abreviacion']; ?></td>
                                                    <td>
                                                        <a title="Editar" href="<?php echo base_url() ?>Unidades/Unidades_Editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                        <form id="formulario2" action="<?php echo base_url() ?>Unidades/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                            <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                                                        </form>            
                                                    </td>
                                                </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
                    </div><!--//tab-pane fade show active-->
                </div><!--//tab-pane-->
            </div>
        </div>
    </div><!--//app-wrapper-->

    <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                 <h5 class="modal-title" id="my-modal-title">Agregar Unidad</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
              </div>
             <form id="formulario1" method="post" action="<?php echo base_url(); ?>Unidades/insertar" autocomplete="off">
                  <div class="modal-body">
                     <div class="form-group">
                         <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>                   
                     <div class="row">                        
                         <div class="col-lg-6">
                             <div class="form-group">
                                  <label for="clave">Clave</label>
                                 <input id="clave" class="form-control" type="text" name="clave" placeholder="Clave" required>
                                </div>
                         </div>   
                         <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="abreviacion">Abreviatura</label>
                                    <input id="abreviacion" class="form-control" type="text" name="abreviacion" placeholder="Abreviatura" required>
                                </div>
                            </div>                     
                        </div>
                 </div>
                 <div class="card-footer">
                     <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Agregar</button>
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