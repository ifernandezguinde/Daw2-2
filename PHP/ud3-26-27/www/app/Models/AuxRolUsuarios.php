<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class AuxRolUsuarios extends BaseDbModel
{

    public function getRol(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM `aux_rol` ORDER BY rol ASC");
        return $stmt->fetchAll();
    }

}