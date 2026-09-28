<?php

declare(strict_types=1);
?>
<div class="row">
    <?php
    if (isset($matriz)):
        ?>
        <div class="col-12 alert alert-success">
            <p>Numeros ordenados: <?php echo $matriz ?></p>
        </div>
    <?php endif; ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ordenación de unha matriz</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="numeros">Números a ordenar:</label>
                                <input type="text" class="form-control" name="numeros" id="numeros" value="" />
                                <p class="text-danger small"><?php echo $error ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Ordenar números" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>