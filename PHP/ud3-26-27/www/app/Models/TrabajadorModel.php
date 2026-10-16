<?php
declare(strict_types=1);
namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class TrabajadorModel extends BaseDbModel
{
    public function getTrabajadores(): array
    {
        return $this->pdo->query('SELECT * FROM trabajadores
                                            LEFT JOIN ud5.aux_rol_trabajador art on art.id_rol = trabajadores.id_rol
                                            LEFT JOIN ud5.aux_countries t on t.id = trabajadores.id_country')->fetchAll();
    }

    public function ordenSalario(): array
    {
        return $this->pdo->query('SELECT * FROM trabajadores 
                                            LEFT JOIN ud5.aux_rol_trabajador art on art.id_rol = trabajadores.id_rol
                                            LEFT JOIN ud5.aux_countries t on t.id = trabajadores.id_country
                                            ORDER BY salarioBruto DESC ')->fetchAll();
    }

    public function trabajadoresStandard(): array
    {
        return $this->pdo->query("SELECT * FROM trabajadores 
                                            LEFT JOIN ud5.aux_rol_trabajador art on art.id_rol = trabajadores.id_rol
                                            LEFT JOIN ud5.aux_countries t on t.id = trabajadores.id_country
                                            WHERE nombre_rol = 'standard' ")->fetchAll();
    }

    public function trabajadoresCarlos(): array
    {
        return $this->pdo->query("SELECT * FROM trabajadores 
                                            LEFT JOIN ud5.aux_rol_trabajador art on art.id_rol = trabajadores.id_rol
                                            LEFT JOIN ud5.aux_countries t on t.id = trabajadores.id_country
                                            WHERE username LIKE 'Carlos%' ")->fetchAll();
    }
}