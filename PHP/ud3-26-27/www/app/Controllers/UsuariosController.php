<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\AuxRolUsuarios;
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
        $modelRol = new AuxRolUsuarios();
        $data['roles'] = $modelRol->getRol();
        $input = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['input'] = $input;

        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);

    }

}