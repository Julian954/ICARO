  const base = document.getElementById("url").value;

  $(document).ready(function(){
    $("#TableArticulos").DataTable({
      processing: true,
      serverSide: true,
      sAjaxSource: "../ServerSide/serversideArticulos.php",
      columnDefs: [
        {
          targets: -1,
          defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fas fa-trash'></i></button></div></div>",
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
        aria: {
          sortAscending: ": Activar orden de columna ascendente",
          sortDescending: ": Activar orden de columna desendente",
        },
      },
    });

 var fila; //captura la fila, para editar o eliminar

 //para limpiar los campos antes de dar de Alta una Persona
 $("#btnNuevo").click(function () {
   opcion = 1; //alta
   user_id = null;
   $("#formUsuarios").trigger("reset");
   $(".modal-header").css("background-color", "#17a2b8");
   $(".modal-header").css("color", "white");
   $(".modal-title").text("Alta de Usuario");
   $("#modalCRUD").modal("show");
 });

 //Editar
 $(document).on("click", ".btnEditar", function () {
   fila = $(this).closest("tr");
   id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
   clave = fila.find("td:eq(1)").text();
   desc = fila.find("td:eq(2)").text();
   corta = fila.find("td:eq(3)").text();
   $("#id").val(id);
   $("#cl").val(clave);
   $("#des").val(desc);
   $("#cor").val(corta);
   $("#modalCRUD").modal("show");
 });

 //Borrar
 $(document).on("click", ".btnBorrar", function () {
   fila = $(this);
   user_id = parseInt($(this).closest("tr").find("td:eq(0)").text());
   var respuesta = confirm(
     "¿Está seguro de borrar el registro " + user_id + "?"
   );
   if (respuesta) {
     $.ajax({
       url: base + "Articulos/eliminar",
       type: "POST",
       datatype: "json",
       data: { opcion: opcion, user_id: user_id },
       success: function () {
         tablaUsuarios.row(fila.parents("tr")).remove().draw();
       },
     });
   }
 }); 

});

