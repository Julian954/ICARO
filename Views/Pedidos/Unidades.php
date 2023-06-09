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
<?php }  else { ?> <!-- En caso de ser valido -->

    <div class="app-wrapper">
      <div class="app-content pt-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Unidades En Existencia</h1>
					    </div><!--col-auto-->
				    </div><!--row g-3 justify-content-between-->
			    </div><!--position-relative mb-3-->

    <section>
        <div class="card container-fluid2">            
            <div class="card-body">
            <div class="col-lg-8 mb-2">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nueva Unidad</button>                                    
                                </div>
                <div class="container-fluid ">                 
                            <div class="table-responsive mt-4">
                            <table class="table table-head-bg-success table-striped table-hover">
    <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
            <tr>                
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Clave</th>
                <th scope="col">Abreviatura</th>        
                <th scope="col">Acciones</th>                        
            </tr>
    </thead>
    <tbody style="font-size: 0.875rem !important;">
            <tr>
            <?php foreach ($data1 as $unidades){?>
                <td></td>
                <td><?php echo $unidades['nombre'];?></td>
                <td><strong><?php echo $unidades['clave'];?></strong></td>
                <td><?php echo $unidades['abreviacion'];?></td>      
                <td><a title="Editar" href="<?php echo base_url() ?>Pedidos/Unidades_Editar?id=<?php echo $unidades['id']; ?>" class="btn btn-secondary mb-2"><i class="fas fa-edit"></i></a>                
                <form action="<?php echo base_url() ?>Pedidos/eliminarper?id=<?php echo $unidades['id']; ?>" method="post" class="d-inline elimper">
                <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash"></i></button>                
                </form></td>                                   
            </tr>          
            <?php }?>  
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
            <form method="post" action="<?php echo base_url(); ?>Pedidos/insertar" autocomplete="off">
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
	
	<?php } ?>

<?php pie() ?>