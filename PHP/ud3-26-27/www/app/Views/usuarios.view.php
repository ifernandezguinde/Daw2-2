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
                    <input type="hidden" name="order" value="<?php echo $order; ?>"/>
                    <div class="row">

                        <!-- ROL -->
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

                        <!-- EMAIL -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" id="email"
                                       value="<?php echo $input['email'] ?? ''; ?>"/>
                            </div>
                        </div>

                        <!-- NOMBRE -->
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                       value="<?php echo $input['nombre'] ?? ''; ?>"/>
                            </div>
                        </div>

                        <!-- IDIOMA -->
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label for="idioma">Idioma:</label>
                                <select name="idioma" id="idioma" class="form-control select2">
                                    <option value="">-</option>
                                    <?php foreach ($idioma as $idiom) {
                                        ?>
                                        <option value="<?php echo $idiom ?>" <?php echo (isset($input['idioma']) && $idiom == $input['idioma']) ? 'selected' : '';
                                        ?>><?php echo ucfirst($idiom); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- ULTIMO ACCESO -->
                        <div class="col-12 col-lg-4">
                            <label>Último acceso:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="ultimoAcceso" class="form-control float-right" id="ultimoAcceso">
                            </div>
                            <!-- /.input group -->
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
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped ">
                    <thead>
                        <tr>
                            <?php
                            require_once '../app/Helpers/form_helper.php';
                            echo printTableHeader(
                                ['Nombre', 'Rol', 'Email', 'Idioma', 'Último acceso', 'Actions'],
                                $order,
                                $input['sentido'] ?? null,
                                $queryParamsPage
                            );
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usuarios as $usuario) {
                            ?>
                        <tr class="<?php echo $usuario['baja'] == 1 ?: 'bg-danger'; ?>">
                            <td><?php echo $usuario['nombre'] ?></td>
                            <td><?php echo $usuario['rol'] ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                            <td><?php echo $usuario['idioma'] ?></td>
                            <td><?php echo $usuario['last_date'] ?></td>
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
                        <?php
                        if ($currentPage > 1) :
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $baseUrl ?>?page=1 <?php echo ($queryParamsPage !== '' ? "&$queryParamsPage" : '') ?>" aria-label="First">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">First</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $baseUrl ?>?page=<?php echo ($currentPage - 1) . ($queryParamsPage !== '' ? "&$queryParamsPage" : '')?>" aria-label="Previous">
                                    <span aria-hidden="true">&lt;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php
                        endif;
                        ?>
                        <li class="page-item active"><a class="page-link" href="<?php echo $baseUrl ?>?page=<?php echo ($currentPage) ?>"><?php echo $currentPage ?></a></li>
                        <?php
                        if ($currentPage < $maxPage) :
                            ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $baseUrl ?>?page=<?php echo ($currentPage + 1) . ($queryParamsPage !== '' ? "&$queryParamsPage" : '')?>" aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $baseUrl ?>?page=<?php echo $maxPage . ($queryParamsPage !== '' ? "&$queryParamsPage" : '')?>" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                        </li>
                            <?php
                        endif;
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Fin HTML -->