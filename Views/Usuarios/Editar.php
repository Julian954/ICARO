<?php if($_SESSION['rol'] == 7){ ?> <!-- Si es Admin-->
    <?php encabezado() ?> <!-- Poner el header -->
    
<!-- Begin Page Content -->
<div class="app-wrapper">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-user-edit"></i> <strong>Editar Usuario</strong></h5>
                    <form id="formulario1" method="post" action="<?php echo base_url(); ?>Usuarios/actualizar" autocomplete="off"> 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data1['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                 <label for="nombre">Correo</label>
                                 <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" value="<?php echo $data1['correo']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usuario">Matrícula</label>
                                        <input id="usuario" min="10000000" max="99999999" class="form-control" type="number" name="usuario" placeholder="Matrícula" value="<?php echo $data1['usuario']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input id="telefono" min="1000000000" max="9999999999" class="form-control" type="number" name="telefono" placeholder="Teléfono" value="<?php echo $data1['telefono']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol" required>
                                        <?php if ($_SESSION['rol'] >= 7) {?>
                                            <option value="7" <?php if ($data1['rol'] == "7") {echo "selected";} ?>>Administrador</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 6) {?>
                                            <option value="6" <?php if ($data1['rol'] == "6") {echo "selected";} ?>>Operador</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 5) {?>
                                            <option value="5" <?php if ($data1['rol'] == "5") {echo "selected";} ?>>Jefatura</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 4) {?>
                                            <option value="4" <?php if ($data1['rol'] == "4") {echo "selected";} ?>>Abogado Abasto</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 3) {?>
                                            <option value="3" <?php if ($data1['rol'] == "3") {echo "selected";} ?>>Abogado Jurídico</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 2) {?>
                                            <option value="2" <?php if ($data1['rol'] == "2") {echo "selected";} ?>>Requiriente</option>
                                        <?php if ($_SESSION['rol'] >= 1) {?>
                                            <option value="1" <?php if ($data1['rol'] == "1") {echo "selected";} ?>>Almacén</option> <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Usuarios/Listar" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->