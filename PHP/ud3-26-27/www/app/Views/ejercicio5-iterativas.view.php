<?php

declare(strict_types=1);
?>
<div class="row">
    <?php
    if (isset($resultado) && $resultado !== []): ?>
        <div class="col-12 alert alert-success">
            <h3>Palabras repetidas: </h3>
            <ul class="mb-0">
                <?php foreach ($resultado as $palabra => $cantidad): ?>
                    <li><strong><?= htmlspecialchars((string)$palabra) ?></strong> => <?= $cantidad ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado palabras repetidas de mayor a menor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="numeros">frase:</label>
                                <input type="text" class="form-control" name="texto" id="texto" value="" />

                                <?php if (!empty($errores)): ?>
                                    <div class="text-danger small mt-1">
                                        <?php foreach ($errores as $error): ?>
                                            <p class="mb-0"><?php echo $error; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Ordenar listado" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>