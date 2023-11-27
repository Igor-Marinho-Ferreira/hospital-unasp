<?php

namespace src\repositories;

use src\database\models\Nurse;

class NurseRepository extends BaseRepository
{
    function __construct(Nurse $nurse = null)
    {
        $this->setModel($nurse ?? (new Nurse));
    }
    
    function getByUserKey(string $userKey): ?object
    {
        return $this->byColumn("name", "=", "'{$userKey}'")->get();
    }
}
