<?php
declare(strict_types=1)
namespace Com\Daw2\Models;

use Com\Daw2\Core\BaseDbModel;

class TrabajadorModel extends BaseDbModel
{
   public function conectar(){
       try {
           $dsn = 'mysql:host= ;dbname=com_daw2';
       }
   }
}