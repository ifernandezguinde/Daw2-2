<?php
declare(strict_types=1);
namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class EjerciciosDecisionController extends BaseController
{
    public function index() {
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio'],
            'seccion' => '/inicio'
        );
        $this->view->showViews(array('templates/header.view.php', 'inicio.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio1estructuras() {
        $x = 30;
        $y = 10;
        if ($x % $y == 0) {
            $texto = " $x es divisible por $y ";
        } else {
            $texto = " $x no es divisible por $y ";
        }
        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio1-estructuras'],
            'seccion' => '/inicio',
            'x' => $x,
            'y' => $y,
            'texto' => $texto
        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio1-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio2estructuras() {

        $x = 30;
        $y = 10;
        $z = 20;
        if ($x > $y && $x > $z ) {
            $texto = "<strong> $x </strong> es mayor que $y y $z";
        } elseif ($y > $z) {
            $texto = "<strong> $y </strong> es mayor que $x y $z";
        } else {
            $texto = "<strong> $z </strong> es mayor que $x y $z";
        }

        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio2-estructuras'],
            'seccion' => '/inicio',
            'x' => $x,
            'y' => $y,
            'texto' => $texto
        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio2-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio3estructuras() {

        $total = 245800;
        $dias = floor($total / 86400);
        $resto1 = $total % 86400;
        $horas = floor($resto1 / 3600);
        $resto2 = $resto1 % 3600;
        $minutos = floor($resto2 / 60);
        $segundos = $resto2 % 60;


        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio3-estructuras'],
            'seccion' => '/inicio',
            'total' => $total,
            'dias' => $dias,
            'horas' => $horas,
            'resto1' => $resto1,
            'resto2' => $resto2,
            'minutos' => $minutos,
            'segundos' => $segundos

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio3-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio4estructuras() {

        $ano = 2028;

        if ($ano % 4 == 0 && $ano % 100 != 0 || $ano % 400 == 0) {
            $texto = "$ano es un año bisiesto";
            $alert = 'alert-success';
        } else {
            $texto = "$ano no es un año bisiesto";
            $alert = 'alert-danger';
        }

        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio4-estructuras'],
            'seccion' => '/inicio',
            'año' => $ano,
            'texto' => $texto,
            'alert' => $alert

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio4-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio5estructuras() {

        $sueldo = 1000;
        $alert = '';

        if ($sueldo <= 1000) {
            $neto = $sueldo - (($sueldo - 10)/100);
            $texto = "tu sueldo neto es $neto €";
        } elseif ($sueldo > 1000 && $sueldo <= 2000) {
            $neto = $sueldo - (($sueldo - 15)/100);
            $texto = "tu sueldo neto es $neto €";
        } else {
            $neto = $sueldo - (($sueldo - 18)/100);
            $texto = "tu sueldo neto es $neto € ";
        }

        if ($neto > 2000) {
            $alert = 'alert-success';
        }

        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio5-estructuras'],
            'seccion' => '/inicio',
            'texto' => $texto,
            'alert' => $alert,
            'sueldo' => $sueldo,
            'neto' => $neto

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio5-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio6estructuras() {

        $nota = 11;

        if ($nota < 5) {
            $texto = "Suspenso";
            $alert = 'alert-danger';
        } elseif ($nota >= 5 && $nota < 6) {
            $texto = "Aprobado";
            $alert = 'alert-warning';
        } elseif ($nota >= 6 && $nota < 7) {
            $texto = "Bien";
            $alert = 'alert-info';
        } elseif ($nota >= 7 && $nota < 8.75) {
            $texto = "Notable";
            $alert = 'alert-info';
        } elseif ($nota >= 8.75 && $nota < 10) {
            $texto = "Sobresaliente";
            $alert = 'alert-success';
        } elseif ($nota == 10) {
            $texto = "Matrícula";
            $alert = 'alert-success';
        } elseif ($nota > 0 || $nota < 10) {
            $texto = "$nota non é unha nota válida";
            $alert = 'alert-danger';
        }

        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio6-estructuras'],
            'seccion' => '/inicio',
            'texto' => $texto,
            'alert' => $alert,
            'nota' => $nota
        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio6-estructuras.view.php', 'templates/footer.view.php'), $data);
    }

    public function ejercicio7estructuras() {

        $bebida = "Sousas";

        switch ($bebida) {
            case "Marcilla":
            case "Bonka": $texto = "Café";
            break;

            case "Coca-Cola":
            case "Kas":
            case "Pepsi": $texto = "Refresco";
            break;

            case "Mondariz":
            case "Cabreiroá":
            case "Sousas": $texto = "Agua";
            break;
        }

        $data = array(
            'titulo' => 'Página de inicio',
            'breadcrumb' => ['Inicio','Ejercicio7-estructuras'],
            'seccion' => '/inicio',
            'texto' => $texto,
            'bebida' => $bebida

        );
        $this->view->showViews(array('templates/header.view.php', 'ejercicio7-estructuras.view.php', 'templates/footer.view.php'), $data);
    }
}