<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;
use PDO;
use PDOException;

class TrabajadorModel extends BaseDbModel
{
    public function getTrabajadores(): array
    {
        $query = "SELECT * FROM trabajadores t JOIN aux_rol_trabajador art ON art.id_rol = t.id_rol 
                    JOIN aux_countries ac ON ac.id = t.id_country";
        $trabajadores = $this->pdo->query($query)->fetchAll();
        //var_dump($trabajadores);
        return $trabajadores;
    }

    public function insertTrabajador(array $data): bool
    {
        $query = "INSERT INTO trabajadores (username, salarioBruto, retencionIRPF, activo, id_rol,    id_country) VALUES (:username, :salarioBruto, :retencionIRPF, :activo, :id_rol, :id_country)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($data);
    }
}
