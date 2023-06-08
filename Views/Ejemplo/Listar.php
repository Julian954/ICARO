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

                    <div class="container2">
                      <input type="file" id="file-input" multiple />
                      <label for="file-input">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        &nbsp; Choose Files To Upload
                      </label>
                      <div id="num-of-files">No Files Choosen</div>
                      <ul id="files-list"></ul>
                    </div>
<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->