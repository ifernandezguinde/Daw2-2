<form method="get" action="">
    <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
    </div>

    <!-- Card Body -->
    <div class="card-body">

        <!--<form action="./?sec=formulario" method="get">                   -->
        <div class="row">

            <!-- filtro nombre de usuario -->
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="alias">Nombre de Trabajador:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $_GET['nombre'] ?? '' ?>" />
                </div>
            </div>

            <!-- filtro tipo de usuario -->
            <div class="col-12 col-lg-4">
                <div class="mb-3">
                    <label for="id_continente">Tipo de Trabajador:</label>
                    <select name="rol" id="rol" class="form-control" s="<?php echo $_GET['rol'] ?? '' ?>">
                        <option> </option>
                        <?php foreach ($roles as $rol) { ?>
                            <option><?php echo $rol['nombre_rol'] ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <div class="col-12 text-right">
            <a href="/trabajadores" value="" name="reiniciar" class="btn btn-danger">Reiniciar filtros</a>
            <input type="submit" value="Aplicar filtros" name="enviar" class="btn btn-primary ml-2"/>
        </div>
    </div>
</form>

<!--Inicio HTML -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trabajadores</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" id="card_table">
                <div id="button_container" class="mb-3"></div>
                <!--<form action="./?sec=formulario" method="post">                   -->
                <table id="tabladatos" class="table table-striped">
                    <thead>
                    <tr>
                        <th><a href="">username</a></th>
                        <th><a href="">salarioBruto</a> </th>
                        <th><a href="">retenciónIRPF</a> </th>
                        <th><a href="">activo</a> </th>
                        <th><a href="">rol</a> </th>
                        <th><a href="">país</a> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($trabajadores as $trabajador) { ?>
                    <tr class="" >
                        <td><?php echo $trabajador['username'] ?></td>
                        <td><?php echo $trabajador['salarioBruto'] ?></td>
                        <td><?php echo $trabajador['retencionIRPF'] ?></td>
                        <td><?php echo $trabajador['activo'] ?></td>
                        <td><?php echo $trabajador['nombre_rol'] ?></td>
                        <td><?php echo $trabajador['country_name'] ?></td>
                    </tr>
                    <?php }?>
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