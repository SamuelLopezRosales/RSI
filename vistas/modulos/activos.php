<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar activos fijos
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar activos fijos</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarActivo">
          Agregar activo fijo
        </button>
      </div>
      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas tablaActivos" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Código</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Núm. Serie</th>
           <th>Categoría</th>
           <th>Valor Adqui.</th>
           <td>Fecha</td>
           <th>Acciones</th>
         </tr>
        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarActivo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Activo</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
          <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" required>
                  <option value="">Selecionar categoría</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);
                    foreach($categorias as $key => $value){
                      echo '<option value="'.$value["idCategoria"].'">'.$value["categoria"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>

             <!-- ENTRADA PARA EL codigo -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar el código" required readonly>
              </div>
            </div>
            <!-- ENTRADA PARA LA MARCA-->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaMarca" placeholder="Ingresa la marca" id="nuevaMarca" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL MODELO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar modelo" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL NÚMERO DE SERIE -->
           <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNumSerie" placeholder="Ingresar número de serie" required>
              </div>
            </div>



            <!-- ENTRADA PARA VALOR ADQUISICIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoValAdqui" placeholder="Ingresar valor de adquisición" step="any" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Activo</button>
        </div>
        <?php
         $crearActivo = new ControladorActivos();
          $crearActivo -> ctrCrearActivo();
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR ACTIVO
======================================-->

<div id="modalEditarActivo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Activo</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
          <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <select class="form-control input-lg" name="editarCategoria" readonly required>
                  <option id="editarCategoria"></option>

                </select>
              </div>
            </div>

             <!-- ENTRADA PARA EL codigo -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" required readonly>
              </div>
            </div>
            <!-- ENTRADA PARA LA MARCA-->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca" id="nuevaMarca" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL MODELO -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control input-lg" id="editarModelo" name="editarModelo" required>
              </div>
            </div>
            <!-- ENTRADA PARA EL NÚMERO DE SERIE -->
           <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control input-lg" name="editarNumSerie" required id="editarNumSerie">
              </div>
            </div>
            <!-- ENTRADA PARA VALOR ADQUISICIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="number" class="form-control input-lg" id="editarValAdqui" name="editarValAdqui" step="any" required>
              </div>
            </div>

          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
         $editarActivo = new ControladorActivos();
         $editarActivo -> ctrEditarActivo();
        ?>
      </form>
    </div>
  </div>
</div>

<?php

  //$borrarUsuario = new ControladorUsuarios();
  //$borrarUsuario -> ctrBorrarUsuario();

?>


