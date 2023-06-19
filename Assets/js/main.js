$(document).ready(function() {
var id, opcion;
    
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

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formArticulos').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    clave = $.trim($('#clave').val());    
    descripcion = $.trim($('#descripcion').val());
    des_corta = $.trim($('#des_corta').val());                             
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, clave:clave, descripcion:descripcion, des_corta:des_corta},    
          success: function(data) {
            tablaArticulos.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id=null;
    $("#formArticulos").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    clave = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    des_corta = fila.find('td:eq(3)').text();
    $("#clave").val(clave);
    $("#descripcion").val(descripcion);
    $("#des_corta").val(des_corta);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Articulo");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el Articulo "+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    