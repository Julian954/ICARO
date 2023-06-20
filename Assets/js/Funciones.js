const base = document.getElementById("url").value;
const urls = base + "Entradas/ingresar";
const cotizacion = base + "Practicas/ingresar";


var URLactual = String(window.location);
var Posicion = URLactual.indexOf("?");
var Final = Posicion + 33;
let Part = URLactual.slice(Posicion, Final);
var fila; //captura la fila, para editar o eliminar
const formulario = document.getElementById('formulario');


$(document).ready(function () {
  //MENSAJE DE CARGA
  formulario.addEventListener("submit", function (event) {
    var contenedor = document.getElementById("pantalla-carga");
    contenedor.style.visibility = "visible";
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

  //Mensaje de alerta al reiniciar asistencias
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
  $(".rest").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de restablecer la contraseña?",
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

  //Mensaje de alerta al eliminar todos los inactivos
  $(".Etodo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar TODOS los alumnos inactivos?",
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

  //Mensaje de alerta al reingresar todos los inactivos
  $(".Rtodo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de reingresar a TODOS los alumnos inactivos?",
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

  //Mensaje de alerta al cancelar práctica
  $(".Cprac").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de CANCELAR la práctica?",
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

  //Mensaje de alerta al cancelar práctica
  $(".Mprac").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title:
        "¿Estás seguro de TERMINAR la práctica y continuar con la salida de materiales?",
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

  //Mensaje de reingresar algo
  $(".confirmar").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de reingresar?",
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

  //Mensaje de alerta al rechazar transacción
  $(".rechazo").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de rechazar la transacción?",
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

  //Mensaje de alerta al registrase
  $(".registro").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de registrarte a esta práctica?",
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

  //Mensaje de alerta de aprobar transacción
  $(".aprobado").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de aprobar la transacción?",
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

//Gráfica de Barra
function BarrasAlumnos() {
  $.ajax({
    url: base + "Reportes/AsistenciasFaltas",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var faltas = [];
      var grado = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"]);
        faltas.push(data[i]["faltas"]);
        grado.push(data[i]["grado"] + "° Semestre");
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Asistencias = {
        label: "Asistencias",
        data: asistencias,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Faltas = {
        label: "Faltas",
        data: faltas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasAlumnos");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: grado,
          datasets: [Asistencias, Faltas],
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

function BarrasPracticas() {
  $.ajax({
    url: base + "Reportes/PracticasCaras",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var descripcion = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        descripcion.push(data[i]["descripcion"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Practicas = {
        label: "Precio $",
        data: total,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("PracticasCaras");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: descripcion,
          datasets: [Practicas],
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

function BarrasMateriales1() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasDinero" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas $",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas $",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales1");
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

function BarrasMateriales2() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasPiezas" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales2");
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
        nombre.push(data[i]["mes"]);
        ventas.push(data[i]["colima"]);
        compras.push(data[i]["nacional"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
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
      var nombre = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
      var nacional = [];
      var colima = [];
      for (var i = 0; i < data.length; i++) {
        nacional.push(data[i]["mnacional"]);
        colima.push(data[i]["colima"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
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
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
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
                "#A8E6CE",
                "#DCEDC2",
                "#FFD3B5",
                "#FFAAA6",
                "#00A8C6",
                "#FF9C00e",
              ],
            },
          ],
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
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("GeneralContratos");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#A8E6CE",
                "#DCEDC2",
                "#FFD3B5",
                "#FFAAA6",
                "#00A8C6",
                "#FF9C00e",
              ],
            },
          ],
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
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";
      // Pie Chart Example
      var ctx = document.getElementById("GeneralContrataciones");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#A8E6CE",
                "#DCEDC2",
                "#FFD3B5",
                "#FFAAA6",
                "#00A8C6",
                "#FF9C00e",
              ],
            },
          ],
        },
      });
    },
  });
}