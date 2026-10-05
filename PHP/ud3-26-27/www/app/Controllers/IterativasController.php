<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class IterativasController extends BaseController
{
    // EJERCICIO 1
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

    // EJERCICIO 2
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

    // EJERCICIO 3
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

    // EJERCICIO 4
    public function ejercicio4iterativas(string $texto = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Contar Letras'],
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

    // EJERCICIO 5
    public function ejercicio5iterativas(string $texto = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Contar Palabras'],
        );
        $data['errores'] = $errores;
        $data['texto'] = $texto;
        $data['resultado'] = $resultado;
        $this->view->showViews(array('templates/header.view.php', 'ejercicio5-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio5iterativas(): void
    {

        $errores = $this->checkEjercicio5($_POST);
        $inputTexto = $_POST['texto'] ?? '';
        $texto = filter_var($inputTexto, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($errores === []) {
            $textominuscula = mb_strtolower($texto);
            $textominuscula = preg_replace('/[,.]/', '', $textominuscula);

            $palabras = explode(' ', $textominuscula);
            $resultado = array_count_values($palabras);
            arsort($resultado);

            $this->ejercicio5iterativas($texto, [], $resultado);
        } else {
            $this->ejercicio5iterativas($texto, $errores);
        }
    }

    private function checkEjercicio5(array $data): array
    {
        $errores = [];
        if (empty($data['texto'])) {
            $errores['texto'] = 'Campo obligatorio';
        }
        return $errores;
    }


    // EJERCICIO 8
    public function ejercicio8iterativas(string $json = '', array $errores = [], array $resultado = [], array $evaluaciones = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Cálculo de notas'],
        );
        $data['errores'] = $errores;
        $data['json'] = $json;
        $data['resultado'] = $resultado;
        $data['evaluaciones'] = $evaluaciones;
        $this->view->showViews(array('templates/header.view.php', 'ejercicio8-iterativas.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio8iterativas(): void
    {
        $json = $_POST['json'] ?? '';
        $errores = $this->checkEjercicio8iterativas($json);
        if ($errores === []) {
            $resultado = $this->procesarEjercicio8(json_decode($json, true));
            $evaluaciones = $this->evaluar(json_decode($json, true));
            $this->ejercicio8iterativas(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $resultado, $evaluaciones);
        } else {
            $this->ejercicio8iterativas(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }

    private function procesarEjercicio8(array $datos): array {
        $resultado = [];
        foreach ($datos as $asignatura => $alumnos) {
            $datosAsignatura = [
                'media' => 0,
                'suspensos' => 0,
                'aprobados' => 0,
                'max' => [
                    'alumno' => null,
                    'nota' => null
                ],
                'min' => [
                    'alumno' => null,
                    'nota' => null
                ]
            ];
            $numAlumnos = count($alumnos);
            $notaAgregada = 0;
            foreach ($alumnos as $nombre => $nota) {
                $notaAgregada += $nota;
                if ($nota >= 5) {
                    $datosAsignatura['aprobados']++;
                } else {
                    $datosAsignatura['suspensos']++;
                }
                //Sólo se va a ejecutar para el primer alumno de cada asignatura
                if ($datosAsignatura['max']['alumno'] === null) {
                    $datosAsignatura['max']['alumno'] = $nombre;
                    $datosAsignatura['max']['nota'] = $nota;
                    $datosAsignatura['min']['alumno'] = $nombre;
                    $datosAsignatura['min']['nota'] = $nota;
                } else {
                    if ($datosAsignatura['max']['nota'] < $nota) {
                        $datosAsignatura['max']['alumno'] = $nombre;
                        $datosAsignatura['max']['nota'] = $nota;
                    }
                    if ($datosAsignatura['min']['nota'] > $nota) {
                        $datosAsignatura['min']['alumno'] = $nombre;
                        $datosAsignatura['min']['nota'] = $nota;
                    }
                }
            }
            $datosAsignatura['media'] = ($numAlumnos > 0) ? $notaAgregada / $numAlumnos : null;
            $resultado[$asignatura] = $datosAsignatura;
        }
        return $resultado;
    }

    private function evaluar($datos) : array
    {
        $evaluaciones = [];
        foreach ($datos as $asignatura => $alumnos) {
            foreach ($alumnos as $nombre => $nota) {
                if (!isset($evaluaciones[$nombre])) {
                    $evaluaciones[$nombre] = [
                        'aprobados' => 0,
                        'suspensos' => 0
                    ];
                }

                if ($nota >= 5) {
                    $evaluaciones[$nombre]['aprobados']++;
                } else {
                    $evaluaciones[$nombre]['suspensos']++;
                }
            }
        }

        $resultados = [
            'aprobados' => [],
            'suspensos' => [],
            'repiten' => []
        ];
        foreach ($evaluaciones as $nombre => $resumen) {
            if ($resumen['suspensos'] === 0) {
                $resultados['aprobados'][] = $nombre;
            }  elseif ($resumen['suspensos'] === 1) {
                $resultados['suspensos'][] = $nombre;
            } else {
                $resultados['repiten'][] = $nombre;
            }
        }
        return $resultados;
    }

    private function checkEjercicio8iterativas(string $json)
    {
        $errores = [];
        if ($json === '') {
            $errores['json'][] = 'Campo obligatorio';
        } else {
            if (json_validate($json)) {
                $datos = json_decode($json, true);
                if (is_array($datos)) {
                    foreach($datos as $asignatura => $alumnos) {
                        if (!is_string($asignatura)) {
                            $errores['json'][] = "El valor $asignatura no es una string";
                        } else {
                            if (!is_array($alumnos)) {
                                $errores['json'][] = "No tenemos un array de alumnos en la asignatura: $asignatura ";
                            } else {
                                foreach($alumnos as $nombre => $nota) {
                                    if (!is_string($nombre)) {
                                        $errores['json'][] = "En la asignatura $asignatura existe un alumno cuyo nombre no es una string";
                                    } elseif (!is_numeric($nota)) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota numérica";
                                    } elseif ($nota > 10 || $nota < 0) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota entre 0 y 10";
                                    }
                                }
                            }
                        }
                    }
                } else{
                    $errores['json'][] = 'El json no tiene el formato esperado';
                }
            } else {
                $errores['json'][] = 'Inserte un json válido';
            }
        }
        return $errores;
    }

}