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
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else   { ?> <!-- En caso de ser valido -->

    <div class="app-wrapper">
        <section>
            <div class="card container-fluid2">
                <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-<?php echo ($_GET['msg'] == 'La Unidad ya existe') ? 'danger' : 'success'; ?> alert-dismissible fade show" role="alert">
                    <?php echo $_GET['msg']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
                <?php } ?>
             <h5 class="card-header"><i class="fas fa-users"></i> <strong>Unidades Registradas</strong></h5>
            <div class="card-body">
                 <div class="container-fluid ">
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="row">
                                    <div class="col-lg-8 mb-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#archivoArticulos"><i class="fas fa-plus-circle"></i> Subir Archivo</button>
                                    </div>
                                </div>
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-bordered" id="Table">
                                        <thead class="thead-personality">
                                        <tr>
                                             <th>Codigo de Unidad</th>
                                             <th>Descripcion</th>
                                             <th>Descripcion corta</th>
                                             <th>Acciones</th>
                                            </tr>
                                     </thead>
                                        <tbody>
                                        <?php foreach ($data1 as $us) { ?>
                                             <tr>
                                                    <td><?php echo $us['clave']; ?></td>
                                                    <td><?php echo $us['nombre']; ?></td>
                                                    <td><?php echo $us['abreviacion']; ?></td>
                                                    <td>
                                                        <a title="Editar" href="<?php echo base_url() ?>Unidades\Unidades_Editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo base_url() ?>Unidades/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                            <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                                                        </form>            
                                                    </td>
                                                </tr>
                                             <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>  

    <div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                 <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i>Agregar Unidad</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
              </div>
             <form method="post" action="<?php echo base_url(); ?>Unidades/insertar" autocomplete="off">
                  <div class="modal-body">
                     <div class="form-group">
                         <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>                   
                     <div class="row">                        
                         <div class="col-lg-6">
                             <div class="form-group">
                                  <label for="clave">Clave</label>
                                 <input id="clave" class="form-control" type="number" min="1000000000" max="9999999999" name="clave" placeholder="Clave" required>
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

    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
	

<?php pie() ?>