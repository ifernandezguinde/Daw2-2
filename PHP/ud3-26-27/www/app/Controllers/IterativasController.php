<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class IterativasController extends BaseController
{
    public function ejercicio1iterativas(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio1-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio1iterativas(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $numeros = $_POST['numeros'];
        $check = $this->checkEjercicio1($numeros);
        if ($check === true) {
            $arrayNumero = explode(',', $numeros);
            $data['mayor'] = max($arrayNumero);
            $data['menor'] = min($arrayNumero);
            $this->view->showViews(array('templates/header.view.php', 'ejercicio1-iterativas.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['error'] = $check;
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->view->showViews(array('templates/header.view.php', 'ejercicio1-iterativas.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkEjercicio1(string $numeros): string|true
    {
        if ($numeros === '') {
            return 'Debe ingresar numeros';
        }
        $arrayNumero = explode(',', $numeros);

        foreach ($arrayNumero as $numero) {
            if (!is_numeric($numero)) {
                return 'Debe ingresar numeros separados por comas';
            }
        }
        return true;
    }

    public function ejercicio2iterativas(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio2-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio2iterativas(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $numeros = $_POST['numeros'];
        $check = $this->checkEjercicio2($numeros);
        if ($check === true) {
            $arrayNumero = explode(',', $numeros);
            sort($arrayNumero);
            $arrayNumero = implode(',', $arrayNumero);
            $data['ordnumeros'] = $arrayNumero;
            $this->view->showViews(array('templates/header.view.php', 'ejercicio2-iterativas.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['error'] = $check;
            $this->view->showViews(array('templates/header.view.php', 'ejercicio2-iterativas.view.php', 'templates/footer.view.php'), $data);
        }
    }

    private function checkEjercicio2(string $numeros): string|true
    {
        if ($numeros === '') {
            return 'Debe ingresar numeros';
        }
        $arrayNumero = explode(',', $numeros);

        foreach ($arrayNumero as $numero) {
            if (!is_numeric($numero)) {
                return 'Debe ingresar numeros separados por comas';
            }
        }
        return true;
    }

    public function ejercicio3iterativas(string $numeros = '' , array $errores = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio3-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio3iterativas(): void
    {
        $errores = $this->checkEjercicio3($_POST);
        if ($errores !== true) {

            $numeros = $_POST['numeros'];
            $check = $this->checkEjercicio3($numeros);
            if ($check === true) {

                $filas = explode('|', $numeros);
                $columnas = count(explode(',', $filas[0]));


                $arrayLimpio = str_replace('|', ',', $numeros);
                $arrayNumero = explode(',', $arrayLimpio);

                sort($arrayNumero);

                $matriz = array_chunk($arrayNumero, $columnas);

                $matriztexto = '';
                foreach ($matriz as $fila) {
                    $matriztexto .= implode(' ', array_map('trim', $fila)) . '<br>';
                }

                $data['matriz'] = $matriztexto;
                $this->view->showViews(array('templates/header.view.php', 'ejercicio3-iterativas.view.php', 'templates/footer.view.php'), $data);
            } else {
                $data['error'] = $check;
                $this->view->showViews(array('templates/header.view.php', 'ejercicio3-iterativas.view.php', 'templates/footer.view.php'), $data);
            }
        } else {
            $this->ejercicio3iterativas(filter_var($_POST['numeros'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        }
    }

    private function checkEjercicio3(string $numeros): string|true
    {
        if ($numeros === '') {
            return 'Debe ingresar numeros';
        }

        $filas = explode('|', $numeros);
        $columnas = null;

        foreach ($filas as $fila) {
            $elementos = explode(',', $fila);

            if ($columnas === null) {
                $columnas = count($elementos);
            } elseif (count($elementos) !== $columnas) {
                return 'Todas as líneas deben ter a misma cantidad de números';
            }

            foreach ($elementos as $numero) {
                if (!is_numeric($numero)) {
                    return 'Debe ingresar numeros separados por comas';
                }
            }
        }
        return true;
    }
}