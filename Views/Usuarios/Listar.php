<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
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
<?php }  elseif ($_SESSION['rol'] <= 2) { ?>
<div class="page-content">
   <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Listar" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="app-wrapper">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-users"></i> <strong>Usuarios Registrados</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <a href="<?php echo base_url(); ?>/Usuarios/eliminados" class="btn btn-dark"><i class="fas fa-users-slash"></i> Inactivos</a>
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
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Matrícula</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
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
                                                    if ($us['rol'] == 6) {
                                                        echo "Administrador";
                                                    } elseif ($us['rol'] == 5) {
                                                        echo "Gestor";
                                                    } elseif ($us['rol'] == 4) {
                                                        echo "Gerente";
                                                    } elseif ($us['rol'] == 3) {
                                                        echo "Externo Jurídico";
                                                    } elseif ($us['rol'] == 2) {
                                                        echo "Externo Ad";
                                                    } elseif ($us['rol'] == 1) {
                                                        echo "Almacén";
                                                    } ?> </td>
                                                <td>
                                                    <a title="Editar" href="<?php echo base_url() ?>Usuarios/editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Usuarios/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
                                                        <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-user-slash"></i></button>
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
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Usuarios/insertar" autocomplete="off">
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
                                <?php if($_SESSION['rol'] >= 6){ ?><option value="6">Administrador</option> <?php } ?>
                                <?php if($_SESSION['rol'] >= 5){ ?><option value="4">Gestor</option> <?php } ?>
                                <?php if($_SESSION['rol'] >= 4){ ?><option value="4">Gerente</option> <?php } ?>
                                <?php if($_SESSION['rol'] >= 3){ ?><option value="3">Externo Jurídico</option> <?php } ?>
                                <?php if($_SESSION['rol'] >= 2){ ?><option value="2">Externo Administrativo</option> <?php } ?>
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
<?php } ?>

<?php pie() ?>