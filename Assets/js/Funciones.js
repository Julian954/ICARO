const base = document.getElementById("url").value;
const urls = base + "Entradas/ingresar";
const cotizacion = base + "Practicas/ingresar";


var URLactual = String(window.location);
var Posicion = URLactual.indexOf("?");
var Final = Posicion + 33;
let Part = URLactual.slice(Posicion, Final);
var fila; //captura la fila, para editar o eliminar

$(document).ready(function () {
  //MENSAJE DE CARGA
  if (document.getElementById("formulario1") !== null) {
    const formulario1 = document.getElementById("formulario1");
    formulario1.addEventListener("submit", function (event) {
      if (document.getElementById("modal1") !== null) {
        const modal = document.getElementById("modal1");
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        modal.classList.remove("show");
        // Obtener todos los elementos <div> con la clase "modal-backdrop"
        const elementosBackdrop = document.querySelectorAll(".modal-backdrop");
        // Recorrer y eliminar cada elemento <div> con la clase "modal-backdrop"
        elementosBackdrop.forEach((elemento) => {
          elemento.remove();
        });
      }
      var contenedor = document.getElementById("pantalla-carga");
      contenedor.style.visibility = "visible";
    });
  }
  if (document.getElementById("formulario2") !== null) {
    const formulario2 = document.getElementById("formulario2");
    formulario2.addEventListener("submit", function (event) {
      if (document.getElementById("modal2") !== null) {
        const modal = document.getElementById("modal2");
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        modal.classList.remove("show");
        // Obtener todos los elementos <div> con la clase "modal-backdrop"
        const elementosBackdrop = document.querySelectorAll(".modal-backdrop");
        // Recorrer y eliminar cada elemento <div> con la clase "modal-backdrop"
        elementosBackdrop.forEach((elemento) => {
          elemento.remove();
        });
      }
      var contenedor = document.getElementById("pantalla-carga");
      contenedor.style.visibility = "visible";
    });
  }
  if (document.getElementById("formulario3") !== null) {
    const formulario3 = document.getElementById("formulario3");
    formulario3.addEventListener("submit", function (event) {
      if (document.getElementById("modal3") !== null) {
        const modal = document.getElementById("modal3");
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        modal.classList.remove("show");
        // Obtener todos los elementos <div> con la clase "modal-backdrop"
        const elementosBackdrop = document.querySelectorAll(".modal-backdrop");
        // Recorrer y eliminar cada elemento <div> con la clase "modal-backdrop"
        elementosBackdrop.forEach((elemento) => {
          elemento.remove();
        });
      }
      var contenedor = document.getElementById("pantalla-carga");
      contenedor.style.visibility = "visible";
    });
  }
  if (document.getElementById("formulario4") !== null) {
    const formulario4 = document.getElementById("formulario4");
    formulario4.addEventListener("submit", function (event) {
      if (document.getElementById("modal4") !== null) {
        const modal = document.getElementById("modal4");
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        modal.classList.remove("show");
        // Obtener todos los elementos <div> con la clase "modal-backdrop"
        const elementosBackdrop = document.querySelectorAll(".modal-backdrop");
        // Recorrer y eliminar cada elemento <div> con la clase "modal-backdrop"
        elementosBackdrop.forEach((elemento) => {
          elemento.remove();
        });
      }
      var contenedor = document.getElementById("pantalla-carga");
      contenedor.style.visibility = "visible";
    });
  }
  if (document.getElementById("formulario5") !== null) {
    const formulario5 = document.getElementById("formulario5");
    formulario5.addEventListener("submit", function (event) {
      if (document.getElementById("modal5") !== null) {
        const modal = document.getElementById("modal5");
        modal.style.display = "none";
        modal.setAttribute("aria-hidden", "true");
        modal.classList.remove("show");
        // Obtener todos los elementos <div> con la clase "modal-backdrop"
        const elementosBackdrop = document.querySelectorAll(".modal-backdrop");
        // Recorrer y eliminar cada elemento <div> con la clase "modal-backdrop"
        elementosBackdrop.forEach((elemento) => {
          elemento.remove();
        });
      }
      var contenedor = document.getElementById("pantalla-carga");
      contenedor.style.visibility = "visible";
    });
  }

  //Editar Articulo
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    clave = fila.find("td:eq(1)").text();
    desc = fila.find("td:eq(2)").text();
    corta = fila.find("td:eq(3)").text();
    cantidad = fila.find("td:eq(4)").text();
    $("#id").val(id);
    $("#cl").val(clave);
    $("#des").val(desc);
    $("#cor").val(corta);
    $("#cantidad").val(cantidad);
    $("#modal3").modal("show");
  });

  //Eliminar Articulo
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    clave = fila.find("td:eq(1)").text();
    desc = fila.find("td:eq(2)").text();
    corta = fila.find("td:eq(3)").text();
    $("#ide").val(id);
    $("#cle").val(clave);
    $("#dese").val(desc);
    $("#modal4").modal("show");
  });

  // Escucha el evento clic en el botón "Enlazar"
  $("#TablePedidos").on("click", ".enlazar-btn", function () {
    var table = $("#TablePedidos").DataTable();
    var data = table.row($(this).parents("tr")).data();

    // Realizar una solicitud POST al servidor para redireccionar
    $.post("../ServerSide/serversidePedidos.php", function () {
      window.location.href = "modal.php";
    });
  });

  //este es el tuyo
  $(document).on("click", ".btnEditarP", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    contrato = fila.find("td:eq(1)").text();
    monto = fila.find("td:eq(7)").text();
    $("#id").val(id);
    $("#contrato").val(contrato);
    $("#monto2").val(monto);
    $("#VentanaModalP").modal("show");
  });

  //Mensaje de alerta al inactivar algo
  $(".elim").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de ponerlo como inactivo?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al activar algo
  $(".reingresar").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de ponerlo como activo?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar algo
  $(".elimper").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar permanentemente?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al formalizar
  $(".forma").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de Formalizar el Instrumento?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al validar
  $(".validar").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de Validar el Instrumento?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar algo
  $(".elimart").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar permanentemente?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        fila = $(this);
        id = parseInt($(this).closest("tr").find("td:eq(0)").text());
        $.ajax({
          url: base + "Articulos/eliminar",
          type: "POST",
          datatype: "json",
          data: { id: id },
          success: function () {
            tablaUsuarios.row(fila.parents("tr")).remove().draw();
          },
        });
        location.href = base + "Articulos/Listarart?msg=eliminado";
      }
    });
  });

  //Mensaje de alerta al restablecer contraseña
  $(".aten").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de atender la queja?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  $(".subir").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar los registros del día señalado?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });
});

