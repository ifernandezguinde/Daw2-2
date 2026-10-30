<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\TrabajadorModel;

class TrabajadorController extends BaseController
{
    public function getTrabajadores(): void
    {
        $data = [];
        $trabajadoresModel = new TrabajadorModel();

        $data['t'] = $trabajadoresModel->getTrabajadores();

        $this->view->showViews(array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function showTrabajador(): void
    {
        $this->view->showViews(array('templates/header.view.php', 'alta-trabajador.view.php', 'templates/footer.view.php'), []);
    }

    public function checkErrors(): array
    {
        return [];
    }

    public function doTrabajador(): bool
    {
        $doModel = new TrabajadorModel();
        //var_dump($_POST);
        //die();
        $datos = $_POST;
        unset($datos['enviar']);

        $datos['retencionIRPF'] = 10;
        $datos['activo'] = 1;
        $datos['id_rol'] = 1;
        $datos['id_country'] = 1;

        $doModel->insertTrabajador($datos);
        http_redirect('/trabajadores');
        return false;
    }
}
