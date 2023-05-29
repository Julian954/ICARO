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
              <a href="<?php echo base_url() ?>login" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?> <!-- En caso de ser valido -->
<!--//app-header-->
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

			    <h1 class="app-page-title">Revision</h1>
        
         <button class="btn btn-success" data-toggle="modal" data-target="#VentanaModal">Cargar Contratos de Validación</button>
          
          <div class="app-card app-card-accordion shadow-sm mb-4" >
				    <div class="">
              <div class="modal fade" id="VentanaModal" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
              <div class="dialog-modal" rol="document">
            <div class="modal-content">
            <h4 class="app-card-title" id="TituloVentana">Cargar Datos</h4>
               <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
				    <!--//app-card-header-->
				    <div class="app-card-body p-4" style="padding-top:20px; important!">
              <div class="app-card-body">
                <form method="POST" action="<?php echo base_url(); ?>/Contratos/agregar_validadcont" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3">
                <?php
// Ejemplo de conexión a la base de datos
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "imss";
// Crear una conexión
$conexion = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
// Consulta SQL para obtener los datos
$consulta_cont="SELECT * FROM contratos";
$consulta = "SELECT * FROM usuarios";
$consulta_validarcont="SELECT * FROM validar_cont JOIN contratos ON validar_cont.id_contrato=contratos.numero";
$resultado = $conexion->query($consulta);
$resultado_cont=$conexion->query($consulta_cont);
$resultado_validarcont=$conexion->query($consulta_validarcont);
// Obtener todos los resultados en un array
$datos = $resultado->fetch_all(MYSQLI_ASSOC);
$datoscont = $resultado_cont->fetch_all(MYSQLI_ASSOC);
$datosvalidarcont=$resultado_validarcont->fetch_all(MYSQLI_ASSOC);
?>
<label for="setting-input-3" class="form-label" style="color:#000000;">No.Trabajador y Nombre </label>
<select class="form-control" name="miSelect1" id="miSelect1">
    <?php foreach ($datos as $fila): ?>
      <?php if($fila['rol']==3){ ?>
        <option value="<?php echo $fila['usuario']; ?>"><?php echo $fila['usuario'] ." - ". $fila['nombre']; ?></option>     
        <?php } ?>                
    <?php endforeach; ?>
</select>       
</div>
<div class="mb-3">
                    <label for="setting-input-1" class="form-label" style="color:#000000;">Numero de Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                    <circle cx="8" cy="4.5" r="1"/>
                    </svg></span></label>                    
                    <select class="form-control" name="miSelect2" id="miSelect2">
    <?php foreach ($datoscont as $filacont): ?>      
        <option value="<?php echo $filacont['numero']; ?>"><?php echo $filacont['numero']; ?></option>                           
    <?php endforeach; ?>
</select>       
                  </div>
                  <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Solicitante</label><!--utilizo el nombre de usuario que se encuentra logeado y lo uso en el campo solicitante--> 
                    <input type="text" class="form-control" id="yo" name="yo" value="<?php echo $_SESSION['usuario'] . " - ". $_SESSION['nombre'];?>" required disabled>                            
                  </div> 
                  <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Descripción del Contrato</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                  </div>                             
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value=""/>
                </div><br>
<!--Agregar el archivo para usar el controlador y guardarlo en BD-->        
    <div>
      <span>Subir Archivo:</span>
      <input type="file" name="archivo" value=""/>
    </div>                   <br>                     
                  <button type="submit" class="btn app-btn-primary" dismiss="modal">Cargar</button>
                  <button  style="color:#ffffff" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </form>               
              </div><!--//app-card-body-->
				    </div><!--//app-card-body-->
    </div></div>
            </div>
				       <!--//app-card desde aqui borrar-->
    </div>

    <div class="modal fade" id="VentanaModal" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
              <div class="dialog-modal" rol="document">
            <div class="modal-content">
            <h4 class="app-card-title" id="TituloVentana">Cargar Datos</h4>
               <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
				    <!--//app-card-header-->
				    <div class="app-card-body p-4" style="padding-top:20px; important!">
              <div class="app-card-body">
                <form method="POST" action="<?php echo base_url(); ?>/Contratos/agregar_validadcont" autocomplete="off" enctype="multipart/form-data">
                <div class="mb-3">                
