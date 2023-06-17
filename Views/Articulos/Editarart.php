<?php if($_SESSION['rol'] == 7){ ?> <!-- Si es Admin-->
    <?php encabezado() ?> <!-- Poner el header -->

<!-- Begin Page Content -->
<div class="app-wrapper">
    <section>
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-user-edit"></i> <strong>Editar Articulo</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Articulos/actualizar" autocomplete="off"> 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="clave">Clave</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <input id="clave" min="00000000000000" max="99999999999999" class="form-control" type="text" name="clave" placeholder="Clave" value="<?php echo $data1['clave']; ?>" required>
                            </div>
                            <div class="form-group">
                                 <label for="clave">Descripcion</label>
                                 <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $data1['descripcion']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="clave">Descripcion corta</label>
                                        <input id="descorta"  class="form-control" type="text" name="descorta" placeholder="Matrícula" value="<?php echo $data1['des_corta']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Articulos/Listarart" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
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