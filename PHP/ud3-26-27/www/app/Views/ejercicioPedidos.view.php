<?php

declare(strict_types=1);

?>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ejercicio Pedidos y Clientes</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="numeros">Json con los Pedidos:</label>
                                <textarea class="form-control" rows="10"
                                          name="json"><?php echo $jsonPedidos ?? ''; ?></textarea>
                                <p class="text-danger small">
                                    <?php
                                    if (!empty($errores)) {
                                        foreach ($errores['json'] as $error) {
                                            echo $error . '<br/>';
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="numeros">Json con los Clientes:</label>
                                <textarea class="form-control" rows="10"
                                          name="json"><?php echo $jsonClientes ?? ''; ?></textarea>
                                <p class="text-danger small">
                                    <?php
                                    if (!empty($errores)) {
                                        foreach ($errores['json'] as $error) {
                                            echo $error . '<br/>';
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Hacer cálculos" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
