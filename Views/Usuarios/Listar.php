<?php if($_SESSION['rol'] == 7){ ?> <!-- Si es Admin-->
    <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Usuarios Registrados</h1>
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
                                        <a href="<?php echo base_url(); ?>Usuarios/eliminados" class="btn btn-secondary"><i class="fas fa-users-slash"></i> Inactivos</a>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "existe") { ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>El usuario ya existe.</strong>
                                                </div>
                                            <?php } else if ($alert == "error") { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Error al registra.</strong>
                                                </div>
                                            <?php } else if ($alert == "registrado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Usuario registrado.</strong>
                                                </div>
                                            <?php } else if ($alert == "modificado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Usuario modificado.</strong>
                                                </div>
                                            <?php } else if ($alert == "inactivo") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>El usuario fue inactivado.</strong>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Las contraseñas no coinciden.</strong>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="Table">
    							        <thead>
    								        <tr>
                                                <th class="cell" >Nombre</th>
                                                <th class="cell" >Matrícula</th>
                                                <th class="cell" >Correo</th>
                                                <th class="cell" >Teléfono</th>
                                                <th class="cell" >Rol</th>
                                                <th class="cell" >Acciones</th>
                                            </tr>
                                        </thead>
    					                <tbody>
                                        <?php foreach ($data1 as $us) { ?>
                                        <?php if($_SESSION['rol'] >= $us['rol']){ ?>
                                            <tr>
                                                <td><?php echo $us['nombre']; ?></td>
                                                <td><?php echo $us['usuario']; ?></td>
                                                <td><?php echo $us['correo']; ?></td>
                                                <td><?php echo $us['telefono']; ?></td>
                                                <td><?php
                                                    if ($us['rol'] == 7) {
                                                        echo "Administrador";
                                                    } elseif ($us['rol'] == 6) {
                                                        echo "Operador";
                                                    } elseif ($us['rol'] == 5) {
                                                        echo "Jefatura";
                                                    } elseif ($us['rol'] == 4) {
                                                        echo "Abogado Abasto";
                                                    } elseif ($us['rol'] == 3) {
                                                        echo "Abogado Jurídico";
                                                    } elseif ($us['rol'] == 2) {
                                                        echo "Requiriente";
                                                    } elseif ($us['rol'] == 1) {
                                                        echo "Almacén";
                                                    } ?> </td>
                                                <td>
                                                    <a title="Editar" href="<?php echo base_url() ?>Usuarios/editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form id="formulario2" action="<?php echo base_url() ?>Usuarios/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
                                                        <button title="Inactivar" type="submit" class="btn btn-secondary mb-2"><i class="fas fa-user-slash"></i></button>
                                                    </form>            
                                                </td>
                                            </tr>
                                        <?php } }?>
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
                    <h5 class="modal-title" id="my-modal-title">Nuevo Usuario</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formulario1" method="post" action="<?php echo base_url(); ?>Usuarios/insertar" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Correo</label>
                            <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="usuario">Matrícula</label>
                                    <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Matrícula" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input id="telefono" class="form-control" type="number" min="1000000000" max="9999999999" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="rol">Rol</label>
                                <select id="rol" class="form-control" name="rol" required>
                                    <?php if($_SESSION['rol'] >= 7){ ?><option value="7">Administrador</option> <?php } ?>
                                    <?php if($_SESSION['rol'] >= 6){ ?><option value="6">Operador</option> <?php } ?>
                                    <?php if($_SESSION['rol'] >= 5){ ?><option value="5">Jefatura</option> <?php } ?>
                                    <?php if($_SESSION['rol'] >= 4){ ?><option value="4">Abogado Abasto</option> <?php } ?>
                                    <?php if($_SESSION['rol'] >= 3){ ?><option value="3">Abogado Jurídico</option> <?php } ?>
                                    <?php if($_SESSION['rol'] >= 2){ ?><option value="2">Requiriente</option> <?php } ?>
                                    <option value="1">Almacen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Registrar</button>
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