<label for="setting-input-3" class="form-label" style="color:#000000;">No.Trabajador y Nombre </label>
<select class="form-control" name="miSelect1" id="miSelect1" disabled>
    <?php foreach ($datos as $fila): ?>
      <?php if($fila['rol']==3){ ?>
        <option value="<?php echo $fila['usuario']; ?>"><?php echo $fila['usuario'] ." - ". $fila['nombre']; ?></option>     
        <?php } ?>                
    <?php endforeach; ?>
</select>       
</div>
<div class="mb-3">
                    <label for="setting-input-1" class="form-label" style="color:#000000;">Numero de Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                    <circle cx="8" cy="4.5" r="1"/>
                    </svg></span></label>                    
                    <select class="form-control" name="miSelect2" id="miSelect2">
    <?php foreach ($datoscont as $filacont): ?>      
        <option value="<?php echo $filacont['numero']; ?>"><?php echo $filacont['numero']; ?></option>                           
    <?php endforeach; ?>
</select>       
                  </div>
                  <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Solicitante</label><!--utilizo el nombre de usuario que se encuentra logeado y lo uso en el campo solicitante--> 
                    <input type="text" class="form-control" id="yo" name="yo" value="<?php echo $_SESSION['usuario'] . " - ". $_SESSION['nombre'];?>" required disabled>                            
                  </div> 
                  <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Descripción del Contrato</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                  </div>                             
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label" style="color:#000000;">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value=""/>
                </div><br>
<!--Agregar el archivo para usar el controlador y guardarlo en BD-->        
    <div>
      <span>Subir Archivo:</span>
      <input type="file" name="archivo" value=""/>
    </div>                   <br>                     
                  <button type="submit" class="btn app-btn-primary" dismiss="modal">Cargar</button>
                  <button  style="color:#ffffff" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </form>               
              </div><!--//app-card-body-->
				    </div><!--//app-card-body-->
    </div></div>
            </div>

    </div>
      <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Validación de Contratos</h1>
          <div class="" id="faq2-heading-1">
                  <a class="" type="button" href="Contratos_Revision.php">
                    <svg width="1em" height="1em" viewBox="0 0 512 512" class="bi bi-arrow-right ml-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                    <path d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"/></svg>
                    Volver
                  </a>
          </div>
        </div>
      <table class="table table-head-bg-success table-striped table-hover" id="Table">
            <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
              <tr>            
                <th scope="col"></th>    
                <th scope="col">Contrato</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Interno Juridico</th>
                <th scope="col">Externo Juridico</th>                
                <th scope="col">Estado</th>
                <th scope="col">Ver</th>
              </tr>
            </thead>
            <tbody style="font-size: 0.875rem !important;">

        
                                        <?php foreach ($datosvalidarcont as $validar) { ?>
                                            <tr>
                                            <td></td>
                                                <td><?php echo $validar['id_contrato']; ?></td>
                                                <td><?php echo $validar['fecha']; ?></td>
                                                <td><?php echo $validar['id_creador']; ?></td>
                                                <td><?php echo $validar['id_validador']; ?></td>
                                                <td><?php echo $validar['estado']+1; ?></td>
                                                <!--boton de llamr modal y visualizar el pdf adjunto-->
                                                <td><button class="btn btn-danger"  ><img src="../Assets/img/pdf_icono.png" alt="" width="22px" height="17px"></button ><button class="btn btn-primary" style="color:#ffffff" data-toggle="modal" data-target="#VentanaModal">Ver</button></td>
                                                <?php }?>

                                            </tr>
                                        
                                    
            </tbody>
          </table>
	  </div><!--//app-content-->    
    </div>    	        
                  </table>
						      </div><!--//table-responsive-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
			      </div><!--//tab-pane-->
            <div style="margin-top:-20px;">
              
          </div>
        </div><!--//tab-content-->
      </div>
    </div><!--//app-wrapper-->

    
    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
        <?php } ?>

<?php pie() ?> <!-- Pone el fotter -->