<?php if($_SESSION['rol'] == 7){ ?> <!-- Si es Admin-->
    <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Usuarios Inactivos</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-4">
                            <div class="app-card-body p-3">
                                <div class="row">
                                    <div class="col-lg-8 mb-2 py-2">
                                        <a href="<?php echo base_url(); ?>Usuarios/Listar" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "eliminado") { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>El usuario fue eliminado.</strong>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>El usuario fue reingresado.</strong>
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
                                                <th class="cell" >No. Trabajador</th>
                                                <th class="cell" >Correo</th>
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
                                                <td><?php
                                                    if ($us['rol'] == 5) {
                                                        echo "Administrador";
                                                    } elseif ($us['rol'] == 4) {
                                                        echo "Gestor";
                                                    } elseif ($us['rol'] == 3) {
                                                        echo "Vendedor";
                                                    } elseif ($us['rol'] == 2) {
                                                        echo "Responsable";
                                                    } ?> </td>
                                                <td>
                                                    <form id="formulario1" action="<?php echo base_url() ?>Usuarios/reingresar?id=<?php echo $us['id']; ?>" method="post" class="d-inline reingresar">
                                                        <button title="Reingresar" type="submit" class="btn btn-success"><i class="fas fa-user"></i></button>
                                                    </form>
                                                    <form id="formulario2" action="<?php echo base_url() ?>Usuarios/eliminarper?id=<?php echo $us['id']; ?>" method="post" class="d-inline elimper">
                                                        <button title="Eliminar" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }} ?>
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

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->