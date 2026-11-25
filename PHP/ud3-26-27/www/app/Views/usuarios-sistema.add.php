<?php

declare(strict_types=1);
?>
<div class="card shadow mb-4">
    <form method="post" action="">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $titulo ?></h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!--<form action="./?sec=formulario" method="post">                   -->
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control"
                               name="nombre" id="nombre"
                               value="<?php
                               echo $input['nombre'] ?? ''; ?>"
                               maxlength="255"
                               placeholder="Nombre"
                        />
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control"
                               name="password" id="password"
                               value=""
                               minlength="8"
                               placeholder="introducir unha contraseña"
                        />
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="pass2">Password:</label>
                        <input type="text" class="form-control"
                               name="pass2" id="pass2"
                               value=""
                               minlength="8"
                               placeholder="confirmar contraseña"
                        />
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control"
                               name="email" id="email"
                               value="<?php
                               echo $input['email'] ?? ''; ?>"
                               maxlength="255"
                               placeholder="usuario@email.org"
                        />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="id_rol">Rol:</label>
                        <select name="id_rol[]" id="id_rol" class="form-control select2">
                            <option value="">-</option>
                            <?php foreach ($roles as $role) {
                                ?>
                                <option value="<?php echo $role['id_rol'] ?>" <?php echo (isset($input['id_rol']) && in_array($role['id_rol'], $input['id_rol'])) ? 'selected' : ''; ?>><?php echo ucfirst($role['rol']); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p class="text-error small"><?php echo $errors['id_rol'] ?? ''; ?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="idioma">Idioma:</label>
                        <select name="idioma" id="idioma" class="form-control">
                            <option value="">-</option>
                            <?php foreach ($idiomas as $idioma) {
                                ?>
                                <option value="<?php echo $idioma ?>" <?php echo (isset($input['idioma']) && $idioma == $input['idioma']) ? 'selected' : ''; ?>><?php echo ucfirst($idioma); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p class="text-error small"><?php echo $errors['idioma'] ?? ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-12 text-right">
                <a href="/trabajadores" class="btn btn-danger">Cancelar</a>
                <input type="submit" value="Guardar" class="btn btn-primary ml-2"/>
                <?php
                if ($titulo == 'Alta Usuario')
                { ?>
                    <input type="submit" name="insertar_otro" value="Guardar e insertar otro" class="btn btn-primary ml-2"/>
                    <?php
                }
                ?>
            </div>
        </div>
    </form>
</div>