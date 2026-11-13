<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="">
                <!-- Card Body -->

                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario de Alta</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <!-- USERNAME -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="username">* Username:</label>
                                    <input type="text" minlength="4" maxlength="50" required class="form-control"
                                           id="username" placeholder="Nombre y apellidos">
                                </div>
                            </div>
                            <!-- SALARIO BRUTO -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="salarioBase">* Salario Bruto:</label>
                                    <input type="number" min="500" required class="form-control" id="salarioBruto"">
                                </div>
                            </div>
                            <!-- RETENCION -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="retencion">* Retención:</label>
                                    <div>
                                        <input type="number" min="0" max="100" required class="form-control" id="retencion" >
                                    </div>
                                </div>
                            </div>
                            <!-- ACTIVO -->
<!--                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">-->
<!--                                <input id="customSwitch3" class="custom-control-input" type="checkbox" data-gtm-form-interact-field-id="0">-->
<!--                            </div>-->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="activo">* Activo:</label>
                                    <input type="text" min="2" max="2" required class="form-control" id="activo"
                                           placeholder="si/no">
                                </div>
                            </div>
                            <!-- ROL -->
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="id_rol">* Rol:</label>
                                    <select name="id_rol" id="id_rol" class="form-control select2">
                                        <option value="">-</option>
                                        <?php foreach ($roles as $rol) {
                                            ?>
                                            <option value="<?php echo $rol['id_rol'] ?>" <?php echo (isset($input['id_rol']) && $rol['id_rol'] == $input['id_rol']) ? 'selected' : ''; ?>><?php echo ucfirst($rol['nombre_rol']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <p class="text-error small"><?php echo $errors['id_rol'] ?? ''; ?></p>
                                </div>
                            </div>
                            <!-- PAIS -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="pais">* País:</label>
                                    <select name="pais" id="pais" class="form-control select2" multiple>
                                        <?php foreach ($countries as $pais) {
                                            ?>
                                            <option value="<?php echo $pais["id_country"]?>" <?php echo (isset($input['id_country']) && in_array($pais['id_country'], $input['id_country'])) ? 'selected' : ''; ?>><?php echo ucfirst($pais['country_name']); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <p class="text-error small"><?php echo $errors['id_country'] ?? ''; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- BOTON ENVIAR -->
                        <div class="col-12">
                            <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<!--Fin HTML -->