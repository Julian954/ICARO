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

    <div class="app-wrapper">

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        <h1 class="app-page-title">Mayo 06, 2021</h1>

        <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Nivel de Atención</h4>
                        <div class="stats-figure">91.68<span>%</span></div>
                        <div class="stats-meta text-success">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg> 0.21%</div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
            </div><!--//col-->

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Negadas</h4>
                        <div class="stats-figure">389</div>
                        <div class="stats-meta text-success">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
</svg> 86 </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Manuales</h4>
                        <div class="stats-figure">232</div>
          <div class="stats-meta text-success">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="red" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d=""/>
<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg> 63 </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Costo x Receta</h4>
                        <div class="stats-figure">$80.77</div>
          <div class="stats-meta text-success">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="red" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d=""/>
<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg> $33.27 </div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
            </div><!--//col-->
        </div><!--//row-->
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-6">
                <div class="app-card app-card-chart h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Nivel de Atención<span style="font-weight: normal;
                      font-size: 12px">&nbsp&nbsp(Semana Acutal)</span></h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="card-header-action">
                                    <a href="">Histórico</a>
                                </div><!--//card-header-actions-->
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="chart-container">
                            <canvas id="canvas-linechart" ></canvas>
                        </div>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-12 col-lg-6">
                <div class="app-card app-card-chart h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Negadas por Unidad<span style="font-weight: normal;
                      font-size: 12px">&nbsp&nbsp(Recetas)</span></h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="card-header-action">
                                    <a href="">Hístorico</a>
                                </div><!--//card-header-actions-->
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
          <div class="app-card-body p-3 p-lg-4" style="margin-left: -60px;">
                        <div class="chart-container">
                            <canvas id="chart-pie" ></canvas>
                        </div>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->

        </div><!--//row-->


  <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Top 10 Negadas OOADR</a>
            <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">HGZ 1</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">HGZ 10</a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="tecoman-tab" data-toggle="tab" href="#tecoman" role="tab" aria-controls="tecoman" aria-selected="false">HGSZ 4</a>
        </nav>

          <div class="tab-content" id="orders-table-tab-content">
              <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                  <div class="app-card app-card-orders-table shadow-sm mb-5">
                      <div class="app-card-body">
                          <div class="table-responsive">
                              <table class="table app-table-hover mb-0 text-left">
                                  <thead>
                                      <tr>
                                          <th class="cell">Clave</th>
                                          <th class="cell">Descripción</th>
                                          <th class="cell">CPM</th>
                                          <th class="cell">Consumo</th>
                                          <th class="cell">Existencia</th>
                                          <th class="cell">Negadas</th>
                                          <th class="cell"></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td class="cell" style="color:#000000;">010 000 4376 00 00</td>
                                          <td class="cell"><span class="truncate">Polivitaminas</span></td>
                                          <td class="cell">6,876</td>
                                          <td class="cell"><span>7,602</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">155</span></td>
                                          <td class="cell">123</td>
                                          <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Pedido</a></td>
                                      </tr>
                                      <tr>
                  <td class="cell" style="color:#000000;">010 000 1210 00 00</td>
                                          <td class="cell"><span class="truncate">Pinaverio</span></td>
                                          <td class="cell">7,187</td>
                                          <td class="cell"><span>7,118</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">1,099</span></td>
                                          <td class="cell">69</td>
                                          <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                                      </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 5186 01 00</td>
                                          <td class="cell"><span class="truncate">Pantoprazol</span></td>
                                          <td class="cell">22,858</td>
                                          <td class="cell"><span>22,698</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-warning">8,563</span></td>
                                          <td class="cell">48</td>
                                          <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Pedido</a></td>
                                      </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 5309 01 01</td>
                                          <td class="cell"><span class="truncate">Tamsulosina</span></td>
                                          <td class="cell">4,280</td>
                                          <td class="cell"><span>3,052</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">297</span></td>
                                          <td class="cell">43</td>
                                          <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Pedido</a></td>
                                      </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 2111 01 00</td>
                  <td class="cell"><span class="truncate">Amlodipino</span></td>
                  <td class="cell">10,470</td>
                  <td class="cell"><span>9,724</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">2,782</span></td>
                  <td class="cell">41</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 2307 00 00</td>
                  <td class="cell"><span class="truncate">Furosemida</span></td>
                  <td class="cell">6,111</td>
                  <td class="cell"><span>5,782</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">1,444</span></td>
                  <td class="cell">39</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 1272 01 01</td>
                  <td class="cell"><span class="truncate">Senosidos A-B</span></td>
                  <td class="cell">6,997</td>
                  <td class="cell"><span>7,375</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">1,975</span></td>
                  <td class="cell">37</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Orden</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color:#000000;">040 000 4117 00 00</td>
                  <td class="cell"><span class="truncate">Fluoxetina</span></td>
                  <td class="cell">3,656</td>
                  <td class="cell"><span>3,439</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">729</span></td>
                  <td class="cell">35</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 0573 00 00</td>
                  <td class="cell"><span class="truncate">Prazosina</span></td>
                  <td class="cell">3,533</td>
                  <td class="cell"><span>3,798</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">96</span></td>
                  <td class="cell">32</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="">E-175</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color:#000000;">010 000 4117 00 00</td>
                  <td class="cell"><span class="truncate">Pentoxifilina</span></td>
                  <td class="cell">1,806</td>
                  <td class="cell"><span>1,926</span>
                  <!--<span class="note">2:16 PM</span>-->
                  <td class="cell"><span class="badge bg-danger">210</span></td>
                  <td class="cell">26</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="">T-Pedido</a></td>
                </tr>

                                  </tbody>
                              </table>
                          </div><!--//table-responsive-->

                      </div><!--//app-card-body-->
                  </div><!--//app-card-->

              </div><!--//tab-pane-->

              <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
          <div class="col-auto">
                <h5 class="app-card-title" style="padding-top: 10px; padding-bottom: 10px;">Medicamentos COVID 1</h5>
          </div><!--//col desde aquí puedo copiar-->
          <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
          <div class="app-card-body">
            <div class="table-responsive">
                <table class="table mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Clave</th>
                  <th class="cell">Descipción</th>
                  <th class="cell">Existencia</th>
                  <th class="cell">Consumo</th>
                  <th class="cell">Tránsitos</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0246 00 00</td>
                  <td class="cell"><span class="truncate">Propofol</span></td>
                  <td class="cell"><span class="badge bg-warning">494</span></td>
                  <td class="cell"><span class="cell-data">100</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">040 000 4057 00 00</td>
                  <td class="cell"><span class="truncate">Midazolam</span></td>
                  <td class="cell"><span class="badge bg-warning">200</span></td>
                  <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0247 00 00</td>
                  <td class="cell"><span class="truncate">Dexmetomidina</span></td>
                  <td class="cell"><span class="badge bg-warning">24</span></td>
                  <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4061 00 00</td>
                  <td class="cell"><span class="truncate">Cisatracurio</span></td>
                  <td class="cell"><span class="badge bg-success">148</span></td>
                  <td class="cell"><span class="cell-data">4</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0254 00 00</td>
                  <td class="cell"><span class="truncate">Vecuronio</span></td>
                  <td class="cell"><span class="badge bg-danger">0</span></td>
                  <td class="cell"><span class="cell-data">2</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0612 00 00</td>
                  <td class="cell"><span class="truncate">Norepinefrina</span></td>
                  <td class="cell"><span class="badge bg-success">107</span></td>
                  <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 2097 00 00</td>
                  <td class="cell"><span class="truncate">Buprenofrina</span></td>
                  <td class="cell"><span class="badge bg-success">41</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4059 00 00</td>
                  <td class="cell"><span class="truncate">Rocuronio</span></td>
                  <td class="cell"><span class="badge bg-danger">0</span></td>
                  <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 2154 00 00</td>
                  <td class="cell"><span class="truncate">Enoxoparina 40mg</span></td>
                  <td class="cell"><span class="badge bg-success">25</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4224 00 00</td>
                  <td class="cell"><span class="truncate">Enoxoparina 60mg</span></td>
                  <td class="cell"><span class="badge bg-success">26</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
                </tr>
              </tbody>
            </table>
              </div><!--//table-responsive-->
          </div><!--//app-card-body-->
          </div>
          <div class="col-auto" style="margin-top:-20px;">
              <h5 class="app-card-title" style="padding-top:0px; padding-bottom:10px;">EPP</h5>
          </div><!--//col desde aqui puedo borrar-->
          <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
          <div class="app-card-body">
            <div class="table-responsive">
                <table class="table mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Insumo</th>
                  <th class="cell">CEYE</th>
                  <th class="cell">CEEPPIS</th>
                  <th class="cell">Almacén</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="cell" style="color: #000000;">Cubreboca Tricapa</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">24,506</span><span class="note">800 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">4,506</span><span class="note">100 diario</span></span></td>
                  <td class="cell"><span class="badge bg-warning">0</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Mascarilla Bicapa</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,201</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">200</span><span class="note">10 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">10,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Respirador N95</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">8,832</span><span class="note">700 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">20,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1000</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Respirador N99</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">700 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-warning">0</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-500</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Overol</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">905</span><span class="note">100 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">20,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-656</a></td>
                </tr>
                <td class="cell" style="color: #000000;">Bata Desechable</td>
                <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">10,560</span><span class="note">400 diario</span></span></td>
                <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,230</span><span class="note">100 diario</span></span></td>
                <td class="cell"><span class="badge bg-success">300,000</span></td>
                <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
              </tr>
            </tr>
             <td class="cell" style="color: #000000;">Gorro</td>
             <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,550</span><span class="note">400 diario</span></span></td>
             <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
             <td class="cell"><span class="badge bg-success">23,300</span></td>
             <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
           </tr>
          </tr>
          <td class="cell" style="color: #000000;">Bota o Cubrezapato</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">5,362</span><span class="note">400 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1,670</a></td>
          </tr>
          </tr>
          <td class="cell" style="color: #000000;">Guante Nitrilo</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">200 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">0 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
          </tr>
          </tr>
          <td class="cell" style="color: #000000;">Guante Látex</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">400 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">100 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
          </tr>



              </tbody>
            </table>
              </div><!--//table-responsive-->
          </div><!--//app-card-body-->
          </div>




              </div><!--//tab-pane-->

              <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
          <div class="col-auto">
                <h5 class="app-card-title" style="padding-top: 10px; padding-bottom: 10px;">Medicamentos COVID 10</h5>
          </div><!--//col desde aquí puedo copiar-->
          <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
          <div class="app-card-body">
            <div class="table-responsive">
                <table class="table mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Clave</th>
                  <th class="cell">Descipción</th>
                  <th class="cell">Existencia</th>
                  <th class="cell">Consumo</th>
                  <th class="cell">Tránsitos</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0246 00 00</td>
                  <td class="cell"><span class="truncate">Propofol</span></td>
                  <td class="cell"><span class="badge bg-warning">294</span></td>
                  <td class="cell"><span class="cell-data">100</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">040 000 4057 00 00</td>
                  <td class="cell"><span class="truncate">Midazolam</span></td>
                  <td class="cell"><span class="badge bg-warning">400</span></td>
                  <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0247 00 00</td>
                  <td class="cell"><span class="truncate">Dexmetomidina</span></td>
                  <td class="cell"><span class="badge bg-warning">24</span></td>
                  <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4061 00 00</td>
                  <td class="cell"><span class="truncate">Cisatracurio</span></td>
                  <td class="cell"><span class="badge bg-success">148</span></td>
                  <td class="cell"><span class="cell-data">4</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0254 00 00</td>
                  <td class="cell"><span class="truncate">Vecuronio</span></td>
                  <td class="cell"><span class="badge bg-danger">0</span></td>
                  <td class="cell"><span class="cell-data">2</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 0612 00 00</td>
                  <td class="cell"><span class="truncate">Norepinefrina</span></td>
                  <td class="cell"><span class="badge bg-success">107</span></td>
                  <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 2097 00 00</td>
                  <td class="cell"><span class="truncate">Buprenofrina</span></td>
                  <td class="cell"><span class="badge bg-success">41</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4059 00 00</td>
                  <td class="cell"><span class="truncate">Rocuronio</span></td>
                  <td class="cell"><span class="badge bg-danger">0</span></td>
                  <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 2154 00 00</td>
                  <td class="cell"><span class="truncate">Enoxoparina 40mg</span></td>
                  <td class="cell"><span class="badge bg-success">25</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">010 000 4224 00 00</td>
                  <td class="cell"><span class="truncate">Enoxoparina 60mg</span></td>
                  <td class="cell"><span class="badge bg-success">26</span></td>
                  <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
                  <td class="cell">0</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
                </tr>
              </tbody>
            </table>
              </div><!--//table-responsive-->
          </div><!--//app-card-body-->
          </div>
          <div class="col-auto" style="margin-top:-20px;">
              <h5 class="app-card-title" style="padding-top:0px; padding-bottom:10px;">EPP</h5>
          </div><!--//col desde aqui puedo borrar-->
          <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
          <div class="app-card-body">
            <div class="table-responsive">
                <table class="table mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Insumo</th>
                  <th class="cell">CEYE</th>
                  <th class="cell">CEEPPIS</th>
                  <th class="cell">Almacén</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="cell" style="color: #000000;">Cubreboca Tricapa</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">24,506</span><span class="note">800 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">4,506</span><span class="note">100 diario</span></span></td>
                  <td class="cell"><span class="badge bg-warning">0</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Mascarilla Bicapa</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,201</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">200</span><span class="note">10 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">10,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Respirador N95</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">8,832</span><span class="note">700 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">20,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1000</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Respirador N99</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">700 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-warning">0</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-500</a></td>
                </tr>
                <tr>
                  <td class="cell" style="color: #000000;">Overol</td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">905</span><span class="note">100 diario</span></span></td>
                  <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
                  <td class="cell"><span class="badge bg-success">20,000</span></td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-656</a></td>
                </tr>
                <td class="cell" style="color: #000000;">Bata Desechable</td>
                <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">10,560</span><span class="note">400 diario</span></span></td>
                <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,230</span><span class="note">100 diario</span></span></td>
                <td class="cell"><span class="badge bg-success">300,000</span></td>
                <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
              </tr>
            </tr>
             <td class="cell" style="color: #000000;">Gorro</td>
             <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,550</span><span class="note">400 diario</span></span></td>
             <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
             <td class="cell"><span class="badge bg-success">23,300</span></td>
             <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
           </tr>
          </tr>
          <td class="cell" style="color: #000000;">Bota o Cubrezapato</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">5,362</span><span class="note">400 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1,670</a></td>
          </tr>
          </tr>
          <td class="cell" style="color: #000000;">Guante Nitrilo</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">200 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">0 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
          </tr>
          </tr>
          <td class="cell" style="color: #000000;">Guante Látex</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">400 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">100 diario</span></span></td>
          <td class="cell"><span class="badge bg-warning">0</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
          </tr>



              </tbody>
            </table>
              </div><!--//table-responsive-->
          </div><!--//app-card-body-->
          </div>

          </div><!--//tab-content-->
  <div class="tab-pane fade" id="tecoman" role="tabpanel" aria-labelledby="tecoman-tab">
    <div class="col-auto">
          <h5 class="app-card-title" style="padding-top: 10px; padding-bottom: 10px;">Medicamentos COVID 4</h5>
    </div><!--//col desde aquí puedo copiar-->
    <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
    <div class="app-card-body">
      <div class="table-responsive">
          <table class="table mb-0 text-left">
        <thead>
          <tr>
            <th class="cell">Clave</th>
            <th class="cell">Descipción</th>
            <th class="cell">Existencia</th>
            <th class="cell">Consumo</th>
            <th class="cell">Tránsitos</th>
            <th class="cell"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="cell" style="color: #000000;">010 000 0246 00 00</td>
            <td class="cell"><span class="truncate">Propofol</span></td>
            <td class="cell"><span class="badge bg-warning">294</span></td>
            <td class="cell"><span class="cell-data">100</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">040 000 4057 00 00</td>
            <td class="cell"><span class="truncate">Midazolam</span></td>
            <td class="cell"><span class="badge bg-warning">400</span></td>
            <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 0247 00 00</td>
            <td class="cell"><span class="truncate">Dexmetomidina</span></td>
            <td class="cell"><span class="badge bg-warning">24</span></td>
            <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 4061 00 00</td>
            <td class="cell"><span class="truncate">Cisatracurio</span></td>
            <td class="cell"><span class="badge bg-success">148</span></td>
            <td class="cell"><span class="cell-data">4</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 0254 00 00</td>
            <td class="cell"><span class="truncate">Vecuronio</span></td>
            <td class="cell"><span class="badge bg-danger">0</span></td>
            <td class="cell"><span class="cell-data">2</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 0612 00 00</td>
            <td class="cell"><span class="truncate">Norepinefrina</span></td>
            <td class="cell"><span class="badge bg-success">107</span></td>
            <td class="cell"><span class="cell-data">10</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 2097 00 00</td>
            <td class="cell"><span class="truncate">Buprenofrina</span></td>
            <td class="cell"><span class="badge bg-success">41</span></td>
            <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E66</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 4059 00 00</td>
            <td class="cell"><span class="truncate">Rocuronio</span></td>
            <td class="cell"><span class="badge bg-danger">0</span></td>
            <td class="cell"><span class="cell-data">3</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Desierta</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 2154 00 00</td>
            <td class="cell"><span class="truncate">Enoxoparina 40mg</span></td>
            <td class="cell"><span class="badge bg-success">25</span></td>
            <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">010 000 4224 00 00</td>
            <td class="cell"><span class="truncate">Enoxoparina 60mg</span></td>
            <td class="cell"><span class="badge bg-success">26</span></td>
            <td class="cell"><span class="cell-data">1</span><span class="note">diario</span></td>
            <td class="cell">0</td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
          </tr>
        </tbody>
      </table>
        </div><!--//table-responsive-->
    </div><!--//app-card-body-->
    </div>
    <div class="col-auto" style="margin-top:-20px;">
        <h5 class="app-card-title" style="padding-top:0px; padding-bottom:10px;">EPP</h5>
    </div><!--//col desde aqui puedo borrar-->
    <div class="app-card app-card-orders-table mb-5" style="margin-bottom:0px; padding-bottom:0px;">
    <div class="app-card-body">
      <div class="table-responsive">
          <table class="table mb-0 text-left">
        <thead>
          <tr>
            <th class="cell">Insumo</th>
            <th class="cell">CEYE</th>
            <th class="cell">CEEPPIS</th>
            <th class="cell">Almacén</th>
            <th class="cell"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="cell" style="color: #000000;">Cubreboca Tricapa</td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">24,506</span><span class="note">800 diario</span></span></td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">4,506</span><span class="note">100 diario</span></span></td>
            <td class="cell"><span class="badge bg-warning">0</span></td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">Mascarilla Bicapa</td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,201</span><span class="note">0 diario</span></span></td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">200</span><span class="note">10 diario</span></span></td>
            <td class="cell"><span class="badge bg-success">10,000</span></td>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">Respirador N95</td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">8,832</span><span class="note">700 diario</span></span></td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
            <td class="cell"><span class="badge bg-success">20,000</span></td>
            <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1000</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">Respirador N99</td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">700 diario</span></span></td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
            <td class="cell"><span class="badge bg-warning">0</span></td>
            <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-500</a></td>
          </tr>
          <tr>
            <td class="cell" style="color: #000000;">Overol</td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">905</span><span class="note">100 diario</span></span></td>
            <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">0</span><span class="note">0 diario</span></span></td>
            <td class="cell"><span class="badge bg-success">20,000</span></td>
            <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-656</a></td>
          </tr>
          <td class="cell" style="color: #000000;">Bata Desechable</td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">10,560</span><span class="note">400 diario</span></span></td>
          <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,230</span><span class="note">100 diario</span></span></td>
          <td class="cell"><span class="badge bg-success">300,000</span></td>
          <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
        </tr>
      </tr>
       <td class="cell" style="color: #000000;">Gorro</td>
       <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,550</span><span class="note">400 diario</span></span></td>
       <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
       <td class="cell"><span class="badge bg-success">23,300</span></td>
       <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
     </tr>
    </tr>
    <td class="cell" style="color: #000000;">Bota o Cubrezapato</td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">5,362</span><span class="note">400 diario</span></span></td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">1,000</span><span class="note">100 diario</span></span></td>
    <td class="cell"><span class="badge bg-warning">0</span></td>
    <td class="cell"><a class="btn-sm app-btn-secondary" style="background-color:#F7DC6F; font-weight: bold;" href="#">T-1,670</a></td>
    </tr>
    </tr>
    <td class="cell" style="color: #000000;">Guante Nitrilo</td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">200 diario</span></span></td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">0 diario</span></span></td>
    <td class="cell"><span class="badge bg-warning">0</span></td>
    <td class="cell"><a class="btn-sm app-btn-secondary" href="#"></a></td>
    </tr>
    </tr>
    <td class="cell" style="color: #000000;">Guante Látex</td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">7,983</span><span class="note">400 diario</span></span></td>
    <td class="cell"><span class="truncate"><span class="cell-data" style="color:#000000;">2,541</span><span class="note">100 diario</span></span></td>
    <td class="cell"><span class="badge bg-warning">0</span></td>
    <td class="cell"><a class="btn-sm app-btn-secondary" href="#">E59</a></td>
    </tr>



        </tbody>
      </table>
        </div><!--//table-responsive-->
    </div><!--//app-card-body-->
    </div>
  </div>
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-6">
                <div class="app-card app-card-progress-list h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">$ Avance <span style="font-weight: normal; font-size: 12px;">(Pedidos Con Alta)</span></h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="card-header-action">
                                    <a href="#">Ver Pedidos</a>
                                </div><!--//card-header-actions-->
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body">
                         <div class="item p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="title mb-1 ">Enero</div>
                                    <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                                </div><!--//col-->
                            </div><!--//row-->
                            <a class="item-link-mask" href="#"></a>
                        </div><!--//item-->

                        <div class="item p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="title mb-1 ">Febrero</div>
                                    <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                                </div><!--//col-->
                            </div><!--//row-->
                            <a class="item-link-mask" href="#"></a>
                        </div><!--//item-->

                        <div class="item p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="title mb-1 ">Marzo</div>
                                    <div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                                </div><!--//col-->
                            </div><!--//row-->
                            <a class="item-link-mask" href="#"></a>
                        </div><!--//item-->
          <div class="item p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="title mb-1 ">Abril</div>
                                    <div class="progress">
