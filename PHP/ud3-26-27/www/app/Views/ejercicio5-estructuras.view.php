<div class="row">
    <div class="col-12">
        <?php if (!empty($alert)) {?>
            <div class="alert <?php echo $alert; ?> ">
                <p>Felicidades, tienes un salario por encima de la media</p>
            </div>
        <?php } ?>
        <div class="card-header bg-primary" >
            <?php echo $texto; ?>
        </div>
    </div>
</div>