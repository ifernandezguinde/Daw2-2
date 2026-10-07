<?php

namespace Com\Daw2\Core;

use Com\Daw2\Controllers\CategoriaController;
use Com\Daw2\Controllers\EjerciciosController;
use Com\Daw2\Controllers\PreferenciasController;
use Com\Daw2\Controllers\UsuarioSistemaController;
use Steampixel\Route;

class FrontController
{
    public static function main()
    {
        Route::add(
            '/',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->index();
            },
            'get'
        );
        Route::add(
            '/ejercicio1-strings',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1Strings();

            },
            'get'
        );
        Route::add(
            '/ejercicio1-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1operadores();

            },
            'get'
        );

        Route::add(
            '/ejercicio2-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio2operadores();

            },
            'get'
        );

        Route::add(
            '/ejercicio3-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio3operadores();

            },
            'get'
        );

        Route::add(
            '/ejercicio4-operadores',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio4operadores();

            },
            'get'
        );

        Route::add(
            '/ejercicio1-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio1estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio2-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio2estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio3-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio3estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio4-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio4estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio5-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio5estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio6-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio6estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio7-estructuras',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosDecisionController();
                $controlador->ejercicio7estructuras();

            },
            'get'
        );

        Route::add(
            '/ejercicio1-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio1iterativas();

            },
            'get'
        );

        Route::add(
            '/ejercicio1-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio1iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio2-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio2iterativas();

            },
            'get'
        );

        Route::add(
            '/ejercicio2-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio2iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio3-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio3iterativas();

            },
            'get'
        );

        Route::add(
            '/ejercicio3-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio3iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio4-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio4iterativas();

            },
            'get'
        );

        Route::add(
            '/ejercicio4-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio4iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio5-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio5iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio5-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio5iterativas();

            },
            'get'
        );

        Route::add(
            '/ejercicio8-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->doEjercicio8iterativas();
            },
            'post'
        );

        Route::add(
            '/ejercicio8-iterativas',
            function () {
                $controlador = new \Com\Daw2\Controllers\IterativasController();
                $controlador->ejercicio8iterativas();
            },
            'get'
        );

        Route::add(
            '/ejercicioPedidos',
            function () {
                $controlador = new \Com\Daw2\Controllers\PedidosController();
                $controlador->doEjercicioPedidos();
            },
            'post'
        );

        Route::add(
            '/ejercicioPedidos',
            function () {
                $controlador = new \Com\Daw2\Controllers\PedidosController();
                $controlador->index();
            },
            'get'
        );

        Route::add(
            '/demo-proveedores',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->demo();
            },
            'get'
        );
        Route::pathNotFound(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        Route::methodNotAllowed(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}
