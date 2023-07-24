<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 6 || $_SESSION['rol'] == 5){ ?> <!-- Si es Admin, jefatura u operador-->
    <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-lg-4">
            <div class="container-xl">
                <div class="position-relative mb-3">
                    <div class="row g-3 justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">Artículos Registrados</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-4">
                            <div class="app-card-body p-3">
                                <div class="row">
                                    <div class="col-lg-8 mb-2 py-2">
                                        <?php if($_SESSION['rol'] != 5){ ?>
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modal2"><i class="fas fa-upload"></i> Subir Archivo</button>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "Eliminado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>El artículo fue eliminado.</strong>
                                                </div>
                                            <?php } elseif ($alert == "existe") { ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>El artículo ya existe.</strong>
                                                </div>
                                            <?php } elseif ($alert == "registrado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>El artículo fue registrado.</strong>
                                                </div>
                                            <?php } elseif ($alert == "modificado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>El artículo fue modificado.</strong>
                                                </div>
                                            <?php } elseif ($alert == "catalogo") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong><?=$_GET['total']?> Artículos del catalogo fueron actualizado.</strong>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Error, intente de nuevo.</strong>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                                <span style="font-weight: normal;font-size: 12px">Artículos actualizados el <?= $data1['fecha'];?></span>
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="TableArticulos">
    							        <thead>
                                            <tr>
                                            <th class="cell" style="visibility:collapse; display:none;">Numero de Articulo</th>
                                            <th class="cell" >Clave de Articulo</th>
                                            <th class="cell" >Descripcion</th>
                                            <th class="cell" >Descripcion corta</th>
                                            <th class="cell" >Cantidad</th>
                                            <th class="cell" <?php if($_SESSION['rol'] == 5){ ?>style="visibility:collapse; display:none;"<?php } ?>>Acciones</th>
                                            </tr>
                                        </thead>
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
                    <h5 class="modal-title" id="my-modal-title"> Nuevo Articulo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formulario1" method="post" action="<?php echo base_url(); ?>Articulos/insertar" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="clave">Codigo del Articulo</label>
                            <input id="clave" class="form-control" type="text" name="clave" placeholder="Ingresa los 14 digitos" minlength="14" maxlength="14" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Descripcion</label>
                            <input id="desc" class="form-control" type="text" name="desc" placeholder="Descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="corta">Clave corta</label>
                            <input id="corta" class="form-control" type="text" name="corta" placeholder="Descripcion corta" required>
                        </div>
                        <div class="form-group">
                            <label for="cant">Cantidad</label>
                            <input id="cant" class="form-control" type="text" name="cant" placeholder="Cantidad" required>
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
    <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Actualizar Catalogo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>Articulos/procesarArchivo" method="post" enctype="multipart/form-data" id="formulario2">
						<div class="form-group">
                    	    <label for="img">Selecciona Archivo</label>
                    	    <div class="custom-file">
                    	      <input type="file" class="custom-file-input" id="file-input" accept="csv" name="archivo_csv" required>
                    	      <label class="custom-file-label" for="customFile"></label>
                    	      <label><br><strong>Nota:</strong> Solo se permiten archivos CSV, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                    	    </div>
                    	</div>
						<button class="btn btn-success" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Subir Documento</button>
					</form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Ediatr Articulo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formulario3" method="post" action="<?php echo base_url(); ?>Articulos/actualizar" autocomplete="off">    
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cl">Codigo del Articulo</label>
                                <input id="id" class="form-control" type="hidden" name="id" placeholder="Ingresa los 14 digitos" required>
                                <input id="cl" class="form-control" type="text" name="clave" placeholder="Ingresa los 14 digitos" minlength="14" maxlength="14" required>
                            </div>
                            <div class="form-group">
                                <label for="des">Descripcion</label>
                                <textarea id="des" class="form-control" type="text" name="desc" placeholder="Descripcion" required cols="auto" rows="auto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cor">Clave corta</label>
                                <input id="cor" class="form-control" type="text" name="corta" placeholder="Descripcion corta" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Actualizar </button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>             
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Eliminar Articulo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formulario4" method="post" action="<?php echo base_url(); ?>Articulos/eliminar" autocomplete="off" class="elimper">    
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cle">Codigo del Articulo</label>
                                <input id="ide" class="form-control" type="hidden" name="ide" placeholder="Ingresa los 14 digitos" required>
                                <input id="cle" class="form-control" type="text" name="clavee" placeholder="Ingresa los 14 digitos" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dese">Descripcion</label>
                                <textarea id="dese" class="form-control" type="text" name="desce" placeholder="Descripcion" readonly cols="auto" rows="auto"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Eliminar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>             
                    </div>
                </form>    
            </div>
        </div>
    </div>


<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->