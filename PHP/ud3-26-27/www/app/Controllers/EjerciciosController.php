<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

class EjerciciosController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1strings(): void
    {
        $data = array(
            'titulo' => 'Ejercicio Strings',
            'breadcrumb' => ['Inicio', 'Ejercicio Strings'],
            //'variableNueva' => 'Tengo valor'
        );
        $s = 'Carmiña';
        $final = '_user';
        $comillasDobles = "{$s}_user";
        $comillasSimples = $s . '_user'; //rafa_user

        $data['comillasSimples'] = $comillasSimples;
        $data['comillasDobles'] = $comillasDobles;
        $data['s'] = $s;
        $data['final'] = $final;
        $this->addNumbers(1,2);
        $this->addNumbers(2,3, 4);
        $this->addNumbers(a:5, b:6, d: '8');


        $this->view->showViews(array('templates/header.view.php', 'ejercicios1-strings.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio1operadores(): void
    {
        $x = 10;
        $y = $x**2;
        $data = array(
            'titulo' => 'Ejercicio1 operadores',
            'breadcrumb' => ['Inicio', 'Ejercicio1-operadores'],
            'x' => $x,
            'cuadrado' => $y
            //'variableNueva' => 'Tengo valor'
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio1-operadores.view.php', 'templates/footer.view.php'), $data);

    }

    public function ejercicio2operadores(): void
    {
        $x = 10;
        $y = 160;
        $z = $x*$y;
        $data = array(
            'titulo' => 'Ejercicio2 operadores',
            'breadcrumb' => ['Inicio', 'Ejercicio2-operadores'],
            'precio' => $x,
            'horas' => $y,
            'sueldo' => $z
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio2-operadores.view.php', 'templates/footer.view.php'), $data);

    }

    public function ejercicio3operadores(): void
    {
        $base = 40;
        $altura = 10;
        $area = $base * $altura;
        $perimetro = ($base + $altura) * 2;
        $data = array(
            'titulo' => 'Ejercicio3 operadores',
            'breadcrumb' => ['Inicio', 'Ejercicio3-operadores'],
            'base' => $base,
            'altura' => $altura,
            'perimetro' => $perimetro,
            'area' => $area

        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio3-operadores.view.php', 'templates/footer.view.php'), $data);

    }

    public function ejercicio4operadores(): void
    {
        $nombre = 'Juan';
        $edad = 25;
        $media = 8.5;
        $data = array(
            'titulo' => 'Ejercicio operadores',
            'breadcrumb' => ['Inicio', 'Ejercicio4-operadores'],
            'nombre' => $nombre,
            'edad' => $edad,
            'media' => $media
        );

        $this->view->showViews(array('templates/header.view.php', 'ejercicio4-operadores.view.php', 'templates/footer.view.php'), $data);

    }

    function addNumbers(int|float $a, int|float $b, int|float $c = 0, int|float|string $d = 0): int|false
    {
        return $a + $b + $c + $d;
    }

    function getFechaNacimiento(Persona $p) :Date {

    }

}
