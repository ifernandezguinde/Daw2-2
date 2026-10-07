<?php

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Core\BaseController;

class PedidosController extends BaseController
{
    public function index(string $jsonPedidos = '', string $jsonClientes, array $errores = [], array $resultado = [])
    {
        $data = array(
            'titulo' => 'Pedidos y Clientes',
            'breadcrumb' => ['Inicio'],
            'seccion' => '/inicio'
        );

        $data['errores'] = $errores;
        $data['jsonPedidos'] = $jsonPedidos;
        $data['jsonClientes'] = $jsonClientes;
        $data['resultado'] = $resultado;

        $this->view->showViews(array('templates/header.view.php', 'ejercicioPedidos.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicioPedidos()
    {
        $jsonPedidos = $_POST['jsonPedidos'];
        $jsonClientes = $_POST['jsonClientes'];
        $errores = $this->checkErrores($jsonPedidos, $jsonClientes);
        if ($errores === []) {

            $this->index(filter_var($jsonPedidos, FILTER_SANITIZE_FULL_SPECIAL_CHARS), filter_var($jsonClientes, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $resultado);
        } else {
            $this->index(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
        }
    }

    private function checkErrores(string $jsonPedidos, string $jsonClientes): array
    {
        $errores = [];

        // Pedidos
        if ($jsonPedidos === '') {
            $errores['json'][] = 'Campo de pedidos obligatorio';
        } else {
            if (json_validate($jsonPedidos)) {
                $datosPedidos = json_decode($jsonPedidos, true);
                if (is_array($datosPedidos)) {
                    foreach ($datosPedidos as $detalles => $articulos) {
                        if (!is_string($detalles)) {
                            $errores['json'][] = "El valor $detalles no es una string";
                        } else {
                            if (!is_string($articulos)) {
                                $errores['json'][] = "El valor $articulos no es una string";
                            }
                        }
                    }
                } else {
                    $errores['json'][] = 'El json no tiene el formato esperado';
                }
            } else {
                $errores['json'][] = 'Inserte un json válido';
            }
        }

        // Clientes
        if ($jsonClientes === '') {
            $errores['json'][] = 'Campo de pedidos obligatorio';
        } else {
            if (json_validate($jsonClientes)) {
                $datosClientes = json_decode($jsonClientes, true);
                if (is_array($datosClientes)) {
                    foreach ($datosClientes as $detalles) {
                        if (!is_string($detalles)) {
                            $errores['json'][] = "El valor $detalles no es una string";
                        }
                    }
                } else {
                    $errores['json'][] = 'El json no tiene el formato esperado';
                }
            } else {
                $errores['json'][] = 'Inserte un json válido';
            }
        }

        return $errores;
    }
}
