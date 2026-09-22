<?php
declare(strict_types=1)
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class EjerciciosDecicionController extends BaseController
{
    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'seccion' => '/inicio'
        );
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }
}