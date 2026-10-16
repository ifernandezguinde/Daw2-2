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
                        <th><a href="/proveedores?order=1">username</a></th>
                        <th><a href="/proveedores?order=2">salarioBruto</a> </th>
                        <th><a href="/proveedores?order=3">retenciónIRPF</a> </th>
                        <th><a href="/proveedores?order=4">activo</a> </th>
                        <th><a href="/proveedores?order=5">id_rol</a> </th>
                        <th><a href="/proveedores?order=6">id_country</a> </th>
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