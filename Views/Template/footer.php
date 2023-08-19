	<div class="app-wrapper">
        
        <div style="visibility: hidden;" id="pantalla-carga">
            <div class="mensaje-carga">
                <a href="" style="text-decoration: none;" class="btn-flotante">
                    <span>
                        <img class="logo-icon mr-2" src="<?php echo base_url(); ?>Assets/img/carga.gif" height="50px" alt="logo">
                        cargando...
                    </span>
                </a>
            </div>
        </div>
        <footer class="app-footer">
            <hr class="my-1">
		    <div class="container text-center py-3">
                <small class="copyright">Diseño y Desarrollo por la Coordinación de Abastecimiento y Equipamiento del OOADR del IMSS en colima. .</small>
		    </div>
	    </footer><!--//app-footer-->
    </div><!--//app-wrapper-->

<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Modificar Contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Usuarios/cambiar" method="post" id="cambiarContra">
                    <div id="errorPass"></div>
                    <div class="form-group">
                        <label for="actual">Contraseña Actual</label>
                        <input id="actual" class="form-control" type="password" name="actual" placeholder="Contraseña Actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva">Contraseña Nueva</label>
                        <input id="nueva" class="form-control" type="password" name="nueva" minlength="8" placeholder="Contraseña Nueva" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmar">Confirmar Contraseña Nueva</label>
                        <input id="confirmar" class="form-control" type="password" name="confirmar" minlength="8" placeholder="Confirmar Contraseña Nueva" required>
                    </div>
                    <button class="btn btn-success" type="submit" id="cambiar">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Pregunta</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea salir</p>
            </div>
            <div class="modal-footer ml-auto">
                <a href="<?php echo base_url(); ?>Usuarios/salir" class="btn btn-danger">Si</a>
                <button class="btn btn-primary" data-dismiss="modal" type="button">No</button>
            </div>
        </div>
    </div>
</div>
<div id="cambiarPic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Cambiar Perfil</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Usuarios/cambiarpic" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="archivo">
                          <label class="custom-file-label" for="customFile"></label>
                          <label><br><strong>Nota:</strong> Se recomienda poner una imagen cuadrada para que se pueda apreciar. Solo se admiten en formato PNG, JPG O JPEG con un tamaño máximo de 20 MB</label>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" id="subirarchivo">Cambiar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript files-->
<script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/Funciones.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/all.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/front.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/sweetalert2@9.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Assets/js/files.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/app.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
		
<script>
    window.onload = function(){
        var contenedor = document.getElementById('contenedor_carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';

    }

    function actualizarMontoMaximo() {
      var select = document.getElementById('Dictamen');
      var montoMaximo = select.options[select.selectedIndex].dataset.monto;
      var inputMonto = document.getElementById('Maximo');
      inputMonto.max = montoMaximo;
    }


    $(document).ready(function() {

        $("#TablePedidos").DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        sAjaxSource: "../ServerSide/serversidePedidos.php",
        columns: [
            { table_data: 'id',
                createdCell: function (td, cellData, rowData, row, col) {
                     $(td).attr('style', 'visibility:collapse; display:none;');
                }
            
            },
            { table_data: 'nopedido' },
            { table_data: 'tipo' },
            { table_data: 'clave' },
            { table_data: 'cantidad' },
            { table_data: 'eta' },
            { table_data: 'topn' },
            { table_data: 'monto' },
            { table_data: 'fecha_alta' },
            {
                table_data: 'monto2',
                render: function(table_data, type, row) {
                    if (table_data > 0) {
                        return 'Enlazado';
                    } else {
                        return "<div class='btn-group'><button class='btn btn-primary btn-sm btnEditarP'>ENLAZAR</button></div>";
                    }
                }
            }
        ],
        language: {
            decimal: "",
          emptyTable: "No hay datos",
          info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
          infoEmpty: "Mostrando 0 a 0 de 0 registros",
          infoFiltered: "(Filtro de _MAX_ total registros)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: "Mostrar _MENU_ registros",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          search: "Buscar:",
          zeroRecords: "No se encontraron coincidencias",
          paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Próximo",
          previous: "Anterior",
        },
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#TablePedidos_paginate').addClass("app-pagination");
            }
      });

    $("#TableArticulos").DataTable({
      processing: true,
      responsive: true,
      serverSide: true,
      sAjaxSource: "../ServerSide/serversideArticulos.php",
        columns: [
            { table_data: 'id',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).attr('style', 'visibility:collapse; display:none;');
                }
            },
            { table_data: 'clave' },
            { table_data: 'descripcion'},
            { table_data: 'des_corta' },
            { table_data: 'cantidad' },
            { 
                data: null,
                render: function(data, type, row) {
                    return "<?php if($_SESSION['rol'] != 5){ ?><button class='btn btn-primary mx-1 mb-2 btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger mx-1 mb-2 btnBorrar'><i class='fas fa-trash'></i></button><?php } ?>";
                }
            },
        ],
      language: {
        decimal: "",
        emptyTable: "No hay datos",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 registros",
        infoFiltered: "(Filtro de _MAX_ total registros)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ registros",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "No se encontraron coincidencias",
        paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Próximo",
          previous: "Anterior",
        },
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#TableArticulos_paginate').addClass("app-pagination");
            }
    });

        $('#Table').DataTable({
            responsive: true,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#Table_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#Table2').DataTable({
            responsive: true,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#Table2_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#Table3').DataTable({
            responsive: true,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#Table3_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#Table4').DataTable({
            responsive: true,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#Table4_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#Table5').DataTable({
            responsive: true,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
                "drawCallback": function( settings ) {
                 $('#Table5_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#TableN').DataTable({
            order: [[5,'desc']],
            responsive: true,
            "lengthChange": false,
            "searching": false,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
            "drawCallback": function( settings ) {
             $('#TableN_paginate').addClass("app-pagination");
            }
		});
    });
    $(document).ready(function() {
        $('#TableA').DataTable({
            responsive: true,
            "lengthChange": false,
            "searching": false,
            info: false,
			language: {
				"decimal": "",
				"emptyTable": "No hay datos",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"infoFiltered": "(Filtro de _MAX_ total registros)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No se encontraron coincidencias",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Próximo",
					"previous": "Anterior"
				},
				"aria": {
					"sortAscending": ": Activar orden de columna ascendente",
					"sortDescending": ": Activar orden de columna desendente"
				}
			},
        "drawCallback": function( settings ) {
         $('#TableA_paginate').addClass("app-pagination");
    }
		});
    });
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>






    <!-- Page Specific JS -->
    

    <!-- <script>
        tablaArticulos = $('#tablaArticulo').DataTable({  
        "bProcessing":true,
        "bDeferRender":true,
        "bServerSider":true,
        "sAjaxSource":"../ServerSide/serversideArticulos.php",
        "columnDefs":[{
            "targets":-1,
            "defaultContent":"<div class='wrapper text-center'><div class='btn-group'><button title='Eliminar' type='submit' class='btn btn-danger mb-2'><i class='fas fa-trash-alt'></i></button>"
        }]
        }); 
    </script> -->


</body>
</html>
