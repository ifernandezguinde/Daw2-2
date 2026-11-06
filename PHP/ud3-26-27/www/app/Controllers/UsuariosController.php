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
        $data['usuarios'] = $model->getFilterBy($_GET);
        $modelRol = new AuxRolUsuarios();
        $data['roles'] = $modelRol->getRol();
        $data['idioma'] = $model->getIdiomas();
        $data['order'] = $model->getOrder($_GET);
        $data['currentPage'] = $model->getCurrentPage($_GET);
        $data['maxPage'] = $model->getLastPage($_GET);

        $input = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['input'] = $input;

        $getOrder = $_GET;
        $data['baseUrl'] = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        unset($getOrder['order']);
        unset($getOrder['sentido']);
        unset($getOrder['page']);
        $data['queryParamsPage'] = http_build_query($getOrder);

        $this->view->showViews(array('templates/header.view.php', 'usuarios.view.php', 'templates/footer.view.php'), $data);

    }

}