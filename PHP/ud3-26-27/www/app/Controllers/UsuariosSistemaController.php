<?php
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;
use Com\Daw2\Models\AuxRolModel;
use Com\Daw2\Models\UsuariosSistemaModel;

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

    public function login(bool $error = false): void
    {
        $this->view->show('login.view.php', ['error' => $error]);
    }

    public function doLogin(): void
    {
        $error = false;
        if(!empty($_POST['email']) && !empty($_POST['pass'])){
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $usuario = (new UsuariosSistemaModel())->getByEmail($email);
            if($usuario !== false && password_verify($password, $usuario['pass'])) {
                session_regenerate_id(true);
                $_SESSION['usuario'] = $usuario;
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
        if(!$error) {
            header('Location: /');
        } else {
            $this->login(true);
        }
    }


    public function new(array $input = [], array $errors = []): void
    {
        $data =
            [
                'titulo' => 'Alta Usuario',
                'breadcrumb' => ['Inicio', 'Usuarios Sistema', 'Alta usuario'],
                'input' => $input,
                'errors' => $errors,
            ];
        $rolModel = new AuxRolModel();
        $data['roles'] = $rolModel->getAll();
        $data['idiomas'] = self::IDIOMAS;
        $this->view->showViews(array('templates/header.view.php', 'usuarios-sistema.edit.php', 'templates/footer.view.php'), $data);
    }

    public function doNew(): void
    {
        $errors = $this->checkUsuarioForm($_POST);
        if ($errors === []) {
            $model = new UsuariosSistemaModel();
            if ($model->insert($_POST)) {
                header('Location: /usuarios-sistema');
            } else {
                echo 'error';
            }
        } else {
            $this->new(filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errors);
        }

    }

    public function edit(int $idUsuario, array $input = [], array $errors = []): void
    {
        $model = new UsuariosSistemaModel();
        $usuario = $model->find($idUsuario);
        if ($usuario === false) {
            //TODO: Poner error en vista
            header('Location: /usuarios-sistema');
        } else {
            $row = ($input === []) ? $usuario : $input;
            $data =
                [
                    'titulo' => 'Editar Usuario',
                    'breadcrumb' => ['Inicio', 'Usuarios Sistema', 'Editar usuario'],
                    'input' => $row,
                    'errors' => $errors,
                ];
            $rolModel = new AuxRolModel();
            $data['roles'] = $rolModel->getAll();
            $data['idiomas'] = self::IDIOMAS;
            $this->view->showViews(array('templates/header.view.php', 'usuarios-sistema.edit.php', 'templates/footer.view.php'), $data);
        }
    }

    public function doEdit(int $idUsuario): void
    {
        $errors = $this->checkUsuarioForm($_POST, $idUsuario);
        if ($errors === []) {
            $model = new UsuariosSistemaModel();
            $ok = (empty($POST['password'])) ? $model->edit($idUsuario, $_POST) : $model->edit($idUsuario, $_POST) && $model->changePass($idUsuario, $_POST['password']);
            if ($ok) {
                header('Location: /usuarios-sistema');
            } else {
                echo 'error';
            }
        } else {
            $this->edit($idUsuario, filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errors);
        }
    }

    public function checkUsuarioForm(array $data, int $idUsuario = -1): array
    {
        $errors = [];
        $model = new UsuariosSistemaModel();
        if (empty($data['nombre'])) {
            $errors['nombre'] = 'Campo obligatorio';
        } else if (!preg_match('/^[\p{L}\p{N}_]{5,20}$/u', $data['nombre'])) {
            $errors['nombre'] = 'Sólo se permiten letras, números y _. Longitud entre 5 y 20';
        } else {
            $row = $model->getByNombre($data['nombre']);
            if ($row !== false && $row['id_usuario'] != $idUsuario) {
                $errors['nombre'] = 'El nombre ya está en uso';
            }
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Campo obligatorio';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Inserte un email válido';
        } else {
            $row = $model->getByEmail($data['email']);
            if ($row !== false && $row['id_usuario'] != $idUsuario) {
                $errors['email'] = 'El email ya está en uso';
            }
        }

        if (empty($data['id_rol'])) {
            $errors['id_rol'] = 'Campo obligatorio';
        } elseif (filter_var($data['id_rol'], FILTER_VALIDATE_INT) === false) {
            $errors['id_rol'] = 'Valor incorrecto';
        } else {
            $rolModel = new AuxRolModel();
            if ($rolModel->find((int)$data['id_rol']) === false) {
                $errors['id_rol'] = 'valor incorrecto (2)';
            }
        }

        if (empty($data['idioma'])) {
            $errors['idioma'] = 'Campo obligatorio';
        } elseif(in_array($data['idioma'], self::IDIOMAS) === false) {
            $errors['idioma'] = 'Valor incorrecto';
        }

        if ($idUsuario === -1 || $idUsuario > 0 && !empty($data['password'])) {
            if (empty($data['password'])) {
                $errors['password'] = 'Campo obligatorio';
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/u', $data['password'])) {
                $errors['password'] = 'La contraseña debe contener al menos una mayúscula, una minúscula y un número. Longitud >= 8';
            } elseif ($data['password'] != $data['password2']) {
                $errors['password'] = 'Las contraseñas no coinciden';
            }
        }

        return $errors;
    }

}