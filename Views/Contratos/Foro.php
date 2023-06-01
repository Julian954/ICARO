<?php if($_SESSION['rol'] <= 1){ ?> <!-- valida el rol, si no se cumple muestra el mensaje de error -->
  <?php permisos() ?> <!-- Poner el header -->
<?php } else { ?> <!-- En caso de ser válido -->
  <?php encabezado() ?> <!-- Poner el header -->

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <h1 class="app-page-title">Validación de Contratos</h1>
          <div class="" id="faq2-heading-1">
                  <a class="" type="button" href="contratos_rev.php">
                    <svg width="1em" height="1em" viewBox="0 0 512 512" class="bi bi-arrow-right ml-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                    <path d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z"/></svg>
                    Volver
                  </a>
          </div>
        </div>
<div class='app-card shadow-sm h-100' style='margin-top:20px !important;'>
              <div class='app-card-body p-3 p-lg-4'>
                <div><h4 style='color:'><?php echo $data1['id_contrato']?></h4></div>
            <div class='sstats-meta text-success'><?php echo $data1['id_creador']?></div>
            <div class='sstats-meta intro'><?php echo $data1['descripcion']?></div>
            <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php echo $data1['fecha']?></div>
            <div style='margin-top:15px; margin-bottom: 30px;'><div style='height:12px !important;'><a href="<?php echo base_url(); ?>Assets/Documentos/<?php echo $data1['archivo']; ?>" class='btn-sm app-btn-secondary' style='background-color:#F7DC6F; font-weight: bold; font-size:12px;'><?php echo $data1['archivo']; ?></a></div></div>
            </div><!--//app-card-body-->
              <a class='app-card-link-mask' href='#'></a>
            </div><!--//app-card-->
            <br /><a href='formulario_rev_contrato.php?id&respuestas=$respuestas&identificador=$id'>Responder Aqui</a><br />
          <div class='app-card shadow-sm h-100' style='margin-top:20px !important;'>
              <div class='app-card-body p-3 p-lg-4'>
                <div>
                  <h5 style=''>
                  <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-arrow-down' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                  <path fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z'/>
                  </svg>Historial</h5></div>
  

            <div class='mb-3'>
            <div style='font-size:14px; color:#5cb377;'><?php $data1['id_contrato']?></div>
            <div style='font-size:12px;'><?php $data1['id_contrato']?></div>
            <div style='font-size:14px; color:#000000;'><?php $data1['id_contrato']?></div>
            <div class='sstats-meta' style='color:#000000; font-size:10px;'><?php $data1['id_contrato']?></div>
            </div>

      </div>
    </div><!--//app-wrapper-->
<div style="margin-top:20px">
<form class="settings-form" id="" method="POST" name="form" action="php/modificaElContrato_juridico.php">
<input type="" id="numContrato_Validar" name="numContrato_Validar" value="
<?php
  include("conexionBD.php");
  if(isset($_GET["id"]))
  $id = $_GET['id'];
  $query = "SELECT * FROM foro WHERE ID = '$id' ORDER BY fecha DESC";
  $result = $mysqli->query($query);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $id = $row['ID'];
    $titulo = $row['titulo'];
    echo $titulo;
  }
?>">
<input class='btn app-btn-primary' type="submit" id="submitX" name="submitX" value="Validar">
</form>

<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->
