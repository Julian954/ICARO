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
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Editar Unidad</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Unidades/actualizar" autocomplete="off"> 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data1['nombre']; ?>" required>
                            </div>                                                                                        
                                    <div class="form-group">
                                        <label for="clave">Clave</label>
                                        <input id="clave" max="999999999999999" class="form-control" type="number" name="clave" placeholder="Matrícula" value="<?php echo $data1['clave']; ?>" required>
                                    </div>                                                                
                                    <div class="form-group">
                                        <label for="abreviacion">Abreviacion</label>
                                        <input id="abreviacion" class="form-control" type="text" name="abreviacion" placeholder="Abreviacion" value="<?php echo $data1['abreviacion']; ?>" required>
                                    </div>
                                </div>                               
                            
                        
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Unidades/Unidad" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
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