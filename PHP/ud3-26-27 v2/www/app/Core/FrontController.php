<?php

namespace Com\Daw2\Core;

use Com\Daw2\Controllers\ErroresController;
use Com\Daw2\Controllers\TrabajadorController;
use Steampixel\Route;

class FrontController
{
    public static function main(): void
    {
        Route::add(
            '/trabajadores',
            function () {
                $controlador = new TrabajadorController();
                $controlador->getTrabajadores();
            },
            'get'
        );

        Route::add(
            '/trabajador/add',
            function () {
                $controlador = new TrabajadorController();
                $controlador->showTrabajador();
            },
            'get'
        );

        Route::add(
            '/trabajador/add',
            function () {
                $controlador = new TrabajadorController();
                $controlador->doTrabajador();
            },
            'post'
        );

        Route::pathNotFound(
            function () {
                $controller = new ErroresController();
                $controller->error404();
            }
        );
        Route::methodNotAllowed(
            function () {
                $controller = new ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}
