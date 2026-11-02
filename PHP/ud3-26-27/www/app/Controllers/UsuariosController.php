<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\UsuariosModel;

class UsuariosController extends BaseController
{

    public function getUsuarios(): void
    {
        $data = array(
            'titulo' => 'Listado usuarios',
            'breadcrumb' => ['Inicio', 'Usuarios'],
        );
        $model = new UsuariosModel();
        $data['usuarios'] = $model->getUsuarios();

        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);

    }

}