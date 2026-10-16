<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\TrabajadorModel;

class TrabajadorController extends BaseController
{
    public function listarTrabajadores()
    {
        $model = new TrabajadorModel();
        $trabajadores = $model->getTrabajadores();
        $data = array(
            'titulo' => 'Listar Trabajadores',
            'breadcrumb' => ['Inicio', 'Listar Trabajadores'],
            'trabajadores' => $trabajadores
        );
        $this->view->showViews(array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function ordenSalario()
    {
        $model = new TrabajadorModel();
        $trabajadores = $model->ordenSalario();
        $data = array(
            'titulo' => 'Ordenar por salario',
            'breadcrumb' => ['Inicio', 'ordenar por salario'],
            'trabajadores' => $trabajadores
        );
        $this->view->showViews(array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function trabajadoresStandard()
    {
        $model = new TrabajadorModel();
        $trabajadores = $model->trabajadoresStandard();
        $data = array(
            'titulo' => 'Listar trabajadores standard',
            'breadcrumb' => ['Inicio', 'Listar trabajadores standard'],
            'trabajadores' => $trabajadores
        );
        $this->view->showViews(array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'), $data);
    }

    public function trabajadoresCarlos()
    {
        $model = new TrabajadorModel();
        $trabajadores = $model->trabajadoresCarlos();
        $data = array(
            'titulo' => 'Listar trabajadores cuyo nombre empiece por Carlos',
            'breadcrumb' => ['Inicio', 'Listar trabajadores cuyo nombre empiece por Carlos'],
            'trabajadores' => $trabajadores
        );
        $this->view->showViews(array('templates/header.view.php', 'trabajadores.view.php', 'templates/footer.view.php'), $data);
    }


}