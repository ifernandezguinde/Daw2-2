<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class UsuariosModel extends BaseDbModel
{
    private const SELECT = "SELECT u.*, aru.rol ";
    private const FROM = "FROM usuario_sistema u LEFT JOIN aux_rol aru ON aru.id_rol = u.id_rol ";
    private const ORDER_FIELDS = ['rol', 'u.email', 'u.nombre', 'u.idioma'];
    private const DEFAULT_ORDER = 1;
    private const ROWS_PER_PAGE = 2;


    public function getIdiomas(): array
    {
        $stmt = $this->pdo->query("SELECT DISTINCT idioma FROM usuario_sistema WHERE idioma IS NOT NULL AND idioma != '' ORDER BY idioma ASC");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    private function getWhere(array $filtros): array
    {
        $values = [];
        $condiciones = [];


        if (!empty($filtros['id_rol'])) {
            $condiciones[] = "u.id_rol = :id_rol";
            $values["id_rol"] = $filtros['id_rol'];
        }
        if (!empty($filtros['email'])) {
            $condiciones[] = "u.email = :email";
            $values["email"] = $filtros['email'];
        }
        if (!empty($filtros['nombre'])) {
            $condiciones[] = "nombre LIKE :nombre";
            $values["nombre"] = "%" . $filtros['nombre'] . "%";
        }
        if (!empty($filtros['idioma'])) {
            $condiciones[] = "idioma = :idioma";
            $values["idioma"] = $filtros['idioma'];
        }
        // TODO que envíe el where a la sql (cambiar formato fecha)
        if (!empty($last_date)) {
            $range = explode('/', $last_date);
            $condiciones[] = "last_date BETWEEN minRange = :minRange AND maxRange = :maxRange";
            $values["minRange"] = $range[0];
            $values["maxRange"] = $range[1];
        }

        return [
            'values' => $values,
            'condiciones' => $condiciones,
        ];
    }

    public function getFilterBy(array $filtros): array
    {
        $sql = self::SELECT . self::FROM;
        $resultadoWhere = $this->getWhere($filtros);
        $condiciones = $resultadoWhere['condiciones'];
        $values = $resultadoWhere['values'];

        if ($condiciones !== []) {
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }

        $sentido = !empty($filtros['sentido']) && $filtros['sentido'] === 'desc' ? 'DESC' : 'ASC';
        $sql .= " ORDER BY " . self::ORDER_FIELDS[$this->getOrder($filtros) -1] . " $sentido";

        $currentPage = $this->getCurrentPage($filtros);

        $sql .= " LIMIT " . (($currentPage -1) * self::ROWS_PER_PAGE) . ", " . self::ROWS_PER_PAGE;

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchAll();
    }

    public function getOrder(array $filtros): int
    {
        if (empty($filtros['order'])) {
            return self::DEFAULT_ORDER;
        } elseif (filter_var($filtros['order'], FILTER_VALIDATE_INT) === false || $filtros['order'] < 1 || $filtros['order'] > count(self::ORDER_FIELDS)) {
            return self::DEFAULT_ORDER;
        } else {
            return (int)$filtros['order'];
        }
    }

    public function getCurrentPage(array $filtros): int
    {
        return !empty($filtros['page']) && filter_var($filtros['page'], FILTER_VALIDATE_INT) ? (int)$filtros['page'] : 1;
    }

    public function getLastPage(array $filtros): int
    {
        return (int)ceil($this->getCountFilterBy($filtros) / self::ROWS_PER_PAGE);
    }

    public function getCountFilterBy(array $filtros): int
    {
        $sql = "SELECT COUNT(*) " . self::FROM;
        $resultadoWhere = $this->getWhere($filtros);
        $condiciones = $resultadoWhere['condiciones'];
        $values = $resultadoWhere['values'];

        if ($condiciones !== []) {
            $sql .= " WHERE " . implode(" AND ", $condiciones);
        }

        $sentido = !empty($filtros['sentido']) && $filtros['sentido'] === 'desc' ? 'DESC' : 'ASC';
        $sql .= " ORDER BY " . self::ORDER_FIELDS[$this->getOrder($filtros) -1] . " $sentido";


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchColumn();
    }
}