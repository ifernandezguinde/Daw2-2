<?php

declare(strict_types=1);

namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class UsuariosModel extends BaseDbModel
{
    private const SELECT = "SELECT u.*, aru.rol ";
    private const FROM = "FROM usuario_sistema u LEFT JOIN aux_rol aru ON aru.id_rol = u.id_rol ";


    public function getUsuarios(): array
    {
        $sql = self::SELECT . self::FROM;
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

}