<?php if (isset($_POST) && (isset($errores) && count($errores) == 0)) { ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success">
            <p class="text-black"><?php $datos['username'] ?> registrado exitosamente</p>
        </div>
    </div>
</div>
    <?php
}
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Alta usuario</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!--<form action="./?sec=formulario" method="post">-->

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="username">Username:</label>
                                <input class="form-control"
                                       id="username"
                                       type="text"
                                       name="username"
                                       value="<?php echo $input['username'] ?? ''; ?>">
                                <p class="text-danger"><?php echo $errores['username'] ?? ''; ?></p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="salarioBruto">salarioBruto:</label>
                                <input class="form-control"
                                       id="salarioBruto"
                                       type="text"
                                       name="salarioBruto"
                                       value="<?php echo $input['salarioBruto'] ?? ''; ?>">
                                <p class="text-danger"><?php echo $errores['salarioBruto'] ?? ''; ?></p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="alta-usuarios" class="btn btn-danger">Reiniciar</a>
                        <input type="submit" value="Dar de alta" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

