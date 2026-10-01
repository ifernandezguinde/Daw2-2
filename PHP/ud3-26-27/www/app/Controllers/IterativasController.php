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

    public function ejercicio3iterativas(string $numeros = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar matriz'],
        );
        $data['errores'] = $errores;
        $data['numeros'] = $numeros;
        $data['resultado'] = $resultado;
        $this->view->showViews(array('templates/header.view.php', 'ejercicio3-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio3iterativas(): void
    {
        $errores = $this->checkEjercicio3($_POST);
        $inputNumeros = filter_var($_POST['numeros'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($errores === []) {
            //Hacemos el trabajo
            $aux = explode('|', $_POST['numeros']);
            $numeros = [];

            foreach ($aux as $ns) {
                $arrayNumeros = explode(',', $ns);
                if(!isset($numColumnas)) {
                    $numColumnas = count($arrayNumeros);
                }
                $numeros = array_merge($numeros, $arrayNumeros);
            }
            sort($numeros);
            $matriz = $this->montarMatriz($numeros, $numColumnas);
            $this->ejercicio3iterativas($inputNumeros, [], $matriz);

        } else {
            $this->ejercicio3iterativas($inputNumeros, $errores);
        }
    }

    private function montarMatriz(array $plano, int $numColumnas): array
    {
        $matriz = [];
        $aux = [];
        foreach($plano as $numero) {
            $aux[] = $numero;
            if (count($aux) === $numColumnas) {
                $matriz[] = $aux;
                $aux = [];
            }
        }
        return $matriz;
    }


    private function checkEjercicio3(array $data): array
    {
        $errores = [];
        if (empty($data['numeros'])) {
            $errores['numeros'] = 'Campo obligatorio';
        } else {
            $aux = explode('|', $data['numeros']);
            //Primero comprobamos que todas las filas tengan el mismo número de elementos
            foreach ($aux as $array) {
                if (!isset($numColumnas)) {
                    $numColumnas = count(explode(',', $array));
                } else if ($numColumnas !== count(explode(',', $array))) {
                    $errores['numeros'] = 'Las filas deben tener el mismo número de columnas.';
                }
            }
            $numeros = [];
            //Aplanamos y comprobamos que son números
            foreach ($aux as $ns) {
                $numeros = array_merge($numeros,  explode(',', $ns));
            }
            foreach ($numeros as $numero) {
                if (!is_numeric($numero)) {
                    $errores['numeros'] = "El valor '$numero' no es un número";
                }
            }
        }
        return $errores;
    }

    public function ejercicio4iterativas(string $texto = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar matriz'],
        );
        $data['errores'] = $errores;
        $data['texto'] = $texto;
        $data['resultado'] = $resultado;
        $this->view->showViews(array('templates/header.view.php', 'ejercicio4-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio4iterativas(): void
    {

        $errores = $this->checkEjercicio4($_POST);
        $inputTexto = $_POST['texto'] ?? '';
        $texto = filter_var($inputTexto, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($errores === []) {
            $textominuscula = mb_strtolower($texto);
            $caracteres = mb_str_split($textominuscula);

            $resultado = array_count_values($caracteres);
            arsort($resultado);

            $this->ejercicio4iterativas($texto, [], $resultado);
        } else {
            $this->ejercicio4iterativas($texto, $errores);
        }
    }

    private function checkEjercicio4(array $data): array
    {
        $errores = [];
        if (empty($data['texto'])) {
            $errores['texto'] = 'Campo obligatorio';
        }
        return $errores;
    }
}