$(".subirank").submit(function (e) {
  e.preventDefault();
  Swal.fire({
    title: "¿Está seguro de agregar la nueva informacion del día señalado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  });
});



"use strict";

window.chartColors = {
  green: "#75c181",
  gray: "#a9b5c9",
  text: "#252930",
  blue: "#5b99ea",
  border: "#e7e9ed",
};


function barrasrankig() {
  $.ajax({
    url: base + "Indicadores/barrasrankig" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["mname"]);
        ventas.push(data[i]["colima"]);
        compras.push(data[i]["nacional"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Colima",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Nacional",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("barrasrankig");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: nombre,
          datasets: [Ventas, Compras],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}


function BarrasAtencion() {
  $.ajax({
    url: base + "Inicio/BarrasAtencion" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
      var nacional = [];
      var colima = [];
      for (var i = 0; i < data.length; i++) {
        nacional.push(data[i]["mnacional"]);
        colima.push(data[i]["colima"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Colima = {
        label: "Colima",
        data: colima,
        backgroundColor: "rgba(92, 179, 119, 0.2)", // Color de fondo
        borderColor: "rgba(92, 179, 119, 0.8)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Nacional = {
        label: "Nacional",
        data: nacional,
        borderDash: [3, 5],
        backgroundColor: "rgba(0, 168, 198, 0.0)", // Color de fondo
        borderColor: "rgba(0, 168, 198, 1)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasAtencion");
      var myLineChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: nombre,
          datasets: [Nacional, Colima],
        },
        options: {
          tooltips: {
            mode: "index",
            intersect: false,
            titleMarginBottom: 10,
            bodySpacing: 10,
            xPadding: 16,
            yPadding: 16,
            borderColor: window.chartColors.border,
            borderWidth: 1,
            backgroundColor: "#fff",
            bodyFontColor: window.chartColors.text,
            titleFontColor: window.chartColors.text,

            callbacks: {
              //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
              label: function (tooltipItem, data) {
                if (parseInt(tooltipItem.value) >= 1000) {
                  return (
                    "%" +
                    tooltipItem.value
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ",") +
                    "%"
                  );
                } else {
                  return tooltipItem.value + "%";
                }
              },
            },
          },
          hover: {
            mode: "nearest",
            intersect: true,
          },
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function pastelnegadas() {
  $.ajax({
    url: base + "Inicio/pastelnegadas",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["abreviacion"]);
        total.push(data[i]["negadas"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("pastelnegadas");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#b0c2f2",
                "#b0f2c2",
                "#fcb7af",
                "#d8f8e1",
                "#ffe4e1",
                "#fdf9c4",
                "#ffda9e",
                "#c5c6c8",
                "#b2e2f2",
                "#fabfb7",
              ],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: true,
            position: "right",
            align: "center",
          },
        },
      });
    },
  });
}

function chart_pie() {
  $.ajax({
    url: base + "Contratos/chart_pie",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = ["Devengo","Contratos"];
      var devengo = [];
      devengo.push(data[0]["devengo"]);
      devengo.push(data[0]["total"]);
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("chart_pie");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: devengo,
              backgroundColor: ["#1E8449", "#2980B9" ],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: true,
            position: "right",
            align: "center",
          },
        },
      });
    },
  });
}

function chart_pie2() {
  $.ajax({
    url: base + "Contratos/chart_pie2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = ["Devengo", "Presupuesto Global"];
      var global = [];
      global.push(data[0]["devengo"]);
      global.push(data[0]["total"]);
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("chart_pie2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: global,
              backgroundColor: ["#1E8449", "#6C3483"],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: true,
            position: "right",
            align: "center",
          },
        },
      });
    },
  });
}

function GeneralContratos() {
  $.ajax({
    url: base + "Contratos/GeneralContratos",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("GeneralContratos");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          position: "right",
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#b0c2f2",
                "#b0f2c2",
                "#fcb7af",
                "#d8f8e1",
                "#ffe4e1",
                "#fdf9c4",
                "#ffda9e",
                "#c5c6c8",
                "#b2e2f2",
                "#fabfb7",
              ],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: true,
            position: "right",
            align: "center",
          },
        },
      });
    },
  });
}

function GeneralContrataciones() {
  $.ajax({
    url: base + "Contrataciones/GeneralRequerimientos",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        'Montserrat,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("GeneralContrataciones");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          position: "right",
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#b0c2f2",
                "#b0f2c2",
                "#fcb7af",
                "#d8f8e1",
                "#ffe4e1",
                "#fdf9c4",
                "#ffda9e",
                "#c5c6c8",
                "#b2e2f2",
                "#fabfb7",
              ],
            },
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: true,
            position: "right",
            align: "center",
          },
        },
      });
    },
  });
}