<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\AuxRolModel;
use Com\Daw2\Models\UsuariosSistemaModel;
use parallel\Events\Input;

class UsuariosSistemaController extends BaseController
{
    private const array IDIOMAS = ['en', 'es', 'gl'];
    public function index(): void
    {
        $data =
            [
                'titulo' => 'Usuarios Sistema',
                'breadcrumb' => ['Inicio', 'Usuarios Sistema'],
                'js' => ['assets/js/pages/usuarios-sistema.js']
            ];
        $model = new UsuariosSistemaModel();
        $data['usuarios'] = $model->getFilterBy($_GET);
        $data['maxPage'] = $model->getMaxPage($_GET);
        $data['currentPage'] = $model->getCurrentPage($_GET);

        $data['currentOrder'] = $model->getIntOrder($_GET);
        $data['sentido'] = $model->getCurrentSentido($_GET);

        $data['cabeceras'] = ['Nombre', 'Rol', 'Email', 'Últ. acceso', 'Idioma'];
        $data['idiomas'] = self::IDIOMAS;
        $rolesModel = new AuxRolModel();
        $data['roles'] = $rolesModel->getAll();
        $input = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['input'] = $input;
        $getOrder = $_GET;
        unset($getOrder['order']);
        unset($getOrder['sentido']);
        unset($getOrder['page']);
        $getPage = $_GET;
        unset($getPage['page']);
        $data['queryPage'] = http_build_query($getPage);
        $data['queryParams'] = http_build_query($getOrder);
        $data['input'] = filter_var_array($_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['js'] = ['assets/js/pages/usuarios-sistema.js'];
        $this->view->showViews(array('templates/header.view.php', 'usuarios-sistema.view.php', 'templates/footer.view.php'), $data);
    }

//    public function login(string $error = ''): void
//    {
//        $this->view->show('login.view.php', ['error' => $error]);
//
//    }

//    public function doLogin()
//    {
//        if (empty($_POST['email']) && empty($_POST['password'])){
//            $error = 'Datos incorrectos.';
//            $this->login($error);
//        } else {
//            $model = new UsuariosSistemaModel();
//            $usuario = $model->getByEmail($_POST['email']);
//            if ($usuario === false){
//                $error = 'Datos incorrectos.';
//                $this->login($error);
//            } else {
//                if ($usuario['password'] === password_verify($_POST['password'], $usuario['password'])){
//                    session_regenerate_id(true);
//                    $_SESSION['usuario'] = $usuario;
//                }
//            }
//        }
//    }

    public function checkUsuariosSistema(array $datos): array
    {
        $errores = [];
        if (empty($datos['nombre'])) {
            $errores['nombre'] = 'Campo obligatorio';
        } elseif (!preg_match('/^[\p{L}0-9_]{5,20}$/', $datos['nombre'])) {
            $errores['nombre'] = 'El nombre solo acepta caracteres alfanuméricos y _. Longitud mínima: 5, máxima: 20';
        } else {
            if ($datos['nombre'] === null) {
                $usuarioModel = new UsuariosSistemaModel();
                $usuario = $usuarioModel->getByNombre($datos['nombre']);
                if ($usuario !== false) {
                    $errores['nombre'] = 'El nombre de usuario ya está en uso';
                }
            }
        }

        if (empty($datos['email'])) {
            $errores['email'] = 'Campo obligatorio';
        } elseif (filter_var($datos['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errores['email'] = 'Debe ser un email válido';
        } else {
            if ($datos['email'] === null) {
                $usuarioModel = new UsuariosSistemaModel();
                $usuarioEmail = $usuarioModel->getByEmail($datos['email']);
                if ($usuarioEmail !== false) {
                    $errores['email'] = 'El email ya está en uso';
                }
            }
        }

        if (empty($datos['password'])) {
            $errores['password'] = 'Campo obligatorio';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $datos['password'])) {
            $errores['password'] = 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y tener una longitud mínima de 8 caracteres';
        } else {
            if ($datos['password'] === null) {
                $usuarioModel = new UsuariosSistemaModel();
                $usuariopass = $usuarioModel->getByEmail($datos['email']);
                if ($usuariopass !== false) {
                    $errores['password'] = 'El email ya está en uso';
                }
            } elseif ($datos['pass2'] !== $datos['password']) {
                    $errores['pass2'] = 'Las contraseñas no coinciden';
            }
        }

        if (empty($datos['id_rol'])){
            $errores['id_rol'] = 'Campo obligatorio';
        } else {
            if ($datos['id_rol'] === null) {
                $usuarioModel = new UsuariosSistemaModel();
                $usuarioId = $usuarioModel->getById($datos['id_rol']);
                if ($usuarioId === false) {
                    $errores['id_rol'] = 'el rol debe ser uno de la lista';
                }
            }
        }

        if (empty($datos['idioma'])) {
            $errores['idioma'] = 'Campo obligatorio';
        } else {
            if ($datos['idioma'] === null) {
                $usuarioModel = new UsuariosSistemaModel();
                $usuarioIdioma = $usuarioModel->getByIdioma($datos['idioma']);
                if ($usuarioIdioma === false) {
                    $errores['idioma'] = 'El idioma debe ser uno de la lista';
                }
            }
        }

        return $errores;
    }

    public function add(array $input = [], array $errores = []): void
    {
        $data = array(
            'titulo' => 'Alta Usuario',
            'breadcrumb' => ['Inicio', 'Usuarios-sistema', 'add'],
            'input' => $input,
            'errors' => $errores,
        );
        $data['idiomas'] = self::IDIOMAS;
        $rolesModel = new AuxRolModel();
        $data['roles'] = $rolesModel->getAll();

        $this->view->showViews(array('templates/header.view.php', 'usuarios-sistema.add.php', 'templates/footer.view.php'), $data);

    }

    public function doAdd():void
    {

        $errores = $this->checkUsuariosSistema($_POST);
        if ($errores !== []) {
            $this->add(
                filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                $errores
            );
        } else {
            $data = $_POST;
            $data['pass'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $usuarioModel = new UsuariosSistemaModel();
            $res = $usuarioModel->instert($data);
        }
        if ($res !== true) {
            echo 'Error';
        } else {
            if (!isset($_POST['insertar_otro'])) {
                header('Location: /usuarios-sistema');
            } else {
                header('Location: /usuarios-sistema/add');
            }
        }
    }

}