<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="get" action="/usuarios">
                <input type="hidden" name="order" value="1"/>
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <input type="hidden" name="" value=""/>
                    <div class="row">

                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="id_rol">Rol:</label>
                                <select name="id_rol" id="id_rol" class="form-control select2" multiple>
                                    <option value="">-</option>
                                    <?php foreach ($roles as $rol) {
                                        ?>
                                        <option value="<?php echo $rol['id_rol'] ?>" <?php echo (isset($input['id_rol']) && $rol['id_rol'] == $input['id_rol']) ? 'selected' : ''; ?>><?php echo ucfirst($rol['rol']); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="text-error small"><?php echo $errors['id_rol'] ?? ''; ?></p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                // TO DO
                                <label for="username">Nombre:</label>
                                <input type="text" class="form-control" name="username" id="username"
                                       value="<?php echo $input['username'] ?? ''; ?>"/>
                            </div>
                        </div>



                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="min_salarioBruto">Salario Bruto:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="min_salarioBruto"
                                               id="min_salarioBruto"
                                               value="<?php echo $input['min_salarioBruto'] ?? '' ?>"
                                               placeholder="Mínimo"/>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="max_salarioBruto"
                                               id="max_SalarioBruto"
                                               value="<?php echo $input['max_salarioBruto'] ?? '' ?>"
                                               placeholder="Máximo"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="min_retencionIRPF">Rentención:</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="min_retencionIRPF"
                                               id="min_retencionIRPF"
                                               value="<?php echo $input['min_retencionIRPF'] ?? '' ?>"
                                               placeholder="Mínimo"/>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="max_retencionIRPF"
                                               id="max_retencionIRPF"
                                               value="<?php echo $input['max_retencionIRPF'] ?? '' ?>"
                                               placeholder="Máximo"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="id_country">Idioma:</label>
                                <select name="idioma" id="idioma" class="form-control select2">
                                    <?php foreach ($idioma as $idiom) {
                                        ?>
                                        <option value="<?php echo isset($idiom) ?: $idiom ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="text-error small"><?php echo $errors['id_country'] ?? ''; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="<?php echo strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?>" value=""
                           class="btn btn-danger">Reiniciar filtros</a>
                        <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Proveedores</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped">
                    <thead>
                    <tr>
                        <th><a href="/usuarios?order=1">Nombre</a> <i class="fas fa-sort-amount-down-alt"></i></th>
                        <th><a href="/usuarios?order=2">Rol</a> </th>
                        <th><a href="/usuarios?order=3">email</a> </th>
                        <th><a href="/usuarios?order=4">Ultimo acceso</a> </th>
                        <th><a href="/usuarios?order=5">Idioma</a> </th>
                        <th><a href="/usuarios?order=6">Opciones</a> </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($usuarios as $usuario) {
                        ?>
                        <tr class="">
                            <td><?php echo $usuario['nombre'] ?></td>
                            <td><?php echo $usuario['rol'] ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                            <td><?php echo $usuario['last_date'] ?></td>
                            <td><?php echo $usuario['idioma'] ?></td>
                            <td>
                                <a href="tel: 908080337" target="_blank" class="btn btn-success ml-1" data-toggle="tooltip" data-placement="top" title="908080337"><i class="fas fa-edit"></i></a>
                                <a href="http://expcpé.net" target="_blank" class="btn btn-danger ml-1"><i class="fas fa-trash"></i></a>
                                <a href="mailto: info@expcpé.net" target="_blank" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="info@expcpé.net"><i class="fas fa-mail-bulk"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav aria-label="Navegacion por paginas">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=1&order=1" aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=2&order=1" aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=4&order=1" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/proveedores?page=8&order=1" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Fin HTML -->