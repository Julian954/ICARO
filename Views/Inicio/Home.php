<?php encabezado() ?> <!-- Poner el header -->

<div class="app-wrapper">
  <div class="app-content pt-3 p-lg-4">
    <div class="container-xl">
      <div class="position-relative mb-3">
        <div class="row g-3 justify-content-between">
          <div class="col-auto">
            <h1 class="app-page-title mb-0">Inicio</h1>
          </div>
        </div>
      </div>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
				  <div class="app-card-body p-3 p-lg-4">
				    <h3 class="mb-3">Bienvenido</h3>
				    <div class="row gx-5 gy-3">
						  <div class="col-12 col-lg-12">
							    <div>MARYS es un portal que te ayuda a facilitar las tareas administrativas de OOARD Colima.</div>
							</div><!--//col-->
						</div><!--//row-->
					</div><!--//app-card-body-->   
				</div><!--//inner-->
			</div><!--//app-card-->

      <div class="app-card app-card-notification shadow-sm mb-4">
        <div class="app-card-header px-4 py-3">
          <div class="row g-3 align-items-center">
            <div class="col-6 col-lg-auto text-center text-lg-left">
              <img class="profile-image" src="<?php echo base_url(); ?>Assets/img/users/<?php echo $_SESSION['perfil'] ?>" alt="user profile">
            </div><!--//col-->
            <div class="col-6 col-lg-auto text-center text-lg-left">
              <div class="notification-type mb-2">
                <span class="badge bg-info"><?php echo $_SESSION['nrol'] ?></span>
              </div>
              <h4 class="notification-title mb-1"><?php echo $_SESSION['nombre'] ?></h4>
              <ul class="notification-meta list-inline mb-0">
                <li class="list-inline-item"><?php echo $_SESSION['correo'] ?></li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item"><?php echo $_SESSION['telefono'] ?></li>
              </ul>
            </div><!--//col-->
            <div class="col-3 col-sm-auto text-center text-lg-right">
            </div><!--//col-->
            <div class="col-7 col-lg-auto col-md-auto text-center text-lg-center">
              <?php if (isset($_GET['msg'])) {
                  $alert = $_GET['msg'];
                  if ($alert == "registrado") { ?>
                      <div class="alert alert-success" role="alert">
                        <h3 class="notification-title">REGISTRADO</h3>
                        <div class="notification-subtitle"">El Contrato se registró con éxito.</div>
                      </div>
                  <?php } else if ($alert == "error") { ?>
                      <div class="alert alert-danger" role="alert">
                        <h3 class="notification-title">ERROR</h3>
                        <div class="notification-subtitle">No se pudo registrar el Contrato, <br>intente de nuevo o cantacte a soporte.</div>
                      </div>
                  <?php }
              } ?>
            </div><!--//col-->
          </div><!--//row-->
        </div><!--//app-card-header-->
      </div><!--//perfil-->
    </div><!--//content tab-content-->
  </div><!--//container-xl-->
</div><!--app-content pt-3 p-md-3 p-lg-4-->  

<?php pie() ?> <!-- app-wrapper -->