<div class="progress-bar bg-warning" role="progressbar" style="width: 17%;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
                                </div><!--//col-->
                            </div><!--//row-->
                            <a class="item-link-mask" href="#"></a>
                        </div><!--//item-->

                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-12 col-lg-6">
                <div class="app-card app-card-stats-table h-100 shadow-sm">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Despachos</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="card-header-action">
                                    <a href="#">Remisiones del Día</a>
                                </div><!--//card-header-actions-->
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th class="meta">Destino</th>
                                        <th class="meta stat-cell">ECO</th>
                                        <th class="meta stat-cell">ETA</th>
                <th class="meta stat-cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-success">HGZ#1 - Villa de Álvarez</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">10:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg>
                </td>
                                    </tr>
                                    <tr>
                <td class="text-success">UMF#18 - Colima</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg>
                </td>
                                    </tr>
              <tr>
                <td class="text-success">UMF#19 - Colima</td>
                                        <td class="stat-cell">1076</td>
                                        <td class="stat-cell">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg>
                </td>
                                    </tr>
              <tr>
                <td class="text-success">HGZ#10 - Manzanillo</td>
                                        <td class="stat-cell">1079</td>
                                        <td class="stat-cell" style="color:#ff0000;">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg>
                </td>
                                    </tr>
              <tr>
                <td class="text-success">HGSZ#4 - Tecoman</td>
                                        <td class="stat-cell">1079</td>
                                        <td class="stat-cell" style="color:#ff0000;">12:00 AM</td>
                <td class="stat-cell">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="brown"><path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/>
</svg>
                </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->
        </div><!--//row-->
        <div class="row g-4 mb-4">
            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
<path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>








                                </div><!--//icon-holder-->

                            </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Contratos</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4">

                        <div class="intro">Instrumentos jurídicos locales (contratos y convenios) "vigentes", formalizados y/o en proceso de formalización.</div>
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                       <a class="btn app-btn-secondary" href="#">Ver</a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-code-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
<path fill-rule="evenodd" d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
</svg>
                                </div><!--//icon-holder-->

                            </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Pedidos</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4">

                        <div class="intro">Status de Pedidos Locales, con y sin alta generados por la Oficina de Adquisiciones, por autorización de compra.</div>
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                       <a class="btn app-btn-secondary" href="#">Ver</a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-12 col-lg-4">
                <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg width="1em" height="1em" viewBox="0 0 448 512" class="bi bi-tools" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/>
</svg>
                                </div><!--//icon-holder-->

                            </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Histórico de Claves</h4>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4">

                        <div class="intro">Registro de claves de medicamento y material de curación atendidas en el ejercicio encurso.</div>
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                       <a class="btn app-btn-secondary" href="#">Ver</a>
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->
            </div><!--//col-->
        </div><!--//row-->

    </div><!--//container-fluid-->
</div><!--//app-content-->

<footer class="app-footer">
    <div class="container text-center py-3">
         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
    <small class="copyright">Diseño y Desarrollo <i class="" style="color: #fb866a;"></i> por la <a class="app-link" href="" target="_blank">CDAE</a> Coordinación de Abastecimiento y Equipamiento</small>

    </div>
</footer><!--//app-footer-->

</div><!--//app-wrapper-->


<!-- Javascript -->
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/js/index-charts.js"></script>
<script src="assets/js/charts-demo.js"></script>

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script>


<?php } ?>

<?php pie() ?> <!-- Pone el fotter -->